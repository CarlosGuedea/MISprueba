<?php
class loginController{
    public static function index(){
        include 'database/database.php';
        include 'views/login/login.php';
    }

    public static function login(){
        include 'database/database.php';
        include 'middleware/login-admin.php';
        include 'views/login/login.php';
    }

    public static function register(){
        include 'database/database.php';
        include 'middleware/register.php';
        include 'views/register/register.php';
    }
}




?>