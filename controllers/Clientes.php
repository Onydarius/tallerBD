<?php
class ClientesController
{
    public function __construct()
    {
        require_once "models/ClienteModel.php";
    }
    public function index()
    {
        $clientes = new Clientes_model();
        $data["titulo"] = "Clientes";
        $data["clientes"] = $clientes->fillClientes();
        require_once "site-media/views/Clientes/clientes.php";
    }


    public function agregarView()
    {
        $data["titulo"] = "Añadir cliente";
        $data["clientes"] = $this->getClientes();
        require_once "site-media/views/clientes/clientes_nuevo.php";
    }
    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $ape_pat = $_POST['ape_pat'];
        $ape_mat = $_POST['ape_mat'];
        $mail = $_POST['mail'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        $clientes = new Clientes_model();
        $clientes->insertar($nombre, $ape_pat, $ape_mat, $mail , $direccion,$telefono);
        $this->index();
    }

    public function eliminar($id_cliente)
    {   
        $clientes = new Clientes_model();
        $clientes->eliminar($id_cliente);
        $this->index();
    }

    public function modificarView($id_cliente)
    {
        $clientes = new Clientes_model();
        $data["id_cliente"] = $id_cliente;
        $data["cliente"] = $clientes->getCliente($id_cliente);
        $data["titulo"] = "Modificar cliente";
        require_once "site-media/views/clientes/cliente_modificar.php";
    }

    public function actualizar()
    {
        $id_cliente = $_POST['id_cliente'];
        $nombre = $_POST['nombre'];
        $ape_pat = $_POST['ape_pat'];
        $ape_mat = $_POST['ape_mat'];
        $mail = $_POST['mail'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        $clientes = new Clientes_model();
        $clientes->modificar($nombre, $ape_pat, $ape_mat, $mail, $direccion, $telefono, $id_cliente);
        $this->index();
    }
    public function getClientes(){
        $clientes = new Clientes_model();
        $resultado = $clientes->getClientes();
        return $resultado;
    }
}
