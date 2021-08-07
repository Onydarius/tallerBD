<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['titulo'] ?></title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/messages/messages.es-es.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <th scope="col">Descripción</th>
                <th scope="2">Periodo</th>
                <th scope="col">Estado</th>
            </thead>
            <tbody>
                <tr>
                    <form method="post" action="index.php?c=reportes&a=generarVehiculos">
                        <td>La marca y modelo de los vehiculos que han estado en el periodo</td>
                        <td>
                            <input type = "date" name="fec_entrada" width="150" value="2020-01-01" max="2099-12-31"/>
                            <span class="align-middle">a</span>
                            <input type = "date" name="fec_salida" width="150" value="2020-01-01" max="2099-12-31" />
                            
                        </td>
                        <td class="text-center">
                            <button class="btn btn-dark " type="submit">Generar reporte</button>
                        </td>
                    </form>
                </tr>

                <tr>
                    <form method="post" action="index.php?c=reportes&a=generarTrabajos">
                        <td>Relacion de la cantidad de trabajos por mecanico por año</td>

                        <td>
                            <input name="anio" type="number" min="2020" max="2099" step="1" value="2020" />
                        </td>
                        <td class="text-center">
                            <button class="btn btn-dark " type="submit">Generar reporte</button>
                        </td>
                    </form>
                </tr>
                <tr>
                    <form method="post" action="index.php?c=reportes&a=generarServicios">
                        <td>Relacion de los servicios mas solicitados</td>

                        <td>
                            <input type="month" min="2020-01" name="date" value="2020-07">
                        </td>
                        <td class="text-center">
                            <button class="btn btn-dark " type="submit">Generar reporte</button>
                        </td>
                    </form>
                </tr>
                <tr>
                    <form method="post" action="index.php?c=reportes&a=generarEmpleadoMes">
                        <td>Certificado del empleado del mes</td>

                        <td>
                            <input type="month" min="2020-01" name="date" value="2020-07">
                        </td>
                        <td class="text-center">
                            <button class="btn btn-dark " type="submit">Generar reporte</button>
                        </td>
                    </form>
                </tr>
                <form method="post" action="index.php?c=reportes&a=generarGanancias">
                    <td>Ingresos del año</td>
                    <td>
                        <input type="number" min="2020" max="2099" step="1" value="2020" name="anio" />
                    </td>
                    <td class="text-center">
                        <button class="btn btn-dark " type="submit">Generar reporte</button>
                    </td>
                </form>
                </tr>
            </tbody>
        </table>

    </div>
</body>

</html>