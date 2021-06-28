<?php
session_start();
$_SESSION['user'] = $_REQUEST['user'];;
$_SESSION['password'] = $_REQUEST['password'];

if (!isset($_SESSION['user'])) {
    session_destroy();
    header("Location: /Taller/vistas/login.php");
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/Taller/controllers/connection/conexion.php');
    Conexion::abrirConexion();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller</title>
    <frameset cols="15%,85%" frameborder="no">
        <frame src="/Taller/vistas/menu.php" name="menu">
            <frame src="/Taller/vistas/clientes/clientes.php" name="display">
    </frameset>
</head>

</html>