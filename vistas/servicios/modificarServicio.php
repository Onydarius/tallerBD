<?php
$id_servicios = $_GET["id_servicios"];
$nombre = $_GET["nombre"];
$descripcion = $_GET["descripcion"];
$precios = $_GET["precios"];

$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Taller';
include_once($rootPath . '/controllers/connection/conexion.php');
Conexion::abrirConexion();
$conexion = Conexion::getConexion();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!--Para que reconozca caracteres especiales-->
    <title>Registrar Auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <?php print $descripcion; ?>
    <div class="container shadow rounded border">
        <form class="row g-3" action="/Taller/controllers/servicios/modificarServicio.php" method="post">
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php print $nombre; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" rows="3"><?php print $descripcion; ?></textarea>
            </div>
            <div class="col-md-4">
                <label for="validationDefault05" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precios" value= "<?php print $precios; ?>"  required>
            </div>
            <div class="col-12">
                <button class="btn btn-dark " type="submit">modificar servicio</button>
                <input class="btn btn-dark " type="button" value="Cancelar" onclick="window.location = '/Taller/vistas/servicios/Servicios.php'">
                <input type="hidden"  name="id_servicios"  value="<?php print $id_servicios; ?>">
            </div>

        </form>
    </div>
</body>

</html>