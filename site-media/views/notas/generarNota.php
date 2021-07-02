<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Taller';
include_once($rootPath . '/controllers/connection/conexion.php');
Conexion::abrirConexion();
$conexion = Conexion::getConexion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="header d-md-flex justify-content-md-end">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Folio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                </tr>
                <tr>
                    <td>
                        <section class="border p-4 d-flex justify-content-center mb-4">
                            <div class="form-outline datepicker" style="width: 22rem;">
                                <input type="text" class="form-control active" id="exampleDatepicker1">
                                <label for="exampleDatepicker1" class="form-label" style="margin-left: 0px;">Select a date</label>
                                <div class="form-notch">
                                    <div class="form-notch-leading" style="width: 9px;"></div>
                                    <div class="form-notch-middle" style="width: 81.6px;"></div>
                                    <div class="form-notch-trailing"></div>
                                </div>
                                <button id="datepicker-toggle-648601" type="button" class="datepicker-toggle-button" data-mdb-toggle="datepicker">
                                    <i class="far fa-calendar datepicker-toggle-icon"></i>
                                </button>
                            </div>
                        </section>
                    </td>
                </tr>

            </tbody>
        </table>


    </div>
    <div class="container shadow rounded border">

        <section class="border p-4 d-flex justify-content-center mb-4">
            <div class="form-outline datepicker" style="width: 22rem;">
                <input type="text" class="form-control active" id="exampleDatepicker1">
                <label for="exampleDatepicker1" class="form-label" style="margin-left: 0px;">Select a date</label>
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 81.6px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
                <button id="datepicker-toggle-648601" type="button" class="datepicker-toggle-button" data-mdb-toggle="datepicker">
                    <i class="far fa-calendar datepicker-toggle-icon"></i>
                </button>
            </div>
        </section>


        <form class="row g-3" action="/Taller/controllers/mecanicos/insertarMecanico.php" method="post">
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Apellido paterno</label>
                <input type="text" class="form-control" name="ape_pat" value="" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Apellido materno</label>
                <input type="text" class="form-control" name="ape_mat" value="" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault03" class="form-label">rfc</label>
                <input type="text" class="form-control" name="rfc" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault04" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" value="" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault05" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono" required>
            </div>
            <div class="col-12">
                <button class="btn btn-dark " type="submit">Registrar mecanico</button>
                <input class="btn btn-dark " type="button" value="Cancelar" onclick="window.location = '/Taller/vistas/mecanicos/Mecanicos.php'">
            </div>
        </form>
    </div>

</body>

</html>