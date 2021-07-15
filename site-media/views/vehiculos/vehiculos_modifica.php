<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?php echo $data["titulo"]; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
	<div class="container shadow rounded border">
		<form action="/Taller/controllers/vehicles/actualizarAuto.php" method="post">
			<div class="col-md-4">
				<label for="validationDefault01" class="form-label">Matricula</label>
				<td><input type="validationDefault02" class="form-control" id="matricula" name="matricula" value="<?php echo $data["matricula"]; ?>" readonly></td>
			</div>
			<div class="col-md-4">
				<label for="validationDefault02" class="form-label">Marca</label>
				<input type="text" class="form-control" id="marca" name="marca" value="<?php echo $data["vehiculos"]["marca"];  ?>">
			</div>
			<div class="col-md-4">
				<label for="validationDefault02" class="form-label">Modelo</label>
				<input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $data["vehiculos"]["modelo"]; ?>">
			</div>
			<div class="col-md-4">
				<label for="validationDefault03" class="form-label">Color</label>
				<input type="text" class="form-control" id="color" name="color" value="<?php echo $data["vehiculos"]["color"]; ?>">
			</div>
			<div class="col-md-4">
				<label for="validationDefault04" class="form-label">Dueño</label>
				<td>
					<select class="form-select form-select-sm" name="id_cliente" aria-label=".form-select-sm example">
						<?php
						foreach ($data['clientes'] as $row) {
							if ($data["vehiculos"]["id_cliente"] == $row["id_cliente"]) {
								echo "<option selected value=" . $row["id_cliente"] . ">" . $row["nombre"] . "</option>";
							} else {
								echo "<option value=" . $row["id_cliente"] . ">" . $row["nombre"] . "</option>";
							}
						}
						?>

					</select>
				</td>
			</div>

			<div class="col-12">
				<button class="btn btn-dark " type="submit">Modificar vehiculo</button>
				<input class="btn btn-dark " type="button" value="Cancelar" onclick="window.location = 'index.php?c=vehiculos'">
			</div>
		</form>
	</div>
</body>

</html>