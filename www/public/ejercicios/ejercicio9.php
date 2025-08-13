<?php
$votos = ['Juan Perez', 'Maria Rodriguez', 'Carlos Sanchez', 'Juan Perez', 'Maria Rodriguez', 'Laura Gomez', 'Carlos Sanchez', 'Laura Gomez', 'Juan Perez', 'Laura Gomez'];

function contarVotos($votos) {
    $conteo = [];
    foreach ($votos as $voto) {
        if (isset($conteo[$voto])) {
            $conteo[$voto]++;
        } else {
            $conteo[$voto] = 1;
        }
    }

    return $conteo;
}

function imprimirResultado($votos) {
    $conteo = contarVotos($votos);
    echo "Resultados de la votación:<br><br>";
    foreach ($conteo as $candidato => $votos) {
        echo $candidato . " resulto con " . $votos . " voto(s)<br>";
    }
}

imprimirResultado($votos);
?>