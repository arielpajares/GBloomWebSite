<?php
$numeros = [3, 5, 7, 2, 8, 1];

function encontrarMaximo($numeros) {
    $maximo = $numeros[0];
    foreach ($numeros as $numero) {
        if ($numero > $maximo) {
            $maximo = $numero;
        }
    }
    
    return $maximo;
}

echo "El número máximo es: " . encontrarMaximo($numeros);
?>