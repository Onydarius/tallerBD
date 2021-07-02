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
    <div class="container shadow rounded border">
        <form class="row g-3" action="index.php?c=clientes&a=insertar" method="post">
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
                <label for="validationDefault03" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="mail" required>
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
                <button class="btn btn-dark " type="submit">Registrar cliente</button>
                <input class="btn btn-dark " type="button" value="Cancelar" onclick="window.location = 'index.php?c=clientes'">
            </div>
        </form>
    </div>

</body>

</html>