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
        require_once "site-media/views/menu.php";
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
        $notas = new Notas_model();
        $notas->insertar($id_nota, $fec_entrada, $id_vehiculo, $id_mecanico );
        
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

    public function infoView($id_nota)
    {
        $notas = new Notas_model();
        $data["id_nota"] = $id_nota;
        $data["nota"] = $notas->getNota($id_nota);
        $data["titulo"] = "Modificar nota";
        $data["servicios"] = $this->getServicios();
        $data["mecanico"] = $this->getMecanico($data["nota"]["id_mecanico"]);
        $serv["Aservicios"] = $notas->getServicios($id_nota);
        require_once "site-media/views/notas/nota_info.php";
    }
    public function modificarView($id_nota)
    {
        $notas = new Notas_model();
        $data["id_nota"] = $id_nota;
        $data["nota"] = $notas->getNota($id_nota);
        $data["titulo"] = "Modificar nota";
        $data["servicios"] = $this->getServicios();
        $data["mecanicos"] = $this->getMecanicos();
        $serv["Aservicios"] = $notas->getServicios($id_nota);
        require_once "site-media/views/notas/nota_modificar.php";
    }

    public function actualizar()
    {
        $id_nota = $_POST['id_nota'];
        $id_mecanico = $_POST['id_mecanico'];
        $servicios =$_POST['servicios'];
        
        $notas = new Notas_model();
        $notas->modificar($id_nota, $id_mecanico);

        $notas->deleteNotaxServicio($id_nota);
        foreach ($servicios as $servicio){
            $notas->agregarServicios($servicio,$id_nota);
        }



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
