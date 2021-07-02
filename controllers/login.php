<?php
class LoginController
{
    public function __construct()
    {
        require_once "site-media/views/login.php";
    }
    public function error()
    {
        print("<div class=\"alert alert-danger\" role=\"alert\"> Credenciales incorectas.<br /> </div>");
    }
    public function cerrarSesion(){
        Conexion::cerrarConexion();
        echo 'exito';
    }
}
?>