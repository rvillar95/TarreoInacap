function IniciarSesionAdmin() {

    var rut = $("#username").val();
    var clave = $("#clave").val();
    if (rut == "" || clave == "") {
        alert("ingresa todos los datos");
    } else {

        $.ajax({
            url: 'iniciarSesion',
            type: 'POST',
            dataType: 'json',
            data: { "rut": rut, "clave": clave }
        }).then(function (msg) {
            if (msg.msg == "error") {
                alert("error");
            } else if (msg.msg == "administrador") {
                window.location.href = 'http://127.0.0.1/Tarreo/Administrador';

            } else if (msg.msg == "inactivo") {
                alert("Cuenta Inactiva");
            } else if (msg.msg == "nada") {
                alert("nada");
            }

        });
    }
}

function IniciarSesionParticipante() {
    var rut = $("#username").val();
    var clave = $("#clave").val();
    if (rut == "" || clave == "") {
        alert("ingresa todos los datoss");
    } else {
        $.ajax({
            url: 'iniciarSesionParticipante',
            type: 'POST',
            dataType: 'json',
            data: { "rut": rut, "clave": clave }
        }).then(function (msg) {
            if (msg.msg == "error") {
                alert("error");
            } else if (msg.msg == "ok") {
                window.location.href = 'http://127.0.0.1/Tarreo/Participante';
                alert("funca");
            } else if (msg.msg == "inactivo") {
                alert("Cuenta Inactiva");
            } else if (msg.msg == "nada") {
                alert("nada");
            } else if (msg.msg == "clave") {
                alert("Clave Incorrecta");
            }

        });
    }
}



function ingresoMultiple() {
    var rut = $("#rutUsuario").val();
    var clave = $("#clave").val();
    var tipo = $("#selectSession").val();
    if (rut == "" || clave == "" || tipo == null) {
        alert("ingresa todos los datos");
    } else {
        $.ajax({
            url: 'http://127.0.0.1/SacrificeSports/index.php/sesionMultiple',
            type: 'POST',
            dataType: 'json',
            data: { "rut": rut, "clave": clave, "tipo": tipo }
        }).then(function (msg) {
            if (msg.msg == "error") {
                $.notify({
                    icon: "lib/img/no.png",
                    message: "<strong>Error, verifique su clave.</strong>"
                }, {
                        icon_type: 'image',
                        type: "danger"
                    });
            } else if (msg.msg == "administrador") {
                window.location.href = 'http://127.0.0.1/SacrificeSports/Administrador';
            } else if (msg.msg == "entrenador") {
                window.location.href = 'http://127.0.0.1/SacrificeSports/Entrenador';
            } else if (msg.msg == "socio") {
                window.location.href = 'http://127.0.0.1/SacrificeSports/Socio';
            } else if (msg.msg == "profesor") {
                window.location.href = 'http://127.0.0.1/SacrificeSports/Profesor';
            }
        });
    }
}

function salir() {
    $.ajax({
        url: 'cerrarSesion', type: 'POST', dataType: 'json', data: {}
    }).then(function (msg) {

    });
    window.location.href = 'http://127.0.0.1/Tarreo/';
}

function editarParticipante(id, estado) {
    var id = id;
    var estado = estado;
    if (id == "" || estado == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
        toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
    } else {
        $.ajax({
            url: 'editarParticipante',
            type: 'POST',
            dataType: 'json',
            data: { "id": id, "estado": estado }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Participante Editado", "Estado Cambiado!!!")

                $("#categoria").val("");
            } else {
                toastr.error("", "Error el editar la Membresia!!!")
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            }
        });
    }
}

function getFotosJuegos() {
    var hola = 'http://127.0.0.1/Tarreo/getFotos';

    $("#fotosJuegos").empty();
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {

            var fila = '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12  animated fadeInDown"> <div ><h1><strong>' + o.nombreJuego + '</strong></h1><a href="#!" class="contenedor"><img src="http://127.0.0.1/Tarreo/lib/img/Juegos/' + o.fotoJuego + '"  class="img-responsive imagen" alt=""/></a><div class="contact-box-footer"><div class="m-t-xs btn-group"><p style="color: white;">Postulantes: <span id="postulantes">' + o.postulantesJuego + '</span></p><button type="submit"  class="btn btn-primary"  data-toggle="modal" data-target=".modal-login" ><strong>Postular</strong></button></div></div></div></div>';

            $("#fotosJuegos").append(fila);
        });

    });
}

