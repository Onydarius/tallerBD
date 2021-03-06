<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["titulo"] ?></title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/messages/messages.es-es.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container shadow rounded border">
        <form action="index.php?c=notas&a=insertar" method="post">
            <div class="header float-sm-right">
                <label for="folio">Folio</label>
                <input class="form-control" name="id_nota" type="text" value=<?php echo $data["id_nota"]["nextval"] ?> readonly>
                <input id="datepicker" name="fec_entrada" width="276" value="" />
                <script>
                    $('#datepicker').datepicker({
                        uiLibrary: 'bootstrap4',
                        locale: 'es-es',
                    });
                </script>
            </div>
            <div class="data">
                <br>
                <br>
                <br>
                <br>
                Carro
                <select id="vehicle" name="id_vehiculo" class="custom-select">
                    <?php
                    foreach ($data["vehiculos"] as $row) {
                        echo "<option value=\"" . $row["matricula"] . "\">" . $row["matricula"] . "</option>";
                    }
                    ?>
                </select>
                <label for="due??o">Due??o</label>
                <input id="owner" class="form-control owner" id="disabledInput" type="text" disabled>

                mecanico
                <select name="id_mecanico" class="custom-select">
                    <?php
                    foreach ($data["mecanicos"] as $row) {
                        echo "<option value=" . $row["id_mecanico"] . ">" . $row["nombre"] . "</option>";
                    }
                    ?>
                </select>

            </div>

            <div class="servicios">
                <?php
                foreach ($data["servicios"] as $row) {
                    echo "<div class=\"form-check form-check-inline\">";
                    echo "<input id ='" . $row["id_servicios"] . "' class=\"form-check-input\" type=\"checkbox\" name=\"servicios[]\" value=\"" . $row["id_servicios"] . "\">";
                    echo "<label class=\"form-check-label\" for=\"inlineCheckbox1\">" . $row["nombre"] . "</label>";
                    echo "</div>";
                }
                ?>
            </div>
            <div class="total">
                <button class="btn btn-dark " type="submit">Generar nota</button>
                <input class="btn btn-dark " type="button" value="Cancelar" onclick="window.location = 'index.php?c=notas'">
            </div>
            <br>
        </form>
        <p class="broken"></p>

    </div>
    <script src="site-media/js/getVehiculo.js"></script>
</body>

</html>