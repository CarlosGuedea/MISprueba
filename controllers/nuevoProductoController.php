<?php
class nuevoProductoController{
    public static function index(){
        include 'middleware/autenticacion-user.php';
        include 'database/database.php';
        include 'views/nuevo_producto/nuevo_producto.php';
    }

    public static function agregar(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/nuevo-producto.php';
        include 'views/nuevo_producto/nuevo_producto.php';
    }
    
}
?>