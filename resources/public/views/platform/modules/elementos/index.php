<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
      //  require_once (CONTROLLERS_PATH."empresaController.php");
       require_once (CONTROLLERS_PATH."elementoController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
  ?>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom=75%">
  <!-- BEGIN: Header-->
  <?php require_once (PLATFORM_PATH."global/inc/component/fixed_top.php"); ?>
  <!-- END: Header-->
  <!-- BEGIN: Main Menu-->
  <?php require_once (PLATFORM_PATH."global/inc/component/main_menu.php"); ?>
  <!-- END: Main Menu-->
  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-header row">
      <div class="content-header-dark bg-img col-12">
        <div class="row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <h3 class="content-header-title white"><i class="fa fa-mail-bulk"></i> Modulo de menu y otros elementos
              multimedia </h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active">Listado general de elementos registrados
                  </li>

                </ol>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="content-wrapper">
      <div class="content-body">
        <!-- contendio -->
        <div class="">
          <section id="validation-scenario">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Listo de reservas para la fecha :</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                      <ul class="list-inline mb-0">
                        <li><a data-action="printer"><i class="ft-printer"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body card-dashboard ">
                      <a class="btn btn-success waves-effect waves-light" href="registrarElemento.php">
                        <i class="fa fa-plus-circle"></i> Registrar nuevo elemento
                      </a>
                      <br>
                      <br>

                      <div class="table-responsive">

                        <div class="row">


                          <div class="col-md-12">
                            <div id="tablaDinamica_panel">
                              <?php elementoController::listadoElementos(); ?>
                            </div>
                          </div>

                        </div>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </section>
        </div>
        <!--/ contendio -->
      </div>
    </div>
  </div>
  <!-- END: Content-->
  <!-- BEGIN: Customizer-->
  <!-- End: Customizer-->
  <!-- Buynow Button-->
  <?php
    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
</body>
<!-- END: Body-->

</html>