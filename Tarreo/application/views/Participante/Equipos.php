<!DOCTYPE html>
<?php $user = $this->session->userdata("participante"); ?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarreo Inacap Talca | Modulo Equipos</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>lib/img/icono.png">
    <link href="<?php echo base_url() ?>lib/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/fonts/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/toastr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>lib/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>lib/css/mystyle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>lib/css/clockpicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>lib/css/datatables.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg" style="padding: 0px; margin: 0px;">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #900">
                    <center>
                        <ul class="nav navbar-top-links navbar-left">
                            <img src="<?php echo base_url() ?>lib/img/admin/logo_admin.png" class="img-responsive" style="width: 240px; height: 65px; padding-left: 20px ; padding-top: 10px;" alt="" />
                        </ul>
                    </center>
                    <ul class="nav navbar-top-links navbar-right" style="padding-left: 10px;">
                        <li style="top: 18px; left: 10px">
                            <span style="color: white;"> <img src="<?php echo base_url() ?>lib/img/Jugadores/<?php echo $user[0]->fotoParticipante ?>" class="img-circle m-t-xs img-responsive" style="height: 50px; width: 50px;"></span>
                        </li>
                        <li style="left: 10px">
                            <span class="" style="color: white;"><?php echo $user[0]->nombreParticipante . ' ' . $user[0]->apellidoParticipante ?></span>
                        </li>
                        <li style="padding: 10px;">
                            <a id="btn" style="color: white;">
                                <i class="fa fa-sign-out" style="color: white"></i> Salir
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Modulo Equipos</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url() ?>Participante">Inicio</a>
                        </li>
                        <li class="active">
                            <strong>Modulo Equipos</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="" class="btn btn-primary">Actualizar Pagina</a>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row" style="padding: 20px;">
                    <h2><strong>Equipos disponibles para el Tarreo</strong></h2>
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="table-responsive">
                            <table id="tabla" class="table table-striped table-bordered table-hover dataTables-Equipos">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Foto</th>
                                        <th>N° Jugadores</th>
                                        <th>Capitan</th>
                                        <th>Juego</th>
                                        <th>Enviar Solicitud</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="pull-right">

                </div>
                <div>
                    <strong>Copyright</strong> <a href="https://solucionesvillar.cl" style="color: graytext">Soluciones Villar</a> &copy; 2018-2019
                </div>
            </div>

        </div>
    </div>
    <input class="hidden" id="id" value="<?= $user[0]->idParticipante ?>">
    <input class="hidden" id="idE" value="">
    <div class="modal inmodal fade" id="modal-postulante" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">¿Desea usted enviar esta solicitud para ingresar a este equipo?</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" id="enviar" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url() ?>lib/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url() ?>lib/js/datatables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/rut" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>lib/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>lib/js/inspinia.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/myjs.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/pace.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/jquery.metisMenu.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/toastr.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/jquery.peity.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/clockpicker.js" type="text/javascript"></script>

    <script>
        $(function() {



            $(document).ready(function() {

                $('.dataTables-Equipos').DataTable({
                    "ajax": {
                        url: "<?php echo site_url() ?>getEquiposParticipantes",
                        type: 'GET'
                    },
                    "columnDefs": [{
                            "targets": 7,
                            "data": null,
                            "defaultContent": '<button type="button" id="btnAddPostulante" class="btn btn-info" data-toggle="modal" data-target="#modal-postulante"><i class="fa fa-check"></i></button>'
                        }

                    ],
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [{
                            extend: 'copy'
                        },
                        {
                            extend: 'csv'
                        },
                        {
                            extend: 'excel',
                            title: 'Lista de Juegos'
                        },
                        {
                            extend: 'pdf',
                            title: 'Lista de Juegos'
                        },
                        {
                            extend: 'print',
                            customize: function(win) {
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');
                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            }
                        }
                    ]

                });



                $('.clockpicker').clockpicker();
                $("body").on("click", "#btnAddPostulante", function(e) {

                    e.preventDefault();
                    var idEquipo = $(this).parent().parent().children()[0];
                    $("#idE").val($(idEquipo).text());




                });

                $("#enviar").click(function(e) {
                    e.preventDefault();
                    var idEquipo = $(this).parent().parent().children()[0];
                    var idUsuario = $("#id").val();

                    agregarSolicitud($("#idE").val(), idUsuario);
                });

                $("#btn").click(function(e) {
                    e.preventDefault();
                    salir();
                });

            });



        });
    </script>
</body>

</html>