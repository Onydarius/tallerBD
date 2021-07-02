<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $data['titulo']?></title>
  <script src="site-media/js/deletePromp.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
  <div class=" d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-dark " onclick="window.location = 'index.php?c=notas&a=agregarView'">Crear nota</button>
  </div>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Folio</th>
          <th scope="col">Vehiculo</th>
          <th scope="col">Dueño</th>
          <th scope="col">Total</th>
          <th scope="colgroup">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data["notas"] as $nota) {
          echo "<tr>";
          echo "<td>" . $nota["id_nota"] . "</td>";
          echo "<td>" . $nota["id_vehiculo"] . "</td>";
          


          echo "<td>" . $nota["nombre"] ." ". $nota["ape_pat"]." ". $nota["ape_mat"]."</td>";
          echo "<td>" . $nota["total"] . "</td>";

          if (!($_SESSION['user'] == "empleado")) {
            if(isset($nota["fec_salida"])){
              echo "<td><a href='index.php?c=notas&a=modificarView&id=  " . $nota["id_nota"] . "' class='btn btn-info'>Info</a></td>";
            }else{
              echo "<td><a href='index.php?c=notas&a=modificarView&id=  " . $nota["id_nota"] . "' class='btn btn-warning'>Modificar</a></td>";
            }
            if (!($_SESSION['user'] == "gerente")) {
              echo "<td><a onclick=\"deleteRegister('notas','" . $nota["id_nota"] . "');return false;\"' class='btn btn-danger'>Eliminar</a></td>";
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