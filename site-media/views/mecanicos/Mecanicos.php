<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $data["titulo"] ?></title>
  <script src="site-media/js/deletePromp.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
  <div class=" d-md-flex justify-content-md-end">
    <?php if (!($_SESSION['user'] == "empleado")) echo '
    <button type="button" class="btn btn-dark " onclick="window.location = \'index.php?c=mecanicos&a=agregarView\'">Añadir mecanico</button>' ?>
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
        <?php foreach ($data["mecanicos"] as $mecanico) {
          echo "<tr>";
          echo "<td>" . $mecanico["nombre"] . " " . $mecanico["ape_pat"] . " " . $mecanico["ape_mat"] . "</td>";
          echo "<td>" . $mecanico["rfc"] . "</td>";
          echo "<td>" . $mecanico["direccion"] . "</td>";
          echo "<td>" . $mecanico["telefono"] . "</td>";

          if (!($_SESSION['user'] == "empleado")) {
            echo "<td><a href='index.php?c=mecanicos&a=modificarView&id=  " . $mecanico["id_mecanico"] . "' class='btn btn-warning'>Modificar</a>";
            if (!($_SESSION['user'] == "gerente")) {
              echo "<a onclick=\"deleteRegister('mecanicos','" . $mecanico["id_mecanico"] . "');return false;\"' class='btn btn-danger'>Eliminar</a></td>";
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