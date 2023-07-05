<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>

<script>
    var alertList = document.querySelectorAll('.alert');
    alertList.forEach(function(alert) {
        new bootstrap.Alert(alert)
    })
</script>

<body style="background-color: #312652;">

    <div class="container">
        <nav class="navbar justify-content-center pt-5 ">
        </nav>
    </div>

    <div class="col-lg-5"></div>
    <div class="jumbotron text-center" style="background-color: #312652">
        <div class="container">
            <span><img src="views/assets/logo.png" width="220" height="90"></span>
        </div>
    </div>
    </div>



    <div class="container pt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-3">
                <form action="index.php?c=LoginController&a=login" method="post" class="border px-5 pb-5 pt-3" style="background-color: #e9ecef; border-radius: 4%;">
                    <?php
                    if ($_SESSION['loginError']) {
                    ?>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Datos incorrectos</strong>
                            <br>
                            <span>Intente nuevamente</span>
                        </div>

                        <script>
                            var alertList = document.querySelectorAll('.alert');
                            alertList.forEach(function(alert) {
                                new bootstrap.Alert(alert)
                            })
                        </script>

                    <?php
                        unset($_SESSION['loginError']);
                    }
                    ?>
                    <div class="row text-center">
                        <i class="bi bi-person-vcard" style="font-size: 100px;"></i>
                    </div>
                    <div class="row mb-4">
                        <input type="text" class="form-control" name="username" aria-describedby="helpId" placeholder="Usuario">
                    </div>
                    <div class="row mb-4">
                        <input type="password" class="form-control" name="pass" aria-describedby="helpId" placeholder="Contraseña">
                    </div>

                    <div class="row mb-3">
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="label-info text-center container well pt-5" style="color: #ffff">
            <h5>
                &copy; 2023 Software, Todos los Derechos Reservados

            </h5>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>



</body>

</html>