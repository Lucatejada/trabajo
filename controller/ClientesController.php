<?php
require('../../model/ClientesModel.php');
class ClientesController
{

    public static function index()
    {
        echo '<title> Inicio </title>';
        session_start();
        $cliModel = new ClientesModel();
    
        $contClientes = $cliModel->contarClientes();
        $listClientes = $cliModel->mostrarClientes();
        $listNombres = $cliModel->listarClientesM();

        require_once('plantilla.php');
        require_once('clientes/clientes.php');

    }
}