<?php

$db = new Base;
$con = $db->ConexionBD();

// Obtener los datos del formulario
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$existencias = $_POST["existencias"];
$reorden = $_POST["reorden"];

// Consulta SQL para insertar datos
$sql = "INSERT INTO Productos (nombre, descripcion, precio, existencias, reorden) VALUES (?, ?, ?, ?, ?)";

// Preparar la consulta
$stmt = $con->prepare($sql);
$stmt->bindParam(1, $nombre);
$stmt->bindParam(2, $descripcion);
$stmt->bindParam(3, $precio);
$stmt->bindParam(4, $existencias);
$stmt->bindParam(5, $reorden);

try {
    $stmt->execute();
    // Devolver una respuesta de éxito
    http_response_code(200);
    header('Location: /productos/1');
} catch (PDOException $ex) {
    // Devolver una respuesta de error
    http_response_code(500);
    echo 'Error al agregar producto: ' . $ex->getMessage();
}
