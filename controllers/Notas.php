<?php
class NotasController
{
    public function __construct()
    {
        require_once "models/NotaModel.php";
    }
    public function index()
    {
        $notas = new Notas_model();
        $data["titulo"] = "Notas";
        $data["notas"] = $notas->fillNotas();
        require_once "site-media/views/Notas/Notas.php";
    }


    public function agregarView()
    {
        $notas = new Notas_model();
        $data["titulo"] = "Crear nota";
        $data["id_nota"] =$notas->getFolio();
        $data["clientes"] = $this->getClientes();
        $data["vehiculos"] = $this->getVehiculos();
        $data["mecanicos"] = $this->getMecanicos();
        $data["servicios"] = $this->getServicios();
        require_once "site-media/views/notas/nota_nueva.php";
    }
    public function insertar()
    {
        $id_nota = $_POST['id_nota'];
        $fec_entrada = $_POST['fec_entrada'];
        $id_vehiculo = $_POST['id_vehiculo'];
        $id_mecanico = $_POST['id_mecanico'];
        $servicios =$_POST['servicios'];
        $fecha = explode("/", $fec_entrada);
        $notas = new Notas_model();
        $notas->insertar($id_nota, $fecha[0],$fecha[1],$fecha[2], $id_vehiculo, $id_mecanico );
        
        foreach ($servicios as $val) {
            $notas->agregarServicios($val,$id_nota);
       
        }
        $this->index();
    }

    public function eliminar($id_nota)
    {   
        $notas = new Notas_model();
        $notas->eliminar($id_nota);
        $this->index();
    }

    public function modificarView($id_nota)
    {
        $notas = new Notas_model();
        $data["id_nota"] = $id_nota;
        $data["nota"] = $notas->getNota($id_nota);
        $data["titulo"] = "Modificar nota";
        $data["servicios"] = $this->getServicios();
        $data["mecanico"] = $this->getMecanico($data["nota"]["id_mecanico"]);
        $serv["Aservicios"] = $notas->getServicios($id_nota);

        print_r($serv["Aservicios"]);
        print_r($data["servicios"][1]["id_servicios"]);
        require_once "site-media/views/notas/nota_modificar.php";
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
        require_once "models/ClienteModel.php";
        $clientes = new Clientes_model();
        $resultado = $clientes->getClientes();
        return $resultado;
    }
    public function getVehiculos(){
        require_once "models/VehiculoModel.php";
        $mecanico = new Vehiculos_model();
        $resultado = $mecanico->getVehiculos();
        return $resultado;
    }
    public function getMecanicos(){
        require_once "models/MecanicoModel.php";
        $vehiculos = new Mecanicos_model();
        $resultado = $vehiculos->getMecanicos();
        return $resultado;
    }
    public function getServicios()
    {
        require_once "models/ServicioModel.php";
        $vehiculos = new Servicios_model();
        $resultado = $vehiculos->getServicios();
        return $resultado;
    }
    public function getMecanico($id_mecanico){
        require_once "models/MecanicoModel.php";
        $mecanico = new Mecanicos_model();
        $resultado = $mecanico->getMecanico($id_mecanico);
        return $resultado;
    }
}
