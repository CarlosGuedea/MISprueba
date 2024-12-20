<?php
class abonosController{
    public static function listar($pagina){
        include 'middleware/autenticacion-user.php';
        include 'database/database.php';
        include 'middleware/abonos-consultar.php';
        include 'views/abonos/abonos.php';
    }
}
?>