<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">
<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."usuarioController.php");
       require_once (HELPERS_PATH."rutas.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $objElemento = usuarioController::usuarioId($_GET['id']);
       $idElemento = $objElemento->getId_usuario();
       
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>
<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">
    <input type="hidden" value="<?php  echo $idElemento; ?>" name="idElemento" />
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
                            <h3 class="content-header-title white">Modulo de usuarios</h3>
                            <div class="row breadcrumbs-top">
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item "><a href="index.php">Listado de usuarios </a>
                                        </li>
                                        <li class="breadcrumb-item active">Ver ficha del usuario
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
                                                    <h2 class="form-section"><i class="fa fa-elementor"></i>
                                                        Informacion general del usuario</h2>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Nombre del usuario
                                                                    </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . ." name="nombre" id="nombre"
                                                                    value="<?php echo  $objElemento->getNombre(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> apellido
                                                                    </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . ." name="apellido" id="apellido"
                                                                    value="<?php echo  $objElemento->getApellido(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> <span
                                                                            class="text-danger">*</span>Telefono </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . . " name="telefono" id="telefono"
                                                                    value="<?php echo  $objElemento->getTelefono(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> <span
                                                                            class="text-danger">*</span>Correo electronico </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . . " name="correo" id="correo"
                                                                    value="<?php echo  $objElemento->getEmail(); ?>">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Tipo de  usuario
                                                                    </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . ." 
                                                                    value="<?php echo  $objElemento->getTipo_usuario(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Usuario
                                                                    </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . ." name="usuario" id="usuario"
                                                                    value="<?php echo  $objElemento->getUsuario(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> <span
                                                                            class="text-danger">*</span>Clave </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . . " name="clave" id="clave"
                                                                    value="<?php echo  $objElemento->getClave(); ?>">
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-12">
                                                        <label for="projectinput3">
                                                            <h5 class="card-title">
                                                                <span class="text-danger">*</span>
                                                                <li class="fa fa-digital-tachograph"></li>
                                                                informacion del usuario
                                                            </h5>
                                                        </label>
                                                        <textarea readonly class="form-control" id="textarea2" name="textarea2"
                                                            rows="5"
                                                            cols="50"><?php echo  $objElemento->getInformacion(); ?></textarea>
                                                    </div>
                                                    <br>
                                                    
                                                    <div class="form-actions">
                                                        <button type="button" id="editarEmpresa"
                                                            class="btn btn-success waves-effect waves-light">
                                                            <i class="fa fa-pen-square fa-2x"></i>&nbsp; Actualizar
                                                            informacion
                                                        </button>
                                                        <button type="button" id="actualizarCambios"
                                                            class="btn btn-success waves-effect waves-light">
                                                            <i class="fa fa-save fa-2x"></i>&nbsp; Modificar
                                                        </button>
                                                        <div id="smgElemento"></div>
                                                    </div>
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
        $('#actualizarCambios').hide();
        $(document).on('click', '#editarEmpresa', function (e) {
            $('#editarEmpresa').hide();
            $('#nombre').removeAttr("readonly");
            $('#apellido').removeAttr("readonly");
            $('#telefono').removeAttr("readonly");
            $('#correo').removeAttr("readonly");
            $('#usuario').removeAttr("readonly");
            $('#clave').removeAttr("readonly");
            $('#textarea2').removeAttr("readonly");
           
            $('#actualizarCambios').show();
        });
        $(document).on('click', '#actualizarCambios', function (e) {
            $('#editarEmpresa').show();
            $('#nombre').attr("readonly","readonly");
            $('#apellido').attr("readonly","readonly");
            $('#telefono').attr("readonly","readonly");
            $('#correo').attr("readonly","readonly");
            $('#usuario').attr("readonly","readonly");
            $('#clave').attr("readonly","readonly");
            $('#textarea2').attr("readonly","readonly");
            
        
            $('#actualizarCambios').hide();
            var formData = new FormData();
           formData.append("nombre", document.getElementsByName("nombre")[0].value);
           formData.append("apellido", document.getElementsByName("apellido")[0].value);
           formData.append("telefono", document.getElementsByName("telefono")[0].value);
           formData.append("correo", document.getElementsByName("correo")[0].value);
           formData.append("usuario", document.getElementsByName("usuario")[0].value);
           formData.append("clave", document.getElementsByName("clave")[0].value);
           formData.append("textarea2", document.getElementsByName("textarea2")[0].value);
           formData.append("idElemento", document.getElementsByName("idElemento")[0].value);
           var ruta = routesAppPlatform() + 'usuarios/core/modificarUsuario.php';
           
           sendEventFormDataApp('POST', ruta, formData, '#smgElemento');
            
        });
    </script>
</body>
</html>