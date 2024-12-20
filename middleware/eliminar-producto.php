<?php

$db = new Base;
$con = $db->ConexionBD();

// Obtiene el ID del producto a eliminar desde el formulario POST
    $idProducto = $_POST["id_producto"];

    // Ejecuta la consulta para eliminar el producto
    $consulta = "DELETE FROM productos WHERE id_producto = :id_producto";
    $stmt = $con->prepare($consulta);
    $stmt->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);
    $stmt->execute();

    // Redirige de vuelta a la página de productos después de eliminar
    header("Location: /productos/1");

?>