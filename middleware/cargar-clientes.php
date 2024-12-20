<?php
// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();

// Realizar la consulta para obtener los nombres de los productos
$stmt = $con->prepare('SELECT nombre FROM Clientes ORDER BY id_cliente');
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear un arreglo de clientes
$clientes = [];

foreach ($resultados as $row) {
    $clientes[] = [
        'nombre' => $row['nombre']
    ];
}

// Devolver los productos como JSON
header('Content-Type: application/json');
echo json_encode($clientes);
?>