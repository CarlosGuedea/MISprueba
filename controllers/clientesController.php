<?php
/*
Autor: Carlos Eduardo Guedea Guerrero
Objetivo: Cargar los elementos necesarios para la construcción de la pagina /clientes
*/
class clientesController{
    //Método para listar los clientes del sistema
    public static function listar($pagina){
        include 'middleware/autenticacion-user.php';
        include 'database/database.php';
        include 'middleware/clientes-consultar.php';
        include 'views/clientes/clientes.php';
    }

    //Método para buscar clientes
    public static function buscar(){
        include 'middleware/autenticacion-user.php';
        include 'database/database.php';
        include 'middleware/cliente-buscar.php';
    }

    //Método para cargar clientes
    public static function cargar(){
        include 'middleware/autenticacion-user.php';
        include 'database/database.php';
        include 'middleware/cargar-clientes.php';
    }
}
?>