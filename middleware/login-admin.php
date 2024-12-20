<?php
session_start();

error_reporting(0);

$Error = ""; // Definir la variable $Error antes de usarla

$db = new Base;
$conn = $db->ConexionBD();

$nombre_usuario = htmlspecialchars($_POST['nombre_usuario']);

try {
    if (isset($_POST['nombre_usuario'])) {
        $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE nombre_usuario = :nombre_usuario");
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->execute();
        
        // Verificar si la consulta fue exitosa
        if ($stmt) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $Contrasena = $_POST['contraseña'];
                $truecontrasena = $row['contraseña'];

                if ($truecontrasena == $Contrasena) {
                    $_SESSION['ID'] = $row['ID'];
                    $_SESSION['Usuario'] = $row['nombre_usuario'];
                    $_SESSION['Contrasena'] = $truecontrasena;
                    header('Location: /nueva-venta');
                } else {
                    $Error = "Contraseña o usuario invalido.";
                }
            } else {
                $Error = "Contraseña o usuario invalido.";
            }
        } else {
            $Error = "Error en la consulta SQL.";
        }
    }
} catch (PDOException $ex) {
    echo $ex;
}