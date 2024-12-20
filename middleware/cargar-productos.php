<?php
// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();

// Realizar la consulta para obtener los nombres de los productos
$stmt = $con->prepare('SELECT nombre FROM Productos ORDER BY id_producto');
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear un arreglo de productos
$productos = [];

foreach ($resultados as $row) {
    $productos[] = [
        'nombre' => $row['nombre']
    ];
}

// Devolver los productos como JSON
header('Content-Type: application/json');
echo json_encode($productos);
?>