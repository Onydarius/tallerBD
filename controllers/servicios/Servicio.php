<?php
class Servicio
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

    public static function fillServicios($conexion)
    {
        $sql = "SELECT * FROM servicios";
        foreach ($conexion->query($sql) as $row) { ?>
            <tr>
                <td><?php print $row['nombre']; ?></td>
                <td><?php print $row['descripcion']; ?></td>
                <td><?php print $row['precios']; ?></td>
                <?php print("<td><a href=\".\modificarServicio.php?nombre=" . $row['nombre'] . "&&descripcion=" . $row['descripcion'] . "&&precios=" . $row['precios'] .
                    "&&id_servicios=" . $row['id_servicios'] . "\">Modificar</a></td>"); ?>
            </tr>
<?php
        } //fin ciclo		
    }
    public static function altaServicio($conexion, $nombre, $descripcion, $precios)
    {
        $sql =  $conexion->prepare("INSERT INTO servicios VALUES (nextval('servicios_seq'),'" . $nombre . "', '" . $descripcion . "','" . $precios  . "')");
        $sql->execute();
    }
    public static function modificarServicio($conexion, $nombre, $descripcion, $precios, $id_servicios)
    {
        $sql =  $conexion->prepare("UPDATE servicios SET nombre= '" . $nombre . "', descripcion= '" . $descripcion . "', precios= " . $precios . " WHERE id_servicios= " . $id_servicios);
        $sql->execute();
    }
}
?>