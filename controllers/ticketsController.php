<?php
class ticketsController{
    public static function index($pagina){
        include 'middleware/autenticacion-user.php';
        include 'database/database.php';
        include 'middleware/tickets-consultar.php';
        include 'views/tickets/tickets.php';
    }

    public static function consulta($urlArchivo){
        include 'middleware/autenticacion-user.php';
        include 'database/database.php';
        include 'middleware/tickets-consultar.php';
        include 'views/tickets/tickets.php';
    }

    public static function buscar(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/tickets-buscar.php';
        include 'views/tickets/tickets-buscar.php';
    }
}
?>