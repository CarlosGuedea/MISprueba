<?php
$db = new Base;
$con = $db->ConexionBD();

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    // preparación de la consulta SQL
    $sql = "SELECT Creditos.*, Clientes.nombre AS nombre_cliente
        FROM Creditos
        JOIN Clientes ON Creditos.id_cliente = Clientes.id_cliente
        WHERE Clientes.nombre LIKE ?;";

    // Preparar la consulta
    $stmt = $con->prepare($sql);
    $stmt->bindParam(1, $nombre);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
