<?php 

	$rootPath = $_SERVER['DOCUMENT_ROOT'].'/Taller';
	include_once($rootPath.'/controllers/connection/conexion.php');
	include_once($rootPath.'/controllers/vehicles/Vehiculos.php');
	  Conexion::abrirConexion();			
	  $conexion = Conexion::getConexion();

	Conexion::abrirConexion();
	$conexion = Conexion::getConexion();
	$matricula = $_POST["matricula"];
	$marca = $_POST["marca"];
	$modelo = $_POST["modelo"];
	$color = $_POST["color"];
    $id_cliente = $_POST["id_cliente"];

	Vehiculos::insertarAuto( $conexion, $matricula, $marca, $modelo, $color, $id_cliente );
	header("Location: /Taller/vistas/vehiculos/vehiculos.php");
 ?>