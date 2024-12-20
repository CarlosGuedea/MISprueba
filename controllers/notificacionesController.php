<?php
class notificacionesController{
    public static function listar($pagina){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/notificaciones-consultar.php';
        include 'views/notificaciones/notificaciones.php';
    }
}
?>