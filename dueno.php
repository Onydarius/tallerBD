<?php
$matricula = $_POST['matricula'];
require_once "controllers/Vehiculos.php";
$vehiculos = new VehiculosController();
$data["vehiculos"] = $vehiculos->getOwner($matricula);
echo $data["vehiculos"]["nombre"];
?>