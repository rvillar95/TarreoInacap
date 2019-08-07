<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function index()
    {
        $this->load->view('index.php');
    }

    public function admin()
    {
        $this->load->view("sesion.php");
    }

    public function registro()
    {
        $this->load->view("registro.php");
    }
    public function inicio()
    {
        $this->load->view("participante.php");
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model("indexModel");
    }



    public function iniciarSesion()
    {
        $rut = $this->input->post("rut");
        $clave = $this->input->post("clave");
        $user = $this->indexModel->inicio($rut, $clave);
        if (count($user) > 0) {
            if ($user[0]->estado_idEstado == 1) {
                $this->session->set_userdata("administrador", $user);
                echo json_encode(array("msg" => "administrador"));
            } else if ($user[0]->estado_idEstado == 2) {
                echo json_encode(array("msg" => "inactivo"));
            } else {
                echo json_encode(array("msg" => "error"));
            }
        } else {
            echo json_encode(array("msg" => "nada"));
        }
    }



    public function addParticipante()
    {
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
            $clave = $this->input->post("clave");
            $apellidos = $this->input->post("apellidos");
            $numero = $this->input->post("numero");
            $correo = $this->input->post("correo");
           

            $resultado = $this->indexModel->addParticipanteSinFoto($rut, $nombres, $apellidos, $correo, $numero, $clave);

            if ($resultado == "ok") {
                move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);
                redirect("registro");
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
                $clave = $this->input->post("clave");

                $resultado = $this->indexModel->addParticipante($rut, $nombres, $apellidos, $correo, $nombre_imagen, $numero, $clave);

                if ($resultado == "ok") {
                    move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);
                    redirect("index");
                } else if ($resultado == "no") {
                    echo "Rut ya registrado";
                } else if ($resultado == "error") {
                    echo "Error";
                }
            } else {
                echo "El tamaño de la imagen supera el limite";
            }
        }
    }

    public function getFotos()
    {
        echo json_encode($this->indexModel->getFotos());
    }

    public function iniciarSesionParticipante()
    {
        $rut = $this->input->post("rut");
        $clave = $this->input->post("clave");
        $user = $this->indexModel->inicioParticipante($rut, $clave);
        if (count($user) > 0) {
            if ($user[0]->claveParticipante == $clave) {
                if ($user[0]->estadoParticipante == 1) {
                    $this->session->set_userdata("participante", $user);
                    echo json_encode(array("msg" => "ok"));
                } else if ($user[0]->estadoParticipante == 2) {
                    echo json_encode(array("msg" => "inactivo"));
                } else {
                    echo json_encode(array("msg" => "error"));
                }
            } else {
                echo json_encode(array("msg" => "clave"));
            }
        } else {
            echo json_encode(array("msg" => "nada"));
        }
    }

    public function getFechasJuegos(){
        echo json_encode($this->indexModel->getFechasJuegos());
    }

    public function cerrarSesion()
    {
        $this->session->sess_destroy();
        $this->index();
    }
}
