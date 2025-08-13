<?php
$productos = [
    ["nombre" => "Papas Fritas", "precio" => 100],
    ["nombre" => "Chocolatada", "precio" => 200],
    ["nombre" => "Champú", "precio" => 150],
    ["nombre" => "Galletas", "precio" => 80],
    ["nombre" => "Jugo de Naranja", "precio" => 120],
    ["nombre" => "Detergente", "precio" => 90],
    ["nombre" => "Cereal", "precio" => 130],
    ["nombre" => "Leche", "precio" => 110],
    ["nombre" => "Pan", "precio" => 70],
    ["nombre" => "Carne Molida", "precio" => 200]
];
$precioMaximo = 100;

function filtrarPorPrecio($productos, $precioMaximo) {
    $arregloFiltrado = [];
    foreach ($productos as $producto) {
        if ($producto["precio"] <= $precioMaximo) {
            $arregloFiltrado[] = $producto;
        }
    }

    return $arregloFiltrado;
}

function imprimirResultado($productos, $precioMaximo) {
    echo "Productos:<br><br>";
    foreach ($productos as $producto) {
        echo $producto["nombre"] . " => " . $producto["precio"] . "<br>";
    }
    echo "<br>";
    $productos = filtrarPorPrecio($productos, $precioMaximo);

    echo "Productos filtrados:<br><br>";
    foreach ($productos as $producto) {
        echo $producto["nombre"] . " => " . $producto["precio"] . "<br>";
    }
    // print_r($productos); => Lo que pide el ejercicio usar pero no es bonito.
}

imprimirResultado($productos, $precioMaximo);
?>