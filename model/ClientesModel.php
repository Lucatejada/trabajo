<?php

require('../../config/Conexion.php');

class ClientesModel extends Conexion
{

    public function __construct()
    {
        parent::__construct();
    }

    public function contarClientes()
    {
        $sql = "SELECT COUNT(*) FROM clientes";
        $result = $this->conexion->query($sql);
        $contClientes = $result->fetch_row()[0];
        return $contClientes;
    }

    public function mostrarClientes()
    {
        $sql = "SELECT * FROM clientes";
        $resultado = $this->conexion->query($sql);
        $listClientes = $resultado->fetch_all(MYSQLI_ASSOC);
        return $listClientes;
    }
    public function listarClientesM()
    {
        $sql = "SELECT nombre, telefono from clientes 
        ORDER BY Id DESC LIMIT 0, 4";
        $result = $this->conexion->query($sql);
        $listNombres = $result->fetch_all(MYSQLI_ASSOC);
        return $listNombres;
    }
}
