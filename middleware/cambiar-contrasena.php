<?php

session_start();

$db = new Base;

$conn=$db->ConexionBD();

//Recuperar el parametro del usuario
$usuario = $_SESSION['Usuario'];

if($_POST['Contrasena']){
    $Contrasena = $_POST['Contrasena'];

    $stmt = $conn->prepare("Update Usuario  SET Contrasena = ? WHERE Email = ?");

    $stmt->bindParam(1, $Contrasena);
    $stmt->bindParam(2, $usuario);
    $stmt->execute();

    //Redirigir al usuario a su panel
    header('Location: /ordenes');

}

?>