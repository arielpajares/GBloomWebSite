<?php
$usuarios = [];
$usuarios[] = crearUsuario("Juan", "Pérez", "juanperez@gmail.com");
$usuarios[] = crearUsuario("María", "Gómez", "mariagomez@gmail.com");
$usuarios[] = crearUsuario("Luis", "Rodríguez", "luisrodriguez@gmail.com");
$usuarios[] = crearUsuario("Ana", "López", "analopez@gmail.com");
$usuarios[] = crearUsuario("Carlos", "Sánchez", "carlossanchez@gmail.com");
$usuarios[] = crearUsuario("Laura", "Martínez", "lauramartinez@gmail.com");

function crearUsuario($nombre, $apellido, $email) {
    $usuario = [
        "nombre" => $nombre,
        "apellido" => $apellido,
        "email" => $email
    ];
    return $usuario;
}

function obtenerNombresCompletos($usuarios) {
    $nombresCompletos = [];
    foreach ($usuarios as $usuario) {
        $nombresCompletos[] = $usuario["nombre"] . " " . $usuario["apellido"];
    }

    return $nombresCompletos;
}

function imprimirResultado($usuarios) {
    $nombresCompletos = obtenerNombresCompletos($usuarios);
    echo "Nombres Completos de los Usuarios:<br><br>";
    foreach ($nombresCompletos as $nombreCompleto) {
        echo $nombreCompleto . "<br>";
    }
}

imprimirResultado($usuarios);
?>