<?php

// Verificar si el usuario está autenticado y es un administrador 
    // Realizar la eliminación del usuario
    $db = new Base;
    $con = $db->ConexionBD();
    
    try {
        $stmt = $con->prepare("Select * FROM Detalle WHERE Id_Orden = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Devolver una respuesta de éxito
        http_response_code(200);
        } catch(PDOException $ex) {
        // Devolver una respuesta de error
        http_response_code(500);
        echo 'Error al eliminar el usuario: ' . $ex->getMessage();
    }


// //Llenar la vista
// $stmt = $conn->prepare("SELECT * FROM Detalle where Id_Orden = :Id_Orden");
// $ID_Orden = $_SESSION['ID_Orden'];
// $stmt->bindParam(':Id_Orden', $ID_Orden);
// $stmt->execute();
// $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
