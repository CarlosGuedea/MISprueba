<?php
class productosController{
    public static function listar($pagina){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/productos-consultar.php';
        include 'views/productos/productos.php';
    }

    public static function buscarID(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/producto-buscar-id.php';
    }

    public static function cargar(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/cargar-productos.php';
    }

    public static function eliminarProducto(){
        include 'database/database.php';
        include 'middleware/eliminar-producto.php';
    }

    public static function resurtirProducto(){
        include 'database/database.php';
        include 'middleware/resurtir-producto.php';
    }
}
?>