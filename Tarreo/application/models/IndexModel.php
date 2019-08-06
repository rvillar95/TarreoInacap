<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class IndexModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function inicio($rut, $clave) {
        $this->db->select("idAdministrador,rutAdministrador,nombreAdministrador,apellidoAdministrador,fotoAdministrador,claveAdministrador,estado_idEstado");
        $this->db->from("administrador");
        $this->db->where("rutAdministrador", $rut);
        $this->db->where("claveAdministrador", $clave);
        return $this->db->get()->result();
    }

    function inicioParticipante($rut, $clave) {
        $this->db->select("idParticipante,rutParticipante,nombreParticipante,apellidoParticipante,correoParticipante,numeroParticipante,fotoParticipante,claveParticipante,numeroJuegosParticipante,estadoParticipante");
        $this->db->from("participante");
        $this->db->where("rutParticipante", $rut);
        $this->db->where("claveParticipante", $clave);
        return $this->db->get()->result();
    }
    
    function getFotos(){
        $this->db->select("nombreJuego,fotoJuego,postulantesJuego");
        $this->db->from("juegos");
        $this->db->where("estadoJuego", 1);
        return $this->db->get()->result();
    }

    function getFechasJuegos(){
        $query=$this->db->query("SELECT j.nombreJuego, j.descripcionJuego,k.nombreTipo_Juego as tipo, DATE_FORMAT(  `fechaRealizacionJuego` ,  '%d/%m/%Y %H:%i' ) AS fecha
        FROM juegos j 
        JOIN tipo_juego k on k.idTipo_Juego = j.tipoJuego
        ORDER BY fecha ASC ");
        return  $query->result();
    }

    

    function addParticipante($rut, $nombres, $apellidos, $correo, $numero, $nombre_imagen, $clave) {
        $this->db->select('count (*)');
        $this->db->from('participante');
        $this->db->where('rutParticipante', $rut);
        $resultado = $this->db->count_all_results();

        if ($resultado == 0) {
            $data = array("rutParticipante" => $rut,
                "nombreParticipante" => $nombres,
                "apellidoParticipante" => $apellidos,
                "correoParticipante" => $correo,
                "numeroParticipante" => $numero,
                "fotoParticipante" => $nombre_imagen,
                "claveParticipante" => $clave,
                "numeroJuegosParticipante" => 0,
                "estadoParticipante" => 1);
            $this->db->insert("participante", $data);
            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

    function addParticipanteSinFoto($rut, $nombres, $apellidos, $correo, $numero, $clave) {
        $user = $this->session->userdata("administrador");
        
        $this->db->select('count (*)');
        $this->db->from('participante');
        $this->db->where('rutParticipante', $rut);
        $resultado = $this->db->count_all_results();

        if ($resultado == 0) {
            $data = array("rutParticipante" => $rut,
                "nombreParticipante" => $nombres,
                "apellidoParticipante" => $apellidos,
                "correoParticipante" => $correo,
                "numeroParticipante" => $numero,
                "fotoParticipante" => "usuario-sin-foto.png",
                "claveParticipante" => $clave,
                "numeroJuegosParticipante" => 0,
                "estadoParticipante" => 1);
            $this->db->insert("participante", $data);
            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

}
