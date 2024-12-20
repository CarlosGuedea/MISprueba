<?php
$db = new Base;
$con = $db->ConexionBD();

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    // preparación de la consulta SQL
    $sql = "SELECT Tickets.*, Clientes.nombre AS nombre_cliente
    FROM Tickets
    JOIN Ventas ON Tickets.id_venta = Ventas.id_venta
    JOIN Clientes ON Ventas.id_cliente = Clientes.id_cliente
    WHERE Clientes.nombre LIKE ?;";

    // Preparar la consulta
    $stmt = $con->prepare($sql);
    $stmt->bindParam(1, $nombre);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
}