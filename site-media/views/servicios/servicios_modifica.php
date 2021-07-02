<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["titulo"]?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<div id="mod-servicio" class="container shadow rounded border">
    <?php
    ?>
    <form class="row g-3" action="index.php?c=servicios&a=actualizar" method="post">
      <div class="col-md-4">
        <label for="validationDefault01" class="form-label">Nombre</label>
        <input id=nombre type="text" class="form-control" name="nombre" value="<?php echo $data["servicio"]["nombre"]?>" required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" rows="3"><?php echo $data["servicio"]["descripcion"]?></textarea>
      </div>
      <div class="col-md-4">
        <label for="validationDefault05" class="form-label">Precio</label>
        <input id="precio" type="number" class="form-control" name="precios" value="<?php echo $data["servicio"]["precios"]?>" required>
      </div>
      <div class="col-12">
        <button class="btn btn-dark " type="submit">modificar servicio</button>
        <input class="btn btn-dark " type="button" value="Cancelar" onclick="window.location = 'index.php?c=servicios'">
        <input type="hidden" name="id_servicios" value="<?php echo $data["servicio"]["id_servicios"]?>">
      </div>

    </form>
  </div>
 
 
    
    
</body>
</html>