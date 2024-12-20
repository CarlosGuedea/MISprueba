<?php
session_start();

$db = new Base;

$conn=$db->ConexionBD();

$Email=htmlspecialchars($_POST['Email']);
$Contrasena=htmlspecialchars($_POST['Contrasena']);

try{
    if(isset($_POST['Email'])){
        $stmt = $conn->prepare("SELECT * FROM Usuario WHERE Email = :Email");
        $stmt->bindParam(':Email', $Email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $truecontrasena=$row['Contrasena'];
    
        if($Contrasena==$truecontrasena){
            $id = $_SESSION['ID']=$row['ID'];
            $usuario = $_SESSION['Usuario']=$row['Email'];
            $_SESSION['Contrasena']=$truecontrasena;
            header('Location: /ordenes');
    
        }
    }
}catch(PDOException $ex){
    echo $ex;
}
