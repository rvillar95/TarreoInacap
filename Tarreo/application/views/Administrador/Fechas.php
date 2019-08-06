<!DOCTYPE html>
<?php $user = $this->session->userdata("administrador"); ?>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tarreo Inacap Talca | Modulo Fechas</title>
        <link rel="shortcut icon" href="<?php echo base_url() ?>lib/img/icono.png">
        <link href="<?php echo base_url() ?>lib/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/fonts/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/css/toastr.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>lib/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
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
                        <h2>Modulo Fechas</h2>
                        <ol class="breadcrumb">
                            <li>
                                <a href="<?php echo base_url() ?>Administrador">Inicio</a>
                            </li>
                            <li class="active">
                                <strong>Modulo Fechas</strong>
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
                            <form id="login" name="login" method="post" action="http://127.0.0.1/SacrificeSports/addUser" autocomplete="off" target="_top">
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Rut</label><input id="username" type="text" name="j_username" class="form-control" autocomplete="off" onfocus="rut(this.value);" onkeypress="return esRutLogin(event)" onkeyup="this.value = this.value.toUpperCase();" onblur="formatoRut()"></div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Nombre</label> <input type="text" name="nombre" placeholder="Ingrese Nombre" class="form-control"></div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Apellido Paterno</label> <input type="text" name="apellidoP" placeholder="Ingrese Apellido paterno" class="form-control"></div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Apellido Materno</label> <input type="text" name="apellidoM" placeholder="Ingrese Apellido Materno" class="form-control"></div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Fecha de Nacimiento</label> <input type="date" name="fechaN" placeholder="Ingrese fecha de nacimiento" class="form-control"></div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Correo</label> <input type="email" name="correo" placeholder="Ingrese Correo" class="form-control" required></div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><label>Foto Usuario</label> <input type="file" name="foto" placeholder="Ingrese una Foto" class="form-control" required></div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12">    
                                    <label class="checkbox-inline"><input type="checkbox" value="1" id="rol1"> Administrador</label> 
                                    <label class="checkbox-inline"><input type="checkbox" value="2" id="rol2"> Entrenador </label>
                                    <label class="checkbox-inline"><input type="checkbox" value="3" id="rol3" name="rol3"  onclick="vamosctm()"> Socio </label>
                                    <label class="checkbox-inline"><input type="checkbox" value="4" id="rol4"> Vendedor </label></div>
                                <div class="row" id="formSelect">
                                    <div class="col-lg-12">
                                        <div class="form-group col-lg-3 col-md-3 col-sm-4 col-xs-12" ><label>Seleccionar Membresía</label> 
                                            <select class="form-control " id="selectMembresia">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group col-lg-3 col-md-3 col-sm-4 col-xs-12"><button type="submit" id="btnAgregarUsuario"  class="btn btn-primary" style="background-color: black; color: white; ">Registrar Usuario</button></div> 
                            </form>
                        </div>
                    </div>
                    <div class="row">

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

        <script src="<?php echo base_url() ?>lib/js/rut" type="text/javascript"></script>
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

                                                $("#formSelect").hide();



                                                $("#btn").click(function (e) {
                                                    e.preventDefault();
                                                    salir();
                                                });

                                            });



                                        });
        </script>
    </body>
</html>