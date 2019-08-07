<?php

defined('BASEPATH') or exit('No direct script access allowed');

class administrador extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("modeloAdmin");
    }

    public function admin()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/index.php");
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function participantes()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Participantes.php");
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function juegos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Juegos.php");
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function equipos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Equipos.php");
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function fechas()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Fechas.php");
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function parametros()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Parametros.php");
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addParticipante()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            date_default_timezone_set("Chile/Continental");
            $hora = date('Y:m:d_H:i:s');
            $nombre_imagen = $_FILES['foto']['name'];
            $tipo_imagen = $_FILES['foto']['type'];
            $tamano_imagen = $_FILES['foto']['size'];

            if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . 'Tarreo/lib/img/Jugadores/';
                $nombre_imagen = $hora . $nombre_imagen;



                $rut = $this->input->post("j_username");
                $nombres = $this->input->post("nombres");
                $apellidos = $this->input->post("apellidos");
                $numero = $this->input->post("numero");
                $correo = $this->input->post("correo");
                $clave = substr("$numero", -8);

                $resultado = $this->modeloAdmin->addParticipanteSinFoto($rut, $nombres, $apellidos, $correo, $numero, $clave);

                if ($resultado == "ok") {
                    move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);
                    redirect("ModuloParticipantes");
                } else if ($resultado == "no") {
                    echo "Rut ya registrado";
                } else if ($resultado == "error") {
                    echo "Error";
                }
            } else {
                if ($tamano_imagen <= 10000000) {
                    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . 'Tarreo/lib/img/Jugadores/';
                    $nombre_imagen = $hora . $nombre_imagen;

                    $rut = $this->input->post("j_username");
                    $nombres = $this->input->post("nombres");
                    $apellidos = $this->input->post("apellidos");
                    $numero = $this->input->post("numero");
                    $correo = $this->input->post("correo");
                    $clave = substr("$numero", -8);

                    $resultado = $this->modeloAdmin->addParticipante($rut, $nombres, $apellidos, $correo, $nombre_imagen, $numero, $clave);

                    if ($resultado == "ok") {
                        move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);
                        redirect("ModuloParticipantes");
                    } else if ($resultado == "no") {
                        echo "Rut ya registrado";
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

    public function editarParticipante()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $id = $this->input->post("id");
            $estado = $this->input->post("estado");
            if ($estado == "Activo") {
                $estado = 2;
                $this->modeloAdmin->editarEstadoParticipante($id, $estado);
                echo json_encode(array("msg" => "ok"));
            } else if ($estado == "Inactivo") {
                $estado = 1;
                $this->modeloAdmin->editarEstadoParticipante($id, $estado);
                echo json_encode(array("msg" => "ok"));
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function editarJuego()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $id = $this->input->post("id");
            $estado = $this->input->post("estado");
            if ($estado == "Activo") {
                $estado = 2;
                $this->modeloAdmin->editarEstadoJuego($id, $estado);
                echo json_encode(array("msg" => "ok"));
            } else if ($estado == "Inactivo") {
                $estado = 1;
                $this->modeloAdmin->editarEstadoJuego($id, $estado);
                echo json_encode(array("msg" => "ok"));
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addJuego()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            date_default_timezone_set("Chile/Continental");
            $anno = date('Y');
            $hora = date('Y_m_d_H_i_s');
            $nombre_imagen = $_FILES['foto']['name'];
            $tipo_imagen = $_FILES['foto']['type'];
            $tamano_imagen = $_FILES['foto']['size'];
            $tipo = $this->input->post("tipo");

            if ($tipo != null) {
                if ($tamano_imagen <= 10000000) {
                    if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {

                        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/Tarreo/lib/img/Juegos/';
                        $nombre_imagen = $hora . $nombre_imagen;



                        $nombre = $this->input->post("nombre");
                        $descripcion = $this->input->post("descripcion");
                        $fecha = $this->input->post("fecha");
                        $hora2 = $this->input->post("hora");

                        $fecha = $fecha . ' ' . $hora2;


                        $this->modeloAdmin->addJuego($nombre, $descripcion, $fecha, $anno, $nombre_imagen, $tipo);


                        move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);
                        redirect("ModuloJuegos");
                    } else {
                        echo "El formato de la imagen tiene que ser jpg, png, jpeg o gif.";
                    }
                } else {
                    echo "El tamaño de la imagen supera el limite";
                }
            } else {
                echo "Selecciona el tipo";
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function verParticipantes()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $books = $this->modeloAdmin->verParticipantes();
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idParticipante,
                    $r->rutParticipante,
                    $r->nombreParticipante,
                    $r->correoParticipante,
                    $r->numeroParticipante,
                    $r->fotoParticipante,
                    $r->claveParticipante,
                    $r->numeroJuegosParticipante,
                    $r->nombreEstado
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

    public function verJuegos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $books = $this->modeloAdmin->verJuegos();
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
                    $r->nombreEstado,
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

    public function verEquiposAdmin()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $books = $this->modeloAdmin->verEquiposAdmin();
            $data = array();

            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idEquipo,
                    $r->nombreEquipo,
                    $r->descripcionEquipo,
                    $r->fotoEquipo,
                    $r->integrantesEquipo,
                    $r->nombreEstadoE,
                    $r->nombreParticipante,
                    $r->nombreJuego
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

    public function addComentario()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $titulo = $this->input->post("titulo");
            $comentario = $this->input->post("comentario");
            $admin = $this->input->post("admin");
            $equipo = $this->input->post("equipo");
            $this->modeloAdmin->addComentario($titulo, $comentario, $admin, $equipo);
            echo json_encode(array("msg" => "ok"));
        } else {
            $this->load->view('Errormsg');
        }
    }
}
