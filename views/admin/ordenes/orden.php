<?php
// error_reporting(0);
?>
<!doctype html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.js"></script>




    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        title: 'Ordenes'
                    },
                    {
                        extend: 'excelHtml5',
                        autoFilter: true,
                        sheetName: 'Exported data',
                        title: 'Ordenes'
                    },
                    {
                        extend: 'print',
                        title: 'Ordenes',
                        orientation: 'landscape',
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
            });
        }, );
    </script>


</head>


<body>

    <div class="container">

        <div class="text-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarOrden">Agregar Orden</a>
        </div>
    </div>

    <!--  -->
    <!--  -->
    <!--  -->
    <!--  -->
    <div class="container px-5 pt-3">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="table-responsive-sm">
                    <table id="table" class="table table-stripeds ">
                        <thead class="table-dark">
                            <tr>
                                <th class="col">#</th>
                                <th class="col">Equipo</th>
                                <th class="col-6">Descripcion</th>
                                <th scope="col">N° Siniestro</th>
                                <th scope="col">Presupuesto</th>
                                <th scope="col">Estado</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listaOrdenes as $orden) {
                            ?>
                                <tr>

                                    <td>
                                        <?= $orden["num_orden"] ?>
                                    </td>
                                    <td>
                                        <?= $orden["equipo"] ?>
                                    </td>
                                    <td>
                                        <?= $orden["descripcion"] ?>
                                    </td>
                                    <td>
                                        #<?= $orden["num_siniestro"] ?>
                                    </td>
                                    <td>
                                        $<?= $orden["presupuesto"] ?>
                                    </td>
                                    <td class="justify-content-center align-middle">
                                        <div class="table-dark justify-content-center d-flex align-items-center align-middle rounded" style="width: 100%; height: 30px; background-color: <?= $orden['color_estado'] ?> "> <?= $orden['estado'] ?> </div>
                                    </td>

                                </tr>


                            <?php
                            }
                            ?>


                        </tbody>

                    </table>
                    <a class="btn btn-primary" href="index.php?c=EstadisticasController&a=index"> Regresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ---------------------------------- -->

    <div class="modal fade" id="modalAgregarOrden" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="index.php?c=OrdenController&a=agregarOrden" method="post">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva Orden</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">

                        <div class="mb-3">
                            <label for="" class="form-label">Equipo</label>
                            <input type="text" class="form-control" name="equipo" aria-describedby="helpId" placeholder="Escribe aquí">
                            <small id="txtDni" class="form-text text-danger"></small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" name="descripcion" id="" aria-describedby="helpId" placeholder="Escribe aquí">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nº Sinietro</label>
                            <input type="text" class="form-control" name="n_siniestro" id="" aria-describedby="helpId" placeholder="Escribe aquí">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Presupuesto</label>
                            <input type="email" class="form-control" name="presupuesto" id="" aria-describedby="helpId" placeholder="Escribe aquí">
                        </div>

                        <!-- SELECCIONAR DISTRITOS  -->
                        <div class="mb-3">
                            <label for="" class="form-label">Estado</label>
                            <select aria-label="Default select example" name="distrito" required="" class="form-control">
                                <option selected>Estado</option>
                                <?php
                                require_once("../../model/EstadisticasModel.php");
                                $orden = new EstadisticasModel();
                                $estado = $orden->estadosM();
                                foreach ($estado as $estados) {
                                ?>
                                    <option value="<?= $estados['estado'] ?>"> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" id="btnAgregar" class="btn btn-primary">Agregar usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>







</body>

</html>