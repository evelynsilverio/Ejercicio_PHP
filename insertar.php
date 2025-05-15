<?php
header("Content-Type: application/json"); // sirve para que el navegador entienda que la respuesta se debe mostrar en json

$response = array(); //para inicializar el arreglo de respuesta

include_once("comida.php");
include_once("conexion.php");

    $comida = $_POST['comida'];
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];

    // para crear el objeto comida
    $comidaobjeto = new Comida();

    $comidaobjeto->set_comida($comida);
    $comidaobjeto->set_tipo($tipo);
    $comidaobjeto->set_descripcion($descripcion);

    $nombre = $comidaobjeto->get_comida();
    $tipo = $comidaobjeto->get_tipo();
    $descripcion = $comidaobjeto->get_descripcion();

    // preparar la consulta
    $stmt = $conexion->prepare("INSERT INTO comida (comida, tipo, descripcion) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $tipo, $descripcion);

    if ($stmt->execute()) {
        $response["status"] = "ok";
        $response["answer"] = "Los datos fueron enviados";
        $response["code"] = 200;
    } else {
        $response["status"] = "error";
        $response["answer"] = "No se pudieron enviar los datos";
        $response["code"] = 500;
    }

    $stmt->close();

echo json_encode($response, JSON_PRETTY_PRINT);
?>