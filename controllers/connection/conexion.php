<?php
	class Conexion{
		private static $conexion;
		
		public static function abrirConexion(){
			$rootPath = $_SERVER['DOCUMENT_ROOT'].'/Taller';
			if(!isset(self::$conexion)){//si aun no hay conexion
				try{//intenta
					include_once($rootPath.'/controllers/connection/config.php');
					//incluimos el archivo para poder utilizarlo
					//self::$conexion = new PDO('pgsql:host='.servidor.';dbname='.bd,usuario,password);//PDO conexion con postgres
					self::$conexion = new PDO('pgsql:host='.servidor.';port='.puerto.';dbname='.bd,usuario,password);//PDO conexion con postgres
					self::$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//en caso de no recibir bien los parámetros
					self::$conexion->exec("SET NAMES 'UTF8'");//respetar caracteres como ñ y acentos de la BD
				}catch(PDOException $e){
					print "ERROR: ".$e->getMessage()."<br />";//imprimir mensaje de error
				}
			}	
		}	

		public static function cerrarConexion(){
				if(isset(self::$conexion))//si hay conexion
					self::$conexion=null;//anulamos la conexion					
		}

		public static function getConexion(){				
				if(isset(self::$conexion))
					print("Conxión establecida");
				else
					print("");
				return self::$conexion;//retornamos el valor de conexion
		}			
	}
