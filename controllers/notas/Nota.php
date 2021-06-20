<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'].'/Taller';
include_once($rootPath . '/controllers/vehicles/Vehiculos.php');
include_once($rootPath . '/controllers/clients/Cliente.php');
class Nota
{
    /*public static function getCliente($conexion, $id_cliente)
    {
        $sql = "SELECT * FROM cliente where id_cliente = $id_cliente";
        foreach ($conexion->query($sql) as $row) { ?>
            <?php print $row['nombre'] . " "; ?>
            <?php print $row['ape_pat']; ?>
        <?php
        }
    }

    public static function allClientes($conexion, $id_cliente)
    {
        $sql = "SELECT * FROM cliente";
        foreach ($conexion->query($sql) as $row) { ?>
            <?php
            if ($id_cliente == $row["id_cliente"])
                print("<option selected value=" . $row["id_cliente"] . ">" . $row["nombre"] . " " . $row["ape_pat"] . "</option>");
            else
                print("<option value=" . $row["id_cliente"] . ">" . $row["nombre"] . " " . $row["ape_pat"] . "</option>");
            ?>
        <?php
        }
    }*/

    public static function fillNotas($conexion)
    {
        $sql = "SELECT * FROM nota";
        foreach ($conexion->query($sql) as $row) { ?>
            <tr>
                <td><?php print $row['id_nota']; ?></td>
                <td><?php print $row['id_vehiculo']; ?></td>
                <td><?php cliente::getCliente($conexion, Vehiculos::getDueño($conexion,$row['id_vehiculo']));?></td>

                <td><?php print $row['total']; ?></td>
                <?php print("<td><a href=\".\modificarNota.php?id_nota=" . $row['id_nota'] . "&&id_vehiculo=" . $row['id_vehiculo'] . "&&total=" . $row['total'] .
                    "&&fec_entrada=" . $row['fec_entrada'] . "&&fec_salida=" . $row['fec_salida'] . "&&id_mecanico=" . $row['id_mecanico'] . "\">Modificar</a></td>"); ?>
            </tr>
<?php
        } //fin ciclo		
    }
    /*public static function insertarMecanico($conexion, $nombre, $ape_pat, $ape_mat, $rfc, $direccion, $telefono)
    {
        $sql =  $conexion->prepare("INSERT INTO mecanico VALUES (nextval('mecanico_seq'),'" . $nombre . "', '" . $ape_pat . "','" . $ape_mat  . "', '" . $rfc .  "','"  . $direccion . "',"  . $telefono . ")");
        $sql->execute();
    }
    public static function actualizarMecanico($conexion, $nombre, $ape_pat, $ape_mat, $rfc, $direccion, $telefono, $id_mecanico)
    {
        $sql =  $conexion->prepare("UPDATE mecanico SET nombre='" . $nombre . "', ape_pat='" . $ape_pat . "', ape_mat='" . $ape_mat . "', rfc='" . $rfc . "', direccion='" . $direccion . "', telefono=" . $telefono . " WHERE id_mecanico='" . $id_mecanico . "' ");
        $sql->execute();
    }*/
}
?>