<?php

require('../../config/Conexion.php');

class OrdenModel extends Conexion
{

    public function __construct()
    {
        parent::__construct();
    }

    public function mostrarOrdenes()
    {
        $sql = "SELECT o.num_orden, o.equipo, o.descripcion, o.num_siniestro, o.presupuesto, em.estado as estado, em.color_estado as color_estado  FROM orden o, estado_msj em WHERE o.id_estado_msj2 = em.id;";
        $resultado = $this->conexion->query($sql);
        $listaOrdenes = $resultado->fetch_all(MYSQLI_ASSOC);
        return $listaOrdenes;
    }

    public function agregarOrdenM($num_orden, $equipo, $descripcion, $num_siniestro, $id_estado_msj2)
    {
        $sql = "INSERT INTO orden (num_orden, equipo, descripcion, num_siniestro, presupuesto, id_estado_msj2)
        VALUES (NULL, '$num_orden', '$equipo', '$descripcion', '$num_siniestro', '$id_estado_msj2');";
        $result = $this->conexion->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}
