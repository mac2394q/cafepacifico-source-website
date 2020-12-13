<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">

<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."blogController.php");
       require_once (HELPERS_PATH."rutas.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $objElemento = blogController::blogId($_GET['id']);
       $idElemento = $objElemento->getId_blog();
       
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">

    <input type="hidden" value="" name="idElemento" />
    <!-- fixed-top-->
    <?php
    /* top bar  */
    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");
    /* Menu  */
    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");
    $url1 = DOCUMENTS_SERVER."blog/".$idElemento."/introducion.jpg";
    $url2 = DOCUMENTS_SERVER."blog/".$idElemento."/contenido.jpg";
    $url3 = DOCUMENTS_SERVER."blog/".$idElemento."/cabezera.jpg";
    $not ="http://aesbeta.ml/vendor/aes/notfound.png";
  ?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-dark bg-img col-12">
                    <div class="row">
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <h3 class="content-header-title white">Modulo de menu y otros elementos</h3>
                            <div class="row breadcrumbs-top">
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item "><a href="index.php">Listado de elementos </a>
                                        </li>

                                        <li class="breadcrumb-item active">Ver ficha del elemento
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
                                <div class="card">

                                    <div class="card-content ">
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-md-12">

                                                    <br><br>
                                                    <h2 class="form-section"><i class="fa fa-elementor"></i>
                                                        Publicacion</h2>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                <h5 class="card-title"><span
                                                                        class="text-danger">*</span> Titulo
                                                                </h5>
                                                            </label>
                                                            <input type="text" class="form-control" placeholder=". . ."
                                                                name="nombre" id="nombre" value="<?php echo $objElemento->getT_principal(); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput3">
                                                                <h5 class="card-title"> <span
                                                                        class="text-danger">*</span>Subtitutlo
                                                                </h5>
                                                            </label>
                                                            <input type="text" class="form-control" placeholder=". . . "
                                                                name="precio" id="precio" value="<?php echo $objElemento->getSubtitulo(); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-12">
                                                        <label for="projectinput3">
                                                            <h5 class="card-title">
                                                                <span class="text-danger">*</span>
                                                                <li class="fa fa-digital-tachograph"></li>
                                                                Introduccion
                                                            </h5>
                                                        </label>
                                                        <textarea class="form-control" id="textarea2" name="textarea2"
                                                            rows="5" cols="50"><?php echo $objElemento->getIntroduccion(); ?></textarea>
                                                    </div>

                                                    
                                                   
                                                    <br>
                                                </div>



                                                <div class="col-xl-4 col-md-4 col-sm-4">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <img class="card-img-top img-fluid"
                                                                src="<?php  echo $url1; ?>" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h4 class="card-title"><span
                                                                        class="text-danger">*</span>Foto de
                                                                    introducion</h4>
                                                                <p class="card-text">
                                                                    <div class="form-group">


                                                                        <input type="file" id="file1" name="file1">
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-xl-4 col-md-4 col-sm-4">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <img class="card-img-top img-fluid"
                                                                src="<?php  echo $url2; ?>" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h4 class="card-title"><span
                                                                        class="text-danger">*</span>Foto de
                                                                   contenido</h4>
                                                                <p class="card-text">
                                                                    <div class="form-group">


                                                                        <input type="file" id="file2" name="file2">
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-xl-4 col-md-4 col-sm-4">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <img class="card-img-top img-fluid"
                                                                src="<?php  echo $url3; ?>" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h4 class="card-title"><span
                                                                        class="text-danger">*</span>Foto de
                                                                    cabezera</h4>
                                                                <p class="card-text">
                                                                    <div class="form-group">


                                                                        <input type="file" id="file3" name="file3">
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <br>
                                                <div class="form-group mb-1 col-sm-12 col-md-12">
                                                        <label for="projectinput3">
                                                            <h5 class="card-title">
                                                                <span class="text-danger">*</span>
                                                                <li class="fa fa-digital-tachograph"></li>
                                                                Contenido
                                                            </h5>
                                                        </label>
                                                        <textarea class="form-control" id="textarea1" name="textarea1"
                                                            rows="5" cols="50"><?php echo $objElemento->getContenido(); ?></textarea>
                                                    </div>
                                                    <br>
                                                <div class="col-md-12 form form-actions">
                                                    <button type="button" id="editarEmpresa"
                                                        class="btn btn-success waves-effect waves-light">
                                                        <i class="fa fa-pen-square fa-2x"></i>&nbsp; Actualizar
                                                        informacion
                                                    </button>
                                                    <button type="button" id="actualizarCambios"
                                                        class="btn btn-success waves-effect waves-light">
                                                        <i class="fa fa-save fa-2x"></i>&nbsp; Modificar
                                                    </button>
                                                    <div id="smgEmpresa"></div>
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
            $('#precio').removeAttr("readonly");
            $('#textarea2').removeAttr("readonly");
            $('#textarea1').removeAttr("readonly");

            $('#actualizarCambios').show();
        });

        $(document).on('click', '#actualizarCambios', function (e) {

            $('#editarEmpresa').show();

            $('#nombre').attr("readonly", "readonly");
            $('#precio').attr("readonly", "readonly");
            $('#textarea2').attr("readonly", "readonly");
            $('#textarea1').attr("readonly", "readonly");


            $('#actualizarCambios').hide();

            var formData = new FormData();
            formData.append("nombre", document.getElementsByName("nombre")[0].value);
            formData.append("precio", document.getElementsByName("precio")[0].value);
            formData.append("textarea2", document.getElementsByName("textarea2")[0].value);
            formData.append("textarea2", document.getElementsByName("textarea1")[0].value);
            formData.append("file", $('#file1')[0].files[0]);
            formData.append("file", $('#file2')[0].files[0]);
            formData.append("file", $('#file3')[0].files[0]);

            var ruta = routesAppPlatform() + 'blog/core/modificarBlog.php';

            sendEventFormDataApp('POST', ruta, formData, '#smgElemento');



        });
    </script>
</body>

</html>