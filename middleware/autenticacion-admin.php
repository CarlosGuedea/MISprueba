<?php
    session_start();

    if ($_SESSION['Contrasena']=='12345'){
        
    }else{
    //Aqui lo redireccionas al lugar que quieras.
        header('Location: /');
        die() ;
    }
?>