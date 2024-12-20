<?php
class creditosController{
    public static function listar($pagina){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/creditos-consultar.php';
        include 'views/credito/credito.php';
    }

    public static function abonar(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/saldar-credito.php';
    }

    public static function buscar(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/creditos-buscar.php';
        include 'views/credito/credito-buscar.php';

    }
}
?>