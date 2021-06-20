<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Taller';
include_once($rootPath . '/controllers/connection/conexion.php');
include_once($rootPath . '/controllers/mecanicos/Mecanico.php');

Conexion::abrirConexion();
$conexion = Conexion::getConexion();

$id_mecanico = $_POST["id_mecanico"];
$nombre = $_POST["nombre"];
$ape_pat = $_POST["ape_pat"];
$ape_mat = $_POST["ape_mat"];
$rfc = $_POST["rfc"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];

Mecanico::actualizarMecanico($conexion, $nombre, $ape_pat, $ape_mat, $rfc, $direccion, $telefono, $id_mecanico);
header("Location: /Taller/vistas/mecanicos/Mecanicos.php");

