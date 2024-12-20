<?php
//Establecer la conexión a la base de datos
$db = new Base;
$conn=$db->ConexionBD();

//Llenar la vista
// $stmt = $conn->prepare("SELECT Orden.ID, Usuario.Nombre, Usuario.Email, Descripcion,Fecha_Inicio, Ruta_archivos
// FROM Orden
// INNER JOIN Usuario
// ON Usuario.ID = Orden.ID_Usuario
// ORDER BY Orden.ID DESC");

// $stmt->execute();
// $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

//PAGINACION

// Calcular el número total de elementos
$total = $conn->query('SELECT COUNT(*)
FROM (
    SELECT Orden.ID, Usuario.Nombre, Usuario.Email, Descripcion, Fecha_Inicio, Ruta_archivos
    FROM Orden
    INNER JOIN Usuario ON Usuario.ID = Orden.ID_Usuario
) as consulta')->fetchColumn();

// Calcular la página actual y el número total de páginas
$elementosPorPagina = 10;
$totalPaginas = ceil($total / $elementosPorPagina);

# El límite es el número de productos por página
$limit = $elementosPorPagina;
# El offset es saltar X productos que viene dado por multiplicar la página - 1 * los productos por página
$offset = ($pagina - 1) * $elementosPorPagina;

//$inicio = ($paginaActual - 1) * $elementosPorPagina;
$fin = min($inicio + $elementosPorPagina - 1, $total - 1);

// Realizar la consulta para obtener los elementos de la página actual
$stmt = $conn->prepare('SELECT Orden.ID, Usuario.Nombre, Usuario.Email, Descripcion,Fecha_Inicio, Ruta_archivos
FROM Orden
INNER JOIN Usuario
ON Usuario.ID = Orden.ID_Usuario ORDER BY Orden.ID desc');
$stmt->bindValue(1, $offset, PDO::PARAM_INT);
$stmt->bindValue(2, $limit, PDO::PARAM_INT);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);







