<?php
require_once('tcpdf/tcpdf.php');

// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();
echo('<pre>');
var_dump($_POST);
echo('</pre>');

// Obtener los datos del formulario
$id_cliente = $_POST['id_cliente'];
$id_producto = $_POST['id_producto'][0]; // Tomar el primer elemento del array
$id_usuario = 1; // Tomar el primer elemento del array
//$precio = $_POST['total']; // Tomar el primer elemento del array
$cantidad = $_POST['cantidad'][0];// Tomar el primer elemento del array

// Inicializar el contador total


// Recorrer los arrays de cantidades y productos

    //     // Consulta SQL para insertar datos
    // $sql = "CALL RealizarVenta(?, ?, ?, ?)";
    //  // Preparar la consulta
    //  $stmt = $con->prepare($sql);
    //  $stmt->bindParam(1, $id_producto);
    //  $stmt->bindParam(2, $cantidad);
    //  $stmt->bindParam(3, $id_usuario);
    //  $stmt->bindParam(4, $id_cliente);
    // try {
    //     $stmt->execute();
    //     // Devolver una respuesta de éxito
    //     http_response_code(200);
    // } catch (PDOException $ex) {
    //     // Devolver una respuesta de error
    //     http_response_code(500);
    //     echo 'Error al agregar producto: ' . $ex->getMessage();
    // }

// //Crear el ticket
// // Inicializar la clase TCPDF
// $pdf = new TCPDF('P', 'mm', 'Letter', true, 'UTF-8');

// // Agregar una página
// $pdf->AddPage();

// // Establecer el título
// $pdf->SetTitle('Ticket de Venta');

// // Crear el contenido del ticket
// $html = '<h1>Ticket de Venta</h1>';
// $html .= '<p>Productos vendidos:</p>';
// $html .= '<ul>';

// $html .= '<li>Producto: ' . $id_producto . ', Cantidad: ' . $cantidad . '</li>';
// $html .= '</ul>';
// $html .= '<p>Cliente: ' . $id_cliente . '</p>';
// // $html .= '<p>Total: ' . $total . '</p>';

// // // Agregar el contenido al PDF
// $pdf->writeHTML($html, true, false, true, false, '');

// // Salida del PDF (descarga o visualización)
// $pdf->Output('ticket_venta.pdf', 'I');
