<?php
class nuevoClienteController{
    public static function index(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'views/nuevo_cliente/nuevo-cliente.php';
    }

    public static function agregar(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/nuevo-cliente.php';
        include 'views/nuevo_cliente/nuevo-cliente.php';
    }
}
?>