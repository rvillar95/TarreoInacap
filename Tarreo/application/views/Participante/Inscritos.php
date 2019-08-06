<!DOCTYPE html>
<?php $user = $this->session->userdata("participante"); ?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarreo Inacap Talca | Modulo Campaña</title>
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
                    <h2>Modulo Campaña</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url() ?>Participante">Inicio</a>
                        </li>
                        <li class="active">
                            <strong>Modulo Campaña</strong>
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
                    <h2><strong>Juegos En Equipos</strong></h2>
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="table-responsive">
                            <table id="tabla" class="table table-striped table-bordered table-hover dataTables-juegos">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Foto</th>
                                        <th>Postulantes</th>
                                        <th>Fecha</th>
                                        <th>Año</th>
                                        <th>Crear Equipo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="row" style="padding: 20px;">
                    <h2><strong>Juegos Individuales</strong></h2>
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-juegosIndividuales">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Foto</th>
                                        <th>Postulantes</th>
                                        <th>Fecha</th>
                                        <th>Año</th>
                                        <th>Ver Participantes</th>
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
    <div id="modal-participantes" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Participantes Inscritos</h4>
                    <small class="font-bold">El dia del tarreo tendras que enfrentarte a estos participantes.</small>
                </div>
                <div class="modal-body">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID </th>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyDetalle">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-equipos" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Crea tu Equipo</h4>
                    <small class="font-bold">Rellene el siguiente formulario y podras ser Capitan de tu Equipo.</small>
                </div>
                <div class="modal-body">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login" name="login" method="post" action="http://127.0.0.1/Tarreo/addEquipo" enctype="multipart/form-data">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Nombre Equipo</label> <input type="text" required name="nombre" placeholder="Ingrese Nombre Equipo" class="form-control"></div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Descripcion Equipo</label> <input type="text" required name="descripcion" placeholder="Ingrese Descripcion Equipo" class="form-control"></div>
                                        <div class="hidden"><label>Descripcion Equipo</label> <input type="text" required name="equipo" id="equipo" placeholder="Ingrese Descripcion Equipo" class="form-control"></div>
                                        <div class="hidden"><label>Descripcion Equipo</label> <input type="text" required name="usuario" value="<?= $user[0]->idParticipante ?>"></div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Foto Equipo</label> <input type="file" name="foto" placeholder="Ingrese una Foto" class="form-control"></div>
                                        <div class="form-group form-group col-lg-12 col-md-12 col-sm-4 col-xs-12"><button type="submit" id="btnAgregarEquipo" class="btn btn-primary" style="background-color: black; color: white; ">Registrar Equipo</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

                $('.dataTables-juegos').DataTable({
                    "ajax": {
                        url: "<?php echo site_url() ?>verJuegosSuscritos",
                        type: 'GET'
                    },
                    "columnDefs": [{
                            "targets": 7,
                            "data": null,
                            "defaultContent": '<button type="button" id="btnAddEquipo" class="btn btn-info" data-toggle="modal" data-target="#modal-equipos"><i class="fa fa-plus"></i></button>'
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

                $('.dataTables-juegosIndividuales').DataTable({
                    "ajax": {
                        url: "<?php echo site_url() ?>verjuegosIndividuales",
                        type: 'GET'
                    },
                    "columnDefs": [{
                            "targets": 7,
                            "data": null,
                            "defaultContent": '<button type="button" id="btnAddEquipo" class="btn btn-info" data-toggle="modal" data-target="#modal-participantes"><i class="fa fa-eye"></i></button>'
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



                $("body").on("click", "#btnAddEquipo", function(e) {

                    e.preventDefault();
                    var idJuego = $(this).parent().parent().children()[0];
                    $("#equipo").val($(idJuego).text());

                    getParticipantesIndividuales($(idJuego).text());
                });

                $('.clockpicker').clockpicker();


                $("#btn").click(function(e) {
                    e.preventDefault();
                    salir();
                });

            });



        });
    </script>
</body>

</html>