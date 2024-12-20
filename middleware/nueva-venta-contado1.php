<?php
require_once('tcpdf/tcpdf.php');

// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();

// Obtener los datos del formulario

$id_producto = $_POST["id_producto"];
$cantidad = $_POST["cantidad"];
$id_usuario = 1;
$id_cliente = $_POST["id_cliente"];

// Consulta SQL para insertar datos
echo $cantidad;
$sql = "CALL RealizarVenta(?, ?, ?, ?)";


// Preparar la consulta
$stmt = $con->prepare($sql);
$stmt->bindParam(1, $id_producto[0]);
$stmt->bindParam(2, $cantidad[0]);
$stmt->bindParam(3, $id_usuario);
$stmt->bindParam(4, $id_cliente);

try {
    $stmt->execute();
    // Devolver una respuesta de éxito
    http_response_code(200);
    //header('Location: /ventas/1');
} catch (PDOException $ex) {
    // Devolver una respuesta de error
    http_response_code(500);
    echo 'Error al agregar producto: ' . $ex->getMessage();
}

//Crear el ticket
// Inicializar la clase TCPDF
$pdf = new TCPDF('P', 'mm', 'Letter', true, 'UTF-8');

// Agregar una página
$pdf->AddPage();

// Establecer el título
$pdf->SetTitle('Ticket de Venta');

// Crear el contenido del ticket
$html = '<h1>Ticket de Venta</h1>';
$html .= '<p>Producto: ' . $id_producto[0] . '</p>';
$html .= '<p>Cantidad: ' . $cantidad[0] . '</p>';
$html .= '<p>Cliente: ' . $id_cliente . '</p>';

// Agregar el contenido al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Salida del PDF (descarga o visualización)
$pdf->Output('ticket_venta.pdf', 'I');
