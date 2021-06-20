<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Taller';
include_once($rootPath . '/controllers/connection/conexion.php');
include_once($rootPath . '/controllers/servicios/Servicio.php');
Conexion::abrirConexion();
$conexion = Conexion::getConexion();

$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precios = $_POST["precios"];

Servicio::altaServicio($conexion,$nombre, $descripcion, $precios);
header("Location: /Taller/vistas/servicios/Servicios.php");
