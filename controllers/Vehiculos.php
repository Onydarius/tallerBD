<?php
class VehiculosController
{
    public function __construct()
    {
        require_once "models/VehiculoModel.php";
        require_once "models/ClienteModel.php";    
    }
    public function index()
    {
        $vehiculos = new Vehiculos_model();
        $data["titulo"] = "Vehiculos";
        $data["vehiculos"] = $vehiculos->fillVehiculos();
        require_once "site-media/views/menu.php";
        require_once "site-media/views/vehiculos/vehiculos.php";
    }


    public function agregarView()
    {
        $data["titulo"] = "Añadir vehiculo";
        $data["clientes"] = $this->getClientes();
        require_once "site-media/views/vehiculos/vehiculos_nuevo.php";
    }
    public function insertar()
    {
        $matricula = $_POST['matricula'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $color = $_POST['color'];
        $id_cliente = $_POST['id_cliente'];

        $vehiculos = new Vehiculos_model();
        $vehiculos->insertar($matricula, $marca, $modelo, $color, $id_cliente);
        $this->index();
    }

    public function eliminar($matricula)
    {   
        $vehiculos = new Vehiculos_model();
        $vehiculos->eliminar($matricula);
        $this->index();
    }

    public function modificarView($matricula)
    {
        $vehiculos = new Vehiculos_model();
        $data["matricula"] = $matricula;
        $data["vehiculos"] = $vehiculos->getVehiculo($matricula);
        $data["clientes"] = $this->getClientes();
        $data["titulo"] = "Modificar vehiculos";
        require_once "site-media/views/vehiculos/vehiculos_modifica.php";
    }

    public function actualizar()
    {

        $id = $_POST['id'];
        $placa = $_POST['placa'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        $color = $_POST['color'];

        $vehiculos = new Vehiculos_model();
        $vehiculos->modificar($id, $placa, $marca, $modelo, $anio, $color);
        $data["titulo"] = "Vehiculos";
        $this->index();
    }
    public function getClientes(){
        $clientes = new Clientes_model();
        $resultado = $clientes->getClientes();
        return $resultado;
    }
    public function getOwner($matricula){
        $vehiculos = new Vehiculos_model();
        $resultado = $vehiculos->getCliente($matricula);
        return $resultado;
    }
}
