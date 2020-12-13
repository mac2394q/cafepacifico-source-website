<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">

<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."elementoController.php");
       require_once (HELPERS_PATH."rutas.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $objElemento = elementoController::elementoId($_GET['id']);
       $idElemento = $objElemento->getId_elemento();
       
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%">

    <input type="hidden" value="<?php  echo $objElemento->getId_elemento(); ?>" name="idElemento" />
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
                                <div class="card" style="height: 984.5px;">

                                    <div class="card-content collapse show">
                                        <div class="card-body">

                                            <div class="form">
                                                <div class="form-body">

                                                    <h2 class="form-section"><i class="fa fa-elementor"></i>
                                                        Informacion general de un elemento</h2>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    <h5 class="card-title"><span
                                                                            class="text-danger">*</span> Nombre del
                                                                        elemento multimedia
                                                                    </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . ." name="nombre" id="nombre"
                                                                    value="<?php echo  $objElemento->getNombre_producto(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> <span
                                                                            class="text-danger">*</span>Precio </h5>
                                                                </label>
                                                                <input readonly type="text" class="form-control"
                                                                    placeholder=". . . " name="precio" id="precio"
                                                                    value="<?php echo  $objElemento->getPrecio(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput3">
                                                                    <h5 class="card-title"> <span
                                                                            class="text-danger">*</span>Foto del
                                                                        elemento </h5>
                                                                </label>
                                                                <br><br>
                                                                <input type="file" id="file" name="file">
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
                                                            cols="50"><?php echo  $objElemento->getDescripcion(); ?></textarea>
                                                    </div>
                                                    <br>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body">
                                                            <div class="card-text">
                                                                <p>Para cambiar el logo debe usar el componente<code> foto del elemento</code> para cambiar el logo del elemento multimedia .</p>
                                                            </div>
                                                        </div>
                                                        <div class="card-body  my-gallery" itemscope
                                                            itemtype="http://schema.org/ImageGallery">
                                                            <div class="row">
                                                                <?php
                                                         $url = DOCUMENTS_SERVER."fotosElementos/".$idElemento."/".$idElemento.".jpg";
                                                         if(rutas::validarRutas($url)=="404"){;
                                                    ?>
                                                                <figure class="col-lg-3 col-md-6 col-12"
                                                                    itemprop="associatedMedia" itemscope
                                                                    itemtype="http://schema.org/ImageObject">
                                                                    <a href="http://aesbeta.ml/vendor/aes/notfound.png"
                                                                        itemprop="contentUrl" data-size="480x360">
                                                                        <img class="img-thumbnail img-fluid"
                                                                            src="http://aesbeta.ml/vendor/aes/notfound.png"
                                                                            itemprop="thumbnail"
                                                                            alt="Image description" />
                                                                    </a>
                                                                </figure>
                                                                <?php }else{ ?>
                                                                <figure class="col-lg-3 col-md-6 col-12"
                                                                    itemprop="associatedMedia" itemscope
                                                                    itemtype="http://schema.org/ImageObject">
                                                                    <a href="<?php echo $url; ?>" itemprop="contentUrl"
                                                                        data-size="480x360">
                                                                        <img class="img-thumbnail img-fluid"
                                                                            src="<?php echo $url; ?>"
                                                                            itemprop="thumbnail"
                                                                            alt="Image description" />
                                                                    </a>
                                                                </figure>
                                                                <?php } ?>


                                                            </div>

                                                        </div>
                                                        <!--/ Image grid -->
                                                    </div>
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
            $('#precio').removeAttr("readonly");
            $('#textarea2').removeAttr("readonly");
           
            $('#actualizarCambios').show();
        });

        $(document).on('click', '#actualizarCambios', function (e) {

            $('#editarEmpresa').show();

            $('#nombre').attr("readonly","readonly");
            $('#precio').attr("readonly","readonly");
            $('#textarea2').attr("readonly","readonly");
            
        
            $('#actualizarCambios').hide();

            var formData = new FormData();
           formData.append("nombre", document.getElementsByName("nombre")[0].value);
           formData.append("precio", document.getElementsByName("precio")[0].value);
           formData.append("textarea2", document.getElementsByName("textarea2")[0].value);
           formData.append("idElemento", document.getElementsByName("idElemento")[0].value);
           formData.append("file", $('#file')[0].files[0]);

           var ruta = routesAppPlatform() + 'elementos/core/modificarElemento.php';
           
           sendEventFormDataApp('POST', ruta, formData, '#smgElemento');

            

        });
    </script>
</body>

</html>