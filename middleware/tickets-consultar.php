<?php

// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();

// Llenar la vista
// $stmt2 = $conn->prepare("SELECT * FROM Usuario");
// $stmt2->execute();
// $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// PAGINACION
// Definir la variable $pagina (puede provenir de una solicitud GET o POST)
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el número total de elementos
$total = $con->query('SELECT COUNT(*) FROM Tickets')->fetchColumn();

// Calcular la página actual y el número total de páginas
$elementosPorPagina = 10;
$totalPaginas = ceil($total / $elementosPorPagina);

# El límite es el número de productos por página
$limit = $elementosPorPagina;
# El offset es saltar X productos que viene dado por multiplicar la página - 1 * los productos por página
$offset = ($pagina - 1) * $elementosPorPagina;

// Calcular el inicio y el fin de la página actual
$inicio = max(0, min($offset, $total - 1));
$fin = min($inicio + $elementosPorPagina - 1, $total - 1);

// Realizar la consulta para obtener los elementos de la página actual
$stmt = $con->prepare('SELECT Tickets.*, Clientes.nombre AS nombre_cliente
FROM Tickets
JOIN Ventas ON Tickets.id_venta = Ventas.id_venta
JOIN Clientes ON Ventas.id_cliente = Clientes.id_cliente;');
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>