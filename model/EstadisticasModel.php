<?php

require('../../config/Conexion.php');

class EstadisticasModel extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }


    //INICIO
    public function contarTotalEstadosM()
    {
        $sql = "SELECT COUNT(*) FROM orden;";
        $result = $this->conexion->query($sql);
        $cantMsj = $result->fetch_row()[0];
        return $cantMsj;
    }

    public function contarTotalMsjxEstadoM($estado)
    {
        $sql = "SELECT COUNT(*) AS total
                FROM mensaje m, estado_msj em 
                WHERE m.id_estado_msj2 = em.id AND em.estado = '$estado'";
        $result = $this->conexion->query($sql);
        $cantMsjxEstado = $result->fetch_row()[0];
        return $cantMsjxEstado;
    }


    //MOVILIDADES
    public function contarTotalMovilidadesM()
    {
        $sql = "SELECT count(*) from movilidad m";
        $result = $this->conexion->query($sql);
        $cantMovilidades = $result->fetch_row()[0];
        return $cantMovilidades;
    }

    public function contarMovilidadesxEstadoM($estado)
    {
        $sql = "SELECT count(*) 
                from movilidad m, estado_movilidad em
                where m.id_estado_movilidad2 = em.id and em.estado = '$estado'";
        $result = $this->conexion->query($sql);
        $cantxEstado = $result->fetch_row()[0];
        return $cantxEstado;
    }

    //USUARIOS
    public function contarUsuariosM()
    {
        $sql = "SELECT count(*) from usuario";
        $result = $this->conexion->query($sql);
        $cantPersonas = $result->fetch_row()[0];
        return $cantPersonas;
    }
    public function contarAdminsM()
    {
        $sql = "SELECT count(*) from usuario WHERE id_rol2 = 3";
        $result = $this->conexion->query($sql);
        $cantAdmins = $result->fetch_row()[0];
        return $cantAdmins;
    }
    public function contarEncargadoM()
    {
        $sql = "SELECT count(*) from usuario WHERE id_rol2 = 2";
        $result = $this->conexion->query($sql);
        $cantEncargados = $result->fetch_row()[0];
        return $cantEncargados;
    }

    public function contarTecnicosM()
    {
        $sql = "SELECT count(*) from usuario ";
        $result = $this->conexion->query($sql);
        $cantTecnicos = $result->fetch_row()[0];
        return $cantTecnicos;
    }

    public function contarClientesM()
    {
        $sql = "SELECT count(*) from clientes";
        $result = $this->conexion->query($sql);
        $cantClientes = $result->fetch_row()[0];
        return $cantClientes;
    }


    //Estados
    public function contarEstadosM()
    {
        $sql = "SELECT count(*) from estado_msj";
        $result = $this->conexion->query($sql);
        $cantEstados = $result->fetch_row()[0];
        return $cantEstados;
    }
    public function estadosM()
    {
        $sql = "SELECT * from estado_msj";
        $result = $this->conexion->query($sql);
        $estados = $result->fetch_all(MYSQLI_ASSOC);
        return $estados;
    }

    public function listarColoresM()
    {
        $sql = "SELECT color_estado, estado from estado_msj";
        $result = $this->conexion->query($sql);
        $colorEstado = $result->fetch_all(MYSQLI_ASSOC);
        return $colorEstado;
    }


    //Muestra Ordenens 
    public function mostrarOrdenes()
    {

        $sql = "SELECT * FROM orden";
        $resultado = $this->conexion->query($sql);
        $listaOrdenes = $resultado->fetch_all(MYSQLI_ASSOC);
        return $listaOrdenes;
    }

    //Cuenta el total de ordenes
    public function contOrdenes()
    {
        $sql = "SELECT count(*) FROM orden";
        $resultado = $this->conexion->query($sql);
        $contOrdenes = $resultado->fetch_row()[0];
        return $contOrdenes;
    }

    // Muentra los clientes 
    public function listarClientesM()
    {
        $sql = "SELECT * from clientes";
        $result = $this->conexion->query($sql);
        $listNombres = $result->fetch_all(MYSQLI_ASSOC);
        return $listNombres;
    }



    public function contarUsuariosBajaM()
    {
        $sql = "SELECT count(*) from usuario u where u.id_rol2 is null";
        $result = $this->conexion->query($sql);
        $cantUsuariosBaja = $result->fetch_row()[0];
        return $cantUsuariosBaja;
    }

    //

    public function getPendientes()
    {
        $sql = "SELECT count(*) from orden WHERE id_estado_msj2 = 1";
        $result = $this->conexion->query($sql);
        $cantPendientes = $result->fetch_row()[0];
        return $cantPendientes;
    }
    public function getEnCurso()
    {
        $sql = "SELECT count(*) from orden WHERE id_estado_msj2 = 2";
        $result = $this->conexion->query($sql);
        $cantEnCurso = $result->fetch_row()[0];
        return $cantEnCurso;
    }
    public function getConcluidos()
    {
        $sql = "SELECT count(*) from orden WHERE id_estado_msj2 = 3";
        $result = $this->conexion->query($sql);
        $cantConcluidos = $result->fetch_row()[0];
        return $cantConcluidos;
    }
    public function getCancelados()
    {
        $sql = "SELECT count(*) from orden WHERE id_estado_msj2 = 4";
        $result = $this->conexion->query($sql);
        $cantConcluidos = $result->fetch_row()[0];
        return $cantConcluidos;
    }
    public function getEliminados()
    {
        $sql = "SELECT count(*) from orden WHERE id_estado_msj2 = 5";
        $result = $this->conexion->query($sql);
        $cantConcluidos = $result->fetch_row()[0];
        return $cantConcluidos;
    }


    //PAGINA ESTADISTICAS
    public function contarMsjActualesM()
    {
        $sql = "SELECT count(*) from mensaje m
                where date_format(m.fecha_emergencia, '%Y/%m/%d') = curdate()";
        $result = $this->conexion->query($sql);
        $cantMsj = $result->fetch_row()[0];
        return $cantMsj;
    }

    public function listarMsjActualesxEstadoM()
    {
        $sql = "SELECT count(m.id_estado_msj2) as total, em.estado from mensaje m
                right join estado_msj em on em.id = m.id_estado_msj2
                and date_format(m.fecha_emergencia, '%Y/%m/%d') = curdate() group by em.id";
        $result = $this->conexion->query($sql);
        $listMsjEstado = $result->fetch_all(MYSQLI_ASSOC);
        return $listMsjEstado;
    }

    public function contarMsjxRangosM($fechaDesde, $fechaHasta)
    {
        $sql = "SELECT count(*) from mensaje m
                where date_format(m.fecha_emergencia, '%Y-%m-%d') between '$fechaDesde' and '$fechaHasta'";
        $result = $this->conexion->query($sql);
        $cantMsj = $result->fetch_row()[0];
        return $cantMsj;
    }

    public function listarMsjxRangosM($fechaDesde, $fechaHasta)
    {
        $sql = "SELECT count(m.id_estado_msj2) as total, em.estado from mensaje m
                right join estado_msj em on em.id = m.id_estado_msj2
                and date_format(m.fecha_emergencia, '%Y-%m-%d') between '$fechaDesde' and '$fechaHasta' 
                group by em.id";
        $result = $this->conexion->query($sql);
        $listMsjEstado = $result->fetch_all(MYSQLI_ASSOC);
        return $listMsjEstado;
    }

    //ROL AGENTE: INICIO
    public function contarMsjxEstadoAgenteM($dni, $estado)
    {
        $sql = "SELECT count(*)
                from mensaje m, mensaje_usuario mu, usuario u, estado_msj em 
                where m.id = mu.id_mensaje2 and mu.dni_usuario2 = u.dni and m.id_estado_msj2 = em.id 
                and u.dni = '$dni' and em.estado = '$estado'";
        $result = $this->conexion->query($sql);
        $cantMsjEstado = $result->fetch_row()[0];
        return $cantMsjEstado;
    }
}
