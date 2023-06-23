<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if (isset($_SESSION['dni'])) {
    if ($_SESSION['rol'] == 3) {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
            <link rel="shortcut icon" href="../asset/logo.png">

            <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

            <!-- DATATABLES -->
            <link rel="stylesheet" type="text/css" href="../asset/Datatables/datatables.min.css" />
            <script type="text/javascript" src="../asset/Datatables/datatables.min.js"></script>


        </head>

        <body data-bs-theme="dark">




            <div class="container-fluid sticky-top pb-4">

                <nav class="navbar navbar-expand-lg bg-dark justify-content-flex-start">
                    <img src="../assets/logoWeb.png" alt="Logo" width="120" height="60">
                    <div class="container-fluid">
                        <a class="navbar-brand px-2 justify-content-end" href="index.php?c=EstadisticasController&a=index">Sistema de tickets</a>


                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">

                            <ul class="navbar-nav">
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    
                                        <i class="bi bi-brightness-low"></i>
                                        Tema
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-lines-fill"></i> <?= $_SESSION['nombre'] ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#modalDatosPersonales">Modificar datos personales</a></li>
                                        <li><a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">Agregar usuario</a></li>
                                        <li><a class="dropdown-item" href="../../index.php?c=LoginController&a=logout">Salir</a></li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                </nav>
            </div>


            <!-- MODAL MODIFICAR USUARIO -->
            <div class="modal fade" id="modalDatosPersonales" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="index.php?c=UsuariosController&a=agregarUsuario" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modificar usuario</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">

                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre y Apellido</label>
                                    <input type="text" class="form-control" name="nombre" value="<?= $_SESSION['nombre'] ?>" aria-describedby="helpId" placeholder="Nombre">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label"> </label>
                                    <input type="text" class="form-control" name="usuario" value="<?= $_SESSION['user'] ?>" aria-describedby="helpId" placeholder="Nombre usuario">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label"></label>
                                    <input type="password" class="form-control" name="pass" id="" aria-describedby="helpId" placeholder="Contraseña">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label"> </label>
                                    <input type="password" class="form-control" name="rPass" id="" aria-describedby="helpId" placeholder="Repetir contraseña">
                                </div>

                                <!-- SELECCIONAR DISTRITOS  -->

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" id="btnAgregar" class="btn btn-warning">Modificar usuario</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- MODAL AGREGAR USUARIO -->


            <div class="modal fade" id="modalAgregarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="index.php?c=UsuariosController&a=agregarUsuario" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar nuevo usuario</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">

                                <div class="mb-3">
                                    <label for="" class="form-label"> </label>
                                    <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="Nombre">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label"> </label>
                                    <input type="text" class="form-control" name="apellido" id="" aria-describedby="helpId" placeholder="Apellido">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label"> </label>
                                    <input type="text" class="form-control" name="usuario" id="" aria-describedby="helpId" placeholder="Nombre usuario">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label"></label>
                                    <input type="password" class="form-control" name="pass" id="" aria-describedby="helpId" placeholder="Contraseña">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label"> </label>
                                    <input type="password" class="form-control" name="rPass" id="" aria-describedby="helpId" placeholder="Repetir contraseña">
                                </div>

                                <!-- SELECCIONAR DISTRITOS  -->

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" id="btnAgregar" class="btn btn-success">Agregar usuario</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        </body>

        </html>

<?php
    } else {
        $_SESSION['accesoDenegado'] = true;
        header('Location: ../../index.php?c=LoginController&a=index');
    }
} else {
    $_SESSION['sessionExpired'] = true;
    header('Location: ../../index.php?c=LoginController&a=index');
}
?>