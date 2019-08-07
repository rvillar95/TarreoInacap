<!DOCTYPE html>
<?php $user = $this->session->userdata("administrador"); ?>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarreo Inacap Talca | Modulo Administrador</title>
        <link rel="shortcut icon" href="<?php echo base_url() ?>lib/img/icono.png">
        <link href="<?php echo base_url() ?>lib/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/fonts/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/toastr.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>lib/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>lib/css/mystyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body >
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg" style="padding: 0px; margin: 0px;  ">

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
                        <h2>Modulo Administrador</h2>
                        <ol class="breadcrumb">
                            <li>
                                <a href="<?php echo base_url() ?>Administrador">Login</a>
                            </li>
                            <li class="active">
                                <strong>Administrador</strong>
                            </li>
                        </ol>
                    </div>
                    <div class="col-sm-8">
                        <div class="title-action">
                            <a href="" class="btn btn-primary">Actualizar Pagina</a>
                        </div>
                    </div>
                </div>

                <div class="wrapper wrapper-content  animated fadeInRight" >
<!--                    <img src="<?php echo base_url() ?>lib/img/fondoadmin.jpg" class="img-responsive" style="z-index: -100; position: fixed; padding: 0px; " alt=""/>-->
                    <div class="row">
                        <div class="col-lg-4" >
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: black">
                                    <h5 style="color: white">Gestionar Participantes</h5> 
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <a href=" <?php echo base_url(); ?>ModuloParticipantes">
                                        <center>
                                            <div class="div-img sty contenedor" >
                                                <img src="<?php echo base_url() ?>lib/img/admin/participantes.jpg"  class="img-responsive img" alt=""/>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                                <div class="ibox-footer" style="padding: 0px; margin: 0px;">


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: black">
                                    <h5 style="color: white">Gestionar Juegos</h5> 
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <a href="<?php echo base_url(); ?>ModuloJuegos">
                                        <center>
                                            <div class="div-img sty" >
                                                <img src="<?php echo base_url() ?>lib/img/admin/juegos.jpg"  class="img-responsive img" alt=""/>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                                <div class="ibox-footer" style="padding: 0px; margin: 0px;">


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: black">
                                    <h5 style="color: white">Gestionar Equipos</h5> 
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <a href="<?php echo base_url(); ?>ModuloEquipos">
                                        <center>
                                            <div class="div-img sty" >
                                                <img src="<?php echo base_url() ?>lib/img/admin/equipos.png"  class="img-responsive img" alt=""/>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                                <div class="ibox-footer" style="padding: 0px; margin: 0px;">


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: black">
                                    <h5 style="color: white">Gestionar Fechas</h5> 
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>

                                    </div>
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <a href=" <?php echo base_url(); ?>ModuloFechas">
                                        <center>
                                            <div class="div-img sty" >
                                                <img src="<?php echo base_url() ?>lib/img/admin/fechas.jpg"  class="img-responsive img" alt=""/>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                                <div class="ibox-footer" style="padding: 0px; margin: 0px;">


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="background-color: black">
                                    <h5 style="color: white">Gestionar Parametros</h5> 
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>

                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content" style="padding: 0px;">
                                    <a href=" <?php echo base_url(); ?>ModuloParametros">
                                        <center>
                                            <div class="div-img sty" >
                                                <img src="<?php echo base_url() ?>lib/img/admin/parametros.jpg"  class="img-responsive img" alt=""/>
                                            </div>
                                        </center>
                                    </a>
                                </div>
                                <div class="ibox-footer" style="padding: 0px; margin: 0px;">


                                </div>
                            </div>
                        </div>
                        <!--                        <div class="col-lg-4">
                                                    <div class="ibox float-e-margins">
                                                        <div class="ibox-title" style="background-color: black">
                                                            <h5 style="color: white">Gestionar Membresias</h5> 
                                                            <div class="ibox-tools">
                                                                <a class="collapse-link">
                                                                    <i class="fa fa-chevron-up"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="ibox-content" style="padding: 0px;">
                                                            <a href="<?php echo base_url(); ?>ModuloMembresias">
                                                                <center>
                                                                    <div class="div-img sty" >
                                                                        <img src="<?php echo base_url() ?>lib/img/img2.jpg"  class="img-responsive img" alt=""/>
                                                                    </div>
                                                                </center>
                                                            </a>
                                                        </div>
                                                        <div class="ibox-footer">
                                                            <span class="pull-right">
                                                                The righ side of the footer
                                                            </span>
                                                            This is simple footer example
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="ibox float-e-margins">
                                                        <div class="ibox-title" style="background-color: black">
                                                            <h5 style="color: white">Gestionar Productos</h5> 
                                                            <div class="ibox-tools">
                                                                <a class="collapse-link">
                                                                    <i class="fa fa-chevron-up"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="ibox-content" style="padding: 0px;">
                                                            <a href="<?php echo base_url(); ?>ModuloProductos">
                                                                <center>
                                                                    <div class="div-img sty" >
                                                                        <img src="<?php echo base_url() ?>lib/img/img3.jpg"  class="img-responsive img" alt=""/>
                                                                    </div>
                                                                </center>
                                                            </a>
                                                        </div>
                                                        <div class="ibox-footer">
                                                            <span class="pull-right">
                                                                The righ side of the footer
                                                            </span>
                                                            This is simple footer example
                                                        </div>
                                                    </div>
                                                </div>-->
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


                    // Add slimscroll to element
                    $('.scroll_content').slimscroll({
                        height: '200px'
                    })
                    $("#btn").click(function (e) {
                        e.preventDefault();
                        salir();
                    });

                });



            });
        </script>
    </body>
</html>