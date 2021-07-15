<?php
class ServiciosController
{
    public function __construct()
    {
        require_once "models/ServicioModel.php";   
    }
    public function index()
    {
        $servicios = new Servicios_model();
        $data["titulo"] = "Servicios";
        $data["Servicios"] = $servicios->fillServicios();
        require_once "site-media/views/menu.php";
        require_once "site-media/views/servicios/servicios.php";
    }
    public function agregarView()
    {
        $data["titulo"] = "Añadir servicio";
        require_once "site-media/views/servicios/servicios_nuevo.php";
    }
    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precios = $_POST['precios'];

        $servicios = new Servicios_model();
        $servicios->insertar($nombre, $descripcion, $precios);
        $this->index();
    }

    public function eliminar($id_servicios)
    {   
        $servicios = new Servicios_model();
        $servicios->eliminar($id_servicios);
        $this->index();
    }

    public function modificarView($id_servicios)
    {
        $servicios = new Servicios_model();
        $data["id_servicios"] = $id_servicios;
        $data["servicio"] = $servicios->getServicio($id_servicios);
        $data["titulo"] = "Modificar servicio";
        require_once "site-media/views/servicios/servicios_modifica.php";
    }

    public function actualizar()
    {

        $id_servicios = $_POST['id_servicios'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precios = $_POST['precios'];

        $servicios = new Servicios_model();
        $servicios->modificar($id_servicios, $nombre, $descripcion, $precios);
        $this->index();
    }
    public function getClientes(){
        $clientes = new Clientes_model();
        $resultado = $clientes->getClientes();
        return $resultado;
    }
}
