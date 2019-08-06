<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModeloParti extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    function verJuegos()
    {
        $prueba = '<img class="img-responsive" style="width: 130px; height:125px;" src="http://127.0.0.1/Tarreo/lib/img/Juegos/';
        $prueba2 = '" alt=""/>';
        $this->db->select("j.idJuego,j.nombreJuego,j.descripcionJuego,concat('$prueba',j.fotoJuego,'$prueba2') as fotoJuego,j.postulantesJuego,j.fechaRealizacionJuego,j.annoJuego,e.nombreEstado,t.nombreTipo_Juego");
        $this->db->from("juegos j");
        $this->db->join("estado e", "e.idEstado = j.estadoJuego");
        $this->db->join("tipo_juego t", "t.idTipo_Juego = j.tipoJuego");
        $this->db->where("j.estadoJuego", 1);
        return $this->db->get();
    }

    function verjuegosIndividuales($id)
    {
        $prueba = '<img class="img-responsive" style="width: 130px; height:125px;" src="http://127.0.0.1/Tarreo/lib/img/Juegos/';
        $prueba2 = '" alt=""/>';
        $this->db->select("j.idJuego,j.nombreJuego,j.descripcionJuego,concat('$prueba',j.fotoJuego,'$prueba2') as fotoJuego,j.postulantesJuego,j.fechaRealizacionJuego,j.annoJuego");
        $this->db->from("juegos j");
        $this->db->join("estado e", "e.idEstado = j.estadoJuego");
        $this->db->join("postulantes p", "p.juegoPostulante = j.idJuego");
        $this->db->where("j.estadoJuego", 1);
        $this->db->where("j.tipojuego", 1);
        $this->db->where("p.participantePostulante", $id);
        return $this->db->get();
    }

    function addPostulante($idJuego, $idUsuario)
    {
        $this->db->select('count (*)');
        $this->db->from('postulantes');
        $this->db->where('participantePostulante', $idUsuario);
        $this->db->where('juegoPostulante', $idJuego);
        $resultado = $this->db->count_all_results();

        if ($resultado == 0) {
            $data = array(
                "participantePostulante" => $idUsuario,
                "juegoPostulante" => $idJuego
            );
            $this->db->insert("postulantes", $data);

            $this->db->select('MAX(postulantesJuego) AS "asis"');
            $this->db->where('idJuego', $idJuego);
            $var = $this->db->get("juegos")->result();
            $data = array("postulantesJuego" => ($var[0]->asis) + 1);
            $this->db->where("idJuego", $idJuego);
            $this->db->update("juegos", $data);

            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

    function verJuegosSuscritos($id)
    {
        $prueba = '<img class="img-responsive" style="width: 130px; height:125px;" src="http://127.0.0.1/Tarreo/lib/img/Juegos/';
        $prueba2 = '" alt=""/>';
        $this->db->select("j.idJuego,j.nombreJuego,j.descripcionJuego,concat('$prueba',j.fotoJuego,'$prueba2') as fotoJuego,j.postulantesJuego,j.fechaRealizacionJuego,j.annoJuego");
        $this->db->from("juegos j");
        $this->db->join("estado e", "e.idEstado = j.estadoJuego");
        $this->db->join("postulantes p", "p.juegoPostulante = j.idJuego");
        $this->db->where("j.estadoJuego", 1);
        $this->db->where("j.tipojuego", 2);
        $this->db->where("p.participantePostulante", $id);
        return $this->db->get();
    }

    function verParticipantesJuegos($id)
    {
        $prueba = '<img class="img-responsive" style="width: 50px; height:50px;" src="http://127.0.0.1/Tarreo/lib/img/Jugadores/';
        $prueba2 = '" alt=""/>';
        $this->db->select("p.idParticipante,p.rutParticipante,concat(p.nombreParticipante,' ',p.apellidoParticipante) as nombreParticipante, concat('$prueba',p.fotoParticipante,'$prueba2') as fotoParticipante");
        $this->db->from("participante p");
        $this->db->join("estado e", "e.idEstado = p.estadoParticipante");
        $this->db->join("postulantes k", "k.participantePostulante = p.idParticipante");
        $this->db->join("juegos j", "j.idJuego = k.juegoPostulante");
        $this->db->where("k.juegoPostulante", $id);
        $this->db->where("p.estadoParticipante", 1);
        $this->db->where("j.estadoJuego", 1);
        return $this->db->get()->result();
    }

    public function getUltimoEquipo()
    {
        $this->db->select('MAX(idEquipo) AS "id"');
        $var = $this->db->get("equipo")->result();
        return ($var[0]->id);
    }


    function addEquipo($nombre, $descripcion, $nombre_imagen, $equipo, $usuario)
    {
        $this->db->select('count (*)');
        $this->db->from('equipo');
        $this->db->where('capitanEquipo', $usuario);
        $this->db->where('juegoEquipo', $equipo);
        $resultado = $this->db->count_all_results();

        if ($resultado == 0) {

            $data = array(
                "nombreEquipo" => $nombre,
                "descripcionEquipo" => $descripcion,
                "fotoEquipo" => $nombre_imagen,
                "integrantesEquipo" => 1,
                "estadoEquipo" => 3,
                "capitanEquipo" => $usuario,
                "juegoEquipo" => $equipo
            );
            $this->db->insert("equipo", $data);

            $id = $this->getUltimoEquipo();

            $data2 = array(
                "participanteEquipo" => $usuario,
                "teamEquipo" => $id,
                "estadoEquipo_Participante" => 3
            );
            $this->db->insert("equipo_participante", $data2);

            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

    function addEquipoSinFoto($nombre, $descripcion, $equipo, $usuario)
    {
        $this->db->select('count (*)');
        $this->db->from('equipo');
        $this->db->where('capitanEquipo', $usuario);
        $this->db->where('juegoEquipo', $equipo);
        $resultado = $this->db->count_all_results();

        if ($resultado == 0) {

            $data = array(
                "nombreEquipo" => $nombre,
                "descripcionEquipo" => $descripcion,
                "fotoEquipo" => "skt1.jpg",
                "integrantesEquipo" => 1,
                "estadoEquipo" => 3,
                "capitanEquipo" => $usuario,
                "juegoEquipo" => $equipo
            );
            $this->db->insert("equipo", $data);
            $id = $this->getUltimoEquipo();

            $data2 = array(
                "participanteEquipo" => $usuario,
                "teamEquipo" => $id,
                "estadoEquipo_Participante" => 3
            );
            $this->db->insert("equipo_participante", $data2);

            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

    function getJuegosParticipante($id)
    {
        $this->db->select("e.idEquipo,e.nombreEquipo,e.descripcionEquipo,e.fotoEquipo,e.integrantesEquipo,j.nombreJuego,k.nombreEstadoE,e.capitanEquipo");
        $this->db->from("equipo e");
        $this->db->join("juegos j", "j.idJuego = e.juegoEquipo");
        $this->db->join("estado_equipo k", "k.idEstadoE = e.estadoEquipo");
        $this->db->join("participante p", "p.idParticipante = e.capitanEquipo");
        $this->db->join("equipo_participante n", "n.teamEquipo = e.idEquipo");
        $this->db->join("estado_participante a", "a.idEstadoP = n.estadoEquipo_participante");
        $this->db->where("n.participanteEquipo", $id);
        $this->db->where("n.estadoEquipo_Participante", 3);
        return $this->db->get()->result();
    }

    function getEquiposParticipantes($id)
    {
        $prueba = '<img class="img-responsive" style="width: 140px; height:100px;" src="http://127.0.0.1/Tarreo/lib/img/Equipos/';
        $prueba2 = '" alt=""/>';
        $this->db->select("e.idEquipo,e.nombreEquipo,e.descripcionEquipo,concat('$prueba',e.fotoEquipo,'$prueba2') as fotoEquipo,e.integrantesEquipo,concat(p.nombreParticipante,' ',p.apellidoParticipante) as nombreParticipante,j.nombreJuego");
        $this->db->from("equipo e");
        $this->db->join("juegos j", "j.idJuego = e.juegoEquipo");
        $this->db->join("participante p", "p.idParticipante = e.capitanEquipo");
        $this->db->join("postulantes n", "n.juegoPostulante = e.juegoEquipo");
        $this->db->where("e.estadoEquipo", 1);
        $this->db->where("n.participantePostulante", $id);
        return $this->db->get();
    }

    function addSolicitud($idEquipo, $idUsuario)
    {
        $this->db->select('count (*)');
        $this->db->from('equipo_participante');
        $this->db->where('participanteEquipo', $idUsuario);
        $this->db->where('teamEquipo', $idEquipo);
        $resultado = $this->db->count_all_results();

        $this->db->select('count (*)');
        $this->db->from('equipo');
        $this->db->where('capitanEquipo', $idUsuario);
        $this->db->where('idEquipo', $idEquipo);
        $resultado2 = $this->db->count_all_results();
        if ($resultado2 == 0) {
            if ($resultado == 0) {
                $data = array(
                    "participanteEquipo" => $idUsuario,
                    "teamEquipo" => $idEquipo,
                    "estadoEquipo_Participante" => 1
                );
                $this->db->insert("equipo_participante", $data);
                return "ok";
            } else {
                return "no";
            }
        } else {
            return "noo";
        }

        return "error";
    }


    function getIntegratesEquipoParticipante($idEquipo, $idUsuario)
    {
        $prueba = '<img class="img-responsive" style="width: 50px; height:50px;" src="http://127.0.0.1/Tarreo/lib/img/Jugadores/';
        $prueba2 = '" alt=""/>';
        $this->db->select("p.idParticipante,p.rutParticipante,concat(p.nombreParticipante,' ',p.apellidoParticipante) as nombreParticipante, concat('$prueba',p.fotoParticipante,'$prueba2') as fotoParticipante");
        $this->db->from("participante p");
        $this->db->join("estado e", "e.idEstado = p.estadoParticipante");
        $this->db->join("equipo_participante k", "k.participanteEquipo = p.idParticipante");
        $this->db->join("estado_participante a", "a.idEstadoP = k.estadoEquipo_Participante");
        $this->db->where("k.teamEquipo", $idEquipo);
        $this->db->where("p.estadoParticipante", 1);
        $this->db->where("k.estadoEquipo_Participante", 3);
        return $this->db->get()->result();
    }

    function getSolicitudesEquipos($idEquipo)
    {
        $this->db->select("p.idParticipante, CONCAT( p.nombreParticipante,  ' ', p.apellidoParticipante ) AS nombreParticipante,a.juegoEquipo,e.idEquipo_Participante");
        $this->db->from("participante p");
        $this->db->join("equipo_participante e", "e.participanteEquipo = p.idParticipante");
        $this->db->join("equipo a", "a.idEquipo = e.teamEquipo");
        $this->db->where("e.teamEquipo", $idEquipo);
        $this->db->where("p.estadoParticipante", 1);
        $this->db->where("e.estadoEquipo_Participante", 1);
        return $this->db->get()->result();
    }

    function rechazar($idJuego, $idParticipante, $id)
    {
        $data = array(
            "estadoEquipo_Participante" => 2
        );
        $this->db->where('idEquipo_Participante', $id);
        $this->db->update("equipo_participante", $data);
        return "ok";
    }

    function aceptar($idJuego, $idParticipante, $id)
    {
        $this->db->select('count (*)');
        $this->db->from('equipo_participante e');
        $this->db->join('equipo p', 'p.idEquipo = e.teamEquipo');
        $this->db->where('e.participanteEquipo', $idParticipante);
        $this->db->where('p.juegoEquipo', $idJuego);
        $this->db->where('e.estadoEquipo_Participante', 3);
        $resultado = $this->db->count_all_results();
        
        if ($resultado == 0) {
            $this->db->select('e.idEquipo');
            $this->db->from('equipo e');
            $this->db->join('equipo_participante a','a.teamEquipo = e.idEquipo');
            $this->db->where('e.juegoEquipo',$idJuego);
            $this->db->where('a.participanteEquipo',$idParticipante);
            $this->db->where('a.idEquipo_Participante',$id);
            $prueba= $this->db->get()->result();

            $this->db->select('MAX(integrantesEquipo) AS "asis"');
            $this->db->where('idEquipo', $prueba[0]->idEquipo);
            $var = $this->db->get("equipo")->result();

            if ($var[0]->asis <6) {
                $data = array(
                    "estadoEquipo_Participante" => 3
                );
                $this->db->where('idEquipo_Participante', $id);
                $this->db->update("equipo_participante", $data);
    
                $data = array("integrantesEquipo" => ($var[0]->asis) + 1);
                $this->db->where("idEquipo", $prueba[0]->idEquipo);
                $this->db->update("equipo", $data);
                return "ok";
            }else{
                return "lleno";
            }
            
        } else {
            return "no";
        }
    }

    function edditEquipoSinFoto($id,$nombre, $descripcion){
        $data = array(
            "nombreEquipo" => $nombre,
            "descripcionEquipo"=>$descripcion
        );
        $this->db->where('idEquipo', $id);
        $this->db->update("equipo", $data);
        return "ok";
    }

    function edditEquipo($id,$nombre, $descripcion, $nombre_imagen){
        $data = array(
            "nombreEquipo" => $nombre,
            "descripcionEquipo"=>$descripcion,
            "fotoEquipo"=> $nombre_imagen
        );
        $this->db->where('idEquipo', $id);
        $this->db->update("equipo", $data);
        return "ok";
    }
}