function getFechasJuegos() {
    var hola = 'http://127.0.0.1/Tarreo/getFechasJuegos';

    $("#vertical-timeline").empty();
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {

            var fila = '<div class="vertical-timeline-block"><div class="vertical-timeline-icon navy-bg"><i class="fa fa-users"></i></div>   <div class="vertical-timeline-content"><h2 style="color: black;">' + o.nombreJuego + '</h2><h2 style="color: black;">Tipo Juego: ' + o.tipo + '</h2><h2 style="color: black;">Descripción: ' + o.descripcionJuego + '</h2><h2 style="color: black;">Fecha: ' + o.fecha + '</h2><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target=".modal-login">Postularme</a></div></div>';

            $("#vertical-timeline").append(fila);
        });

    });
}

function agregarPostulante(idJuego, idUsuario) {
    var idJuego = idJuego;
    var idUsuario = idUsuario;
    if (idJuego == "" || idUsuario == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
        toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
    } else {
        $.ajax({
            url: 'addPostulante',
            type: 'POST',
            dataType: 'json',
            data: { "idJuego": idJuego, "idUsuario": idUsuario }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Te haz Suscrito a este Juego", "Exito en la Acción!!!")

                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            } else if (msg.msg == "error") {
                toastr.error("Error", "Usted ya se encuentra Suscrito")
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            }
        });
    }
}

function getParticipantesIndividuales(id) {
    var id = id;
    if (id == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'getParticipantesIndividuales',
            type: 'POST',
            dataType: 'json',
            data: { "id": id }
        }).then(function (msg) {
            $("#tbodyDetalle").empty();
            $.each(msg, function (i, o) {
                var fila = "<tr><td>" + o.idParticipante + "</td>";
                fila += "<td >" + o.rutParticipante + "</td>";
                fila += "<td >" + o.nombreParticipante + "</td>";
                fila += "<td >" + o.fotoParticipante + "</td></tr>";
                $("#tbodyDetalle").append(fila);
            });
        });
    }
}

