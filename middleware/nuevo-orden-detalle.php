<?php 

$db = new Base;

$conn=$db->ConexionBD();

if($_POST){
    $stmt = $conn->prepare("INSERT INTO Detalle (Id_Orden, Detalle) VALUES (?, ?)");
    //Recuperar los valores del POST
    $Id_Orden = $id;
    $Detalle = $_POST['Detalle'];
    // asignación de valores a la consulta SQL
    $stmt->bindParam(1, $Id_Orden);
    $stmt->bindParam(2, $Detalle);

    // ejecución de la consulta SQL
    $stmt->execute();
        
    //Redireccionamos a Ordenes
    header('Location: /ordenes');
}
