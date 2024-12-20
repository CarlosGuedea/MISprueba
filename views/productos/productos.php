<!-- Cabecera -->
<link rel="stylesheet" href="/views/productos/sidebar.css">

<link rel="stylesheet" href="/views/productos/productos.css">

<link rel="stylesheet" href="/views/productos/table.css">
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
                <span class="badge" id="contadorNotificaciones">1</span>
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
            <div class="sidebar-item-active">
                <a href="/productos/1" class="toogle">
                    <img src="../../icons/productos.svg" width="25px" height="25px" />
                </a>
                <a href="/productos/1" class="toogle" style="color:white;">
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
                <a href="/creditos/1">
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
                <a href="/ticket/1">
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
                <a href="/cerrar-sesion">
                    Cerrar Sesion
                </a>
            </div>
        </li>
    </ul>
</div>

<!-- HEADER -->

<header>
    <div class="header-container">
        <div class="header-izquierda">
            <h1>Productos</h1>
            <h5 class="subtitle">Listado de los productos en la BD</h5>
        </div>
        <div class="header-derecha">
            <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
            <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
            <h3 class="header-nombre"><?php echo $_SESSION['Usuario']?></h3>
        </div>
    </div>
</header>

<!-- TABLA -->

<body>
    <div class="tabla-container">
    <a href="/nuevo-producto"><button class="button">+ Agregar Producto</button></a>
        <table class="table table-striped" id="miTabla" style="">
            <thead>
                <tr>
                    <th>ID Producto</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Reorden</th>
                    <th>Borrar</th>
                    <th>Resurtir</th>
                </tr>
            </thead>
            <tbody>
            <?php
            error_reporting(0);
            foreach ($resultados as $producto) {
                echo "<tr>";
                echo "<td>" . $producto['id_producto'] . "</td>";
                echo "<td>" . $producto['nombre'] . "</td>";
                echo "<td>" . $producto['descripcion'] . "</td>";
                echo "<td>" . $producto['precio'] . "</td>";
                echo "<td>" . $producto['existencias'] . "</td>";
                echo "<td>" . $producto['reorden'] . "</td>";
                echo "<td>
                    <form method='POST' action='/eliminar-producto'>
                        <input type='hidden' name='id_producto' value='" . $producto['id_producto'] . "'>
                        <button type='submit'><img src='/icons/basura.png' alt='borrar' width='25px'></button>
                    </form>
                </td>";
                echo "<td>
                <form method='POST' action='/resurtir-producto'>
                <input type='hidden' name='id_producto' value='" . $producto['id_producto'] . "'>
                <input name='cantidad_resurtir' placeholder='cantidad'>
                <button type='submit'><img src='/icons/lapiz.png' alt='editar' width='25px'></button> 
                </form>
                </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</body>

<script src="productos.js"></script>



<script>
    // Supongamos que esto es la función que se ejecuta al recibir una nueva notificación
function recibirNotificacion() {
    // Obtener el elemento del badge
    const badge = document.getElementById('contadorNotificaciones');

    // Mostrar el badge y aumentar el contador
    badge.style.display = 'block';
    // Suponiendo que ya hay una notificación, aumentar el contador en uno
    badge.textContent = parseInt(badge.textContent) + 1;
}

// Ejemplo: Simulación de recibir una nueva notificación después de un tiempo (solo para propósitos de demostración)
setTimeout(recibirNotificacion, 3000); // Llamar a la función después de 3 segundos 
</script>