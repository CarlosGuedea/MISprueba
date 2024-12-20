<!-- Cabecera -->
<link rel="stylesheet" href="/views/dashboard/sidebar.css">

<link rel="stylesheet" href="/views/dashboard/dashboard.css">

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
            <div class="sidebar-item-active">
                <a href="/dashboard">
                    <img src="/icons/grid.svg" width="25px" height="25px" />
                </a>
                <a href="/dashboard" style="color:white;">
                    Dashboard
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



<!-- Contenido principal -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<header class="header">
    <div class="header-container">
        <div class="header-izquierda">
            <h1>Bienvenido</h1>
            <h5 class="subtitle">Aquí están algunas estadísticas de las ventas!</h5>
        </div>
        <div class="header-derecha">
            <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
            <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
            <h3 class="header-nombre"><?php echo $_SESSION['Usuario']?></h3>
        </div>
    </div>
</header>

<!-- CONTENIDO -->

<body class="content">
    <div class="content-container1">
        <div class="widget-ventas-1">
            <img src="../../icons/ventas.svg" width="25px" height="25px" style="padding-top: 20px; padding: 1rem; background-color: #8c8c8d; border-radius: 20px;" />
            <h4>Total ventas</h4>
        </div>
        <div class="widget-ventas-1">
            <img src="../../icons/credito.svg" width="25px" height="25px" style="padding-top: 20px; padding: 1rem; background-color: #8c8c8d; border-radius: 20px;" />
            <h4>Créditos</h4>
        </div>
        <div class="widget-ventas-1">
            <img src="../../icons/abonos.svg" width="25px" height="25px" style="padding-top: 20px; padding: 1rem; background-color: #8c8c8d; border-radius: 20px;" />
            <h4>Abonos</h4>
        </div>
    </div>
</body>

</html>