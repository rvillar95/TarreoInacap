<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModeloAdmin extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getRutUsuarios($rut)
    { }

    function addParticipante($rut, $nombres, $apellidos, $correo, $numero, $nombre_imagen, $clave)
    {

        $user = $this->session->userdata("administrador");



        $this->db->select('count (*)');
        $this->db->from('participante');
        $this->db->where('rutParticipante', $rut);
        $resultado = $this->db->count_all_results();

        if ($resultado == 0) {
            $data = array(
                "rutParticipante" => $rut,
                "nombreParticipante" => $nombres,
                "apellidoParticipante" => $apellidos,
                "correoParticipante" => $correo,
                "numeroParticipante" => $numero,
                "fotoParticipante" => $nombre_imagen,
                "claveParticipante" => $clave,
                "numeroJuegosParticipante" => 0,
                "estadoParticipante" => 1
            );
            $this->db->insert("participante", $data);
            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

    function addParticipanteSinFoto($rut, $nombres, $apellidos, $correo, $numero, $clave)
    {
        $user = $this->session->userdata("administrador");

        $this->db->select('count (*)');
        $this->db->from('participante');
        $this->db->where('rutParticipante', $rut);
        $resultado = $this->db->count_all_results();

        if ($resultado == 0) {
            $data = array(
                "rutParticipante" => $rut,
                "nombreParticipante" => $nombres,
                "apellidoParticipante" => $apellidos,
                "correoParticipante" => $correo,
                "numeroParticipante" => $numero,
                "fotoParticipante" => "usuario-sin-foto.png",
                "claveParticipante" => $clave,
                "numeroJuegosParticipante" => 0,
                "estadoParticipante" => 1
            );
            $this->db->insert("participante", $data);
            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

    function addJuego($nombre, $descripcion, $fecha, $anno, $nombre_imagen, $tipo)
    {
        $data = array(
            "nombreJuego" => $nombre,
            "descripcionJuego" => $descripcion,
            "fotoJuego" => $nombre_imagen,
            "postulantesJuego" => 0,
            "fechaRealizacionJuego" => $fecha,
            "annoJuego" => $anno,
            "estadoJuego" => 1,
            "tipoJuego" => $tipo
        );
        $this->db->insert("juegos", $data);
    }

    function verParticipantes()
    {

        $prueba = '<img class="img-responsive" style="width: 75px; height:75px;" src="http://127.0.0.1/Tarreo/lib/img/Jugadores/';
        $prueba2 = '" alt=""/>';
        $this->db->select("p.idParticipante,p.rutParticipante,concat(p.nombreParticipante,' ',p.apellidoParticipante) as nombreParticipante,p.correoParticipante,p.numeroParticipante, concat('$prueba',p.fotoParticipante,'$prueba2') as fotoParticipante,p.claveParticipante,p.numeroJuegosParticipante,e.nombreEstado");
        $this->db->from("participante p");
        $this->db->join("estado e", "e.idEstado = p.estadoParticipante");
        return $this->db->get();
    }

    function editarEstadoParticipante($id, $estado)
    {
        $data = array("estadoParticipante" => $estado);
        $this->db->where('idParticipante', $id);
        return $this->db->update("participante", $data);
    }

    function editarEstadoJuego($id, $estado)
    {
        $data = array("estadoJuego" => $estado);
        $this->db->where('idJuego', $id);
        return $this->db->update("juegos", $data);
    }

    function verJuegos()
    {
        $prueba = '<img class="img-responsive" style="width: 130px; height:125px;" src="http://127.0.0.1/Tarreo/lib/img/Juegos/';
        $prueba2 = '" alt=""/>';
        $this->db->select("j.idJuego,j.nombreJuego,j.descripcionJuego,concat('$prueba',j.fotoJuego,'$prueba2') as fotoJuego,j.postulantesJuego,j.fechaRealizacionJuego,j.annoJuego,e.nombreEstado,t.nombreTipo_Juego");
        $this->db->from("juegos j");
        $this->db->join("estado e", "e.idEstado = j.estadoJuego");
        $this->db->join("tipo_juego t", "t.idTipo_Juego = j.tipoJuego");
        return $this->db->get();
    }

    function verEquiposAdmin()
    {
        $prueba = '<img class="img-responsive" style="width: 130px; height:125px;" src="http://127.0.0.1/Tarreo/lib/img/Equipos/';
        $prueba2 = '" alt=""/>';
        $this->db->select("e.idEquipo,e.nombreEquipo,e.descripcionEquipo,concat('$prueba',e.fotoEquipo,'$prueba2') as fotoEquipo,e.integrantesEquipo,a.nombreEstadoE,concat(p.nombreParticipante,' ',p.apellidoParticipante) as nombreParticipante,j.nombreJuego");
        $this->db->from("equipo e");
        $this->db->join("estado_equipo a", "a.idEstadoE = e.estadoEquipo");
        $this->db->join("participante p", "p.idParticipante = e.capitanEquipo");
        $this->db->join("juegos j", "j.idJuego = e.juegoEquipo");
        return $this->db->get();
    }

    function addComentario($titulo, $comentario, $admin, $equipo)
    {
        date_default_timezone_set("America/Santiago");
        $fecha = date('Y-m-d H:i:s');
        $data = array(
            "tituloComentario_Equipo" => $titulo,
            "detalleComentario_Equipo" => $comentario,
            "fecha" => $fecha,
            "equipoComentario_Equipo" => $equipo,
            "administradorComentario_Equipo" => $admin
        );
        $this->db->insert("comentario_equipo", $data);
    }
}
