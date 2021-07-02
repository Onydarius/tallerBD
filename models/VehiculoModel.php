<?php
class Vehiculos_model
{
	private $db;
	private $vehiculos;

	public function __construct()
	{
		include_once 'config/conexion.php';
		$this->db = Conexion::getConexion();
		$this->vehiculos = array();
		$this->clientes = array();
	}

	public function fillVehiculos()
	{
		try {
			$sql = $this->db->prepare("select vehiculo.matricula, vehiculo.marca, vehiculo.modelo, vehiculo.color,
			concat(cliente.nombre || ' ' || cliente.ape_pat || ' ' || cliente.ape_mat ) as nombre
			from
				cliente,
				vehiculo
			where vehiculo.id_cliente = cliente.id_cliente");
			$sql->execute();
			while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
				$this->vehiculos[] = $row;
			}
			return $this->vehiculos;
		} catch (Exception $e) {
			print "ERROR: " . $e->getMessage() . "<br />";
		}
	}
	
	public function getVehiculos()
	{
		$sql =  $this->db->prepare("select matricula from vehiculo");
		$sql->execute();
		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
			$this->vehiculos[] = $row;
		}
		return $this->vehiculos;
	}

	public function insertar($matricula, $marca, $modelo, $color, $id_cliente)
	{
		$sql =  $this->db->prepare("INSERT INTO vehiculo VALUES ('" . $matricula . "', '" . $marca . "','" . $modelo  . "', '" . $color .  "',"  . $id_cliente . ")");
		$sql->execute();
	}

	public function getVehiculo($matricula)
	{
		$sql =  $this->db->prepare("select * from vehiculo where matricula = '". $matricula. "' LIMIT 1");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $row;
	}

	public function modificar($matricula, $marca, $modelo, $color, $id_cliente)
	{
		$sql = $this->db->prepare("UPDATE vehiculo SET marca='" . $marca . "', modelo='" . $modelo . "', color='" . $color . "', id_cliente=" . $id_cliente . " WHERE matricula='" . $matricula . "' ");
		$sql->execute();
	}
	public function eliminar($matricula)
	{
		$sql = $this->db->prepare("delete from vehiculo WHERE matricula='" . $matricula."'");
		$sql->execute();
	}
	public function getCliente($matricula)
	{
		include_once 'config/conexion.php';
		Conexion::abrirConexion();
		$this->db = Conexion::getConexion();
		$sql =  $this->db->prepare("select concat(cliente.nombre || ' ' || cliente.ape_pat || ' ' || cliente.ape_mat ) as nombre
		from
			cliente,
			vehiculo
		where vehiculo.id_cliente = cliente.id_cliente and
		vehiculo.matricula = '".$matricula."'");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
} //fin Clase
