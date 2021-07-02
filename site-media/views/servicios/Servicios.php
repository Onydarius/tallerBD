<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $data["titulo"];?></title>
  <script src="site-media/js/deletePromp.js"></script>
  <link href="../css/servicios.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
  <?php
  if ($_SESSION['user'] !== "empleado") {
    print("
      <div class=\" d-md-flex justify-content-md-end\">
        <button id=\"botonAdd\" type=\"button\" class=\"btn btn-dark \" onclick=\"window.location = 'index.php?c=servicios&a=agregarView'\">Añadir servicio</button>
      </div>");
  }
  ?>
  <div id="principal" class="container ">
    <table class="table">
      <thead>
        <tr>
          <?php foreach ($data["Servicios"] as $servicio) {
            echo "<tr>";
            echo "<td>" . $servicio["nombre"] . "</td>";
            echo "<td>" . $servicio["descripcion"] . "</td>";
            echo "<td>" . $servicio["precios"] . "</td>";

            if (!($_SESSION['user'] == "empleado")) {
              echo "<td><a href='index.php?c=servicios&a=modificarView&id=  " . $servicio["id_servicios"] . "' class='btn btn-warning'>Modificar</a>";
              if (!($_SESSION['user'] == "gerente")) {
                echo "<a onclick=\"deleteRegister('Servicios','" . $servicio["id_servicios"] . "');return false;\"' class='btn btn-danger'>Eliminar</a></td>";
              }
            }
            echo "</tr>";
          }
          ?>
        </tr>
      </thead>
      <tbody>


      </tbody>
    </table>
  </div>




  <script src="../js/formManager.js"></script>
</body>

</html>