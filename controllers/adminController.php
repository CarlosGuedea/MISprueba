<?php
class adminController{

    public static function login(){
        include 'database/database.php';
        include 'middleware/login-admin.php';
        include 'views/layouts/header.php';
        include 'views/admin/login.php';
    }

    public static function panel(){
        include 'database/database.php';
        include 'middleware/autenticacion-admin.php';
        include 'views/layouts/header.php';
        include 'views/layouts/side-bar.php';
        include 'views/layouts/footer.php';
    }

    public static function panelOrdenes($pagina){
        include 'database/database.php';
        include 'middleware/autenticacion-admin.php';
        include 'middleware/ordenes-admin.php';
        include 'views/layouts/header.php';
        include 'views/layouts/side-bar.php';
        include 'views/admin/ordenes.php';
        include 'views/layouts/footer.php';
    }

    public static function panelUsuarios($pagina){
        include 'database/database.php';
        include 'middleware/autenticacion-admin.php';
        include 'middleware/listar-usuarios.php';
        include 'views/layouts/header.php';
        include 'views/layouts/side-bar.php';
        include 'views/admin/usuarios.php';
        include 'views/layouts/footer.php';
    }

    public static function panelBusquedas(){
        include 'database/database.php';
        include 'middleware/autenticacion-admin.php';
        include 'middleware/busquedas-admin.php';
        include 'views/layouts/header.php';
        include 'views/layouts/side-bar.php';
        include 'views/admin/busquedas.php';
        include 'views/layouts/footer.php';
    }

    public static function panelSolicitudes($pagina){
        include 'database/database.php';
        include 'middleware/autenticacion-admin.php';
        include 'middleware/solicitudes-admin.php';
        include 'views/layouts/header.php';
        include 'views/layouts/side-bar.php';
        include 'views/admin/solicitudes.php';
        include 'views/layouts/footer.php';
    }
}