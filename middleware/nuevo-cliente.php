<?php
/*
Autor: Carlos Eduardo Guedea Guerrero
Objetivo: Ingresar en la base datos un nuevo cliente
*/

//Conexión a la base de datos
$db = new Base;
$con = $db->ConexionBD();

// Obtener los datos del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];

// Consulta SQL para insertar datos
$sql = "INSERT INTO Clientes (nombre, apellido, email, telefono, direccion) VALUES (?, ?, ?, ?, ?)";

// Preparar la consulta
$stmt = $con->prepare($sql);
$stmt->bindParam(1, $nombre);
$stmt->bindParam(2, $apellido);
$stmt->bindParam(3, $email);
$stmt->bindParam(4, $telefono);
$stmt->bindParam(5, $direccion);

try {
    $stmt->execute();
    // Devolver una respuesta de éxito
    http_response_code(200);
    header('Location: /clientes/1');
} catch (PDOException $ex) {
    // Devolver una respuesta de error
    http_response_code(500);
    echo 'Error al agregar cliente: ' . $ex->getMessage();
}

?>