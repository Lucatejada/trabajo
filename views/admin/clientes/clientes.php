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
                        title: 'Clientes'
                    },
                    {
                        extend: 'excelHtml5',
                        autoFilter: true,
                        sheetName: 'Exported data',
                        title: 'Clientes'
                    },
                    {
                        extend: 'print',
                        title: 'Clientes',
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

    <div class="container px-5 pt-3">
        <div class="">
            <div class="col-lg-12">
                <div class="table-responsive-l">
                    <table id="table" class="table table-stripeds">
                        <thead class="table-dark">
                            <tr>
                                <th class="col">Nombre</th>
                                <th class="col">Direccion</th>
                                <th class="col">DNI</th>
                                <th class="col">Telefono</th>
                                <th class="col">Email</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listClientes as $clientes) {
                            ?>
                                <tr>

                                    <td>
                                        <?= $clientes["nombre"] ?>
                                    </td>
                                    <td>
                                        <?= $clientes["direccion"] ?>
                                    </td>
                                    <td>
                                        <?= $clientes["dni"] ?>
                                    </td>
                                    <td>
                                        <?= $clientes["telefono"] ?>
                                    </td>
                                    <td>
                                        <?= $clientes["email"] ?>
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









</body>

</html>