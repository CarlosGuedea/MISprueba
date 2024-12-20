<?php
// Incluir la biblioteca TCPDF
require('tcpdf/tcpdf.php');

// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();
// Obtén los datos de venta de la solicitud POST
$id_cliente = $_POST['id_cliente'];
$id_productos = $_POST['id_producto'];
$productos_nombre = $_POST['producto_nombre'];
$precios = $_POST['precio'];
$cantidades = $_POST['cantidad'];
$total = $_POST['total'];
$id_usuario = 1;

// Inicia una transacción
$con->beginTransaction();

// Inserta la venta en la tabla Ventas
$sqlVenta = "INSERT INTO Ventas (id_usuario, id_cliente, total, tipo_venta) VALUES (?, ?, ?, 'Contado')";
$stmtVenta = $con->prepare($sqlVenta);
$stmtVenta->bindParam(1, $id_usuario); // Reemplaza con el ID del usuario
$stmtVenta->bindParam(2, $id_cliente); // Reemplaza con el ID del cliente
$stmtVenta->bindParam(3, $total); // Reemplaza con el total de la venta
$stmtVenta->execute();

// Obtiene el ID de la venta recién insertada
$id_venta = $con->lastInsertId();

// Inserta los detalles de los productos en la tabla DetallesVenta
for ($i = 0; $i < count($id_productos); $i++) {
    $id_producto = $id_productos[$i];
    $cantidad = $cantidades[$i];
    $precio_unitario = $precios[$i];

    // Obtén la existencia actual del producto
    $sqlExistencia = "SELECT existencias FROM Productos WHERE id_producto = ?";
    $stmtExistencia = $con->prepare($sqlExistencia);
    $stmtExistencia->bindParam(1, $id_producto);
    $stmtExistencia->execute();
    $existenciaActual = $stmtExistencia->fetchColumn();

    // Calcula la nueva existencia
    $nuevaExistencia = $existenciaActual - $cantidad;

    // Actualiza la existencia en la base de datos
    $sqlUpdateExistencia = "UPDATE Productos SET existencias = ? WHERE id_producto = ?";
    $stmtUpdateExistencia = $con->prepare($sqlUpdateExistencia);
    $stmtUpdateExistencia->bindParam(1, $nuevaExistencia);
    $stmtUpdateExistencia->bindParam(2, $id_producto);
    $stmtUpdateExistencia->execute();

    // Continúa con la inserción de detalles de venta
    $sqlDetalleVenta = "INSERT INTO DetallesVenta (id_venta, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)";
    $stmtDetalleVenta = $con->prepare($sqlDetalleVenta);
    $stmtDetalleVenta->bindParam(1, $id_venta);
    $stmtDetalleVenta->bindParam(2, $id_producto);
    $stmtDetalleVenta->bindParam(3, $cantidad);
    $stmtDetalleVenta->bindParam(4, $precio_unitario);
    $stmtDetalleVenta->execute();
}


// Obtén la existencia actual del producto
$sqlUrl = "SELECT url_archivo FROM Tickets WHERE id_venta = ?";
$stmtUrl = $con->prepare($sqlUrl);
$stmtUrl->bindParam(1, $id_venta);
$stmtUrl->execute();
$UrlActual = $stmtUrl->fetchColumn();

// Finaliza la transacción
$con->commit();

// Devolver una respuesta de éxito
http_response_code(200);

// Crear una instancia de TCPDF
$pdf = new TCPDF();
$pdf->SetMargins(10, 10, 10);

// Agregar una página al PDF
$pdf->AddPage();

// Definir el contenido del ticket de venta
$html = '
<h1>Ticket de Venta</h1>
<p><strong>ID del Vendedor:</strong> ' . $id_usuario . '</p>
<p><strong>ID del Cliente:</strong> ' . $id_cliente . '</p>

<h2>Productos Vendidos:</h2>
<table>
    <tr>
        <th>ID del Producto</th>
        <th>Nombre del Producto</th>
        <th>Precio Unitario</th>
        <th>Cantidad</th>
        <th>Total por Producto</th>
    </tr>';

$totalVenta = 0;
for ($i = 0; $i < count($id_productos); $i++) {
    $id_producto = $id_productos[$i];
    $nombre_producto = $productos_nombre[$i];
    $precio_unitario = $precios[$i];
    $cantidad = $cantidades[$i];
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

// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y guardarlo en el servidor
$pdfFilePath = '/Users/carloseduardoguedea/Desktop/Produccion/tickets/'.$UrlActual;
// Ruta donde se guardará el PDF
$pdf->Output($pdfFilePath, 'F'); // 'F' guarda el PDF en el servidor

// // Generar el PDF
// $pdf->Output($UrlActual, 'I'); // 'I' muestra el PDF en el navegador; 'D' lo descarga

$Url = 'tickets/' . $UrlActual;

?>

<!-- Cabecera -->
<link rel="stylesheet" href="/middleware/nueva_venta_contado/sidebar.css">

<link rel="stylesheet" href="/middleware/nueva_venta_contado/nueva-venta-contado.css">

<link rel="stylesheet" href="/middleware/nueva_venta_contado/table.css">

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
            <h3 class="header-nombre"><?php echo $_SESSION['Usuario']?></h3>
        </div>
    </div>
</header>

<div class="container">
    <!-- Agrega un botón o enlace en tu página -->
    <h1>Ver e impirmir el Ticket de su compra</h1>
</div>


<iframe id="pdfViewer" src="<?php echo $Url; ?>" style="width: 80%; height: 500px; margin-left: 220px;"></iframe>
