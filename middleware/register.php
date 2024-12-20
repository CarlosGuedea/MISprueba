<?php
    
$db = new Base;
$con = $db->ConexionBD();

   if(isset($_POST['nombre_usuario'])){

      //Comprobar que sea único el usuario
      // Obtener el nombre de usuario y correo electrónico del formulario de registro
      $nombre_usuario = $_POST['nombre_usuario'];
      $contraseña = $_POST['contraseña'];

      // Comprobar si el nombre de usuario o correo electrónico ya existen en la base de datos
      $stmt = $con->prepare("SELECT * FROM Usuarios WHERE nombre_usuario = ?");
      $stmt->bindParam(1, $nombre_usuario);
      $stmt->execute();
      $usuario_existente = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($usuario_existente) {
      // Si ya existe un usuario con el mismo nombre de usuario o correo electrónico,
      // mostrar un mensaje de error al usuario y no hacer la inserción en la base de datos
      $error = "El Usuario ya está registrado. Por favor, ingrese otro.";

      } else {
         try {
         
         // preparación de la consulta SQL
         $stmt = $con->prepare("INSERT INTO Usuarios (nombre_usuario, contraseña, rol) VALUES (?, ?, ?)");
         //Recuperar los valores del POST
         $Nombre = $_POST['nombre_usuario'];
         $rol = $_POST['rol'];

         // asignación de valores a la consulta SQL
         $stmt->bindParam(1, $Nombre);
         $stmt->bindParam(2, $contraseña);
         $stmt->bindParam(3, $rol);

         // ejecución de la consulta SQL
         $stmt->execute();

         $exito = "Usuario registrado con exíto";

         header("Location: /");
         
         } catch(PDOException $ex){
            echo $ex;
         }
      }
   }   

?>