<?php
/*
Autor: Carlos Eduardo Guedea Guerrero
Objetivo: Código para manejar las rutas de la aplicación
*/


//Requerir el autoload para el funcionamiento de composer
require_once 'vendor/autoload.php';

//Cargar loscontroladores
require 'controllers/loginController.php';
require 'controllers/registerController.php';
require 'controllers/ordenesController.php';
require 'controllers/adminController.php';
require 'controllers/sesionController.php';
require 'controllers/stripeController.php';
require 'controllers/dashboardController.php';
require 'controllers/abonosController.php';
require 'controllers/clientesController.php';
require 'controllers/creditosController.php';
require 'controllers/notificacionesController.php';
require 'controllers/nuevaVentaController.php';
require 'controllers/nuevoProductoController.php';
require 'controllers/nuevoClienteController.php';
require 'controllers/ventasController.php';
require 'controllers/productosController.php';
require 'controllers/ticketsController.php';


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    //Ruta prinicipal para logearse
    $r->addRoute(['GET'], '/', [loginController::class, 'index']);

    $r->addRoute(['POST'], '/login-admin', [loginController::class, 'login']);

    $r->addRoute(['POST', 'GET'], '/registro', [loginController::class, 'register']);

    $r->addRoute(['GET'], '/cerrar-sesion', [sesionController::class, 'cerrarSesion']);

    //Ruta para ver dashboard con estadísticas
    $r->addRoute('GET', '/dashboard', [dashboardController::class, 'index']);

    //Ruta para cargar la tabla de los abonos
    $r->addRoute(['GET', 'POST'], '/abonos/{pagina:\d+}', [abonosController::class, 'listar']);

    //Ruta para cargar la tabla de los clientes
    $r->addRoute(['GET', 'POST'], '/clientes/{pagina:\d+}', [clientesController::class, 'listar']);

    //Ruta para bsucar un cliente
    $r->addRoute(['POST'], '/cliente-buscar', [clientesController::class, 'buscar']);

    $r->addRoute(['GET'], '/cargar-clientes', [clientesController::class, 'cargar']);

    //Ruta para cargar la tabla de los créditos
    $r->addRoute(['GET'], '/creditos/{pagina:\d+}', [creditosController::class, 'listar']);

    $r->addRoute(['POST'], '/credito-buscar', [creditosController::class, 'buscar']);

    $r->addRoute(['POST'], '/saldar-credito', [creditosController::class, 'abonar']);

    //Ruta para cargar la tabla de las notificaciones
    $r->addRoute(['GET', 'POST'], '/notificaciones/{pagina:\d+}', [notificacionesController::class, 'listar']);

    //Ruta para cargar el formulario para hacer una nueva venta
    $r->addRoute(['GET'], '/nueva-venta', [nuevaVentaController::class, 'index']);

    //Ruta para cargar los datos del formulario para hacer una nueva venta
    $r->addRoute(['POST'], '/nueva-venta', [nuevaVentaController::class, 'buscar']);

    $r->addRoute(['POST'], '/nueva-venta-contado', [nuevaVentaController::class, 'vContado1']);

    $r->addRoute(['POST'], '/nueva-venta-credito', [nuevaVentaController::class, 'Credito1']);

    //Ruta para cargar el formulario para un nuevo cliente
    $r->addRoute(['GET'], '/nuevo-cliente', [nuevoClienteController::class, 'index']);

    //Ruta para cargar los datos del formulario para hacer una nueva venta
    $r->addRoute(['POST'], '/nuevo-cliente', [nuevoClienteController::class, 'agregar']);

    //Ruta para cargar la tabla de las notificaciones
    $r->addRoute(['GET', 'POST'], '/productos/{pagina:\d+}', [productosController::class, 'listar']);

    $r->addRoute(['GET'], '/cargar-productos', [productosController::class, 'cargar']);

    $r->addRoute(['POST'], '/eliminar-producto', [productosController::class, 'eliminarProducto']);

    $r->addRoute(['POST'], '/resurtir-producto', [productosController::class, 'resurtirProducto']);

    //Ruta para cargar el formulario para un nuevo cliente
    $r->addRoute(['GET'], '/nuevo-producto', [nuevoProductoController::class, 'index']);

    //Ruta para cargar el formulario para un nuevo cliente
    $r->addRoute(['POST'], '/nuevo-producto', [nuevoProductoController::class, 'agregar']);

    $r->addRoute(['GET'], '/ticket/{pagina:\d+}', [ticketsController::class, 'index']);

    $r->addRoute(['GET'], '/tickets/{urlArchivo}', [ticketsController::class, 'consulta']);

    $r->addRoute(['GET', 'POST'], '/tickets-buscar', [ticketsController::class, 'buscar']);

    //Ruta para bsucar un producto
    $r->addRoute(['POST'], '/producto-buscar-id', [productosController::class, 'buscarID']);

    //Ruta para cargar la tabla de las notificaciones
    $r->addRoute(['GET', 'POST'], '/ventas/{pagina:\d+}', [ventasController::class, 'listar']);

    $r->addRoute(['GET', 'POST'], '/ventas-buscar', [ventasController::class, 'buscar']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo 'Página no encontrada';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo 'Método no permitido';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func_array($handler, $vars);
        break;
}
