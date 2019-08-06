<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//VistasADMIN


$route['index'] = 'welcome/index';
$route['admin'] = 'welcome/admin';
$route['inicio'] = 'welcome/inicio';
$route['registro'] = 'welcome/registro';

$route['Administrador'] = 'administrador/admin';
$route['ModuloParticipantes'] = 'administrador/participantes';
$route['ModuloJuegos'] = 'administrador/juegos';
$route['ModuloEquipos'] = 'administrador/equipos';
$route['ModuloFechas'] = 'administrador/fechas';
$route['ModuloParametros'] = 'administrador/parametros';


//Ingreso Administrador
$route['iniciarSesion'] = 'welcome/iniciarSesion';
$route['cerrarSesion'] = 'welcome/cerrarSesion';

//Ingreso Participante
$route['iniciarSesionParticipante'] = 'welcome/iniciarSesionParticipante';

//VistasParticipante
$route['Participante'] = 'participante/index';



//Funciones administrador

//Modulo participantes
$route['agregarParticipante'] = 'administrador/addParticipante';
$route['verParticipantes'] = 'administrador/verParticipantes';
$route['editarParticipante'] = 'administrador/editarParticipante';





//modulo juego
$route['addJuego'] = 'administrador/addJuego';
$route['verJuegos'] = 'administrador/verJuegos';



$route['registroParticipante'] = 'welcome/addParticipante';

$route['Juegos'] = 'participante/juegos';
$route['verJuegosParticipante'] = 'participante/verJuegos';



$route['getFotos'] = 'welcome/getFotos';
$route['getFechasJuegos'] = 'welcome/getFechasJuegos';
$route['addPostulante'] = 'participante/addPostulante';
$route['verJuegosSuscritos'] = 'participante/getJuegosInscritos';

$route['Inscritos'] = 'participante/Inscritos';
$route['verjuegosIndividuales'] = 'participante/verjuegosIndividuales';
$route['getParticipantesIndividuales'] = 'participante/getParticipantesIndividuales';
$route['addEquipo'] = 'participante/addEquipo';
$route['Equipo'] = 'participante/Team';
$route['getJuegosParticipante'] = 'participante/getJuegosParticipante';
$route['getEquiposParticipantes'] = 'participante/getEquiposParticipantes';
$route['Postular'] = 'participante/Postular';
$route['addSolicitud'] = 'participante/addSolicitud';
$route['getSolicitudes'] = 'participante/getSolicitudes';
$route['getIntegratesEquipoParticipante'] = 'participante/getIntegratesEquipoParticipante';
$route['getSolicitudesEquipos'] = 'participante/getSolicitudesEquipos';
$route['aceptar'] = 'participante/aceptar';
$route['rechazar'] = 'participante/rechazar';
$route['editarEquipo'] = 'participante/editarEquipo';







