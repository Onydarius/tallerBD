<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Taller';
include_once($rootPath . '/controllers/connection/conexion.php');
include_once($rootPath . '/controllers/clients/Cliente.php');

Conexion::abrirConexion();
$conexion = Conexion::getConexion();

$id_cliente = $_POST["id_cliente"];
$nombre = $_POST["nombre"];
$ape_pat = $_POST["ape_pat"];
$ape_mat = $_POST["ape_mat"];
$mail = $_POST["mail"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];

Cliente::actualizarCliente($conexion, $nombre, $ape_pat, $ape_mat, $mail, $direccion, $telefono, $id_cliente);
header("Location: /Taller/vistas/clientes/clientes.php");

