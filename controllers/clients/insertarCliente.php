<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Taller';
include_once($rootPath . '/controllers/connection/conexion.php');
include_once($rootPath . '/controllers/clients/Cliente.php');
Conexion::abrirConexion();
$conexion = Conexion::getConexion();

$nombre = $_POST["nombre"];
$ape_pat = $_POST["ape_pat"];
$ape_mat = $_POST["ape_mat"];
$email = $_POST["email"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];

Cliente::insertarCliente($conexion, $nombre, $ape_pat, $ape_mat, $email, $direccion, $telefono);
header("Location: /Taller/vistas/clientes/clientes.php");
