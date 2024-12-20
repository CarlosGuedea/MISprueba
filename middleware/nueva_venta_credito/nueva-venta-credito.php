<?php
// Incluir la biblioteca TCPDF
require('tcpdf/tcpdf.php');

// Establecer la conexión a la base de datos MySQL
$db = new Base;
$conn = $db->ConexionBD();

// Obtén los datos del formulario POST
$id_usuario = 1;
$id_cliente = $_POST['id_cliente'];
$total = $_POST['total'];
$dias_credito = $_POST['dias_credito'];
$productos_nombre = $_POST['producto_nombre'];

// Variables para la venta a crédito
$id_venta = 0;
// Inicia una transacción
try {
    $conn->beginTransaction();

    // Paso 1: Inserta la venta en la tabla Ventas
    $stmt = $conn->prepare("INSERT INTO Ventas (id_usuario, id_cliente, total, tipo_venta) VALUES (?, ?, ?, 'Crédito')");
    $stmt->bindParam(1, $id_usuario);
    $stmt->bindParam(2, $id_cliente);
    $stmt->bindParam(3, $total);
    $stmt->execute();

    // Obtiene el ID de la venta recién insertada
    $id_venta = $conn->lastInsertId();

    // Paso 2: Itera sobre los productos y sus detalles
    for ($i = 0; $i < count($_POST['id_producto']); $i++) {
        $id_producto = $_POST['id_producto'][$i];
        $cantidad = $_POST['cantidad'][$i];
        $precio_unitario = $_POST['precio'][$i];

        // Obtén la existencia actual del producto
        $sqlExistencia = "SELECT existencias FROM Productos WHERE id_producto = ?";
        $stmtExistencia = $conn->prepare($sqlExistencia);
        $stmtExistencia->bindParam(1, $id_producto);
        $stmtExistencia->execute();
        $existenciaActual = $stmtExistencia->fetchColumn();

        // Calcula la nueva existencia
        $nuevaExistencia = $existenciaActual - $cantidad;

        // Actualiza la existencia en la base de datos
        $sqlUpdateExistencia = "UPDATE Productos SET existencias = ? WHERE id_producto = ?";
        $stmtUpdateExistencia = $conn->prepare($sqlUpdateExistencia);
        $stmtUpdateExistencia->bindParam(1, $nuevaExistencia);
        $stmtUpdateExistencia->bindParam(2, $id_producto);
        $stmtUpdateExistencia->execute();

        // Inserta los detalles de los productos en la tabla DetallesVenta
        $stmtDetalle = $conn->prepare("INSERT INTO DetallesVenta (id_venta, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
        $stmtDetalle->bindParam(1, $id_venta);
        $stmtDetalle->bindParam(2, $id_producto);
        $stmtDetalle->bindParam(3, $cantidad);
        $stmtDetalle->bindParam(4, $precio_unitario);
        $stmtDetalle->execute();
    }

    // Paso 3: Inserta el crédito en la tabla Creditos con el período de crédito
    $stmtCredito = $conn->prepare("INSERT INTO Creditos (id_venta, id_cliente, monto, saldo,fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, NOW(),DATE_ADD(NOW(), INTERVAL ? DAY))");
    $stmtCredito->bindParam(1, $id_venta);
    $stmtCredito->bindParam(2, $id_cliente);
    $stmtCredito->bindParam(3, $total);
    $stmtCredito->bindParam(4, $total);
    $stmtCredito->bindParam(5, $dias_credito);
    $stmtCredito->execute();


    // Obtén la existencia actual del producto
    $sqlUrl = "SELECT url_archivo FROM Tickets WHERE id_venta = ?";
    $stmtUrl = $conn->prepare($sqlUrl);
    $stmtUrl->bindParam(1, $id_venta);
    $stmtUrl->execute();
    $UrlActual = $stmtUrl->fetchColumn();

    // Finaliza la transacción
    $conn->commit();
} catch (PDOException $e) {
    // Ocurrió un error, revierte la transacción
    $conn->rollBack();
    echo "Error en la transacción: " . $e->getMessage();
}



// Crear una instancia de TCPDF
$pdf = new TCPDF();
$pdf->SetMargins(10, 10, 10);

// Agregar una página al PDF
$pdf->AddPage();

// Definir el contenido del ticket de venta
$html = '
<h1>Ticket de Venta a Crédito</h1>
<p><strong>ID del Vendedor:</strong> ' . $id_usuario . '</p>
<p><strong>ID del Cliente:</strong> ' . $id_cliente . '</p>

<h2>Productos Vendidos a Crédito:</h2>
<table>
    <tr>
        <th>ID del Producto</th>
        <th>Nombre del Producto</th>
        <th>Precio Unitario</th>
        <th>Cantidad</th>
        <th>Total por Producto</th>
    </tr>';

$totalVenta = 0;
for ($i = 0; $i < count($_POST['id_producto']); $i++) {
    $id_producto = $_POST['id_producto'][$i];
    $nombre_producto = $productos_nombre[$i];
    $precio_unitario = $_POST['precio'][$i];
    $cantidad = $_POST['cantidad'][$i]; // Ajusta aquí para acceder al valor correcto del array
    $totalPorProducto = $precio_unitario * $cantidad;
    $totalVenta += $totalPorProducto;

    $html .= '
    <tr>
        <td>' . $id_producto . '</td>
        <td>' . $nombre_producto . '</td>
        <td>' . $precio_unitario . '</td>
        <td>' . $cantidad . '</td>
        <td>' . $totalPorProducto . '</td>
    </tr>';
}

$html .= '</table>
<p><strong>Total de la Venta:</strong> ' . $totalVenta . '</p>';

$html .= '<p><strong>Dias del Crédito:</strong> ' . $dias_credito . '</p>';

// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y guardarlo en el servidor
$pdfFilePath = '/Users/carloseduardoguedea/Desktop/Produccion/tickets/' . $UrlActual;
// Ruta donde se guardará el PDF
$pdf->Output($pdfFilePath, 'F'); // 'F' guarda el PDF en el servidor

// // Generar el PDF
// $pdf->Output($UrlActual, 'I'); // 'I' muestra el PDF en el navegador; 'D' lo descarga

$Url = 'tickets/' . $UrlActual;

?>

<!-- Cabecera -->
<link rel="stylesheet" href="/middleware/nueva_venta_credito/sidebar.css">

<link rel="stylesheet" href="/middleware/nueva_venta_credito/nueva-venta-credito.css">

<link rel="stylesheet" href="/middleware/nueva_venta_credito/table.css">

<div id="sidebar">
    <div class="toogle-btn">

    </div class="sidebar-content">
    <ul>
        <li> <a href="/">CAFRA'S</a></li>
        <!-- Item Nueva Venta -->
        <li>
            <div class="sidebar-item">
                <a href="/nueva-venta">
                    <img src="../../icons/nueva_venta.svg" width="25px" height="25px" />
                </a>
                <a href="/nueva-venta">
                    Nueva Venta
                </a>
            </div>
        </li>
        <!-- Item Ventas -->
        <li>
            <div class="sidebar-item">
                <a href="/ventas/1">
                    <img src="../../icons/ventas.svg" width="25px" height="25px" />
                </a>
                <a href="/ventas/1">
                    Ventas
                </a>
            </div>
        </li>
        <!-- Item Notificaciones -->
        <li>
            <div class="sidebar-item">
                <a href="/notificaciones/1">
                    <img src="../../icons/bell.svg" width="25px" height="25px" />
                </a>
                <a href="/notificaciones/1">
                    Notificaciones
                </a>
            </div>
        </li>
        <!-- Item Abonos -->
        <li>
            <div class="sidebar-item">
                <a href="/abonos/1">
                    <img src="/icons/abonos.svg" width="25px" height="25px" />
                </a>
                <a href="/abonos/1">
                    Abonos
                </a>
            </div>
        </li>
        <!-- Item Nuevo Producto -->
        <li>
            <div class="sidebar-item">
                <a href="/nuevo-producto">
                    <img src="../../icons/nuevo_producto.svg" width="25px" height="25px" />
                </a>
                <a href="/nuevo-producto">
                    Nuevo Producto
                </a>
            </div>
        </li>
        <!-- Item Productos -->
        <li>
            <div class="sidebar-item">
                <a href="/productos/1" class="toogle">
                    <img src="../../icons/productos.svg" width="25px" height="25px" />
                </a>
                <a href="/productos/1" class="toogle">
                    Productos
                </a>
            </div>
        </li>
        <!-- Item Créditos -->
        <li>
            <div class="sidebar-item">
                <a href="/creditos/1">
                    <img src="/icons/credito.svg" width="25px" height="25px" />
                </a>
                <a href="/cerrar-sesion">
                    Créditos
                </a>
            </div>
        </li>
        <!-- Item Nuevo Cliente -->
        <li>
            <div class="sidebar-item">
                <a href="/nuevo-cliente">
                    <img src="../../icons/nuevo_cliente.svg" width="25px" height="25px" />
                </a>
                <a href="/nuevo-cliente">
                    Nuevo Cliente
                </a>
            </div>
        </li>
        <!-- Item Clientes -->
        <li>
            <div class="sidebar-item">
                <a href="/clientes/1">
                    <img src="/icons/cliente.svg" width="25px" height="25px" />
                </a>
                <a href="/clientes/1">
                    Clientes
                </a>
            </div>
        </li>
        <!-- Item Dashboard -->
        <li>
            <div class="sidebar-item">
                <a href="/tickets/1">
                    <img src="/icons/grid.svg" width="25px" height="25px" />
                </a>
                <a href="/ticket/1">
                    Tickets
                </a>
            </div>
        </li>
        <!-- Item Cerrar-Sesion -->
        <li>
            <div class="sidebar-item">
                <a href="/abonos/1">
                    <img src="../../icons/salir.svg" width="25px" height="25px" />
                </a>
                <a href="/abonos/1">
                    Cerrar Sesión
                </a>
            </div>
        </li>
    </ul>
</div>


<!-- HEADER -->

<header>
    <div class="header-container">
        <div class="header-izquierda">
            <h1>Ticket</h1>
            <h5 class="subtitle">Impresion de Ticket y Descarga</h5>
        </div>
        <div class="header-derecha">
            <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
            <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
            <h3 class="header-nombre"><?php echo $_SESSION['Usuario'] ?></h3>
        </div>
    </div>
</header>

<div class="container">
    <!-- Agrega un botón o enlace en tu página -->
    <h1>Ver e impirmir el Ticket de su Crédito</h1>
</div>

<!-- 
<script>
document.getElementById('btnAbrirPDF').addEventListener('click', function() {
    // Reemplaza 'nombre_de_tu_script.php' con la ruta a tu script PHP que genera el PDF
    var urlPDF = encodeURIComponent('<?php echo $Url; ?>');
    
    // Abre el PDF en una nueva ventana
    window.open(urlPDF, '_blank');
});
</script> -->

<iframe id="pdfViewer" src="<?php echo $Url; ?>" style="width: 80%; height: 500px; margin-left: 220px;"></iframe>

<script>
    document.getElementById('btnAbrirPDF').addEventListener('click', function() {
        document.getElementById('pdfViewer').src = '<?php echo $Url; ?>';
    });
</script>