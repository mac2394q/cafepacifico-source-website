<?php session_start();

include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once (LIB_PATH."session.php");

require_once (CONTROLLERS_PATH."galeriaController.php");
require_once (CONTROLLERS_PATH."blogController.php");
require_once (CONTROLLERS_PATH."usuarioController.php");
require_once (CONTROLLERS_PATH."elementoController.php");
$objElemento = elementoController::elementoId($_GET['id']);
$idElemento = $objElemento->getId_elemento();
$rutaImagen=DOCUMENTS_SERVER."fotosElementos/".$idElemento."/".$idElemento.".jpg";


$statusSesion=session::verificarSesionWeb($_SESSION['idsesion']);
$idsesion =0;

if($statusSesion== 1){
    $idsesion =$_SESSION['idsesion'];
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php

       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (WEB_PATH."global/inc/head.php");
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $hoy = getdate();
       $fecha = "";
       if( intval($hoy['mon']) > 9){
        $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
       }else{
        $fecha = $hoy['year']."-0".$hoy['mon']."-".$hoy['mday'];
       }
       //echo $hoy['mon']."xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ".$fecha;

       $portada = DOCUMENTS_SERVER."galeria/".$idElemento."/portada.jpg";
       
    ?>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" />
    <style>
        .fondo {
            background-image: url(<?php echo VENDOR_SERVER."cafepacifico/manglarportada.jpg";?>);
            /* background-repeat: no-repeat;  */
            /* filter: blur(1px); */
        }

        .nodisponible {
            background-color: red;
        }

        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }

        .espacio {
            height: 30px;
        }
    </style>
</head>

<body>
    <input type="hidden" value="ha" name="tipoServicio" />
    <input type="hidden" value="NO" name="tipoReserva" />
    <input type="hidden" value="1" name="npersonas" />
    <input type="hidden" value="12:00" name="horario" />
    <input type="hidden" value="<?php echo $idsesion; ?>" name="idsesion" />
    <input type="hidden" value="<?php echo $idElemento; ?>" name="idblog" />
    <!-- navigation -->
    <div id="top_bar">
        <?php require_once (WEB_PATH."global/inc/component/navBar.php"); ?>
        <!-- end of navigation -->
        <!-- Slide -->
    </div>
    <section class="page-title content-top-margin border-bottom parallax3 parallax-fix" style="background: url(<?php echo VENDOR_SERVER."cafepacifico/paisaje.jpg"; ?>) 50% 24px;">
            <div class="opacity-light bg-black"></div>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 text-center animated fadeInUp">
                        <!-- page title -->
                        <h1 class="white-text">Visor de productos </h1>
                        <!-- end page title -->
                        <!-- page title tagline -->
                        <span class="text-uppercase light-gray-text">Producto #<?php echo $objElemento->getId_elemento()." - ".$objElemento->getNombre_producto(); ?></span>
                        <!-- end title tagline -->
                    </div>
                </div>
            </div>
        </section>
    <section class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 xs-margin-bottom-ten">
                    <div class="col-md-10 col-sm-12 no-padding wow fadeInUp animated"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <h6 class="black-text no-margin-top margin-one no-letter-spacing"><strong>Nombre </strong>
                        </h6>
                        <p><?php echo $objElemento->getNombre_producto(); ?>.</p><br>
                        <h6 class="black-text no-margin-top margin-one no-letter-spacing"><strong>Precio $</strong></h6>
                        <p><?php echo $objElemento->getPrecio(); ?></p><br>
                    </div>
                    <div class="col-md-10 col-sm-12 text-med text-uppercase no-padding wow fadeInUp animated"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <p class="text-justify"><?php echo $objElemento->getDescripcion(); ?>.</p>
                        <div class="thin-separator-line bg-mid-gray margin-ten no-margin-lr"></div>
                    </div>
                    
                </div>
                <div class="col-md-8 col-sm-6">
                    <img src="<?php echo $rutaImagen; ?>"
                        class="project-img-gallery no-padding-top wow fadeInUp animated" alt=""
                        style="visibility: visible; animation-name: fadeInUp;">
                    
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <div id="top_bar2">
        <?php require_once (WEB_PATH."global/inc/component/footer.php"); ?>
    </div>
    <!-- end footer -->
    <!-- javascript libraries / javascript files set #2 -->
    <?php require_once (WEB_PATH."global/inc/lib.php"); ?>
    <script src="<?php echo CORE_JS_SERVER."core_views/directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."core_views/app.js"; ?>"></script>
    <script>
        //init


        $(document).on('click', '#subirImagen', function (e) {

            var formData = new FormData();
            formData.append("idblog", document.getElementsByName("idblog")[0].value);
            formData.append("file1", $('#file1')[0].files[0]);

            var ruta = routesAppWeb() + 'blog/core/registrarBlog.php';
            sendEventFormDataApp('POST', ruta, formData, '#smgBlog');

            return false;
        });
    </script>
</body>

</html>
