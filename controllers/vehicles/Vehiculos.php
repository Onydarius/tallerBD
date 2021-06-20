<?php
use Vehiculos as GlobalVehiculos;

class Vehiculos
{
	public static function listarAutos($conexion)
	{
		try {
			$sql = "select * from vehiculo";
			foreach ($conexion->query($sql) as $row) { ?>
				<tr>
					<td><?php print $row['matricula']; ?></td>
					<!--Nombres tal como aparecen en la BD-->
					<td><?php print $row['marca']; ?></td>
					<td><?php print $row['modelo']; ?></td>
					<td><?php print $row['color']; ?></td>
					<td><?php
						$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Taller';
						include_once($rootPath . '/controllers/clients/Cliente.php');
						print Cliente::getCliente($conexion, $row['id_cliente']); ?></td>
					<?php print("<td><a href=\".\modificarAuto.php?matricula=" . $row['matricula'] . "&&marca=" . $row['marca'] . "&&modelo=" . $row['modelo'] . "&&color=" . $row['color'] . "&&id_cliente=" . $row['id_cliente'] . "\">Modificar</a></td>"); ?>
				</tr>
			<?php
			} //fin ciclo				
		} catch (Exception $e) {
			print "ERROR: " . $e->getMessage() . "<br />";
		} //fin catch		
	} //fin listarAutos()

	public static function insertarAuto($conexion, $matricula, $marca, $modelo, $color, $id_cliente)
	{
		$sql =  $conexion->prepare("INSERT INTO vehiculo VALUES ('" . $matricula . "', '" . $marca . "','" . $modelo  . "', '" . $color .  "',"  . $id_cliente . ")");
		$sql->execute();
	}

	public static function getDueño($conexion, $matricula)
	{
		$sql = "select id_cliente from cliente where id_cliente = (select id_cliente from vehiculo where matricula = '" . $matricula . "')";
		foreach ($conexion->query($sql) as $row) {
			return $row['id_cliente'];
		} 
	}

	public static function actualizarAuto($conexion, $matricula, $marca, $modelo, $color, $id_cliente)
	{
		$sql =  $conexion->prepare("UPDATE vehiculo SET marca='" . $marca . "', modelo='" . $modelo . "', color='" . $color . "', id_cliente=" . $id_cliente . " WHERE matricula='" . $matricula . "' ");
		$sql->execute();
	}
} //fin Clase
?>