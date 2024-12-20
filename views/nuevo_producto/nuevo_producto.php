<!-- Cabecera -->
<link rel="stylesheet" href="/views/nuevo_producto/sidebar.css">

<link rel="stylesheet" href="/views/nuevo_producto/nuevo_producto.css">

<link rel="stylesheet" href="/views/nuevo_producto/formulario.css">

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
            <div class="sidebar-item-active">
                <a href="/nuevo-producto">
                    <img src="../../icons/nuevo_producto.svg" width="25px" height="25px" />
                </a>
                <a href="/nuevo-producto" style="color:white;">
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

<header class="header">
    <div class="header-container">
        <div class="header-izquierda">
            <h1>Nuevo Producto</h1>
            <h5 class="subtitle">Formulario para agregar un producto a la BD</h5>
        </div>
        <div class="header-derecha">
            <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
            <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
            <h3 class="header-nombre"><?php echo $_SESSION['Usuario']?></h3>
        </div>
    </div>
</header>


<!-- FORMULARIO -->

<body class="content">
    <div class="form-container">
        <form action="/nuevo-producto" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input class="form-control" type="text" name="descripcion" placeholder="Descripcion" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input class="form-control" type="number" id="precio" name="precio" placeholder="Precio" required>
            </div>
            <div class="form-group">
                <label for="existencias">Existencias</label>
                <input class="form-control" type="number" id="existencias" name="existencias" placeholder="Existencia" required>
            </div>
            <div class="form-group">
                <label for="reorden">Reorden</label>
                <input class="form-control" type="number" id="reorden" name="reorden" placeholder="Existencia" required>
            </div>
            <div class="form-goup" style="margin-right: 70%; margin-top: 1rem;">
                <input class="button" type="submit">
            </div>
        </form>
    </div>
</body>

<script src="nuevo_producto.js"></script>



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