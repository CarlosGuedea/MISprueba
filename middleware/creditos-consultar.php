<?php

// Establecer la conexión a la base de datos MySQL
$db = new Base;
$conn = $db->ConexionBD();

// Llenar la vista
// $stmt2 = $conn->prepare("SELECT * FROM Usuario");
// $stmt2->execute();
// $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// PAGINACION
// Definir la variable $pagina (puede provenir de una solicitud GET o POST)
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el número total de elementos
$total = $conn->query('SELECT COUNT(*) FROM Creditos')->fetchColumn();

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
$stmt = $conn->prepare('SELECT Creditos.*, Clientes.nombre AS nombre_cliente
FROM Creditos
JOIN Clientes ON Creditos.id_cliente = Clientes.id_cliente;');
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>