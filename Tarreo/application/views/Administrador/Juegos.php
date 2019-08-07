<!DOCTYPE html>
<?php $user = $this->session->userdata("administrador"); ?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarreo Inacap Talca | Modulo Juegos</title>
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
                        <li style="left: 10px">
                            <span class="" style="color: white;"><?php echo $user[0]->nombreAdministrador . ' ' . $user[0]->apellidoAdministrador ?></span>
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
                    <h2>Modulo Juegos</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url() ?>Administrador">Inicio</a>
                        </li>
                        <li class="active">
                            <strong>Modulo Juegos</strong>
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
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="http://127.0.0.1/Tarreo/addJuego" enctype="multipart/form-data" autocomplete="off" target="_top">
                            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Nombre Juego</label><input required id="username" placeholder="Nombre del juego" type="text" name="nombre" class="form-control"></div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Descripcion del Juego</label> <input type="text" required name="descripcion" placeholder="Descripción del juego" class="form-control"></div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Fecha Realizacion del Juego</label> <input type="date" name="fecha" required placeholder="Ingrese Apellido paterno" class="form-control"></div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Hora Realizacion del Juego</label>
                                <div class="input-group clockpicker" data-autoclose="true">
                                    <input type="text" name="hora" class="form-control" value="00:00">
                                    <span class="input-group-addon">
                                        <span class="fa fa-clock-o"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Tipo Juego</label> <select class="form-control m-b" required name="tipo"><option disabled selected>Seleccione Tipo</option><option value="1">Individual</option><option value="2">Equipo</option></select></div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Foto Juego (300 x 400)</label> <input type="file" required name="foto" placeholder="300 x 400px" class="form-control"></div>
                            <div class="form-group form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><button type="submit" id="btnAgregarUsuario" class="btn btn-primary" style="background-color: black; color: white; ">Registrar Juego</button></div>
                        </form>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row" style="padding: 20px;">
                    <h2><strong>Registros de Juegos</strong></h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-juegos">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Foto</th>
                                    <th>Postulantes</th>
                                    <th>Fecha</th>
                                    <th>Año</th>
                                    <th>Estado</th>
                                    <th>Tipo</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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
                        url: "<?php echo site_url() ?>verJuegos",
                        type: 'GET'
                    },
                    "columnDefs": [{
                            "targets": 9,
                            "data": null,
                            "defaultContent": '<button type="button" id="btnEditarMembresia" class="btn btn-info" data-toggle="modal" data-target="#modal-clase"><i class="glyphicon glyphicon-pencil"></i></button>'
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
                            title: 'Lista de Participantes'
                        },
                        {
                            extend: 'pdf',
                            title: 'Lista de Participantes'
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


                $("#btn").click(function(e) {
                    e.preventDefault();
                    salir();
                });

            });



        });
    </script>
</body>

</html>