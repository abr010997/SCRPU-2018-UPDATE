<!-- <!DOCTYPE html>
<html lang="en">


  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Planificación Urbana</title>
    <!--<link rel="icon" href="images/<planificacion class="jpg"></planificacion>">-->

<!-- Bootstrap core CSS-->
<!-- Jquery Confirm v3 -->
<link rel="stylesheet" href="assets/jquery-confirm/dist/jquery-confirm.min.css">
<!-- css de los tabs -->
<link rel="stylesheet" href="public/css/easy-responsive-tabs.css ">
<!-- css de datatable -->
<link rel="stylesheet" href="assets/datatables/DataTables-1.10.16/css/jquery.dataTables.min.css">
<!-- ccs de date piker  -->
<link rel="stylesheet" href="assets/jquery-ui/jquery-ui.css">

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- bootstrap-wysiwyg -->
    <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="?c=classprincipal&m=index" class="site_title">
                <i class="glyphicon glyphicon-leaf"></i> <span>Planificación Urbana!</span></a>
            </div>
<br>
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/planificacion.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido:</span>
               <h2>
                <?php
                  session_start();
                  if(isset($_SESSION['usuario']) && isset($_SESSION['puesto']) && isset($_SESSION['idpuesto'])) {
                    $usuario = $_SESSION['usuario'];
                    $puesto = $_SESSION['puesto'];
                    $idpuesto = $_SESSION['idpuesto'];
                    echo($usuario);
                  } else {
                    header("Location: ?c=classlogin&m=index");
                  }
                ?>
               </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?c=classprincipal&m=index">Dashboard</a></li>
                    </ul>
                  </li>
                  <?php if ($idpuesto == 1 || $idpuesto == 2 || $idpuesto == 3) : ?>
                  <li><a><i class="fa fa-edit"></i> Ingreso Trámite <span class="fa fa-chevron-down"></span></a>
                  <?php endif; ?>
                    <ul class="nav child_menu">
                        <li>
                      <a href="?c=class04ingresotramite&m=index">Ingreso de Trámite</a>
                      </li>
                       <li>
                      <a href="?c=classlistinspeccion1&m=listarInspeccion1">Tramites Distritos 1-2-3-4</a>
                      </li>
                      <li>
                     <a href="?c=classlistinspeccion2&m=listarInspeccion2">Tramites Distritos 5-6-7</a>
                     </li>
                    </ul>
                  </li>
                  <?php if ($idpuesto == 1 || $idpuesto == 2 || $idpuesto == 3) : ?>
                  <li><a><i class="fa fa-edit"></i> Modulo Inspección <span class="fa fa-chevron-down"></span></a>
                  <?php endif; ?>
                    <ul class="nav child_menu">
                      <li>
                      <a href="?c=class04inspeccion&m=index2">Pendientes de Inspección</a>
                      </li>
                      <li>
                      <a href="?c=class04ingresotramite&m=index2">Inspección Distritos 1-2-3-4</a>
                      </li>
                      <li>
                      <a href="?c=class04ingresotramite&m=index3">Inspección Distritos 5-6-7</a>
                      </li>
                      <!-- <li>
                      <a href="?c=class04inspeccion&m=index1">Trámites Inspeccionados</a>
                      </li> -->
                       <li>
                      <a href="?c=class04inspeccion&m=index3">Reportes de Inspección</a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Módulo Oficina <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <?php if ($idpuesto == 1 || $idpuesto == 2 || $idpuesto == 3) : ?>
                      <li>
                        <a href="?c=class39solicitante">Guardar Solicitante</a>
                      </li>
                      <?php endif; ?>

                      <?php if ($idpuesto == 1 || $idpuesto == 2 || $idpuesto == 3) : ?>
                      <li>
                        <a href="?c=class40propietario">Guardar Propietario</a>
                      </li>
                      <?php endif; ?>

                      <?php if ($idpuesto == 1 || $idpuesto == 2 || $idpuesto == 3) : ?>
                      <li>
                        <a href="?c=class40terreno">Guardar Terreno</a>
                      </li>
                      <?php endif; ?>

                      <?php if ($idpuesto == 1 || $idpuesto == 2 || $idpuesto == 3) : ?>
                      <li>
                        <a href="?c=class04oficina&m=index5">Trámite Rápido</a>
                      </li>
                      <?php endif; ?>

                      <?php if ($idpuesto == 1 || $idpuesto == 2 || $idpuesto == 3) : ?>
                      <li>
                        <a href="?c=class04oficina&m=index6">Trámite Rápido-Oficina</a>
                      </li>
                      <?php endif; ?>

                      <?php if ($idpuesto == 1 || $idpuesto == 2 || $idpuesto == 3) : ?>
                      <li>
                        <a href="?c=class04oficina">Realizar Oficina a Trámites</a>
                      </li>
                      <?php endif; ?>

                      <?php if ($idpuesto == 1 || $idpuesto == 2 || $idpuesto == 3) : ?>
                      <li>
                        <a href="?c=class04oficina&m=index4">Aplicar actividades a Trámites</a>
                      </li>
                      <?php endif; ?>

                      <?php if ($idpuesto == 1 || $idpuesto == 2) : ?>
                      <li>
                        <a href="?c=class04oficina&m=index3">Revisión General</a>
                      </li>
                      <?php endif; ?>

                      <?php if ($idpuesto == 1 || $idpuesto == 2 || $idpuesto == 3) : ?>
                      <li>
                        <a href="?c=class04oficina&m=index2">Oficina</a>
                      </li>
                      <?php endif; ?>

                      <?php if ($idpuesto == 1 || $idpuesto == 2 || $idpuesto == 3 || $idpuesto == 5) : ?>
                      <li>
                        <a href="?c=class04tramite&m=index">Estados</a>
                      </li>
                      <?php endif; ?>

                      <li>
                        <a href="?c=class04tramite&m=index1">Tramites Aceptados</a>
                      </li>


                      <li>
                        <a href="?c=class04tramite&m=index3">Tramites Denegados</a>
                      </li>


                    </ul>
                  </li>
                  <!--<li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                    </ul>
                  </li>-->
                </ul>
              </div>
              <?php if ($idpuesto == 1 || $idpuesto == 2) : ?>
              <div class="menu_section">
                <h3>Mantenimientos</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-sitemap"></i> Mantenimientos Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if ($idpuesto == 1 || $idpuesto == 2) : ?>
                      <li>
                      <a href="?c=class0102usuarios">Usuarios</a>
                      </li>
                      <?php endif; ?>
                      <?php if ($idpuesto == 1) : ?>
                      <li>
                      <a href="?c=class03puestos">Puestos</a>
                      </li>
                      <li>
                      <a href="?c=class06actdes">Actividades a Desarrollar</a>
                      </li>
                      <li>
                      <a href="?c=class07terrft">Terreno Frete a Ruta</a>
                      </li>
                      <li>
                      <a href="?c=class09desceg">Espacio Geográfico</a>
                      </li>
                      <li>
                      <a href="?c=class10aspbio">Aspectos Biofísicos</a>
                      </li>
                      <li>
                      <a href="?c=class12tipdesec">Tipo de Desarrollo en el Sector</a>
                      </li>
                      <li>
                      <a href="?c=class16servae">Servicio de Electricidad y Agua</a>
                      </li>
                      <li>
                      <a href="?c=class18calleser">Existencia de Calle en Servidumbre Frente a Ruta</a>
                      </li>
                      <li>
                      <a href="?c=class20desas">Desarrolo de Servidumbre</a>
                      </li>
                      <li>
                      <a href="?c=class22serrvi">Servicio de Red Vial</a>
                      </li>
                      <li>
                      <a href="?c=class26planreg">Plan Retulador</a>
                      </li>
                      <li>
                      <a href="?c=class34clases">Clases</a>
                      </li>
                      <li>
                      <a href="?c=class35tipsue">Tipo Suelo</a>
                      </li>
                      <li>
                      <a href="?c=class26planreg">Plan Retulador</a>
                      </li>
                      <?php endif; ?>
                    </ul>
                  </li>
                </ul>
              </div>
              <?php endif; ?>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons-->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/planificacion.jpg" alt="">Usuario:

                <?php
         echo($puesto);
        ?>

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a onclick="cerrarSesion()" ><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                  </ul>
                </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
         <!-- <div class="container-fluid"> -->
          <div class="x_panel">
