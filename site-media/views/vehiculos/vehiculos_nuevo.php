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
    <div class="container shadow rounded border">
        <form action="index.php?c=vehiculos&a=insertar" method="post">
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Matricula</label>
                <input type="text" class="form-control" maxlength="10" name="matricula" value="" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Marca</label>
                <input type="text" class="form-control" name="marca" value="" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" value="" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Color</label>
                <input type="text" class="form-control" name="color" value="" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Dueño</label>
                <select class="form-select form-select-sm" name="id_cliente" aria-label=".form-select-sm example" required>
                    <option value="" selected disabled>Elige el dueño</option>
                    <?php
                    foreach ($data['clientes'] as $row) {
                        echo "<option value=" . $row["id_cliente"] . ">" . $row["nombre"] . "</option>";
                    }
                    ?>

                </select>
            </div>
            <input class="btn btn-dark " type="submit" value="Guardar">
            <input class="btn btn-dark " type="button" value="Cancelar" onclick="window.location = 'index.php?c=vehiculos'">

        </form>
    </div>
</body>

</html>