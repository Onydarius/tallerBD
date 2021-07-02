<?php
include_once 'config/config.php';
include_once 'core/routes.php';


session_start();
if (!isset($_SESSION['user'])) {
    if (!isset($_REQUEST['user'])) {
        session_destroy();
        $controlador = cargarControlador('login');
    } else {
        $_SESSION['user'] = $_REQUEST['user'];
        $_SESSION['password'] = $_REQUEST['password'];
        include_once 'config/conexion.php';
        $conexion = Conexion::login();
        if ($conexion == 1) {
            $controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
            $controlador->Index();
        } else {
            session_destroy();
            $controlador = cargarAccion(cargarControlador('login'), 'error');
        }
    }
} else {
    include_once 'config/conexion.php';
    $conexion = Conexion::login();

    if (isset($_GET['c'])) {
        $controlador = cargarControlador($_GET['c']);
        if (isset($_GET['a'])) {
            if (isset($_GET['id'])) {
                cargarAccion($controlador, $_GET['a'], $_GET['id']);
            } else {
                cargarAccion($controlador, $_GET['a']);
            }
        } else {
            cargarAccion($controlador, ACCION_PRINCIPAL);
        }
    } else {
        $controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
        $controlador->index();
    }
}
