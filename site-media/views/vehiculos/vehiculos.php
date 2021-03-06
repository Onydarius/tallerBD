<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $data["titulo"]; ?></title>
  <script src="site-media/js/deletePromp.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
  <div class=" d-md-flex justify-content-md-end">
    <?php
    if (!($_SESSION['user'] == "empleado"))
      print("<button type=\"button\" class=\"btn btn-dark \" onclick=\"window.location = 'index.php?c=vehiculos&a=agregarView'\">Agregar vehiculo</button>");
    ?>

  </div>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Matricula</th>
          <th scope="col">Marca</th>
          <th scope="col">Modelo</th>
          <th scope="col">Color</th>
          <th scope="col">Dueño</th>
          <th scope="col">Opciones</th>
          <?php
          if (!$_SESSION['user'] == "empleado") {
            echo "<th colspan=\"2\">Opciones</th>";
          }
          ?>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($data["vehiculos"] as $dato) {
          echo "<tr>";
          echo "<td>" . $dato["matricula"] . "</td>";
          echo "<td>" . $dato["marca"] . "</td>";
          echo "<td>" . $dato["modelo"] . "</td>";
          echo "<td>" . $dato["color"] . "</td>";
          echo "<td>" . $dato["nombre"] . "</td>";

          if (!($_SESSION['user'] == "empleado")) {
            echo "<td><a href='index.php?c=vehiculos&a=modificarView&id=" . $dato["matricula"] . "' class='btn btn-warning'>Modificar</a>";
            if(!($_SESSION['user'] == "gerente")){
              echo "<a onclick=\"deleteRegister('Vehiculos','".$dato["matricula"]."');return false;\"' class='btn btn-danger'>Eliminar</a></td>";
            }
          }
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>