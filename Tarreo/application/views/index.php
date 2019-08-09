<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tarreo Inacap Talca 2019</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>lib/img/favicon.png">
    <link href="<?php echo base_url() ?>lib/fonts/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>lib/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/animate.css" rel="stylesheet">

    <!--        <link href="<?php echo base_url() ?>lib/css/mystyle.css" rel="stylesheet">-->


</head>

<body id="page-top" class="landing-page">
    <div class="pace  pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="" href="<?php echo base_url() ?>"> <img src="<?php echo base_url() ?>lib/img/logo.png" style="width: 150px; height: 50px;" alt="" /></a>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a class="page-scroll" href="#page-top">Inicio</a></li>
                        <li><a class="page-scroll" href="#juegos">Juegos</a></li>
                        <li><a class="page-scroll" href="#nosotros">Nosotros</a></li>
                        <li><a class="page-scroll" href="#equipos">Equipos</a></li>
                        <li><a class="page-scroll" data-toggle="modal" data-target=".modal-login">Login</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url() ?>registro">Registrarse</a></li>
                        <li><a class="page-scroll" href="#contact">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="inSlider" class="carousel carousel-fade img-responsive" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#inSlider" data-slide-to="0" class="active"></li>

        </ol>
        <div class="carousel-inner img-responsive" role="listbox">
            <div class="item active img-responsive">
                <div class="container">

                    <div class="carousel-caption">
                        <h1>Tarreo Inacap 2019</h1>
                        <h3>DÍA JUEVES 29 DE AGOSTO A PARTIR DE LAS 10:00 HORAS</h3>
                    </div>


                    <div class="carousel-image wow zoomIn">

                    </div>
                </div>
                <!-- Set background for slide in css -->
                <!--                    <div class="header-back one"></div>-->
                <img src="<?php echo base_url() ?>lib/img/fondo2.jpg" class="img-responsive" alt="" />


            </div>

        </div>
        <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section id="juegos" class="blue-bg">
        <center>
            <div class="row" style="padding: 10px;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="navy-line"></div>
                        <h1>Juegos Tarreo</h1>
                        <p>Aca podras encontrar los juegos del tarreo </p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="fotosJuegos">
                    
                </div>
            </div>

        </center>
    </section>
    <section id="nosotros" class="gray-section team" style="margin: 0px;">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Nuestro Equipo</h1>
                    <p>Equipo organizado para llevar acabo el Tarreo Inacap 2019</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-xs-6 wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Matias</span> Montoya</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Rafael</span> Villar</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Carolina</span> Cornejo</h4>
                    </div>
                </div>

                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Brandon</span> Fuentes</h4>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-sm-3  col-xs-6 wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Caterin</span> Morales</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Constanza</span> Santander</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Diego</span> Gonzalez</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Emmanuel</span> Valenzuela</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Felipe</span> Contreras</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Javier</span> Vilches</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Jorge</span> Casanova</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Matías</span> Gaete</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3  col-xs-6 wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Olayer</span> Monsalves</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Pablo</span> Yañez</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Daniel</span> Toro</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Benjamin</span> Bustos</h4>
                    </div>
                </div>

            </div>
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Colaboradores Involucrados</h1>
                    <p>Tarreo Inacap 2019</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Miguel</span> Oyarce</h4>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-6  wow">
                    <div class="team-member">
                        <img src="<?php echo base_url() ?>lib/img/user.png" class="img-responsive img-circle img-small" alt="">
                        <h4><span class="navy">Carlos</span> Avila</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="timeline blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Fecha de Eventos</h1>
                    <p>Aca podras encontrar las fechas importantes del tarreo </p>
                </div>
            </div>
            <div class="row features-block">

                <div class="col-lg-12">
                    <div id="vertical-timeline" class="vertical-container light-timeline center-orientation">
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-briefcase"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2 style="color: black;">Meeting</h2>
                                <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the sale.
                                </p>
                                <a href="#" class="btn btn-xs btn-primary"> More info</a>
                                <span class="vertical-date"> Jueves <br /> <small>Agosto 29</small> </span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-file-text"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Decision</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="#" class="btn btn-xs btn-primary"> More info</a>
                                <span class="vertical-date"> Tomorrow <br /> <small>Dec 26</small> </span>
                            </div>
                        </div>
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-file-text"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Decision</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="#" class="btn btn-xs btn-primary"> More info</a>
                                <span class="vertical-date"> Tomorrow <br /> <small>Dec 26</small> </span>
                            </div>
                        </div>
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-file-text"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Decision</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="#" class="btn btn-xs btn-primary"> More info</a>
                                <span class="vertical-date"> Tomorrow <br /> <small>Dec 26</small> </span>
                            </div>
                        </div>
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-file-text"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Decision</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="#" class="btn btn-xs btn-primary"> More info</a>
                                <span class="vertical-date"> Tomorrow <br /> <small>Dec 26</small> </span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-cogs"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Implementation</h2>
                                <p>Go to shop and find some products. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
                                <a href="#" class="btn btn-xs btn-primary"> More info</a>
                                <span class="vertical-date"> Jueves <br /> <small>Agosto 29</small> </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="equipos" class="container services">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Equipos Registrados</h1>
                <p>Aca encontraras los equipos y sus integrantes. </p>
            </div>
        </div>
        <div class="row" id="equiposPublico">

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <center>
                    <h2>Fnatic</h2>
                    <img src="<?php echo base_url() ?>lib/img/Equipos/fnatic.png" style="height: 175px; width: 175px;" alt="Fnatic" />
                    <p style="text-align: justify">Fnatic es uno de los equipos más famosos de la historia de los esports, sobre todo en los que a League of Legends y Counter Strike se refiere, aunque compiten en muchas más disciplinas. Fue fundado en marzo de 2011 con la adquisición de MyRevenge, y han sido, entre muchos otros títulos, campeones del mundo y de la LCS EU.

                        En 2018 volvieron a hacer historia y se clasificaron por primera vez desde que lograsen el título en la Season 1, a la final del Mundial de LoL, donde cayeron por tres mapas a cero ante Invictus Gaming.</p>
                </center>
                <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-equipos">
                        Detalles &raquo;
                    </button></p>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <center>
                    <h2>Cloud9</h2>
                    <img src="<?php echo base_url() ?>lib/img/Equipos/C9.png" style="height: 175px; width: 175px;" alt="Fnatic" />
                    <p style="text-align: justify">Cloud9 es un equipo norteamericano multidisciplinar fundado en diciembre de 2012. League of Legends es un equipo más fuerte, pero también compiten en Dota2, Cod, HearthStone o Counter Strike, entre otros. Han ganado títulos tan importantes como un Major de la Eleague en CS:GO o varias LCS NA en League of Legends. </p>
                </center>
                <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-equipos">
                        Detalles &raquo;
                    </button></p>
            </div>

        </div>
    </section>
    <section id="contact" class="gray-section " style="margin: 0px;">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Contactanos Aqui</h1>
                    <p>Comunicate con nosotros en nuestras redes sociales.</p>
                </div>
            </div>
            <div class="row m-b-lg">
                <div class="col-lg-4 col-lg-offset-4">
                    <center>
                        <address>
                            <strong><span class="navy">Inacap Talca</span></strong><br />
                            Avenida San Miguel 3496<br />
                            Talca, Chile<br />
                            <abbr title="Phone">P:</abbr> +569 9162 1564 y +569 8300 6194
                        </address>
                    </center>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="m-t-sm">
                        O siguenos en nuestras redes sociales
                    </p>
                    <ul class="list-inline social-icon">
                        <li><a href="https://www.facebook.com/events/710661652695631/"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="https://www.instagram.com/tarreoinformatica2019_/?hl=es-la"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                    <p><a href="https://www.solucionesvillar.cl" style="color: gray"><strong>&copy; 2019 Soluciones Villar</strong><br /></a></p>

                </div>
            </div>
        </div>
    </section>

    <!--        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal5">
                    Large Modal
                </button>
                <div class="modal inmodal fade in" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" style="display: block; padding-right: 16px;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Modal title</h4>
                                <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                            </div>
                            <div class="modal-body">
                                <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                    remaining essentially unchanged.</p>
                                <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                    remaining essentially unchanged.</p>
                            </div>
        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>-->


    <div class="modal fade modal-correo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Enviar Correo</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body table-responsive no-padding">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" id="form" novalidate="novalidate">
                                    <div class="form-group"><label>Nombre Completo</label> <input type="text" placeholder="Nombre Completo" class="form-control error" name="nombre" aria-required="true"></div>
                                    <div class="form-group"><label>Email</label> <input type="email" placeholder="Enter email" class="form-control error" required="" aria-required="true" aria-invalid="true"></div>
                                    <div class="form-group"><label>Url</label> <input type="text" placeholder="Enter email" class="form-control error" name="url" aria-required="true"></div>
                                    <div class="form-group"><label>Number</label> <input type="text" placeholder="Enter email" class="form-control error" name="number" aria-required="true"></div>
                                    <div class="form-group"><label>MinLength</label> <input type="text" placeholder="Enter email" class="form-control error" name="min" aria-required="true"></div>
                                    <div class="form-group"><label>MaxLength</label> <input type="text" placeholder="Enter email" class="form-control error" name="max" aria-required="true"></div>
                                    <div>
                                        <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>Submit</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade modal-equipos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">SK Telecom T1</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Nick</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kim</td>
                                    <td>Dong-ha</td>
                                    <td>Khan</td>
                                    <td>Superior</td>
                                    <td><img src="<?php echo base_url() ?>lib/img/Jugadores/khan.png" style="height: 100px; width: 100px;" alt="Fnatic" /></td>
                                </tr>
                                <tr>
                                    <td>Kim</td>
                                    <td>Tae-min</td>
                                    <td>Clid</td>
                                    <td>Jungla</td>
                                    <td><img src="<?php echo base_url() ?>lib/img/Jugadores/clid.png" style="height: 100px; width: 100px;" alt="Fnatic" /></td>
                                </tr>
                                <tr>
                                    <td>Lee</td>
                                    <td>Sang-Hyeok</td>
                                    <td>Faker</td>
                                    <td>Medio</td>
                                    <td><img src="<?php echo base_url() ?>lib/img/Jugadores/faker.png" style="height: 100px; width: 100px;" alt="Fnatic" /></td>
                                </tr>
                                <tr>
                                    <td>Park</td>
                                    <td>Jin-Seong</td>
                                    <td>Teddy</td>
                                    <td>Tirador</td>
                                    <td><img src="<?php echo base_url() ?>lib/img/Jugadores/Teddy.png" style="height: 100px; width: 100px;" alt="Fnatic" /></td>
                                </tr>
                                <tr>
                                    <td>Cho</td>
                                    <td>Se-Hyeong</td>
                                    <td>Mata</td>
                                    <td>Apoyo</td>
                                    <td><img src="<?php echo base_url() ?>lib/img/Jugadores/mata.png" style="height: 100px; width: 100px;" alt="Fnatic" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Inicio Sesion Participante</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login" name="login" autocomplete="off" target="_top">
                                <div class="form-group"><label>Rut</label> <input id="username" type="text" name="j_username" class="form-control" autocomplete="off" onfocus="rut(this.value);" onkeypress="return esRutLogin(event)" onkeyup="this.value = this.value.toUpperCase();" onblur="formatoRut()"></div>
                                <div class="form-group"><label>Clave</label> <input type="password" id="clave" placeholder="********" class="form-control error" required aria-required="true" aria-invalid="true"></div>
                                <div class="form-group col-sm-6 col-md-6 col-xs-6 col-lg-6"><button class="btn btn-primary right" id="btnParticipantes">Iniciar</button></div>
                                <div class="form-group col-sm-6 col-md-6 col-xs-6 col-lg-6">
                                    <p>Aun no te haz registrado? Haz Click <a style="color: red;" href="<?php echo base_url() ?>registro">Aquí</a> y registrate!!!</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-foto" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <h1><strong>
                            <center>TARREO INFORMATICA 2019</center>
                        </strong></h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <center><img src="<?php echo base_url() ?>lib/img/admin/img.jpeg" class="img-responsive"> </center>

            </div>
        </div>
    </div>


    <!-- Small modal -->



    <!-- Mainly scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.3/js.cookie.min.js"></script>
    <script src="<?php echo base_url() ?>lib/js/rut_1.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/myjs.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url() ?>lib/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url() ?>lib/js/jquery.metisMenu.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/inspinia.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/pace.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/wow.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/rut.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            verEquiposPublico();
            getFotosJuegos();
            getFechasJuegos();
            $('#myModal5').modal('hide');
            $('body').scrollspy({
                target: '.navbar-fixed-top',
                offset: 80
            });

            $("#btnParticipantes").click(function(e) {
                e.preventDefault();
                IniciarSesionParticipante();
            });

            function hola() {
                $("#modal-foto").modal('show')
            }

            setTimeout(hola, 3000);

            // Page scrolling feature
            $('a.page-scroll').bind('click', function(event) {
                var link = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(link.attr('href')).offset().top - 50
                }, 500);
                event.preventDefault();
                $("#navbar").collapse('hide');
            });
        });

        var cbpAnimatedHeader = (function() {
            var docElem = document.documentElement,
                header = document.querySelector('.navbar-default'),
                didScroll = false,
                changeHeaderOn = 200;

            function init() {
                window.addEventListener('scroll', function(event) {
                    if (!didScroll) {
                        didScroll = true;
                        setTimeout(scrollPage, 250);
                    }
                }, false);
            }

            function scrollPage() {
                var sy = scrollY();
                if (sy >= changeHeaderOn) {
                    $(header).addClass('navbar-scroll')
                } else {
                    $(header).removeClass('navbar-scroll')
                }
                didScroll = false;
            }

            function scrollY() {
                return window.pageYOffset || docElem.scrollTop;
            }
            init();

        })();

        // Activate WOW.js plugin for animation on scrol
        new WOW().init();
    </script>


</body>

</html>