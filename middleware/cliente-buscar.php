<?php
// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();

if (isset($_POST['id_cliente']) && $_POST['id_cliente'] !== '') {
    $id_cliente = $_POST['id_cliente'];
    
    // Consulta SQL para buscar el cliente por ID
    $sql = "SELECT nombre FROM clientes WHERE id_cliente = :id_cliente";

    // Preparar la consulta
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    // Devuelve el nombre del cliente en formato texto
    echo $cliente['nombre'];
}

if (isset($_POST['nombre_cliente']) && $_POST['nombre_cliente'] !== '') {
    $nombre_cliente = $_POST['nombre_cliente'];
    
    // Consulta SQL para buscar el cliente por nombre y obtener el ID
    $sql = "SELECT id_cliente FROM clientes WHERE nombre = :nombre_cliente";

    // Preparar la consulta
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':nombre_cliente', $nombre_cliente, PDO::PARAM_STR);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    // Devuelve el ID del cliente en formato texto
    echo $cliente['id_cliente'];
}