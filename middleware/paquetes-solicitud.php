<?php
require_once 'vendor/autoload.php';

$db = new Base;
$con = $db->ConexionBD();

   if(isset($_POST['Nombre'])){
        // preparación de la consulta SQL
        $stmt = $con->prepare("INSERT INTO Solicitud (Nombre, Email, Telefono, Mensaje, Fecha) VALUES (?, ?, ?, ?, ?)");
        //Recuperar los valores del POST
        $Nombre = $_POST['Nombre'];
        $Email = $_POST['Email'];
        $Telefono = $_POST['Telefono'];
        $Mensaje = $_POST['Mensaje'];
        $Fecha = $_POST['Fecha'];


        // asignación de valores a la consulta SQL
        $stmt->bindParam(1, $Nombre);
        $stmt->bindParam(2, $Email);
        $stmt->bindParam(3, $Telefono);
        $stmt->bindParam(4, $Mensaje);
        $stmt->bindParam(5, $Fecha);
     
        // ejecución de la consulta SQL
        $stmt->execute();

        //Mandar un correo al administrador
         $to = "guedea.fis@gmail.com";
         $subject = "Solicitud En Pagina Web";
         $message = $Mensaje . " De la Fecha: " . $Fecha . " Telefono: " . $Telefono;
         $headers = "From: " . $Email;

         mail($to, $subject, $message, $headers);

         // if(mail($to, $subject, $message, $headers)) {
         //    echo "El correo electrónico se ha enviado correctamente.";
         // } else {
         //    echo "Error al enviar el correo electrónico.";
         // }

        //Redireccionar a la pagina principal
        header('Location: /');
   }
?>
