<?php
session_start();
if (!isset($_SESSION['student'])){
    echo '<script style="color: red"> alert("Iniciar sesión para acceder a esta  página")</script>';
    header('Location: ../../index.html');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Performance Evaluations - Listado de Docentes</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="application-name" content="Performance Evaluations" lang="es">
    <meta name="description" content="Aplicacion Web para Medir el Desempeño y Clima Organizacional del Programa de Ingenieria de Sistemas de la Universidad Francisco de Paula Santander - Cúcuta, Norte de Santander"/>
    <meta name="Author" content="GIDIS"  lang="es">
    <meta name="Contributors" content="Lizeth Rios Epalza - Eismar Johann Paredes Peña" lang="es">
    <meta name="Aditional-Contributors" content="Derly Zuley Angel Medina - José David Castro García" lang="es">
    <meta name="keywords" content="evaluacion, director, pares, docente, ingenieria, de sistemas, ufps, universidad, francisco, de paula, santander, cucuta, norte de santander, colombia"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Favicon -->
    <link rel='Shortcut icon' type="image/x-icon" href="../../assets/icons/favicon.ico">
    <!-- Web Fonts css-->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- Font Awesome v5.0.13 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <!-- Jquery mCustomScrollbar v3.1.1 -->
    <link rel="stylesheet" href="../../assets/css/jquery.mCustomScrollbar.css">
    <!-- Bootstrap css v3.3.2 -->
    <link rel="stylesheet" href="../../assets/css/Bootstrap3/bootstrap.min.css">
    <!-- Material Design Icons v2.2.0 -->
    <link rel="stylesheet" href="../../assets/css/material-design-iconic-font.min.css">
    <!-- Sweet Alert v0.5.0 -->
    <link rel="stylesheet" href="../../assets/css/sweet-alert.css">
    <!-- Normalize v3.0.2-->
    <link rel="stylesheet" href="../../assets/css/normalize.css">
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
                    <li><a href="evaulationResult.php" style="color: black"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;Resultados </a></li>
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
                        <span id="name">student_name</span>
                    </li>
                    <li class="mobile-menu-button visible-xs" style="float: left !important;">
                        <i class="zmdi zmdi-menu"></i>
                    </li>
                </ul>
            </nav>
        </form>
        <div class="container nav-espacio">
            <h1 class="all-tittles">Ver resultados</h1>
        </div>
        <section class="full-reset text-center">
            <div class="container-fluid"  style="margin: 0px 0;">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <img src="../../assets/imgs/viewTeacher.png" alt="view" class="img-responsive center-box" style="max-width: 110px;">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                        En esta sección puede visualizar la lista de resultados de la evaluacion de estudiante.
                    </div>
                    <div class="container-fluid contai-espacio">
                        <div class="container-flat-form">
                            <div class="title-flat-form title-flat-red">Resultados</div>
                            <div class="container-fluid"  style="margin: 50px 0;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="table-responsive">
                                            <div id = "teacher_list" method="post">
                                                <table id="dataTables-example" class="table table-striped text-center" border="1"style="border: #8080802e 1px solid">
                                                    <thead>
                                                    <tr class="danger">
                                                        <th class="text-center">Nombre del docente
                                                        </th>
                                                        <th class="text-center">Departamento</th>
                                                        <th class="text-center">Porcentaje</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-center" id="nombre">nombre</td>
                                                        <td class="text-center" id="codigo">departamento</td>
                                                        <td class="text-center" id="departamento">%</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form id="reset" action="include.php" method="post" autocomplete="off">
            <!-- Referencia del modal -->
            <div class="modal fade myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="display: block">
                            <p class="modal-tittle">EDITAR CAMPOS</p>
                        </div>
                        <div class="modal-body">
                            <label style="text-align: justify;padding-top: 0px;" class="login-box-msg">Llena los campos a editar la información requerida</label>
                            <br><br><br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <div class="group-material">
                                        <input type="text" name="nombre" class="material-control tooltips-general" placeholder="Nombre del docente" required="" maxlength="50" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" data-toggle="tooltip">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nombre del docente</label>
                                    </div>
                                    <p class="text-center">
                                        <button type="submit" class="btn btn-danger"><i class="zmdi zmdi-floppy"></i>&nbsp;&nbsp;Guardar</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
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
    <script src="../../assets/js/director.js"></script>
</body>
</html>