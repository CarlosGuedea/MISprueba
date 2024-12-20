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

<div class="cliente-container">
    <h1>Cliente</h1>
    <div style="display: flex;">
        <div class=" form-group">
            <label for="id_cliente">ID</label>
            <input class="form-control" type="text" id="id_cliente" name="id_cliente" placeholder="ID Ciente" style="width:90%">
        </div>
        <div class="form-group">
            <label for="cliente_nombre">Nombre</label>
            <input class="form-control" type="text" id="cliente_nombre" name="cliente_nombre" placeholder="Nombre" style="width:90%">
        </div>
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
        <div>
            <form action="" method="post">
                <label for="producto_id">Producto</label>
                <select class="form-control" id="nombre_producto" name="nombre_producto">
                    <option value="">Selecciona un producto</option>
                </select>
            </form>
        </div>
        <div class="form-group">
            <label for="nombre">Cantidad</label>
            <input class="form-control" type="number" id="cantidad" name="cantidad" placeholder="Cantidad" required>
        </div>
    </div>
    <div>
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
    <form id="venta-form" method="post">
        <input type="hidden" name="id_cliente" id="id_cliente_input">
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
                        <input type="hidden" name="total" id="total_input" value="0.00">
                    </div>
                    <div style="padding-right:20px;">
                        <button class="button-naranja" onclick="enviarFormulario('contado')"">Contado</button>
                        <button class="button-azul" onclick="enviarFormulario('credito')">Crédito</button>
                    </div>
                    <!-- Input para los días de crédito (inicialmente oculto) -->
                    <div id="diasCreditoContainer" style="display:none;">
                        <label for="diasCredito">Días de Crédito:</label>
                        <select name="diasCredito" id="diasCredito">
                            <option value="5">5 días</option>
                            <option value="15">15 días</option>
                            <option value="30">30 días</option>
                            <option value="60">60 días</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Esta función se llama cuando la página se carga
    window.onload = function() {
        ComboProducto();
    };

    // Nueva función para cargar productos en el combo y configurar el evento de cambio
    productoSelect;
    productos;

    function ComboProducto() {
        productoSelect = document.getElementById('nombre_producto');

        // Crea una solicitud AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/cargar-productos', true);

        // Define lo que hacer cuando la solicitud se complete
        xhr.onload = function() {
            if (xhr.status === 200) {
                productos = JSON.parse(xhr.responseText);



                // Llena el campo de selección con los productos
                productos.forEach(function(producto) {
                    var option = document.createElement('option');
                    option.value = producto.nombre;
                    option.textContent = producto.nombre;
                    productoSelect.appendChild(option);
                });
            }
        };

        // Envía la solicitud
        xhr.send();

        // Agrega un evento "change" al combobox
        productoSelect.addEventListener('change', function() {
            // Obtén el valor seleccionado del combobox

            var selectedValue = productoSelect.value;
            // Actualiza la tabla solo si se selecciona un producto
            if (selectedValue) {
                // Realiza una solicitud AJAX para obtener los resultados
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/producto-buscar-id', true); // Cambia la ruta a '/producto-buscar-nombre'
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


                // Crea una cadena de consulta con el valor del producto seleccionado
                var data = 'producto_nombre=' + selectedValue; // Cambia a 'producto_nombre'
                // Envía los datos del formulario
                xhr.send(data);

                // Define lo que hacer cuando la solicitud se complete
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Actualiza la tabla con los resultados recibidos
                        document.getElementById('productos-table').innerHTML = xhr.responseText;
                    }
                };

            }
        });
    }

    function limpiarCampos() {
        document.getElementById('id_producto').value = '';
        document.getElementById('producto_nombre').value = '';
        document.getElementById('cantidad').value = '';
    }

    function agregarProducto() {
        var productosTable = document.getElementById('productos-table');
        var comprasTable = document.getElementById('compras-table');
        var cantidadInput = document.getElementById('cantidad');
        var cantidad = parseFloat(cantidadInput.value);

        if (isNaN(cantidad) || cantidad <= 0) {
            alert("Por favor, ingrese una cantidad válida mayor que cero.");
            return;
        }

        var total = 0;

        for (var i = 0; i < productosTable.rows.length; i++) {
            var row = productosTable.rows[i];
            var newRow = comprasTable.insertRow(comprasTable.rows.length);

            for (var j = 0; j < row.cells.length; j++) {
                var cell = newRow.insertCell(j);

                if (j === 0) { // ID
                    cell.innerHTML = row.cells[j].innerText;
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'id_producto[]'; // Aquí asignamos el nombre
                    input.value = row.cells[j].innerText;
                    cell.appendChild(input);
                } else if (j === 1) { // Nombre
                    cell.innerHTML = row.cells[j].innerText;
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'producto_nombre[]'; // Aquí asignamos el nombre
                    input.value = row.cells[j].innerText;
                    cell.appendChild(input);
                } else if (j === 3) { // Precio
                    cell.innerHTML = row.cells[j].innerText;
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'precio[]'; // Aquí asignamos el nombre
                    input.value = row.cells[j].innerText;
                    cell.appendChild(input);
                    var precio = parseFloat(row.cells[j].innerText);
                    total += precio * cantidad;
                } else {
                    cell.innerHTML = row.cells[j].innerHTML;
                }
            }

            if (i === 0) {
                var cantidadCell = newRow.insertCell(row.cells.length);
                var input = document.createElement('input');
                input.type = 'number';
                input.id = 'cantidadVenta'
                input.name = 'cantidad[]'; // Aquí asignamos el nombre
                input.value = cantidad;
                cantidadCell.appendChild(input);
            }
        }

        // Actualizar el campo de total
        var totalInput = document.getElementById('total');
        // Después de calcular el nuevo valor total
        total += parseFloat(totalInput.textContent);
        totalInput.textContent = total.toFixed(2);
        cantidadInput.value = ''; // Limpiar el campo de cantidad

        // Actualiza el campo oculto para el valor total
        var totalInputField = document.getElementById('total_input');
        totalInputField.value = total.toFixed(2);
    }



    // Esta función se ejecuta cuando se envía el formulario
    function buscarCliente() {
        event.preventDefault(); // Evita que el formulario se envíe de forma tradicional
        var id_cliente = document.getElementById('id_cliente').value;
        var cliente_nombre = document.getElementById('cliente_nombre').value;

        // Actualiza el valor del campo oculto id_cliente_input
        var idClienteInput = document.getElementById('id_cliente_input');
        idClienteInput.value = id_cliente;

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


    function enviarFormulario(tipo) {
    // Obtener el formulario
    var formulario = document.getElementById("venta-form");

    // Cambiar la acción del formulario según el tipo de venta
    if (tipo === 'contado') {
        formulario.action = "/nueva-venta-contado";
    } else if (tipo === 'credito') {
        formulario.action = "/nueva-venta-credito";
    }

    // Enviar el formulario
    formulario.submit();
}
</script>