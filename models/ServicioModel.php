<?php
class Servicios_model
{
    private $db;
    private $servicios;

    public function __construct()
    {
        include_once 'config/conexion.php';
        $this->db = Conexion::getConexion();
        $this->servicios = array();
    }
    public function fillServicios()
    {
        $sql = $this->db->prepare("select * from servicios");
        $sql->execute();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $this->clientes[] = $row;
        }
        return $this->clientes;     //fin ciclo	
    }

    public function insertar($nombre, $descripcion, $precios)
    {
        $sql =  $this->db->prepare("INSERT INTO servicios VALUES (nextval('servicios_seq'),'" . $nombre . "', '" . $descripcion . "','" . $precios  . "')");
        $sql->execute();
    }

    public function eliminar($id_servicios)
	{
		$sql = $this->db->prepare("delete from servicios WHERE id_servicios='" . $id_servicios."'");
		$sql->execute();
	}

    public function getServicio($id_servicios)
	{
		$sql =  $this->db->prepare("select * from servicios where id_servicios = '". $id_servicios."' LIMIT 1");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $row;
	}


    public function modificar($id_servicios, $nombre, $descripcion, $precios)
    {
        $sql =  $this->db->prepare("UPDATE servicios SET nombre= '" . $nombre . "', descripcion= '" . $descripcion . "', precios= " . $precios . " WHERE id_servicios= " . $id_servicios);
        $sql->execute();
    }
    public function getServicios()
    {
        $sql = $this->db->prepare("select nombre, id_servicios from servicios");
        $sql->execute();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $this->clientes[] = $row;
        }
        return $this->clientes;
    }
}
?>