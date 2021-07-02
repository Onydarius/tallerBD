<?php
	
	function cargarControlador($controlador){
		
		$nombreControlador = ucwords(strtolower($controlador))."Controller";
		$archivoControlador = 'controllers/'.ucwords(strtolower($controlador)).'.php';
		
		if(!is_file($archivoControlador)){
			$archivoControlador= 'controllers/Vehiculos.php';
		}
		require_once $archivoControlador;
		$control = new $nombreControlador();
		return $control;
	}
	
	function cargarAccion($controller, $accion, $id = null){
		if(isset($accion) && method_exists($controller, $accion)){
			if($id == null){
				$controller->$accion();
				} else {
				$controller->$accion($id);
			}
			} else {
				
				$controller->Index();
		}	
	}
?>