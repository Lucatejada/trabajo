<?php
require('../../model/OrdenModel.php');
class OrdenController
{

    public static function index()
    {
        echo '<title> Inicio </title>';
        session_start();
        $estModel = new OrdenModel();
    
        $listaOrdenes = $estModel->mostrarOrdenes();
        require_once('plantilla.php');
        require_once('ordenes/orden.php');

    }

    public static function agregarUsuario()
    {
        $OModel = new OrdenModel();

        $num_orden = $_POST['num_orden'];
        $equipo = $_POST['equipo'];
        $descripcion = $_POST['descripcion'];
        $num_siniestro = $_POST['num_siniestro'];
        $id_estado_msj2 = $_POST['id_estado_msj2'];
       

        if ($OModel->agregarOrdenM($num_orden, $equipo, $descripcion, $num_siniestro, $id_estado_msj2)) {
            session_start();
            $_SESSION['usuarioOk'] = true;
            header('Location: index.php?c=OrdenController&a=index');
        }
    }
}
