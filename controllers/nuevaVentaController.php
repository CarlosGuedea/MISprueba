<?php
/*
Autor: Carlos Eduardo Guedea Guerrero
Objetivo: Cargar los elementos necesarios para la construcción de la pagina /nueva-venta
*/

class nuevaVentaController{
    //Método para cargar la vista nueva-venta
    public static function index(){
        include 'middleware/autenticacion-user.php';
        include 'views/nueva_venta/nueva_venta.php';
    }

    //Método para buscar en /nueva-venta
    public static function buscar(){
        include 'middleware/autenticacion-user.php';
        include 'database/database.php';
        include 'views/nueva_venta/nueva_venta.php';
    }

    //Método para realizar una venta de contado
    public static function vContado1(){
        include 'middleware/autenticacion-user.php';
        include 'database/database.php';
        include 'middleware/nueva_venta_contado/nueva-venta-contado.php';
    }

    //Método para realizar una venta de contado
    public static function Credito1(){
        include 'middleware/autenticacion-user.php';
        include 'database/database.php';
        include 'middleware/nueva_venta_credito/nueva-venta-credito.php';
    }
}
?>