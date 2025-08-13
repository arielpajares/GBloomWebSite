<?php
function esPrimo($numero) {
    for ($i = 2; $i < $numero; $i++) {
        if ($numero % $i == 0) {
            return false;
        }
    }
    return true;
}

function imprimirResultados($numero) {
    if (esPrimo($numero)) {
        echo "El número $numero es primo.<br>";
    } else {
        echo "El número $numero no es primo.<br>";
    }
}

imprimirResultados(7);
imprimirResultados(10);
imprimirResultados(13);
imprimirResultados(1);
?>