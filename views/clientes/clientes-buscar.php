<!-- Cabecera -->
<link rel="stylesheet" href="/views/clientes/sidebar.css">

<link rel="stylesheet" href="/views/clientes/clientes.css">

<link rel="stylesheet" href="/views/clientes/table.css">


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
            <div class="sidebar-item-active">
                <a href="/clientes/1">
                    <img src="/icons/cliente.svg" width="25px" height="25px" />
                </a>
                <a href="/clientes/1" style="color:white;">
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
            <h1>Clientes</h1>
            <h5 class="subtitle">Listado de los clientes</h5>
        </div>
        <div class="header-derecha">
            <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
            <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
            <h3 class="header-nombre"><?php echo $_SESSION['Usuario']?></h3>
        </div>
        <div>
            <button class="button"><a style="text-decoration: none; color: white;" href="../nuevo_cliente/nuevo_cliente.html"> + Agregar cliente</a></button>
        </div>
    </div>
</header>


<!-- BUSAQUEDA -->
<form action="/credito-buscar" method="post">
    <div style="margin-left:220px">
        <label for="nombre">Buscar</label>
    </div>
    <div class="busqueda form-group" style="display:flex">
        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Buscar por Nombre" style="width: 20%;">
        <button><img src="../../icons/buscar.png" alt="buscar" width="40px" height="40px"></button>
    </div>
</form>

<!-- TABLA -->

<!-- CONTENIDO -->

<body onload="cargarClientes(url, opciones);">
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Cliente</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Deuda</th>
                </tr>
            </thead>
            <tbody id="clientes-table">
                <?php
                foreach ($resultados as $cliente) {
                    echo "<tr>";
                    echo "<td>" . $cliente['id_cliente'] . "</td>";
                    echo "<td>" . $cliente['nombre'] . "</td>";
                    echo "<td>" . $cliente['apellido'] . "</td>";
                    echo "<td>" . $cliente['email'] . "</td>";
                    echo "<td>" . $cliente['telefono'] . "</td>";
                    echo "<td>" . $cliente['direccion'] . "</td>";
                    echo "<td>" . $cliente['deuda'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>



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