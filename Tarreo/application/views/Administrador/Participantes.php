<!DOCTYPE html>
<?php $user = $this->session->userdata("administrador"); ?>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tarreo Inacap Talca | Modulo Participantes</title>
        <link rel="shortcut icon" href="<?php echo base_url() ?>lib/img/icono.png">
        <link href="<?php echo base_url() ?>lib/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/fonts/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/toastr.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>lib/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>lib/css/datatables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>lib/css/mystyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="">
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg" style="padding: 0px; margin: 0px;">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #900">
                        <center>
                            <ul class="nav navbar-top-links navbar-left">
                                <img src="<?php echo base_url() ?>lib/img/admin/logo_admin.png" class="img-responsive" style="width: 240px; height: 65px; padding-left: 20px ; padding-top: 10px;" alt=""/> 
                            </ul>
                        </center>
                        <ul class="nav navbar-top-links navbar-right" style="padding-left: 10px;">
                            <li style="left: 10px">
                                <span class="" style="color: white;"><?php echo $user[0]->nombreAdministrador . ' ' . $user[0]->apellidoAdministrador ?></span>
                            </li>
                            <li style="padding: 10px;">
                                <a id="btn"style="color: white;">
                                    <i class="fa fa-sign-out" style="color: white"></i> Salir
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-sm-4">
                        <h2>Modulo Participantes</h2>
                        <ol class="breadcrumb">
                            <li>
                                <a href="<?php echo base_url() ?>Administrador">Inicio</a>
                            </li>
                            <li class="active">
                                <strong>Modulo Participantes</strong>
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
                            <form id="login" name="login" method="post" action="http://127.0.0.1/Tarreo/agregarParticipante" enctype="multipart/form-data" autocomplete="off" target="_top">
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Rut</label><input id="username" required type="text" name="j_username" class="form-control" autocomplete="off" onfocus="rut(this.value);" onkeypress="return esRutLogin(event)" onkeyup="this.value = this.value.toUpperCase();" onblur="formatoRut()"></div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Nombres</label> <input type="text"  required name="nombres" placeholder="Ingrese Nombres" class="form-control"></div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Apellidos</label> <input type="text" required  name="apellidos" placeholder="Ingrese Apellidos" class="form-control"></div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Numero</label> <input type="text" name="numero" required  placeholder="Ingrese numero telefonico" class="form-control"></div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Correo</label> <input type="email" name="correo" placeholder="Ingrese Correo" class="form-control" required></div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Foto Usuario</label> <input type="file" name="foto" placeholder="Ingrese una Foto" class="form-control" required></div>
                                <div class="form-group form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><button type="submit" id="btnAgregarUsuario"  class="btn btn-primary" style="background-color: black; color: white; ">Registrar Usuario</button></div> 
                            </form>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row" style="padding: 20px;">
                        <h2><strong>Registros de Participantes</strong></h2>
                        <div class="table-responsive">
                            <table id="parti" class="table table-striped table-bordered table-hover dataTables-participantes" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Rut</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Foto</th>
                                        <th>Clave</th>
                                        <th>Juegos</th>
                                        <th>Estado</th>
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
                        <strong>Copyright</strong> <a href="https://solucionesvillar.cl" style="color: graytext">Soluciones Villar</a>  &copy; 2018-2019
                    </div>
                </div>

            </div>
        </div>


        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="<?php echo base_url() ?>lib/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url() ?>lib/js/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/rut.js" type="text/javascript"></script>

        <script src="<?php echo base_url() ?>lib/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>lib/js/inspinia.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/myjs.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/pace.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/jquery.metisMenu.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/toastr.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>lib/js/jquery.peity.min.js" type="text/javascript"></script>


        <script>
                                    $(function () {



                                        $(document).ready(function () {

                                            $('.dataTables-participantes').DataTable({
                                                "ajax": {
                                                    url: "<?php echo site_url() ?>verParticipantes",
                                                    type: 'GET'
                                                },
                                                "columnDefs": [
                                                    {
                                                        "targets": 9,
                                                        "data": null,
                                                        "defaultContent": '<button type="button" id="btnEditarMembresia" class="btn btn-info" data-toggle="modal" data-target="#modal-clase"><i class="glyphicon glyphicon-pencil"></i></button>'
                                                    }

                                                ],
                                                dom: '<"html5buttons"B>lTfgitp',
                                                buttons: [
                                                    {extend: 'copy'},
                                                    {extend: 'csv'},
                                                    {extend: 'excel', title: 'Lista de Participantes'},
                                                    {extend: 'pdf',
                                                        title: 'Lista de Participantes',
                                                        customize: function (doc) {
                                                            doc.content.splice(1, 0, {
                                                                margin: [0, 0, 0, 12],
                                                                alignment: 'center',
                                                                image: 'data:image/png;base64,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%3D%3D'
                                                            });
                                                        }
                                                    },
                                                    {extend: 'print',
                                                        customize: function (win) {
                                                            $(win.document.body).addClass('white-bg');
                                                            $(win.document.body).css('font-size', '10px');
                                                            $(win.document.body).find('table')
                                                                    .addClass('compact')
                                                                    .css('font-size', 'inherit');
                                                        }
                                                    }
                                                ]

                                            });


                                            $("body").on("click", "#btnEditarMembresia", function (e) {
                                                e.preventDefault();
                                                var id = $(this).parent().parent().children()[0];
                                                var estado = $(this).parent().parent().children()[8];
                                                editarParticipante($(id).text(), $(estado).text());

                                                var table = $('#parti').DataTable();
                                                table.ajax.reload(function (json) {
                                                    $('#btnEditarMembresia').val(json.lastInput);
                                                });
                                            });


                                            $("#btn").click(function (e) {
                                                e.preventDefault();
                                                salir();
                                            });
                                        });
                                    });
        </script>
    </body>
</html>