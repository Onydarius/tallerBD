<?php
      $rootPath = $_SERVER['DOCUMENT_ROOT'].'/Taller';
      include_once($rootPath.'/controllers/connection/conexion.php');
      include_once($rootPath.'/controllers/mecanicos/Mecanico.php');
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
<div class=" d-md-flex justify-content-md-end">
  <button type="button" class="btn btn-dark " onclick="window.location = '/Taller/vistas/mecanicos/altaMecanico.php'">Añadir mecanico</button>
</div>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">rfc</th>
          <th scope="col">Direccion</th>
          <th scope="col">Telefono</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php Mecanico::fillMecanicos($conexion); ?>
      </tbody>
    </table>
  </div>

</body>

</html>