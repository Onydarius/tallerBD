<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<!--Para que reconozca caracteres especiales-->
	<title>Registrar Auto</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
<div class="container shadow rounded border">
        <form class="row g-3" action="index.php?c=mecanicos&a=actualizar" method="post">
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $data["mecanicos"]["nombre"]?>" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Apellido paterno</label>
                <input type="text" class="form-control" name="ape_pat" value="<?php echo $data["mecanicos"]["ape_pat"]?>" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Apellido materno</label>
                <input type="text" class="form-control" name="ape_mat" value="<?php echo $data["mecanicos"]["ape_mat"]?>" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault03" class="form-label">rfc</label>
                <input type="text" class="form-control" name="rfc" value="<?php echo $data["mecanicos"]["rfc"]?>" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault04" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo $data["mecanicos"]["direccion"]?>" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault05" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono"  value="<?php echo $data["mecanicos"]["telefono"]?>"required>
				<input type="hidden"  name="id_mecanico"  value="<?php echo $data["mecanicos"]["id_mecanico"]?>">
            </div>
            <div class="col-12">
                <button class="btn btn-dark " type="submit">Modificar mecanico</button>
                <input class="btn btn-dark " type="button" value="Cancelar" onclick="window.location = 'index.php?c=mecanicos'">
            </div>
        </form>
    </div>
</body>

</html>