function getJuegosParticipante(id) {
    var id = id;

    if (id == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'getJuegosParticipante',
            type: 'POST',
            dataType: 'json',
            data: { "id": id }
        }).then(function (msg) {
            $("#bodyJuegos").empty();
            $.each(msg, function (i, o) {
                $.ajax({
                    url: 'getNumeroNotificaciones',
                    type: 'POST',
                    dataType: 'json',
                    data: { "id": o.idEquipo }
                }).then(function (k) {
                    if (o.capitanEquipo == id) {

                        var fila = '<div class="row">  <input class="hidden" id="idEquipoSolicitud" value="' + o.idEquipo + '" />              <div class="col-md-5">          <center>          <div class="div-img sty contenedor"><img src="http://127.0.0.1/Tarreo/lib/img/Equipos/' + o.fotoEquipo + '" class="img-responsive img" alt="" /></div>    </center>            </div>                <div class="col-md-7">                    <h2 class="">' + o.nombreEquipo + ' </h2><small>Juego: ' + o.nombreJuego + ' </small></br><small>Descripción: ' + o.descripcionEquipo + '</small></br>                    <div class="m-t-md">                        <h2 class="product-main-price">' + o.integrantesEquipo + ' <small class="text-muted">Integrantes</small></h2>                    </div>                    <form id="login" name="login" method="post" action="http://127.0.0.1/Tarreo/editarEquipo" enctype="multipart/form-data">                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Nombre Equipo</label> <input type="text" value="' + o.nombreEquipo + '" required name="nombre" placeholder="Ingrese Nombre Equipo" class="form-control"></div>                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Descripcion Equipo</label> <input type="text" value="' + o.descripcionEquipo + '" required name="descripcion" placeholder="Ingrese Descripcion Equipo" class="form-control"></div>                        <div class="hidden"><label>Descripcion Equipo</label> <input type="text" required name="usuario" value="<?= $user[0]->idParticipante ?>"></div>                        <div class="hidden"><label>Descripcion Equipo</label> <input type="text" required name="idEquipo" value="' + o.idEquipo + '"></div>                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Foto Equipo</label> <input type="file" name="foto" placeholder="Ingrese una Foto" class="form-control"></div>                        <div class="form-group form-group col-lg-12 col-md-12 col-sm-4 col-xs-12"><button type="submit" id="btnAgregarEquipo" class="btn btn-primary btn-sm">Editar Equipo</button></div>                    </form>                    <div>                <div class="btn-group"><button class="btn btn-primary btn-sm" id="btnVerSolicitudes" value="' + o.idEquipo + '" data-toggle="modal" data-target="#modal-solicitudes"> Ver Solicitudes <span class="label label-danger pull-center" id="noti">' + k + '</span></button></div> <div class="btn-group"><button class="btn btn-primary btn-sm" data-toggle="modal"  id="btnVerIntegrantes" value="' + o.idEquipo + '"  data-target="#modal-integrantes"> Ver Integrantes </button></div>  <div class="btn-group"><button class="btn btn-primary btn-sm" data-toggle="modal"  id="btnVerComentario" value="' + o.idEquipo + '"  data-target="#modal-comentario"> Ver Comentarios </button></div>                        </div>                </div>            </div></br>';
                        $("#bodyJuegos").append(fila);
                    } else {

                        var fila = '<div class="row">    <input class="hidden" id="idEquipoIntegrantes" value="' + o.idEquipo + '" />            <div class="col-md-5">          <center>          <div class="div-img sty contenedor"><img src="http://127.0.0.1/Tarreo/lib/img/Equipos/' + o.fotoEquipo + '" class="img-responsive img" alt="" /></div>    </center>            </div>                <div class="col-md-7">                    <h2 class="">' + o.nombreEquipo + ' </h2><small>Juego: ' + o.nombreJuego + ' </small></br><small>Descripción: ' + o.descripcionEquipo + '</small></br>                    <div class="m-t-md">                        <h2 class="product-main-price">' + o.integrantesEquipo + ' <small class="text-muted">Integrantes</small></h2>                    </div>                     <div class="btn-group"><button class="btn btn-primary btn-sm"  id="btnVerIntegrantes" value="' + o.idEquipo + '"  data-toggle="modal" data-target="#modal-integrantes"> Ver Integrantes </button></div>                        </div>                </div>            </div></br>';
                        $("#bodyJuegos").append(fila);
                    }

                });

                //var fila = '<div class="row">                <div class="col-md-5">          <center>          <div class="div-img sty contenedor"><img src="http://127.0.0.1/Tarreo/lib/img/Equipos/'+o.fotoEquipo+'" class="img-responsive img" alt="" /></div>    </center>            </div>                <div class="col-md-7">                    <h2 class="">'+o.nombreEquipo+' </h2><small>Juego: '+o.nombreJuego+' </small></br><small>Descripción: '+o.descripcionEquipo+'</small></br>                    <div class="m-t-md">                        <h2 class="product-main-price">'+o.integrantesEquipo+' <small class="text-muted">Integrantes</small></h2>                    </div>                    <form id="login" name="login" method="post" action="http://127.0.0.1/Tarreo/editEquipo" enctype="multipart/form-data">                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Nombre Equipo</label> <input type="text" value="'+o.nombreEquipo+'" required name="nombre" placeholder="Ingrese Nombre Equipo" class="form-control"></div>                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Descripcion Equipo</label> <input type="text" value="'+o.descripcionEquipo+'" required name="descripcion" placeholder="Ingrese Descripcion Equipo" class="form-control"></div>                        <div class="hidden"><label>Descripcion Equipo</label> <input type="text" required name="usuario" value="<?= $user[0]->idParticipante ?>"></div>                        <div class="hidden"><label>Descripcion Equipo</label> <input type="text" required name="idEquipo" value="'+o.idEquipo+'"></div>                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Foto Equipo</label> <input type="file" name="foto" placeholder="Ingrese una Foto" class="form-control"></div>                        <div class="form-group form-group col-lg-12 col-md-12 col-sm-4 col-xs-12"><button type="submit" id="btnAgregarEquipo" class="btn btn-primary btn-sm">Editar Equipo</button></div>                    </form>                    <div>                <div class="btn-group"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-solicitudes"> Ver Solicitudes <span class="label label-danger pull-center" id="noti"></span></button></div> <div class="btn-group"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-integrantes"> Ver Integrantes </button></div>                        </div>                </div>            </div></br>';
                //$("#bodyJuegos").append(fila);
            });
        });
    }
}

function agregarSolicitud(idEquipo, idUsuario) {
    var idEquipo = idEquipo;
    var idUsuario = idUsuario;
    if (idEquipo == "" || idUsuario == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
        toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
    } else {
        $.ajax({
            url: 'addSolicitud',
            type: 'POST',
            dataType: 'json',
            data: { "idEquipo": idEquipo, "idUsuario": idUsuario }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Solicitud enviada con Exito", "Exito en la Acción!!!")

                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            } else if (msg.msg == "error") {
                toastr.error("Error", "Usted ya tiene una solicitud pendiente")
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            } else if (msg.msg == "no") {
                toastr.error("Error", "Usted ya es Capitan de un Equipo")
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            }
        });
    }
}

function verSolicitudes(datos) {
    var id = datos;
    if (id == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'getSolicitudesEquipos',
            type: 'POST',
            dataType: 'json',
            data: { "id": id }
        }).then(function (msg) {
            $("#bodySolicitud").empty();
            $.each(msg, function (i, o) {
                var fila = '<ul class="notes"><li><div><h4 id="idP" value="' + o.idParticipante + '" class="hidden">Long established fact</h4><h4 id="nombreP" style="color:black">' + o.nombreParticipante + '</h4><p style="color:black">Elige que hacer con este participante.</p><button type="submit" id="btnAceptar" value="' + o.idParticipante + ',' + o.juegoEquipo + ',' + o.idEquipo_Participante + '" class="btn btn-primary  btn-sm">Aceptar</button><button type="submit" style="background-color: red; color: white;" id="btnRechazar" value="' + o.idParticipante + ',' + o.juegoEquipo + ',' + o.idEquipo_Participante + '" class="btn btn-sm">Rechazar</button></div></li></ul>';
                $("#bodySolicitud").append(fila);
            });
        });
    }
}

