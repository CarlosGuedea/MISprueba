<?php

$db = new Base;
$con = $db->ConexionBD();

// Obtiene el ID del producto y la cantidad a resurtir desde el formulario POST
    $idProducto = $_POST["id_producto"];
    $cantidadResurtir = $_POST["cantidad_resurtir"];

    // Consulta la existencia actual del producto
    $consultaExistencia = "SELECT existencias FROM Productos WHERE id_producto = :id_producto";
    $stmtExistencia = $con->prepare($consultaExistencia);
    $stmtExistencia->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);
    $stmtExistencia->execute();
    $resultadoExistencia = $stmtExistencia->fetch(PDO::FETCH_ASSOC);

    if ($resultadoExistencia) {
        // Calcula la nueva existencia sumando la cantidad a resurtir
        $existenciaActual = $resultadoExistencia["existencias"];
        $nuevaExistencia = $existenciaActual + $cantidadResurtir;

        // Actualiza la existencia del producto
        $consultaActualizar = "UPDATE Productos SET existencias = :nueva_existencia WHERE id_producto = :id_producto";
        $stmtActualizar = $con->prepare($consultaActualizar);
        $stmtActualizar->bindParam(":nueva_existencia", $nuevaExistencia, PDO::PARAM_INT);
        $stmtActualizar->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);
        $stmtActualizar->execute();

        // Redirige de vuelta a la página de productos después de resurtir
        header("Location: /productos/1");
    }
?>