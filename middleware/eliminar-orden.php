<?php
// Verificar si el usuario está autenticado y es un administrador
if ($_SESSION['ID'] !== '1')  {
      // Si no es un administrador, devolver una respuesta 401 (no autorizado) o 403 (prohibido)
        http_response_code(403);
        echo 'Acceso denegado';
        header('Location: /');
    }
        
    // Realizar la eliminación del usuario
    $db = new Base;
    $con = $db->ConexionBD();
    
    try {
        $stmt = $con->prepare("DELETE FROM Orden WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        
        // Devolver una respuesta de éxito
        http_response_code(200);
        echo 'Usuario eliminado correctamente';
        } catch(PDOException $ex) {
        // Devolver una respuesta de error
        http_response_code(500);
        echo 'Error al eliminar el usuario: ' . $ex->getMessage();
}
