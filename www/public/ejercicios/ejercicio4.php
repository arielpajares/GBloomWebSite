<?php
function buscarElemento($valor, $array) {
    foreach ($array as $elemento) {
        if ($elemento === $valor) {
            return true;
        }
    }
    return false;
}

function imprimirResultados($valor, $array) {
    if (buscarElemento($valor, $array)) {
        echo "El valor $valor se encuentra en el array.<br>";
    } else {
        echo "El valor $valor no se encuentra en el array.<br>";
    }
}

$arrayNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
foreach ([3, 11, 43, 1, 99, 6, 45, 7, 11, 5] as $numero) {
    imprimirResultados($numero, $arrayNumeros);
}
?>