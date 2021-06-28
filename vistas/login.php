<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a01a7f824f.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        if(!empty($_GET['message'])) {
            $message = $_GET['message'];
    		print(
			"<div class=\"alert alert-danger\" role=\"alert\"> ERROR: ".$message."<br /> </div>");
            }	
    ?>
    <form action="/Taller/index.php" method="post">
        <div class="container-md shadow login">
            <label for="email">Usuario:</label>
            <div class="input-group mb-3">

                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" name="user">
            </div>


            <label for="password" class="mtop16">Contraseña:</label>
            <div class="input-group mb-3">

                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" name="password">
            </div>
            <input type="submit" value="Login">
        </div>

    </form>
</body>

</html>