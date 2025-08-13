let sceneText;

async function readFile() {

    const reader = await fetch("testScene/webGlScene.json")
    sceneText = await reader.text();
    sceneText = JSON.parse(sceneText);
    

    requestAnimationFrame(load);
}

async function load() {
    let canvas = document.querySelector("canvas");
    let width = innerWidth;
    let height = innerHeight;
    canvas.width = width;
    canvas.height = height;

    context = canvas.getContext("webgpu");
    canvasFormat = navigator.gpu.getPreferredCanvasFormat();

    let adapter = await navigator.gpu.requestAdapter();
    const limits = adapter.limits;
    let device = await adapter.requestDevice({
  requiredLimits: {
    maxTextureDimension2D: limits.maxTextureDimension2D
  }});

    context.configure({
        device: device,
        format: canvasFormat
    });

    const jgl = new JSCGL(device, context, canvasFormat, width, height);
    await jgl.init();

    testScene = new Scene(sceneText);
    await testScene.loadScene(jgl);

    let camera = testScene.cameras[0];

    let dino = testScene.objects[3];
    let pingu = testScene.objects[9];
    let line = testScene.objects.at(-1);
    let mapa = testScene.objects[0];

    // Investigar como funciona el layout

    //const matBindGroup = jgl.createUniformBindGroup(1, [matWorldBuffer, matViewProjBuffer]);

    let angle = 0;
    let anglePingu = 0;
    let spin = false;

    let angleX = 0;
    let angleY = -10;
    let mouseX = 0;
    let mouseY = 0;

    const keysPressed = {};

    window.addEventListener("keydown", (e) => {
        keysPressed[e.key.toLowerCase()] = true;
    });

    window.addEventListener("keyup", (e) => {
        keysPressed[e.key.toLowerCase()] = false;
    });

    canvas.addEventListener("click", async () => {
        await canvas.requestPointerLock();
    });

    function mouseMove(event) {
        mouseX = event.movementX;
        mouseY = event.movementY;
    }

    let sinCam = 0;
    let cosCam = 0;

    function round(x) {
        if (x < 0) {
            return x * -1;
        }
        return x;
    }
    
    document.addEventListener("mousemove", mouseMove);

    let lastFrameTime = performance.now();
    function frame() {
        const thisFrameTime = performance.now();
        const dt = (thisFrameTime - lastFrameTime) / 1000;
        lastFrameTime = thisFrameTime;

        angleX -= mouseX * dt * 10;
        mouseX = 0;

        angleY += mouseY * dt * 10;
        mouseY = 0;
        
        dinoAngle = -Math.atan2(pingu.position[0]-dino.position[0],pingu.position[2]-dino.position[2]) + 180.7;

        sinDino = Math.sin(dinoAngle);
        cosDino = Math.cos(dinoAngle);

        sinCam = Math.sin(Matrix3D.convertToRad(-angleX+90));
        cosCam = Math.cos(Matrix3D.convertToRad(-angleX-90));

        sinCamY = Math.sin(Matrix3D.convertToRad(-angleY));
        cosCamY = Math.cos(Matrix3D.convertToRad(-angleY));

        // Cube Move

        if (keysPressed['w'] == true) {
            pingu.position[0] -= sinCam * dt * 10;
            pingu.position[2] -= cosCam * dt * 10;
            camera.position[0] -= sinCam * dt * 20;
            camera.position[2] -= cosCam * dt * 20;
        }

        if (keysPressed['s'] == true) {
            pingu.position[0] += sinCam * dt * 10;
            pingu.position[2] += cosCam * dt * 10;
            camera.position[0] += sinCam * dt * 20;
            camera.position[2] += cosCam * dt * 20;
        }

        if (keysPressed['a'] == true) {
            pingu.position[0] += Math.sin(Matrix3D.convertToRad(angleX)) * dt * 10;
            pingu.position[2] += Math.cos(Matrix3D.convertToRad(angleX)) * dt * 10;
            camera.position[0] += Math.sin(Matrix3D.convertToRad(angleX)) * dt * 20;
            camera.position[2] += Math.cos(Matrix3D.convertToRad(angleX)) * dt * 20;
        }

        if (keysPressed['d'] == true) {
            pingu.position[0] -= Math.sin(Matrix3D.convertToRad(angleX)) * dt * 10;
            pingu.position[2] -= Math.cos(Matrix3D.convertToRad(angleX)) * dt * 10;
            camera.position[0] -= Math.sin(Matrix3D.convertToRad(angleX)) * dt * 20;
            camera.position[2] -= Math.cos(Matrix3D.convertToRad(angleX)) * dt * 20;
        }

        if (keysPressed['z'] == true) {
            spin = true;   
        }
        if (keysPressed['c'] == true) {
            let screenshot = testScene.screenshot(jgl, dt, width, height);
            downloadScreenshot(device, context, screenshot, width, height);
        }

        if (spin) {
            anglePingu += 1 * dt * 100;
        } else {
            anglePingu = 0;
        }

        camera.rotation[2] = Matrix3D.convertToRad(20);
        camera.rotation[1] = Matrix3D.convertToRad(angleX+90);
        camera.position[2] = pingu.position[2] + Math.sin(Matrix3D.convertToRad(-angleX)) * 10;
        camera.position[0] = pingu.position[0] + Math.cos(Matrix3D.convertToRad(-angleX)) * 10;
        pingu.rotation[1] = Matrix3D.convertToRad(-angleX+90)+Matrix3D.convertToRad(anglePingu);

        if (!(round(pingu.position[0]-dino.position[0]) < 2 && round(pingu.position[2]-dino.position[2]) < 2)) {
            //dino.position[0] -= cosDino * dt * 8;
            //dino.position[2] -= sinDino * dt * 8;
            angle = 0;
        } else {
            angle += 1 * dt * 100;
        }

        testScene.draw(jgl, dt, width, height);

        requestAnimationFrame(frame);
    }
    frame();
}

