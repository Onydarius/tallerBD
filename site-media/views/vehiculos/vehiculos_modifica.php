<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?php echo $data["titulo"]; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<form action="/Taller/controllers/vehicles/actualizarAuto.php" method="post">
			<table>
				<tr>
					<td>Matricula</td>
					<td><input type="text" id="matricula" name="matricula" value="<?php echo $data["matricula"]; ?>" readonly></td>
				</tr>
				<tr>
					<td>Marca</td>
					<td><input type="text" id="marca" name="marca" value="<?php echo $data["vehiculos"]["marca"] ?>"></td>
				</tr>
				<tr>
					<td>Modelo</td>
					<td><input type="text" id="modelo" name="modelo" value="<?php print $data["vehiculos"]["modelo"]; ?>"></td>
				</tr>
				<tr>
					<td>Color</td>
					<td><input type="text" id="color" name="color" value="<?php print $data["vehiculos"]["color"]; ?>"></td>
				</tr>
				<tr>
					<td>Dueño</td>
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
				</tr>

			</table>
			<input type="submit" value="Guardar">
			<input type="button" value="Cancelar" onclick="window.location = 'index.php?c=vehiculos'">
		</form>
	</div>
</body>

</html>