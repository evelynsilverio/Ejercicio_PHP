<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_de_datos = "comida";

// para crear la conexión
$conexion = new mysqli($servidor, $usuario, $contraseña, $base_de_datos);

// para verificar la conexión
if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}
echo "";
?>