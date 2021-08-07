<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Taller mecanico</a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if ($data["titulo"] == "Clientes") echo 'active' ?>">
                    <a class="nav-link" href="index.php?c=clientes">Clientes</a>
                </li>
                <li class="nav-item <?php if ($data["titulo"] == "Mecanicos") echo 'active' ?>">
                    <a class="nav-link" href="index.php?c=Mecanicos">Mecanicos</a>
                </li>
                <li class="nav-item <?php if ($data["titulo"] == "Vehiculos") echo 'active' ?>">
                    <a class="nav-link" href="index.php?c=Vehiculos">Vehiculos</a>
                </li>

                <?php if ($_SESSION['user'] != 'empleado' && $data["titulo"] == "Notas") echo '
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?c=Notas">Notas</a>
                </li>';
                else if ($_SESSION['user'] != 'empleado') 
                echo '
                <li class="nav-item">
                    <a class="nav-link" href="index.php?c=Notas">Notas</a>
                </li>'
                ?>  
                <li class="nav-item <?php if ($data["titulo"] == "Servicios") echo 'active' ?>">
                    <a class="nav-link" href="index.php?c=Servicios">Servicios</a>
                </li>

                <?php if ($_SESSION['user'] != 'empleado' && $_SESSION['user'] != 'gerente') echo '
                <li class="nav-item">
                <a class="nav-link" href="index.php?c=Reportes">Generar reporte</a>
            </li>' ?>
            </ul>
        </div>
        <form class="form-inline my-2 my-lg-0">
            <button type="button" class="btn btn-outline-success my-2 my-sm-0 " onclick="window.location = 'index.php?c=login&a=cerrarSesion'">Cerra sesion</button>
        </form>
    </nav>
    <br>
    <br>
    <br>
</body>

</html>