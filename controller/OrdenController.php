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
}
