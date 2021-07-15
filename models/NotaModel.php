<?php

class Notas_Model
{
    public function __construct()
    {
        include_once 'config/conexion.php';
        $this->db = Conexion::getConexion();
        $this->notas = array();
    }
    public function fillNotas()
    {
        $sql = $this->db->prepare("select nota.id_nota, nota.total, nota.id_vehiculo, nota.fec_salida, cliente.nombre, cliente.ape_pat, cliente.ape_mat
        from nota,
            vehiculo,
            cliente
        where
        nota.id_vehiculo = vehiculo.matricula and
        vehiculo.id_cliente = cliente.id_cliente");
        $sql->execute();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $this->notas[] = $row;
        }
        return $this->notas;
    }
    public function getFolio()
    {
        $sql =  $this->db->prepare("select nextval('nota_seq')");
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function insertar($id_nota, $fec_entrada, $id_vehiculo, $id_mecanico)
    {
        $sql =  $this->db->prepare("INSERT INTO nota(id_nota, fec_entrada, id_vehiculo,id_mecanico, total) VALUES (".$id_nota.",'".$fec_entrada."', '" . $id_vehiculo . "'," . $id_mecanico .", 0)");
        $sql->execute();
    }
    public function agregarServicios($id_servico, $id_nota)
    {
        $sql =  $this->db->prepare("INSERT INTO notaxservicio VALUES 
        (".$id_nota.",".$id_servico.")");
        $sql->execute();
    }
    public function getServicios($id_nota){
        $sql = $this->db->prepare("select id_servicio from notaxservicio where id_nota = ".$id_nota);
        $sql->execute();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $this->notas[] = $row;
        }
        return $this->notas;
    }
    public function eliminar($id_nota)
	{
		$sql = $this->db->prepare("delete from nota WHERE id_nota   ='" . $id_nota."'");
		$sql->execute();
	}
    public function getNota($id_nota)
	{
		$sql =  $this->db->prepare("select * from nota where id_nota = '". $id_nota."' LIMIT 1");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
    public function modificar($id_nota, $id_mecanico)
    {
        $sql = $this->db->prepare("UPDATE nota SET id_mecanico= " . $id_mecanico . " WHERE id_nota='" . $id_nota . "' ");
        $sql->execute();
    }

    public function deleteNotaxServicio($id_nota){
        $sql = $this->db->prepare("delete from notaxservicio WHERE id_nota   ='" . $id_nota."'");
		$sql->execute();
    }
}
