<!-- Cabecera -->
<link rel="stylesheet" href="/views/nueva_venta/sidebar.css">

<link rel="stylesheet" href="/views/nueva_venta/nueva_venta.css">

<link rel="stylesheet" href="/views/nueva_venta/formulario.css">

<link rel="stylesheet" href="/views/nueva_venta/table.css">


<div id="sidebar">
    <div class="toogle-btn">

    </div class="sidebar-content">
    <ul>
        <li> <a href="/">CAFRA'S</a></li>
        <!-- Item Nueva Venta -->
        <li>
            <div class="sidebar-item-active">
                <a href="/nueva-venta">
                    <img src="../../icons/nueva_venta.svg" width="25px" height="25px" />
                </a>
                <a href="/nueva-venta" style="color: white;">
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
                <a href="/dashboard">
                    <img src="/icons/grid.svg" width="25px" height="25px" />
                </a>
                <a href="/dashboard">
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
                <a href="/abonos/1">
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
            <h1>Nueva Venta</h1>
            <h5 class="subtitle">Crear una nueva venta en el sistema</h5>
        </div>
        <div class="header-derecha">
            <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
            <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
            <h3 class="header-nombre">Francisco Rosa</h3>
        </div>
    </div>
</header>

<!-- CLIENTE -->

<div class="cliente-container"">
    <h1>Cliente</h1>
    <div class=" form-group">
    <label for="id_cliente">ID</label>
    <input class="form-control" type="text" id="id_cliente" name="id_cliente" placeholder="ID Ciente" style="width:70%">
</div>
<div class="form-group">
    <label for="cliente_nombre">Nombre</label>
    <input class="form-control" type="text" id="cliente_nombre" name="cliente_nombre" placeholder="Nombre" style="width:70%">
</div>
<div class="form-group">
    <button class="button" onclick="buscarCliente()">Buscar</button>
</div>
</div>

<!-- FORMULARIO -->

<body class="content">
    <div class="busqueda-container" ">
        <div>
            <h1>Busqueda</h1>
        <div style=" display: flex;">
        <div class="form-group">
            <label for="id_producto">ID</label>
            <input class="form-control" type="text" id="id_producto" name="id_producto" placeholder="ID del Producto">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" id="producto_nombre" name="producto_nombre" placeholder="Nombre del producto">
        </div>
        <div class="form-group">
            <label for="nombre">Cantidad</label>
            <input class="form-control" type="number" id="cantidad" name="cantidad" placeholder="Cantidad" required>
        </div>
    </div>
    <div>
        <button class="button" onclick="buscarProducto(); return false;">Buscar</button>
        <button class="button" onclick="agregarProducto()">Agregar</button>
        <button class="button" onclick="limpiarCampos()">Borrar</button>
    </div>
    </div>
    <div>
        <table class="table tabla-compras">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                </tr>
            </thead>
            <tbody id="productos-table">
            </tbody>
        </table>
    </div>
    </div>


    <!-- TABLA -->

    <div class="tabla-container">
        <div>
            <h1>Compras</h1>
            <table class="table table-striped" id="miTabla">
                <thead>
                    <tr>
                        <th>ID Producto</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Existencias</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody id="compras-table">
                </tbody>
            </table>
            <div style="display:flex;justify-content: space-between;">
                <div class="form-group" style="display: flex;">
                    <label for="nombre">
                        <h2>Total</h2>
                    </label>
                    <h2 id="total" style="margin-left: 2rem;">0.00</h2>
                </div>
                <div style="padding-right:20px;">
                    <button class="button-naranja">Contado</button>
                    <button class="button-azul">Crédito</button>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function limpiarCampos() {
        document.getElementById('id_producto').value = '';
        document.getElementById('producto_nombre').value = '';
        document.getElementById('cantidad').value = '';
    }

    // Esta función se ejecuta cuando se envía el formulario
    function buscarProducto() {
        event.preventDefault(); // Evita que el formulario se envíe de forma tradicional
        var id_producto = document.getElementById('id_producto').value;
        var producto_nombre = document.getElementById('producto_nombre').value;

        // Realiza una solicitud AJAX para obtener los resultados
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/producto-buscar-id', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Define lo que hacer cuando la solicitud se complete
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Actualiza la tabla con los resultados recibidos
                document.getElementById('productos-table').innerHTML = xhr.responseText;
            }
        };

        // Crea una cadena de consulta con ambos valores
        var data = 'id_producto=' + id_producto + '&producto_nombre=' + producto_nombre;

        // Envía los datos del formulario
        xhr.send(data);
    }

    function agregarProducto() {
        var productosTable = document.getElementById('productos-table');
        var comprasTable = document.getElementById('compras-table');
        var cantidad = parseFloat(document.getElementById('cantidad').value); // Convierte la cantidad a un número
        var cantidadInput = document.getElementById('cantidad');
        var cantidad = parseFloat(cantidadInput.value); // Convierte la cantidad a un número

        if (isNaN(cantidad) || cantidad <= 0) {
            alert("Por favor, ingrese una cantidad válida mayor que cero.");
            return; // No se permite agregar si la cantidad no es válida
        }

        var total = 0;

        for (var i = 0; i < productosTable.rows.length; i++) {
            var row = productosTable.rows[i];
            var newRow = comprasTable.insertRow(comprasTable.rows.length);

            for (var j = 0; j < row.cells.length; j++) {
                var cell = newRow.insertCell(j);

                cell.innerHTML = row.cells[j].innerHTML;

                if (j === 3) { // La columna 3 contiene el precio
                    var precio = parseFloat(row.cells[j].innerText);
                    total += precio * cantidad;
                }
            }

            // Añade la celda de Cantidad al final de la fila
            if (i === 0) { // Agregar cantidad solo una vez (puedes cambiar esto si necesitas agregar en cada fila)
                var cantidadCell = newRow.insertCell(row.cells.length);
                cantidadCell.textContent = cantidad;
            }
        }

        // Actualiza el contenido del elemento h2 con el nuevo valor
        var totalElement = document.getElementById('total');
        totalElement.textContent = total.toFixed(2); // Formatea el total con dos decimales


        // Limpia los campos
        limpiarCampos();
    }

    // Esta función se ejecuta cuando se envía el formulario
    function buscarCliente() {
        event.preventDefault(); // Evita que el formulario se envíe de forma tradicional
        var id_cliente = document.getElementById('id_cliente').value;
        var cliente_nombre = document.getElementById('cliente_nombre').value;

        // Realiza una solicitud AJAX para obtener los resultados
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/cliente-buscar', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Define lo que hacer cuando la solicitud se complete
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Actualiza el input de cliente_nombre con el resultado recibido
                document.getElementById('cliente_nombre').value = xhr.responseText;
            }
        };

        // Crea una cadena de consulta con el valor del id_cliente
        var data = 'id_cliente=' + id_cliente;

        // Envía los datos del formulario
        xhr.send(data);
    }
</script>