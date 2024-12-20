<?php
class ventasController{
    public static function listar($pagina){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/ventas-consultar.php';
        include 'views/ventas/ventas.php';
    }

    public static function buscar(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/ventas-buscar.php';
        include 'views/ventas/ventas-buscar.php';
    }
}
?>