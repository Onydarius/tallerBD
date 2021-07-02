<?php
class Clientes_model
{
    private $db;
    private $clientes;

    public function __construct()
    {
        include_once 'config/conexion.php';
        $this->db = Conexion::getConexion();
        $this->clientes = array();
    }

    public function getClientes()
    {
        $sql = $this->db->prepare("select concat(nombre || ' ' || ape_pat || ' ' || ape_mat ) as nombre, id_cliente from cliente");
        $sql->execute();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $this->clientes[] = $row;
        }
        return $this->clientes;
    }

    public function fillClientes()
    {
            $sql = $this->db->prepare("select * from cliente");
            $sql->execute();
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $this->clientes[] = $row;
            }
            return $this->clientes;	
    }
    public function insertar($nombre, $ape_pat, $ape_mat, $mail , $direccion,$telefono)
    {
        $sql =  $this->db->prepare("INSERT INTO cliente VALUES (nextval('cliente_seq'),'" . $nombre . "', '" . $ape_pat . "','" . $ape_mat  . "', '" . $mail .  "','"  . $direccion . "',"  . $telefono . ")");
        $sql->execute();
    }

    public function eliminar($id_cliente)
	{
		$sql = $this->db->prepare("delete from cliente WHERE id_cliente='" . $id_cliente."'");
		$sql->execute();
	}

    public function getCliente($id_cliente)
	{
		$sql =  $this->db->prepare("select * from cliente where id_cliente = '". $id_cliente."' LIMIT 1");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $row;
	}

    public function modificar($nombre, $ape_pat, $ape_mat, $email, $direccion, $telefono, $id_cliente)
    {
        $sql =  $this->db->prepare("UPDATE cliente SET nombre='" . $nombre . "', ape_pat='" . $ape_pat . "', ape_mat='" . $ape_mat . "', mail='" . $email . "', direccion='" . $direccion . "', telefono=" . $telefono . " WHERE id_cliente='" . $id_cliente . "' ");
        $sql->execute();
    }
}
?>