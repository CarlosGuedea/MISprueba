<?php

class Base {
    function ConexionBD(){
        $host = 'localhost';  // Cambia esto al host de tu servidor MySQL
        $dbname = 'pv';    // Cambia esto al nombre de tu base de datos MySQL
        $username = 'root';   // Cambia esto al nombre de usuario de tu MySQL
        $password = 'Particionar22';  // Cambia esto a la contraseña de tu MySQL

        try {
            $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            exit;
        }
    }
}




