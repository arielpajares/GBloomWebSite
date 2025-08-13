<?php
$n = 20;

function generarFibonacci($n) {
    $fibonacci = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }
    return $fibonacci;
}

function imprimirFibonacci($fibonacci) {
    foreach ($fibonacci as $numero) {
        echo $numero . " ";
    }
}

imprimirFibonacci(generarFibonacci($n));
?>