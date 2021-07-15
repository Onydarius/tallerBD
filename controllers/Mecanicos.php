<?php
class MecanicosController
{
    public function __construct()
    {
        require_once "models/MecanicoModel.php";
    }
    public function index()
    {
        $mecanicos = new Mecanicos_model();
        $data["titulo"] = "Mecanicos";
        $data["mecanicos"] = $mecanicos->fillMecanicos();
        require_once "site-media/views/menu.php";
        require_once "site-media/views/Mecanicos/mecanicos.php";
    }


    public function agregarView()
    {
        $data["titulo"] = "Añadir mecanico";
        require_once "site-media/views/mecanicos/mecanicos_nuevo.php";
    }
    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $ape_pat = $_POST['ape_pat'];
        $ape_mat = $_POST['ape_mat'];
        $rfc = $_POST['rfc'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        $mecanicos = new Mecanicos_model();
        $mecanicos->insertar($nombre, $ape_pat, $ape_mat, $rfc , $direccion,$telefono);
        $this->index();
    }

    public function eliminar($id_mecanico)
    {   
        $mecanicos = new Mecanicos_model();
        $mecanicos->eliminar($id_mecanico);
        $this->index();
    }

    public function modificarView($id_mecanico)
    {
        $mecanicos = new Mecanicos_model();
        $data["id_mecanico"] = $id_mecanico;
        $data["mecanicos"] = $mecanicos->getMecanico($id_mecanico);
        $data["titulo"] = "Modificar mecanico";
        require_once "site-media/views/mecanicos/mecanicos_modificar.php";
    }

    public function actualizar()
    {
        $id_mecanico = $_POST['id_mecanico'];
        $nombre = $_POST['nombre'];
        $ape_pat = $_POST['ape_pat'];
        $ape_mat = $_POST['ape_mat'];
        $rfc = $_POST['rfc'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        $clientes = new Mecanicos_model();
        $clientes->modificar($nombre, $ape_pat, $ape_mat, $rfc, $direccion, $telefono, $id_mecanico);
        $this->index();
    }
    public function getClientes(){
        $clientes = new Clientes_model();
        $resultado = $clientes->getClientes();
        return $resultado;
    }
}
