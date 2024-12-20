<!-- Cabecera -->

<!-- Hoja de estilos para el sidebar -->
<link rel="stylesheet" href="/views/ventas/sidebar.css">

<!-- Hoja de estilos para la vista principal -->
<link rel="stylesheet" href="/views/ventas/ventas.css">

<!-- Hoja de estilos para las tablas -->
<link rel="stylesheet" href="/views/ventas/table.css">


<!-- SIDEBAR -->
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
            <div class="sidebar-item-active">
                <a href="/ventas/1">
                    <img src="../../icons/ventas.svg" width="25px" height="25px" />
                </a>
                <a href="/ventas/1" style="color:white">
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
            <h1>Ventas</h1>
            <h5 class="subtitle">Listado del historial de las ventas</h5>
        </div>
        <div class="header-derecha">
            <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
            <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
            <h3 class="header-nombre"><?php echo $_SESSION['Usuario']?></h3>
        </div>
    </div>
</header>

<!-- BUSAQUEDA -->
<form action="/ventas-buscar" method="post">
    <div style="margin-left:220px">
        <label for="nombre">Buscar</label>
    
    <div class="busqueda form-group" style="display:flex">
        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Buscar por Nombre" style="width: 20%;">
        <button><img src="../../icons/buscar.png" alt="buscar" width="40px" height="40px"></button>
    </div>
    </div>
</form>

<!-- TABLA -->
<div class="container mt-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>ID Usuario</th>
                <th>ID Cliente</th>
                <th>Nombre Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Tipo Venta</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resultados as $venta) {
                echo "<tr>";
                echo "<td>" . $venta['id_venta'] . "</td>";
                echo "<td>" . $venta['id_usuario'] . "</td>";
                echo "<td>" . $venta['id_cliente'] . "</td>";
                echo "<td>" . $venta['nombre_cliente'] . "</td>";
                echo "<td>" . $venta['fecha'] . "</td>";
                echo "<td>" . $venta['total'] . "</td>";
                echo "<td>" . $venta['tipo_venta'] . "</td>";
                echo "</tr>";
            }
            ?>
            <!-- Agrega más filas para cada producto -->
        </tbody>
    </table>
</div>