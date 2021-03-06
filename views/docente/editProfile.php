<?php
session_start();
if (!isset($_SESSION['docente'])){
    echo '<script style="color: red"> alert("Iniciar sesión para acceder a esta página")</script>';
    header('Location: ../../index.html');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Performance Evaluations - Editar Perfil</title>    
    <?php include 'General/css.php';?>

</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i>
                Performance Evaluations &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <div class="full-reset nav-espacio">
                <figure>
                    <img src="../../assets/icons/favicon.png" alt="Work Meter" class="img-responsive center-box" style="width:55%;">
                </figure>
            </div>
            <div class="full-reset nav-lateral-list-menu" style="padding-right: 15px">
                <ul class="list-unstyled">
                    <li><a href="home.php" style="color: black"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;Inicio </a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account zmdi-hc-fw"></i>&nbsp;&nbsp;Información del Docente<i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="viewProfile.php" style="color: black"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp;Ver Perfil</a></li>
                            <li><a href="editProfile.php" style="color: black"><i class="zmdi zmdi-assignment-account zmdi-hc-fw"></i>&nbsp;&nbsp;Editar Perfil</a>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp;Evaluaciones<i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="listPairEvaluation.php" style="color: black"><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i>&nbsp;&nbsp;Realizar Evaluación a Pares</a></li>
                            <li><a href="selfEvaluation.php" style="color: black"><i class="zmdi zmdi-account zmdi-hc-fw"></i>&nbsp;&nbsp;Realizar Auto-evaluación</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <!--Formulario de close-->
        <form id="close_sesion" method="post">
            <nav class="navbar-user-top full-reset">
                <ul class="list-unstyled full-reset">
                    <input type="hidden" name="solicitud" value="close">
                    <li  class="tooltips-general exit-system-button" data-href="../../index.html" data-placement="bottom" title="Cerrar sesión">
                        <i class="zmdi zmdi-power"></i>
                    </li>
                    <li style="color:#fff; cursor:default;">
                        <span id="name">director_name</span>
                    </li>
                    <li class="mobile-menu-button visible-xs" style="float: left !important;">
                        <i class="zmdi zmdi-menu"></i>
                    </li>
                </ul>
            </nav>
        </form>
        <div class="container nav-espacio">
            <h1 class="all-tittles">Editar perfil</h1>
        </div>
        <section class="full-reset text-center">
            <div class="container-fluid"  style="margin: 0px 0;">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="../../assets/imgs/editprofile.png" alt="edit" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    En esta sección podrá editar los datos respectivos de su perfil.<br>
                    Rellene los campos del formulario a continuación:
                </div>
                <div class="container-fluid contai-espacio">
                    <div class="container-flat-form">
                        <div class="title-flat-form title-flat-red">Editar Información</div>
                        <div class="container-fluid">
                            <!--Formulario de edit profile docente-->
                            <form id="edit_profile" action="../../include.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                        <div class="group-material">
                                            <input type="text" name="codi" id="codi" class="material-control tooltips-general" required="" maxlength="10" data-toggle="tooltip">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Codigo</label>
                                        </div>
                                        <div class="group-material">
                                            <input type="number" name="celular" id="cel" class="material-control tooltips-general" placeholder="Celular" required="" maxlength="10" data-toggle="tooltip">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Celular</label>
                                        </div>
                                        <div class="group-material">
                                            <input type="text" name="direccion" id="dir" class="material-control tooltips-general" placeholder="Dirección" required="" maxlength="50" data-toggle="tooltip">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Dirección</label>
                                        </div>

                                        <div class="group-material">
                                            <input type="text" name="apellidos" id="ape" class="material-control tooltips-general" placeholder="Apellidos" required="" maxlength="50" data-toggle="tooltip">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Apellidos</label>
                                        </div>

                                        <div class="group-material">
                                            <input type="file" name="foto" onchange="previewFile()" id="foto" class="material-control tooltips-general" placeholder="Apellidos" data-toggle="tooltip">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Foto</label>
                                            
                                            <img id="imgD" src="../../assets/imgs/user2.png" alt="user" class="img-responsive center-box" style="max-width: 110px; padding-top: 100px" >
                                            
                                        </div>

                                        <p class="text-center">
                                            <button type="submit" class="btn btn-danger"><i class="zmdi zmdi-floppy"></i>&nbsp;&nbsp;Guardar</button>
                                            <input type="hidden" name="solicitud" value="actProfileDoc">
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer full-reset" style="margin-top: 0 !important;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <figure>
                            <img src="../../assets/imgs/logo_ingsistemas_vertical.png" alt="IS - UFPS" class="img-responsive center-box" style="width:70%; padding-bottom: 10px">
                        </figure>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <h3 class="all-tittles">Acerca de</h3>
                        <p>Programa de Ingeniería de Sistemas de la Universidad Francisco de Paula Santander<br>
                            Acreditación de alta calidad según resolución No. 15757 del Ministerio de Educación Nacional<br>
                            Avenida Gran Colombia No. 12E-96 Barrio Colsag, Cúcuta, Colombia<br>
                            Teléfono (57) 7 5776655 Extensiones 201 y 203<br>
                            Correo electrónico: ingsistemas@ufps.edu.co<br>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <h3 class="all-tittles">Desarrollado por: </h3>
                        <ul class="list-unstyled">
                            <li><i class="zmdi zmdi-code zmdi-hc-fw"></i>&nbsp;&nbsp;Lizeth Rios Epalza </li>
                            <li><i class="zmdi zmdi-edit zmdi-hc-fw"></i>&nbsp;&nbsp;Jose David Castro Garcia</li>
                            <li><i class="zmdi zmdi-edit zmdi-hc-fw"></i>&nbsp;&nbsp;Derly Zuley Angel Medina</li>
                            <li><i class="zmdi zmdi-code zmdi-hc-fw"></i>&nbsp;&nbsp;Eismar Johann Paredes Peña</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright full-reset">Gidis © Todos los derechos reservados</div>
        </footer>
    </div>
    <!-- Jquery v1.11.2 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/jquery-1.11.2.min.js"><\/script>')</script>
    <!-- Jquery mCustomScrollbar v3.1.13 -->
    <script src="../../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Bootstrap js v3.3.2 -->
    <script src="../../assets/js/Bootstrap3/bootstrap.min.js"></script>
    <!-- Sweet Alert v0.5.0-->
    <script src="../../assets/js/sweet-alert.min.js"></script>
    <!-- Modernizr v2.8.3 -->
    <script src="../../assets/js/modernizr.js"></script>
    <!-- Main -->
    <script src="../../assets/js/main.js"></script>
    <!-- Fonts js -->
    <script src="../../assets/js/docente.js"></script>
</body>
</html>


