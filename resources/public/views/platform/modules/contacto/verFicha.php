<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">

<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."contactoController.php");
       require_once (HELPERS_PATH."rutas.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $objElemento = contactoController::contactoId($_GET['id']);
      
       
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">

    
    <!-- fixed-top-->
    <?php
    /* top bar  */
    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");
    /* Menu  */
    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");
  ?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-dark bg-img col-12">
                    <div class="row">
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <h3 class="content-header-title white">Modulo de contacto</h3>
                            <div class="row breadcrumbs-top">
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item "><a href="index.php">Listado de contactos registros por el sitio web </a>
                                        </li>

                                        <li class="breadcrumb-item active">Ver ficha del contacto
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="content-body">
                <div class="content-body">
                    <section id="basic-form-layouts">
                        <div class="row match-height">
                            <div class="col-md-12">
                                <div class="card" style="height: 984.5px;">

                                    <div class="card-content collapse show">
                                        <div class="card-body">

                                            <div class="form">
                                                <div class="form-body">

                                                    <br><br>
                                                    <h2 class="form-section"><i class="fa fa-elementor"></i>
                                                        Informacion del contacto registrado</h2>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Nombre 
                                                                    </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . ." name="nombre" id="nombre"
                                                                    value="<?php echo  $objElemento->getNombre_contacto(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> <span
                                                                            class="text-danger">*</span>Asunto  </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . . " name="precio" id="precio"
                                                                    value="<?php echo  $objElemento->getAsunto(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> <span
                                                                            class="text-danger">*</span>Correo  </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . . " name="precio" id="precio"
                                                                    value="<?php echo  $objElemento->getCorreo(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> <span
                                                                            class="text-danger">*</span>Hora  </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . . " name="precio" id="precio"
                                                                    value="<?php echo  $objElemento->getHora(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> <span
                                                                            class="text-danger">*</span>Fecha registrada  </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . . " name="precio" id="precio"
                                                                    value="<?php echo  $objElemento->getFecha(); ?>">
                                                            </div>
                                                        </div>
                                                        

                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-12">
                                                        <label for="projectinput3">
                                                            <h5 class="card-title">
                                                                <span class="text-danger">*</span>
                                                                <li class="fa fa-digital-tachograph"></li>
                                                                Descripcion del elemento
                                                            </h5>
                                                        </label>
                                                        <textarea readonly class="form-control" id="textarea2" name="textarea2"
                                                            rows="5"
                                                            cols="50"><?php echo  $objElemento->getMensaje(); ?></textarea>
                                                    </div>
                                                    <br>
                                                   
                                                    
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
        </div>
    </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php
    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
    <script src="<?php echo CORE_JS_SERVER."core_views/directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."core_views/app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/elementos/triggers/module.js"; ?>"></script>
    <script>
        
    </script>
</body>

</html>