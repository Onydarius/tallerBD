<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["titulo"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="index.php?c=vehiculos&a=insertar" method="post">
            <table>
                <tr>
                    <td>Matricula</td>
                    <td><input type="text" id="matricula" name="matricula" maxlength="10" value="" required></td>
                </tr>
                <tr>
                    <td>Marca</td>
                    <td><input type="text" id="marca" name="marca" value=""></td>
                </tr>
                <tr>
                    <td>Modelo</td>
                    <td><input type="text" id="modelo" name="modelo" value=""></td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td><input type="text" id="color" name="color" value=""></td>
                </tr>
                <tr>
                    <td>Dueño</td>
                    <td>
                        <select class="form-select form-select-sm" name="id_cliente" aria-label=".form-select-sm example" required>
                            <option value="" selected disabled >Elige el dueño</option>
                            <?php
                                foreach($data['clientes'] as $row){
                                    echo "<option value=" . $row["id_cliente"] . ">" . $row["nombre"] . "</option>"; 
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