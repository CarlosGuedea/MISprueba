<?php
// Borrar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

header('Location: /');

exit();