async function downloadScreenshot(device, context, texture, width, height) {
  const bytesPerPixel = 4;
  const unaligned = width * bytesPerPixel;
  const alignedBytesPerRow = Math.ceil(unaligned / 256) * 256;
  const bufferSize = alignedBytesPerRow * height;

  // 1. Crear el buffer con tamaño alineado
  const buffer = device.createBuffer({
    size: bufferSize,
    usage: GPUBufferUsage.COPY_DST | GPUBufferUsage.MAP_READ,
  });

  // 2. Copiar la textura al buffer alineado
  const commandEncoder = device.createCommandEncoder();
  commandEncoder.copyTextureToBuffer(
    {
      texture: texture,
      mipLevel: 0,
      origin: { x: 0, y: 0, z: 0 },
    },
    {
      buffer: buffer,
      offset: 0,
      bytesPerRow: alignedBytesPerRow,
    },
    { width: width, height: height, depthOrArrayLayers: 1 }
  );
  device.queue.submit([commandEncoder.finish()]);

  // 3. Mapear y corregir el padding por fila
  await buffer.mapAsync(GPUMapMode.READ);
  const mapped = new Uint8Array(buffer.getMappedRange());

  const visible = new Uint8ClampedArray(width * height * bytesPerPixel);

  // ✅ Copiar cada fila eliminando padding
  for (let y = 0; y < height; y++) {
    const srcOffset = y * alignedBytesPerRow;
    const dstOffset = y * unaligned;
    visible.set(mapped.subarray(srcOffset, srcOffset + unaligned), dstOffset);
  }

  buffer.unmap();
  buffer.destroy();

  // ✅ Corregir orden de canales BGRA → RGBA
  for (let i = 0; i < visible.length; i += 4) {
    const b = visible[i];
    const g = visible[i + 1];
    const r = visible[i + 2];
    const a = visible[i + 3];

    visible[i]     = r;
    visible[i + 1] = g;
    visible[i + 2] = b;
    visible[i + 3] = a;
  }

  // 4. Crear y descargar la imagen PNG
  const canvas = document.createElement('canvas');
  canvas.width = width;
  canvas.height = height;
  const ctx = canvas.getContext('2d');
  ctx.putImageData(new ImageData(visible, width, height), 0, 0);

  canvas.toBlob((blob) => {
    if (blob) {
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = prompt("Ingrese el nombre del screenshot: ")+'.png';
      a.click();
      URL.revokeObjectURL(url);
    }
  }, 'image/png');
}


window.addEventListener("DOMContentLoaded", async () => {
    readFile();
});