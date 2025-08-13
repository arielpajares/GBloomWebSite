<?php
$nota = 5;

function determinarEstado($nota) {
    switch (true) {
        case ($nota >= 9 && $nota <= 10):
            return "Excelente";
        case ($nota >= 5 && $nota <= 8):
            return "Aprovado";
        case ($nota < 5):
            return "A recursar";
        default:
            return "Nota inválida";
    }
}

echo determinarEstado($nota);
?>