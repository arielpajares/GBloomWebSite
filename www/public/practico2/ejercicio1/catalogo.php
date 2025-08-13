<?php
$productos = [
    [
        "nombre" => "Laptop Gamer Nitro 5",
        "marca" => "Acer",
        "precio" => 1250.99,
        "stock" => 8
    ],
    [
        "nombre" => "MacBook Air M2",
        "marca" => "Apple",
        "precio" => 1199.00,
        "stock" => 15
    ],
    [
        "nombre" => "PC de Escritorio Omen 40L",
        "marca" => "HP",
        "precio" => 2599.99,
        "stock" => 5
    ],
    [
        "nombre" => "Monitor Odyssey G7",
        "marca" => "Samsung",
        "precio" => 749.99,
        "stock" => 12
    ],
    [
        "nombre" => "Tarjeta Gráfica GeForce RTX 4070",
        "marca" => "NVIDIA",
        "precio" => 599.00,
        "stock" => 20
    ],
    [
        "nombre" => "Procesador Core i7-13700K",
        "marca" => "Intel",
        "precio" => 417.99,
        "stock" => 18
    ],
    [
        "nombre" => "Teclado Mecánico K100 RGB",
        "marca" => "Corsair",
        "precio" => 229.99,
        "stock" => 25
    ],
    [
        "nombre" => "Mouse Logitech G502 HERO",
        "marca" => "Logitech",
        "precio" => 49.99,
        "stock" => 30
    ],
    [
        "nombre" => "Disco Duro Externo My Passport 2TB",
        "marca" => "Western Digital",
        "precio" => 64.99,
        "stock" => 40
    ],
    [
        "nombre" => "Router Wi-Fi 6 Archer AXE75",
        "marca" => "TP-Link",
        "precio" => 149.99,
        "stock" => 10
    ],
    [
        "nombre" => "SSD Samsung 980 Pro 1TB",
        "marca" => "Samsung",
        "precio" => 99.99,
        "stock" => 22
    ],
    [
        "nombre" => "Webcam C920x Pro HD",
        "marca" => "Logitech",
        "precio" => 69.99,
        "stock" => 15
    ]
];

function mostrarCatalogo($productos) {
    echo <<<EOD
    <div class="wrapper">
    <h1 style="margin:0 0 16px;font-size:1.25rem">Listado de productos</h1>
    <div class="grid">
    EOD;
    
    foreach ($productos as $producto) {
        if ($producto["stock"] < 10) {
            echo <<<EOD
            <article class="card low-stock">
            <div class="body">
            <div class="title-row">
            <div>
            EOD;
        } else {
            echo <<<EOD
            <article class="card">
            <div class="body">
            <div class="title-row">
            <div>
            EOD;
        }

        echo "<div class=\"title\">" . $producto["nombre"] . "</div>";
        echo "<div class=\"brand\">" . $producto["marca"] . "</div></div>";
        echo "<div class=\"price\">" . $producto["precio"] . " USD</div>";
        echo <<<EOD
          </div>
          <div class="meta">
        EOD;
        echo "<div class=\"stock-badge\">" . $producto["stock"] . " en stock</div>";
        echo <<<EOD
        </div>
        </div>
        </article>
        EOD;
        echo "</tr>";
    }
    
    echo <<<EOD
    </div>
    <br>
    <cite>Estilos generados por chatGPT-5</cite>
    </div>
    EOD;
}

mostrarCatalogo($productos);

?>