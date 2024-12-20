<?php
//Establecer la conexión a la base de datos
$db = new Base;
$conn=$db->ConexionBD();

//Llenar la vista
$stmt = $conn->prepare("SELECT * FROM Orden where ID_Usuario = :ID_Usuario ORDER BY Orden.ID DESC");
$ID_Usuario = $_SESSION['ID'];
$stmt->bindParam(':ID_Usuario', $ID_Usuario);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Recuperar el Email
$Email = $_SESSION['Usuario'];

//Crear nueva orden
if($_POST){
//PRIMERO Crear la carpeta para el usuario
    $micarpeta = 'storage/'. $Email;

    if (!file_exists($micarpeta)) {
        mkdir($micarpeta, 0700);

    }
    //Subimos los archivos que se recuperen del POST
    if (isset($_FILES['archivos'])) {
        $num_archivos = count($_FILES['archivos']['name']);
        for ($i = 0; $i < $num_archivos; $i++) {
            $nombre_archivo = $_FILES['archivos']['name'][$i];
            $tipo_archivo = $_FILES['archivos']['type'][$i];
            $tamano_archivo = $_FILES['archivos']['size'][$i];
            $ruta_temporal = $_FILES['archivos']['tmp_name'][$i];
            $ruta_destino = $micarpeta . "/" . $nombre_archivo;
            move_uploaded_file($ruta_temporal, $ruta_destino);
        }
            
    }
        
    //Guardamos en la base de datos
    $stmt = $conn->prepare("INSERT INTO Orden (Descripcion, Fecha_Inicio, Ruta_archivos, ID_Usuario) VALUES (?, ?, ?, ?)");
    //Recuperar los valores del POST
    $Descripcion = $_POST['Descripcion'];
    $Fecha_Inicio = $_POST['Fecha_Inicio'];
    $ID_Usuario = $_SESSION['ID'];

    // asignación de valores a la consulta SQL
    $stmt->bindParam(1, $Descripcion);
    $stmt->bindParam(2, $Fecha_Inicio);
    $stmt->bindParam(3, $micarpeta);
    $stmt->bindParam(4, $ID_Usuario);
    
    // ejecución de la consulta SQL
    $stmt->execute();
        
    //Redireccionamos a Ordenes
    header('Location: /ordenes');
    }

?>