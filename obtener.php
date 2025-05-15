<?php
header("Content-Type: application/json");//para que el navegador entienda que se debe devolver en json

include_once("conexion.php");

$sql = "SELECT * FROM comida";
$resultado = $conexion->query($sql);

$comidas = array();

while ($fila = $resultado->fetch_assoc()) {
    $comidas[] = $fila;
}

echo json_encode($comidas, JSON_PRETTY_PRINT);
?>