<!-- Cabecera -->
<link rel="stylesheet" href="/views/nuevo_cliente/sidebar.css">

<link rel="stylesheet" href="/views/nuevo_cliente/nuevo-cliente.css">

<link rel="stylesheet" href="/views/nuevo_cliente/formulario.css">

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
                <a href="/cerrar-sesion">
                    Créditos
                </a>
            </div>
        </li>
        <!-- Item Nuevo Cliente -->
        <li>
            <div class="sidebar-item-active">
                <a href="/nuevo-cliente">
                    <img src="../../icons/nuevo_cliente.svg" width="25px" height="25px" />
                </a>
                <a href="/nuevo-cliente" style="color: white;">
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
                <a href="/abonos/1">
                    Cerrar Sesión
                </a>
            </div>
        </li>
    </ul>
</div>

<!-- HEADER -->

<header class="header">
    <div class="header-container">
        <div class="header-izquierda">
            <h1>Nuevo Cliente</h1>
            <h5 class="subtitle">Formulario para agregar un cliente a la BD</h5>
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
        <form action="/nuevo-cliente" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Apellidos</label>
                <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Apellidos" required>
            </div>
            <div class="form-group">
                <label for="precio">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="existencias">Telefono</label>
                <input class="form-control" type="number" name="telefono" id="telefono" placeholder="Telefono" required maxlength="10">
            </div>
            <div class="form-goup">
                <label for="foto">Direccion</label>
                <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion" required>
            </div>
            <div class="form-goup" style="margin-right: 70%; margin-top: 1rem;">
                <input class="button" type="submit">
            </div>
        </form>
    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const telfonoInput = document.getElementById("telefono");

        telfonoInput.addEventListener("input", function() {
            validarNumeroPositivo(telefonoInput);
        });

        function validarNumeroPositivo(input) {
            const valor = input.value;
            if (!/^(\+|-)?\d+(\.\d+)?$/.test(valor) || parseFloat(valor) < 0) {
                input.setCustomValidity("Ingrese un numero positivo");
            } else {
                input.setCustomValidity("");
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        const telefonoInput = document.getElementById("telefono");

        telefonoInput.addEventListener("input", function() {
            limitarLongitudTelefono(telefonoInput, 10); // Cambia '10' al número deseado de dígitos.
        });

        function limitarLongitudTelefono(input, maxLength) {
            const valor = input.value;
            if (valor.length > maxLength) {
                input.value = valor.slice(0, maxLength);
            }
        }
    });
</script>



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