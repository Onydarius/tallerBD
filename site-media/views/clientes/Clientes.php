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
    <?php if (!($_SESSION['user'] == "empleado")) echo'
    <button type="button" class="btn btn-dark " onclick="window.location = \'index.php?c=clientes&a=agregarView\'">Añadir cliente</button>'?>
  </div>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">E-Mail</th>
          <th scope="col">Direccion</th>
          <th scope="col">Telefono</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data["clientes"] as $cliente) {
          echo "<tr>";
          echo "<td>" . $cliente["nombre"] . " " . $cliente["ape_pat"] . " " . $cliente["ape_mat"] . "</td>";
          echo "<td>" . $cliente["mail"] . "</td>";
          echo "<td>" . $cliente["direccion"] . "</td>";
          echo "<td>" . $cliente["telefono"] . "</td>";

          if (!($_SESSION['user'] == "empleado")) {
            echo "<td><a href='index.php?c=clientes&a=modificarView&id=  " . $cliente["id_cliente"] . "' class='btn btn-warning'>Modificar</a>";
            if (!($_SESSION['user'] == "gerente")) {
              echo "<a onclick=\"deleteRegister('clientes','" . $cliente["id_cliente"] . "');return false;\"' class='btn btn-danger'>Eliminar</a></td>";
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