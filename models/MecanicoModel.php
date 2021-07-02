<?php
class Mecanicos_model
{
    private $db;
    private $mecanico;

    public function __construct()
    {
        include_once 'config/conexion.php';
        $this->db = Conexion::getConexion();
        $this->mecanico = array();
    }

    public function fillMecanicos()
    {
        $sql = $this->db->prepare("select * from mecanico");
        $sql->execute();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $this->clientes[] = $row;
        }
        return $this->clientes;     //fin ciclo		
    }

    public function insertar($nombre, $ape_pat, $ape_mat, $rfc, $direccion, $telefono)
    {
        $sql =  $this->db->prepare("INSERT INTO mecanico VALUES (nextval('mecanico_seq'),'" . $nombre . "', '" . $ape_pat . "','" . $ape_mat  . "', '" . $rfc .  "','"  . $direccion . "',"  . $telefono . ")");
        $sql->execute();
    }

    public function eliminar($id_mecanico)
	{
		$sql = $this->db->prepare("delete from mecanico WHERE id_mecanico   ='" . $id_mecanico."'");
		$sql->execute();
	}
    public function getMecanico($id_mecanico)
	{
		$sql =  $this->db->prepare("select * from mecanico where id_mecanico = '". $id_mecanico."' LIMIT 1");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
    public function modificar($nombre, $ape_pat, $ape_mat, $rfc, $direccion, $telefono, $id_mecanico)
    {
        $sql = $this->db->prepare("UPDATE mecanico SET nombre='" . $nombre . "', ape_pat='" . $ape_pat . "', ape_mat='" . $ape_mat . "', rfc='" . $rfc . "', direccion='" . $direccion . "', telefono=" . $telefono . " WHERE id_mecanico='" . $id_mecanico . "' ");
        $sql->execute();
    }
    public function getMecanicos()
    {
        $sql = $this->db->prepare("select concat(nombre || ' ' || ape_pat || ' ' || ape_mat) as nombre, id_mecanico from mecanico");
            $sql->execute();
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $this->mecanico[] = $row;
            }
            return $this->mecanico;	
        
    }
}
