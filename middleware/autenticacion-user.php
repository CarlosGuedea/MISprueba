<?php
    session_start();

    if (isset($_SESSION['Usuario'])){
        
    }else{
    //Aqui lo redireccionas al lugar que quieras.
        header('Location: /');
        die() ;
    }
?>