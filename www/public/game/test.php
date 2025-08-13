<?php
header("Access-Control-Allow-Origin: *");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:8080/index.html"); // Reemplaza con la URL deseada
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Para obtener la respuesta como cadena

$response = curl_exec($ch);

echo $response;

curl_close($ch);
?>