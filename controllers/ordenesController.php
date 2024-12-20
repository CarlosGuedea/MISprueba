<?php

class ordenesController{
    public static function index(){
        include 'database/database.php';
        include 'views/layouts/header.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/ordenes-user.php';
        include 'views/ordenes/ordenes.php';
        include 'views/layouts/footer.php';
    }

    public static function nuevaOrden(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/ordenes-user.php';
        include 'views/layouts/header.php';
        include 'views/ordenes/nueva-orden.php';
        include 'views/layouts/footer.php';
    }

    public static function eliminarOrden($id){            
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/eliminar-orden.php';
    }

    public static function detalleOrden($id){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/detalle-orden.php';
        include 'views/layouts/header.php';
        include 'views/ordenes/detalle-orden.php';
    }
    
    public static function nuevoDetalleOrden($id){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/nuevo-orden-detalle.php';
        include 'views/layouts/header.php';
        include 'views/ordenes/nuevo-orden-detalle.php';
    }

    public static function adminOrdenDetalle($id){
        include 'database/database.php';
        include 'middleware/autenticacion-admin.php';
        include 'middleware/detalle-orden.php';
        include 'views/layouts/header.php';
        include 'views/ordenes/detalle-orden.php';
    }
}