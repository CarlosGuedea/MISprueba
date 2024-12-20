<?php

// Verificar si el usuario está autenticado y es un administrador 
    // Realizar la eliminación del usuario
    $db = new Base;
    $con = $db->ConexionBD();
    
    if($_POST['orden']){
        try {
            $busqueda = $_POST['orden'];
            $stmt = $con->prepare('Exec sp_buscaOrdenes :busqueda');
            $stmt->bindParam(1, $busqueda);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Devolver una respuesta de éxito
            http_response_code(200);
            } catch(PDOException $ex) {
            // Devolver una respuesta de error
            http_response_code(500);
            echo 'Error al eliminar el usuario: ' . $ex->getMessage();
        }
    }
