<?php
function getNumber($attrib) {
    if (isset($_GET[$attrib]) && is_numeric($_GET[$attrib])) {
        return floatval($_GET[$attrib]);
    } else {
        echo json_encode(["status" => "No se han recibido los datos necesarios o estos son invalidos."]);
        exit;
    }
}

$precio = getNumber("precio");
$cantidad = getNumber("cantidad");

echo json_encode(["status" => "0", "value" => $precio*$cantidad]);
?>