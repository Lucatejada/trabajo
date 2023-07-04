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
        $sql = "SELECT o.num_orden, o.descripcion, o.num_siniestro, o.presupuesto, em.estado as estado FROM orden o, estado_msj em WHERE o.id_estado_msj2 = em.id;";
        $resultado = $this->conexion->query($sql);
        $listaOrdenes = $resultado->fetch_all(MYSQLI_ASSOC);
        return $listaOrdenes;
    }



}
?>