<!DOCTYPE html>
<?php $user = $this->session->userdata("administrador"); ?>
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
                    <h2>Modulo Equipos</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url() ?>Administrador">Inicio</a>
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
                    <h2><strong>Registros de Equipos</strong></h2>
                    <div class="table-responsive">
                        <table id="tabla" class="table table-striped table-bordered table-hover dataTables-equipos">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Foto</th>
                                    <th>Integrantes</th>
                                    <th>Estado</th>
                                    <th>Capitan</th>
                                    <th>Juego</th>
                                    <th>Editar</th>
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

    <div id="modal-equipo" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
                                    <center><h3>Editar estado</h3></center>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><select id="estado" class="form-control m-b"><option disabled selected>Seleccione Estado</option><option value="3">Pendiente</option><option value="1">En Proceso</option><option value="2">Aprobado</option></select></div>
                                    <div class="hidden"> <input type="text" required name="equipo" id="idEquipo" placeholder="Ingrese Descripcion Equipo" class="form-control"></div>
                                    <div class="hidden"><label>Descripcion Equipo</label> <input type="text" required name="equipo" id="equipo" placeholder="Ingrese Descripcion Equipo" class="form-control"></div>
                                    
                                    <div class="form-group form-group col-lg-12 col-md-12 col-sm-4 col-xs-12"><button type="submit" id="btnEditarEstado" class="btn btn-primary" style="background-color: black; color: white; ">Editar Estado Equipo</button></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <center><h3>Ingresar comentario</h3></center>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Titulo</label> <input type="text" required id="titulo" placeholder="Ingrese Titulo Comentario" class="form-control"></div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Descripción </label> <textarea id="descripcion" class="form-control" placeholder="Escribe tu comentario"></textarea></div>
                                    <div class="hidden"><input type="text" id="idAdmin" value="<?= $user[0]->idAdministrador ?>"></div>
                                    <div class="hidden"><input type="text" id="id" ></div>
                                    <div class="form-group form-group col-lg-12 col-md-12 col-sm-4 col-xs-12"><button type="submit" id="btnAgregarComentario" class="btn btn-primary" style="background-color: black; color: white; ">Agregar Comentario</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-integrantes" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tu Equipo</h4>
                    <small class="font-bold">Integrantes de tu Equipo.</small>
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
                $('.dataTables-equipos').DataTable({
                    "ajax": {
                        url: "<?php echo site_url() ?>verEquiposAdmin",
                        type: 'GET'
                    },
                    "columnDefs": [{
                            "targets": 8,
                            "data": null,
                            "defaultContent": '<button type="button" id="btnEditarEquipo" class="btn btn-info" data-toggle="modal" data-target="#modal-equipo"><i class="glyphicon glyphicon-pencil"></i></button>  <button type="button" id="btnVerEquipo" class="btn btn-info" data-toggle="modal" data-target="#modal-integrantes"><i class="fa fa-bars"></i></button>'
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
                $("#formSelect").hide();


                $("body").on("click", "#btnEditarEquipo", function(e) {
                    e.preventDefault();
                    var idEquipo = $(this).parent().parent().children()[0];
                    var idAdmin = $("#idAdmin").val();
                    $("#idEquipo").val($(idEquipo).text())
                    

                    var table = $('#tabla').DataTable();
                    table.ajax.reload(function(json) {
                        $('#btnEditarEquipo').val(json.lastInput);
                    });
                    
                });

                $("body").on("click", "#btnVerEquipo", function(e) {
                    e.preventDefault();
                    var idEquipo = $(this).parent().parent().children()[0];
           
                    
                    verIntegrantesAdmin($(idEquipo).text());

                    var table = $('#tabla').DataTable();
                    table.ajax.reload(function(json) {
                        $('#btnVerEquipo').val(json.lastInput);
                    });
                    
                });

                $("#btnAgregarComentario").click(function(e){
                    e.preventDefault();
                    addComentario();
                    
                    var table = $('#tabla').DataTable();
                    table.ajax.reload(function(json) {
                        $('#btnAgregarComentario').val(json.lastInput);
                    });
                });


                $("#btnEditarEstado").click(function(e){
                    e.preventDefault();
                    editarEstado();
                    var table = $('#tabla').DataTable();
                    table.ajax.reload(function(json) {
                        $('#btnAgregarComentario').val(json.lastInput);
                    });
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