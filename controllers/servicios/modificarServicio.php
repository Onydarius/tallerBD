<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Taller';
include_once($rootPath . '/controllers/connection/conexion.php');
include_once($rootPath . '/controllers/servicios/Servicio.php');

Conexion::abrirConexion();
$conexion = Conexion::getConexion();

$id_servicios = $_POST["id_servicios"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precios = $_POST["precios"];

Servicio::modificarServicio($conexion, $nombre, $descripcion, $precios, $id_servicios);
header("Location: /Taller/vistas/servicios/Servicios.php");

