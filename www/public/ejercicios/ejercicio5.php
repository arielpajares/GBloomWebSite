<?php
$numeros = [4, 2, 8, 6, 3, 7, 5, 1];

function calcularPromedio($numeros) {
    $suma = 0;
    foreach ($numeros as $numero) {
        $suma += $numero;
    }
    $cantidad = count($numeros);
    return $suma / $cantidad;
}

function imprimirResultado($numeros) {
    echo "El promedio de los números es: " . calcularPromedio($numeros);
}

imprimirResultado($numeros);
?>