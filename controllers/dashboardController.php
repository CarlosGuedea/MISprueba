<?php
class dashboardController{
    public static function index(){
        include 'middleware/autenticacion-user.php';
        include 'database/database.php';
        include 'views/dashboard/dashboard.php';
    }
}
?>