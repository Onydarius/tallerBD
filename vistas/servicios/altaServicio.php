<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Taller';
include_once($rootPath . '/controllers/connection/conexion.php');
Conexion::abrirConexion();
$conexion = Conexion::getConexion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container shadow rounded border">
        <form class="row g-3" action="/Taller/controllers/servicios/altaServicio.php" method="post">
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion"rows="3"></textarea>
            </div>
            <div class="col-md-4">
                <label for="validationDefault05" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precios" required>
            </div>
            <div class="col-12">
                <button class="btn btn-dark " type="submit">Añadir servicio</button>
                <input class="btn btn-dark " type="button" value="Cancelar" onclick="window.location = '/Taller/vistas/servicios/Servicios.php'">
            </div>
        </form>
    </div>

</body>

</html>