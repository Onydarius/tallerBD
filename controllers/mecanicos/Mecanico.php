<?php
class Mecanico
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

    public static function fillMecanicos($conexion)
    {
        $sql = "SELECT * FROM mecanico";
        foreach ($conexion->query($sql) as $row) { ?>
            <tr>
                <td><?php print $row['nombre'] . " " . $row["ape_pat"] . " " . $row["ape_mat"]; ?></td>
                <td><?php print $row['rfc']; ?></td>
                <td><?php print $row['direccion']; ?></td>
                <td><?php print $row['telefono']; ?></td>
                <?php print("<td><a href=\".\modificarMecanico.php?nombre=" . $row['nombre'] . "&&ape_pat=" . $row['ape_pat'] . "&&ape_mat=" . $row['ape_mat'] .
                    "&&rfc=" . $row['rfc'] . "&&direccion=" . $row['direccion'] . "&&telefono=" . $row['telefono'] . "&&id_mecanico=" . $row['id_mecanico'] . "\">Modificar</a></td>"); ?>
            </tr>
<?php
        } //fin ciclo		
    }
    public static function insertarMecanico($conexion, $nombre, $ape_pat, $ape_mat, $rfc, $direccion, $telefono)
    {
        $sql =  $conexion->prepare("INSERT INTO mecanico VALUES (nextval('mecanico_seq'),'" . $nombre . "', '" . $ape_pat . "','" . $ape_mat  . "', '" . $rfc .  "','"  . $direccion . "',"  . $telefono . ")");
        $sql->execute();
    }
    public static function actualizarMecanico($conexion, $nombre, $ape_pat, $ape_mat, $rfc, $direccion, $telefono, $id_mecanico)
    {
        $sql =  $conexion->prepare("UPDATE mecanico SET nombre='" . $nombre . "', ape_pat='" . $ape_pat . "', ape_mat='" . $ape_mat . "', rfc='" . $rfc . "', direccion='" . $direccion . "', telefono=" . $telefono . " WHERE id_mecanico='" . $id_mecanico . "' ");
        $sql->execute();
    }
}
?>