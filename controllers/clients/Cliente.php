<?php
class cliente
{
    public static function getCliente($conexion, $id_cliente)
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
    }

    public static function fillClientes($conexion)
    {
        $sql = "SELECT * FROM cliente";
        foreach ($conexion->query($sql) as $row) { ?>
            <tr>
                <td><?php print $row['nombre'] . " " . $row["ape_pat"] . " " . $row["ape_mat"]; ?></td>
                <td><?php print $row['mail']; ?></td>
                <td><?php print $row['direccion']; ?></td>
                <td><?php print $row['telefono']; ?></td>
                <?php print("<td><a href=\".\modificarCliente.php?nombre=" . $row['nombre'] . "&&ape_pat=" . $row['ape_pat'] . "&&ape_mat=" . $row['ape_mat'] .
                    "&&mail=" . $row['mail'] . "&&direccion=" . $row['direccion'] . "&&telefono=" . $row['telefono'] . "&&id_cliente=" . $row['id_cliente'] . "\">Modificar</a></td>"); ?>
            </tr>
<?php
        } //fin ciclo		
    }
    public static function insertarCliente($conexion, $nombre, $ape_pat, $ape_mat, $email, $direccion, $telefono)
    {
        $sql =  $conexion->prepare("INSERT INTO cliente VALUES (nextval('cliente_seq'),'" . $nombre . "', '" . $ape_pat . "','" . $ape_mat  . "', '" . $email .  "','"  . $direccion . "',"  . $telefono . ")");
        $sql->execute();
    }
    public static function actualizarCliente($conexion, $nombre, $ape_pat, $ape_mat, $email, $direccion, $telefono, $id_cliente)
    {
        $sql =  $conexion->prepare("UPDATE cliente SET nombre='" . $nombre . "', ape_pat='" . $ape_pat . "', ape_mat='" . $ape_mat . "', mail='" . $email . "', direccion='" . $direccion . "', telefono=" . $telefono . " WHERE id_cliente='" . $id_cliente . "' ");
        $sql->execute();
    }
}
?>