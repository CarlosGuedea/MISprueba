<?php 

class sesionController{
    public static function cerrarSesion(){
        include 'middleware/cerrar-sesion.php';
    }

    public static function cambiarContrasena(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/cambiar-contrasena.php';
        include 'views/layouts/header.php';
        include 'views/session/cambiar-contrasena.php';
    }
}

?>