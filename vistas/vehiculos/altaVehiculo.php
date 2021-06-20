<?php
      $rootPath = $_SERVER['DOCUMENT_ROOT'].'/Taller';
      include_once($rootPath.'/controllers/connection/conexion.php');
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
    <div class="container">
        <form action="/Taller/controllers/vehicles/insertarAuto.php" method="post">
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
                            include_once($rootPath . '/controllers/clients/Cliente.php');
                            print Cliente::allClientes($conexion, -1);
                            ?>

                        </select>
                    </td>
                </tr>

            </table>
            <input type="submit" value="Guardar">
            <input type="button" value="Cancelar" onclick="window.location = '/Taller/vistas/vehiculos/vehiculos.php'">
        </form>
    </div>
</body>

</html>