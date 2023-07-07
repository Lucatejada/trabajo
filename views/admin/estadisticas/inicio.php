<script>
    $(document).ready(function() {
        $('#tablaDinamica').DataTable({
            paging: false,
            lengthMenu: [50],
            ordering: false,
            language: {
                url: '../asset/Datatables/es.json'
            }
        });
    })
</script>

<script>
    const toastLiveExample = document.getElementById('liveToast')
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
</script>

<style>
    .row a {
        text-decoration: none;
    }

    .row a:hover {
        text-decoration: underline;
    }
</style>

<div class="container">

    <p class="fs-6 fw-bold">Bienvenido <?= $_SESSION['nombre'] ?></p>

    <div class="row mb-3">

        <div class="col-lg-6 mb-3">

            <div class="border rounded px-4 pt-3 pb-3">

                <p class="fs-6">Equipos</p>

                <div class="row mb-3 justify-content-center">
                    <div class="col-auto">
                        <div class="card border mb-3">
                            <div class="card-header">Ingresados</div>
                            <a href="index.php?c=OrdenController&a=index">
                                <div class="card-body text-center">
                                    <h5 class="card-title fs-2"><?= $contOrdenes ?></h5>
                                    <p class="card-text">En total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-center">

                    <div class="col-md-6">
                        <div class="card border-secondary mb-3">
                            <div class="card-header">En espera de una acción</div>
                            <a class="text-secondary" href="index.php?c=MensajesController&a=getPendientes">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantPendientes ?></h5>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="card border-primary mb-3">
                            <div class="card-header">En progreso</div>
                            <a class="text-primary" href="index.php?c=OrdenController&a=getEnCurso">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantEnCurso ?></h5>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card border-success mb-3">
                            <div class="card-header">Finalizados</div>
                            <a class="text-success" href="index.php?c=MensajesController&a=getConcluidos">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantConcluidos ?></h5>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card border-danger mb-3">
                            <div class="card-header">Cancelados</div>
                            <a class="text-danger" href="index.php?c=MensajesController&a=getCancelados">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantCancelados ?></h5>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card border-warning mb-3">
                            <div class="card-header">Eliminados</div>
                            <a class="text-warning" href="index.php?c=MensajesController&a=getEliminados">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantEliminados ?></h5>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-lg-6 mb-3">

            <div class="border rounded px-4 pt-3 pb-3">

                <p class="fs-6">Clientes</p>

                <div class="row mb-3 justify-content-center">
                    <div class="col-lg-6">
                        <div class="card  mb-3 text-center">
                            <div class="card-header">Cantidad</div>
                            <a href="index.php?c=ClientesController&a=index">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantClientes ?></h5>
                                    <p class="card-text">En total</p>
                                </div>
                            </a>
                        </div>
                        <div class="table-responsive-lg pt-1" style="width: 100%;">
                            <table class="table table-striped table-hover" id="tablaDinamica">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Telefono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listNombres as $clientes) {
                                    ?>
                                        <tr class="">
                                            <td scope="row"><?= $clientes['nombre'] ?> </td>
                                            <td><?= $clientes['telefono'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <!--Segunda fila-->

    <div class="row mb-3">
        <div class="col-lg-6 mb-3">
            <div class="border rounded px-4 pt-3 pb-3">
                <p class="fs-6">Estado de Tareas</p>
                <?php
                foreach ($colorEstado as $color) {
                ?>
                    <div class="pt-1 ">
                        <div class="text-body-emphasis border rounded fw-semibold font-weight-bold justify-content-center d-flex align-items-center" style="width: auto; height: 50px; background-color: <?= $color['color_estado'] ?> "> <?= $color['estado'] ?> </div>
                    </div>
                <?php
                }


                ?>


            </div>

        </div>

        <!-- Usuarios -->

        <div class="col-lg-6 mb-3">

            <div class="border rounded px-4 pt-3 pb-3">

                <p class="fs-6">Usuarios</p>

                <div class="row mb-3 justify-content-center">
                    <div class="col-lg-6">
                        <div class="card border mb-3">
                            <div class="card-header">Cantidad</div>
                            <a href="index.php?c=UsuariosController&a=index">
                                <div class="card-body text-center">
                                    <h5 class="card-title fs-2"><?= $cantPersonas ?></h5>
                                    <p class="card-text">En total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-4">

                        <div class="card border mb-3">
                            <div class="card-header">Administ.</div>
                            <a href="index.php?c=UsuariosController&a=index">
                                <div class="card-body text-center">
                                    <h4 class="card-title fs-2"><?= $cantAdmins ?></h4>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="card border mb-3">
                            <div class="card-header">Encargados</div>
                            <a href="index.php?c=UsuariosController&a=index">
                                <div class="card-body text-center">
                                    <h4 class="card-title fs-2"><?= $cantEncargados ?></h4>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="card border mb-3">
                            <div class="card-header">Tecnicos</div>
                            <a href="index.php?c=UsuariosController&a=index">
                                <div class="card-body text-center">
                                    <h4 class="card-title fs-2"><?= $cantTecnicos ?></h4>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>