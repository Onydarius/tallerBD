
<?php
	class Conexion{
		
		private static $conexion;
		
		public static function abrirConexion(){
			session_start();
			if(!isset(self::$conexion)){
				try{
					self::$conexion = new PDO('pgsql:host=localhost;port=5432;dbname=taller',$_SESSION['user'],$_SESSION['password']);
					self::$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//en caso de no recibir bien los parámetros
					self::$conexion->exec("SET NAMES 'UTF8'");
				}catch(PDOException $e){
				}
			}
		}	

		public static function cerrarConexion(){
				if(isset(self::$conexion))//si hay conexion
					self::$conexion=null;//anulamos la conexion
				if(isset($_SESSION['user']))
					session_destroy();					
		}

		public static function getConexion(){				
				return self::$conexion;
		}
		
		public static function login(){
			if(!isset(self::$conexion)){
				try{
					self::$conexion = new PDO('pgsql:host=localhost;port=5432;dbname=taller',$_SESSION['user'],$_SESSION['password']);
					self::$conexion->exec("SET NAMES 'UTF8'");
					$code = 1;
				}catch(PDOException $e){
					$code = 0;
				}
			}
			return 	$code;
		}
	}
