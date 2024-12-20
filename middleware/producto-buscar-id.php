<?php
// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();

if (isset($_POST['id_producto']) && $_POST['id_producto'] !== '') {
    $id_producto = $_POST['id_producto'];
    // Consulta SQL para buscar el producto por ID
    $sql = "SELECT * FROM productos WHERE id_producto = :id_producto";

    // Preparar la consulta
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Inicializar la variable de salida
    $output = "";

    // Construye el HTML de los resultados y acumula en $output
    foreach ($resultados as $producto) {
        $output .= "<tr>";
        $output .= "<td>" . $producto['id_producto'] . "</td>";
        $output .= "<td>" . $producto['nombre'] . "</td>";
        $output .= "<td>" . $producto['descripcion'] . "</td>";
        $output .= "<td>" . $producto['precio'] . "</td>";
        $output .= "<td>" . $producto['existencias'] . "</td>";
        $output .= "</tr>";
    }

    // Devuelve los resultados en formato HTML
    echo $output;
}
else if (isset($_POST['producto_nombre']) && $_POST['producto_nombre'] !== '') {

    $producto_nombre = $_POST['producto_nombre'];

    $sql = "SELECT * FROM Productos WHERE nombre LIKE ?";


    // Preparar la consulta
    $stmt = $con->prepare($sql);
    $stmt->bindParam(1,$producto_nombre, PDO::PARAM_STR);
    $stmt->execute();
    $resultados1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Inicializar la variable de salida
    $output1 = "";

    // Construye el HTML de los resultados y acumula en $output
    foreach ($resultados1 as $producto1) {
        $output1 .= "<tr>";
        $output1 .= "<td>" . $producto1['id_producto'] . "</td>";
        $output1 .= "<td>" . $producto1['nombre'] . "</td>";
        $output1 .= "<td>" . $producto1['descripcion'] . "</td>";
        $output1 .= "<td>" . $producto1['precio'] . "</td>";
        $output1 .= "<td>" . $producto1['existencias'] . "</td>";
        $output1 .= "</tr>";
    }

    echo $output1;
}
