<?php

$db = new Base;
$con = $db->ConexionBD();

   if(isset($_POST['Nombre'])){

      //Comprobar que sea único el usuario
      // Obtener el nombre de usuario y correo electrónico del formulario de registro
      $nombre_usuario = $_POST['Nombre'];
      $correo_electronico = $_POST['Email'];

      // Comprobar si el nombre de usuario o correo electrónico ya existen en la base de datos
      $stmt = $con->prepare("SELECT * FROM Usuario WHERE Nombre = ? OR Email = ?");
      $stmt->bindParam(1, $nombre_usuario);
      $stmt->bindParam(2, $correo_electronico);
      $stmt->execute();
      $usuario_existente = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($usuario_existente) {
      // Si ya existe un usuario con el mismo nombre de usuario o correo electrónico,
      // mostrar un mensaje de error al usuario y no hacer la inserción en la base de datos
      $error = "El Usuario ya está registrado. Por favor, ingrese otro.";

      } else {
         try {
         
         // preparación de la consulta SQL
         $stmt = $con->prepare("INSERT INTO Usuario (Nombre, Email, Contrasena, RFC, CodPostal) VALUES (?, ?, ?, ?, ?)");
         //Recuperar los valores del POST
         $Nombre = $_POST['Nombre'];
         $Email = $_POST['Email'];
         $Contrasena = $_POST['Contrasena'];
         $RFC = $_POST['RFC'];
         $CodPostal = $_POST['CodPostal'];


         // asignación de valores a la consulta SQL
         $stmt->bindParam(1, $Nombre);
         $stmt->bindParam(2, $Email);
         $stmt->bindParam(3, $Contrasena);
         $stmt->bindParam(4, $RFC);
         $stmt->bindParam(5, $CodPostal);
      
         // ejecución de la consulta SQL
         $stmt->execute();

         $exito = "Usuario registrado con exíto";
         
         } catch(PDOException $ex){
            echo $ex;
         }
      }
   }   

?>