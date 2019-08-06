<?php

defined('BASEPATH') or exit('No direct script access allowed');

class participante extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("modeloParti");
    }

    public function index()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $this->load->view("Participante/index.php");
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function juegos()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $this->load->view("Participante/Juegos.php");
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function Team()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $this->load->view("Participante/Team.php");
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function Inscritos()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $this->load->view("Participante/Inscritos.php");
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function Postular()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $this->load->view("Participante/Equipos.php");
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addPostulante()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $idJuego = $this->input->post("idJuego");
            $idUsuario = $this->input->post("idUsuario");
            $resultado = $this->modeloParti->addPostulante($idJuego, $idUsuario);
            if ($resultado == "ok") {
                echo json_encode(array("msg" => "ok"));
            } else if ($resultado == "no") {
                echo json_encode(array("msg" => "error"));
            } else if ($resultado == "error") {
                echo json_encode(array("msg" => "aaa"));
            }
        } else {
            $this->load->view('Errormsg');
        }
    }



    public function verJuegos()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $books = $this->modeloParti->verJuegos();
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idJuego,
                    $r->nombreJuego,
                    $r->descripcionJuego,
                    $r->fotoJuego,
                    $r->postulantesJuego,
                    $r->fechaRealizacionJuego,
                    $r->annoJuego,
                    $r->nombreTipo_Juego
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function verjuegosIndividuales()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $user = $this->session->userdata("participante");
            $id = $user[0]->idParticipante;
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $books = $this->modeloParti->verjuegosIndividuales($id);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idJuego,
                    $r->nombreJuego,
                    $r->descripcionJuego,
                    $r->fotoJuego,
                    $r->postulantesJuego,
                    $r->fechaRealizacionJuego,
                    $r->annoJuego,
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getJuegosInscritos()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $user = $this->session->userdata("participante");
            $id = $user[0]->idParticipante;
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $books = $this->modeloParti->verJuegosSuscritos($id);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idJuego,
                    $r->nombreJuego,
                    $r->descripcionJuego,
                    $r->fotoJuego,
                    $r->postulantesJuego,
                    $r->fechaRealizacionJuego,
                    $r->annoJuego,
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getParticipantesIndividuales()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $id = $this->input->post("id");
            echo json_encode($this->modeloParti->verParticipantesJuegos($id));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addEquipo()
    {
        if (count($this->session->userdata("participante")) > 0) {
            date_default_timezone_set("Chile/Continental");
            $hora = date('Y_m_d_H_i_s');
            $nombre_imagen = $_FILES['foto']['name'];
            $tipo_imagen = $_FILES['foto']['type'];
            $tamano_imagen = $_FILES['foto']['size'];

            if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {
                $nombre = $this->input->post("nombre");
                $descripcion = $this->input->post("descripcion");
                $equipo = $this->input->post("equipo");
                $usuario = $this->input->post("usuario");
                $resultado = $this->modeloParti->addEquipoSinFoto($nombre, $descripcion, $equipo, $usuario);
                if ($resultado == "ok") {
                    redirect("Equipo");
                } else if ($resultado == "no") {
                    echo json_encode(array("msg" => "error"));
                } else if ($resultado == "error") {
                    echo json_encode(array("msg" => "aaa"));
                }
            } else {
                if ($tamano_imagen <= 10000000) {
                    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . 'Tarreo/lib/img/Equipos/';
                    $nombre_imagen = $hora . $nombre_imagen;

                    $nombre = $this->input->post("nombre");
                    $descripcion = $this->input->post("descripcion");
                    $equipo = $this->input->post("equipo");
                    $usuario = $this->input->post("usuario");
                    $resultado = $this->modeloParti->addEquipo($nombre, $descripcion, $nombre_imagen, $equipo, $usuario);
                    if ($resultado == "ok") {
                        move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);
                        redirect("Equipo");
                    } else if ($resultado == "no") {
                        echo "Ya Existe un equipo registrado a su nombre, comuniquese con un administrador";
                    } else if ($resultado == "error") {
                        echo "Error";
                    }
                } else {
                    echo "El tamaño de la imagen supera el limite";
                }
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getJuegosParticipante()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $id = $this->input->post("id");
            echo json_encode($this->modeloParti->getJuegosParticipante($id));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getEquiposParticipantes()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $user = $this->session->userdata("participante");
            $id = $user[0]->idParticipante;
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $books = $this->modeloParti->getEquiposParticipantes($id);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idEquipo,
                    $r->nombreEquipo,
                    $r->descripcionEquipo,
                    $r->fotoEquipo,
                    $r->integrantesEquipo,
                    $r->nombreParticipante,
                    $r->nombreJuego,
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addSolicitud()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $idEquipo = $this->input->post("idEquipo");
            $idUsuario = $this->input->post("idUsuario");
            $resultado = $this->modeloParti->addSolicitud($idEquipo, $idUsuario);
            if ($resultado == "ok") {
                echo json_encode(array("msg" => "ok"));
            } else if ($resultado == "no") {
                echo json_encode(array("msg" => "error"));
            } else if ($resultado == "error") {
                echo json_encode(array("msg" => "aaa"));
            } else if ($resultado == "noo") {
                echo json_encode(array("msg" => "no"));
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getSolicitudes()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $user = $this->session->userdata("participante");
            $id = $user[0]->idParticipante;
            echo json_encode($this->modeloParti->getSolicitudes($id));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getIntegratesEquipoParticipante()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $user = $this->session->userdata("participante");
            $idUsuario = $user[0]->idParticipante;
            $idEquipo = $this->input->post("id");
            echo json_encode($this->modeloParti->getIntegratesEquipoParticipante($idEquipo, $idUsuario));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getSolicitudesEquipos()
    {
        if (count($this->session->userdata("participante")) > 0) {

            $idEquipo = $this->input->post("id");
            echo json_encode($this->modeloParti->getSolicitudesEquipos($idEquipo));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function aceptar()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $idJuego = $this->input->post("idJ");
            $idParticipante = $this->input->post("idP");
            $id = $this->input->post("id");
            $resultado = $this->modeloParti->aceptar($idJuego, $idParticipante, $id);
            if ($resultado == "ok") {
                echo json_encode(array("msg" => "ok"));
            } else if ($resultado == "no") {
                echo json_encode(array("msg" => "error"));
            } else if ($resultado == "lleno") {
                echo json_encode(array("msg" => "lleno"));
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function rechazar()
    {
        if (count($this->session->userdata("participante")) > 0) {
            $idJuego = $this->input->post("idJ");
            $idParticipante = $this->input->post("idP");
            $id = $this->input->post("id");
            $resultado = $this->modeloParti->rechazar($idJuego, $idParticipante, $id);
            if ($resultado == "ok") {
                echo json_encode(array("msg" => "ok"));
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function editarEquipo()
    {
        if (count($this->session->userdata("participante")) > 0) {
            date_default_timezone_set("Chile/Continental");
            $hora = date('Y_m_d_H_i_s');
            $nombre_imagen = $_FILES['foto']['name'];
            $tipo_imagen = $_FILES['foto']['type'];
            $tamano_imagen = $_FILES['foto']['size'];

            if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {
                $id = $this->input->post("idEquipo");
                $nombre = $this->input->post("nombre");
                $descripcion = $this->input->post("descripcion");
                
                
                $resultado = $this->modeloParti->edditEquipoSinFoto($id,$nombre, $descripcion);
                if ($resultado == "ok") {
                    redirect("Equipo");
                } 
            } else {
                if ($tamano_imagen <= 10000000) {
                    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . 'Tarreo/lib/img/Equipos/';
                    $nombre_imagen = $hora . $nombre_imagen;
                    $id = $this->input->post("idEquipo");
                    $nombre = $this->input->post("nombre");
                    $descripcion = $this->input->post("descripcion");
                    $resultado = $this->modeloParti->edditEquipo($id,$nombre, $descripcion, $nombre_imagen);
                    if ($resultado == "ok") {
                        move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);
                        redirect("Equipo");
                    } 
                } else {
                    echo "El tamaño de la imagen supera el limite";
                }
            }
        } else {
            $this->load->view('Errormsg');
        }
    }
}
