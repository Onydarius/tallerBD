<?php
$matricula = $_GET["matricula"];
$marca = $_GET["marca"];
$modelo = $_GET["modelo"];
$color = $_GET["color"];
$id_cliente = $_GET["id_cliente"];
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
	<div class="container">
		<form action="/Taller/controllers/vehicles/actualizarAuto.php" method="post">
			<table>
				<tr>
					<td>Matricula</td>
					<td><input type="text" id ="matricula" name="matricula" value="<?php print $matricula; ?>" readonly></td>
				</tr>
				<tr>
					<td>Marca</td>
					<td><input type="text" id ="marca" name="marca" value="<?php print $marca; ?>"></td>
				</tr>
				<tr>
					<td>Modelo</td>
					<td><input type="text" id ="modelo"name="modelo" value="<?php print $modelo; ?>"></td>
				</tr>
				<tr>
					<td>Color</td>
					<td><input type="text" id ="color" name="color" value="<?php print $color; ?>"></td>
				</tr>
				<tr>
					<td>Dueño</td>
					<td>
						<select class="form-select form-select-sm"  name ="id_cliente" aria-label=".form-select-sm example"> 
							<?php
							$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Taller';
							include_once($rootPath . '/controllers/clients/Cliente.php');
							print Cliente::allClientes($conexion, $id_cliente);
							?>

						</select>
					</td>
				</tr>

			</table>
			<input type="submit" value="Guardar">
			<input type="button" value="Cancelar" onclick="window.location = '/Taller/vistas/vehiculos/vehiculos.php'">
		</form>
	</div>
</body>

</html>