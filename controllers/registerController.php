<?php

class RegisterController{
    public static function index(){
        include 'database/database.php';
        include 'middleware/register-user.php';
        include 'views/layouts/header.php';
        include 'views/Register/registro.php';
    }
}

?>