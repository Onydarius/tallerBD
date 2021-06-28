<?php
	class Conexion{
		private static $conexion;
		
		public static function abrirConexion(){
			if(!isset(self::$conexion)){//si aun no hay conexion
				try{//intenta
					//self::$conexion = new PDO('pgsql:host='.servidor.';dbname='.bd,usuario,password);//PDO conexion con postgres
					self::$conexion = new PDO('pgsql:host=localhost;port=5432;dbname=taller',$_SESSION['user'],$_SESSION['password']);//PDO conexion con postgres
					self::$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//en caso de no recibir bien los parámetros
					self::$conexion->exec("SET NAMES 'UTF8'");//respetar caracteres como ñ y acentos de la BD
				}catch(PDOException $e){
					header("Location: /Taller/vistas/login.php?message=".$e->getMessage());
				}
			}	
		}	

		public static function cerrarConexion(){
				if(isset(self::$conexion))//si hay conexion
					self::$conexion=null;//anulamos la conexion					
		}

		public static function getConexion(){				
				return self::$conexion;
		}			
	}
