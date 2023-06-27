<?php

require('../../model/EstadisticasModel.php');
class EstadisticasController
{
    public static function index()
    {
        echo '<title> Inicio </title>';
        session_start();
        $estModel = new EstadisticasModel();

        $cantDistritos = $estModel->contarTotalDistritosM();

        // Cantidad Usuarios
        $cantPersonas = $estModel->contarUsuariosM();
        $cantAdmins = $estModel->contarAdminsM();
        $cantEncargados = $estModel->contarEncargadoM();
        $cantTecnicos = $estModel->contarTecnicosM();

        // Clientes 

        $cantClientes = $estModel->contarClientesM();

        // Estados 

        $cantEstados = $estModel->contarEstadosM();

        if ($_SESSION['rol'] != 1) {
            
            // $registroSalud = $estModel->contarUsuariosSalud();
            $cantPersonas = $estModel->contarUsuariosM();
            // $cantHombres = $estModel->contarPersonasMascM();
            // $cantMujeres = $estModel->contarPersonasFemM();
            // $cantNb = $estModel->contarPersonasNbM();
        }

        require_once('plantilla.php');
        require_once('estadisticas/inicio.php');
    }

 
    
}