function verIntegrantes(datos) {
    var id = datos;
    if (id == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'getIntegratesEquipoParticipante',
            type: 'POST',
            dataType: 'json',
            data: { "id": id }
        }).then(function (msg) {
            $("#tbodyDetalle").empty();
            $.each(msg, function (i, o) {
                var fila = "<tr><td>" + o.idParticipante + "</td>";
                fila += "<td >" + o.rutParticipante + "</td>";
                fila += "<td >" + o.nombreParticipante + "</td>";
                fila += "<td >" + o.fotoParticipante + "</td></tr>";
                $("#tbodyDetalle").append(fila);

            });
        });
    }
}

function rechazarParticipante(idParticipante, idJuego, id) {
    var idParticipante = idParticipante;
    var idJuego = idJuego;
    var id = id;
    if (idParticipante == "" || idJuego == "" || id == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'rechazar',
            type: 'POST',
            dataType: 'json',
            data: { "idP": idParticipante, "idJ": idJuego, "id": id }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Participante Rechazado", "Exito en la Acción!!!")
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            } else if (msg.msg == "error") {
                toastr.error("Error", "Puede que ya este en otro Equipo...")
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            }

        });
    }
}

function aceptarParticipante(idParticipante, idJuego, id) {
    var idParticipante = idParticipante;
    var idJuego = idJuego;
    var id = id;
    if (idParticipante == "" || idJuego == "" || id == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'aceptar',
            type: 'POST',
            dataType: 'json',
            data: { "idP": idParticipante, "idJ": idJuego, "id": id }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Participante Aceptado", "Exito en la Acción!!!")
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            } else if (msg.msg == "error") {
                toastr.error("Error", "Puede que ya este en otro Equipo...")
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            } else if (msg.msg == "lleno") {
                toastr.error("Error", "El Maximo de integrantes es 6.")
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            }

        });
    }
}

function getNumeroNoti(datos) {
    var id = datos;
    if (id == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'getNumeroNotificaciones',
            type: 'POST',
            dataType: 'json',
            data: { "id": id }
        }).then(function (msg) {
            $("#noti").val(msg);

        });
    }
}

function addComentario() {
    var titulo = $("#titulo").val();
    var comentario = $("#descripcion").val();
    var admin = $("#idAdmin").val();
    var equipo = $("#idEquipo").val();
    if (titulo == "" || comentario == "" || admin == "" || equipo == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
        toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
    } else {
        $.ajax({
            url: 'addComentario',
            type: 'POST',
            dataType: 'json',
            data: { "titulo": titulo, "comentario": comentario, "admin": admin, "equipo": equipo }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Comentario Adjuntado con Exito", "Exito en la Acción!!!")
                $("#titulo").val("");
                $("#descripcion").val("");
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            } else if (msg.msg == "error") {
                toastr.error("Error", "Ocurrio un error al agregar comentario")
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            }
        });
    }
}

function verComentariosParticipante(datos) {
    var id = datos;
    if (id == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'getComentariosParticipantes',
            type: 'POST',
            dataType: 'json',
            data: { "id": id }
        }).then(function (msg) {
            $("#tbodyComentario").empty();
            $.each(msg, function (i, o) {
                var fila = "<tr><td>" + o.idtituloComentario_Equipo + "</td>";
                fila += "<td >" + o.tituloComentario_Equipo + "</td>";
                fila += "<td >" + o.detalleComentario_Equipo + "</td>";
                fila += "<td >" + o.fecha + "</td>";
                fila += "<td >" + o.nombreAdministrador + "</td></tr>";
                $("#tbodyComentario").append(fila);

            });
        });
    }
}


function editarJuego(id,estado){
    var id = id;
         var estado = estado;
       if (id == "" || estado=="") {
           toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
           toastr.options = {"closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut"}
       } else {
           $.ajax({
               url: 'editarJuego',
               type: 'POST',
               dataType: 'json',
               data: {"id": id,"estado":estado}
           }).then(function (msg) {
               if (msg.msg == "ok") {
                   toastr.success("Juego Editado", "Estado Cambiado!!!")
                   
                   $("#categoria").val("");
               } else {
                   toastr.error("", "Error el editar la Membresia!!!")
                   toastr.options = {"closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut"}
               }
           });
       }
   
   }

