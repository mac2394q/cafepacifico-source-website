<?php session_start();

include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once (LIB_PATH."session.php");

require_once (CONTROLLERS_PATH."galeriaController.php");
require_once (CONTROLLERS_PATH."blogController.php");
require_once (CONTROLLERS_PATH."usuarioController.php");
$objElemento = blogController::blogId($_GET['id']);
$idElemento = $objElemento->getId_blog();
$objUsuario = usuarioController:: usuarioId($objElemento->getId_usuario());

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
    <section class="content-top-margin page-title page-title-small bg-gray">
        <div class="container">
            <div class="row">
                <div class=" col-md-6 cwow fadeInUp animated" data-wow-duration="300ms"
                    style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                    <!-- page title -->
                    <h1 class="black-text"><?php  echo $objElemento->getT_principal();  ?> </h1>
                    <!-- end page title -->
                </div>
                <div class=" col-md-6  breadcrumb text-uppercase wow fadeInUp xs-display-none animated"
                    data-wow-duration="600ms"
                    style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                    <!-- breadcrumb -->
                    <ul>
                        <li>Posteado por: <?php echo $objUsuario-> getNombre()." ".$objUsuario-> getApellido();?></li>
                        <li><?php echo $objElemento->getF_publicacion();?></li>
                        <li><?php echo $objElemento->getH_publicacion();?></li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray wow fadeIn ">
        <div class="container">
            <div class="row">
            <section class="wow fadeIn cover-background animated" style="background-image: url('<?php echo $portada;?>'); visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="separator-line bg-yellow no-margin-lr no-margin-top"></div>
                        <div class="white-text slider-subtitle1 bg-inherit no-margin text-left no-padding"><?php  echo $objElemento->getT_principal();  ?></div>

                    </div>
                </div>
            </div>
        </section>
        <br>
        <hr>
        <br>
                <!-- <div class="row lightbox-gallery">
                    <div class="col-md-2 col-sm-6 wow fadeIn animated"
                        style="visibility: visible; animation-name: fadeIn;">

                        <a href="images/portfolio-img37.jpg"><img src="images/portfolio-img37.jpg" alt=""
                                class="project-img-gallery"></a>

                    </div>
                    <div class="col-md-2 col-sm-6 wow fadeIn animated"
                        style="visibility: visible; animation-name: fadeIn;">

                        <a href="images/portfolio-img38.jpg"><img src="images/portfolio-img38.jpg" alt=""
                                class="project-img-gallery"></a>

                    </div>

                </div> -->
                
                <div class="blog-comment-form">
                    <form>
                        <label>Resumen de la galeria</label>
                        <textarea  placeholder="Resumen. . . "><?php echo $objElemento->getContenido(); ?></textarea>
                    </form>
                </div>
                <?php echo galeriaController::verGalerias($idElemento); ?>

                <div class="blog-comment-form">
                            <form>
                                

                                <label>Nueva imagen para galeria</label>
                                <input type="file" name="file1" id="file1">


                                <span class="required">*Por favor complete todos los campos correctamente</span>

                                <button id="subirImagen"
                                    class="highlight-button-dark btn btn-small no-margin-bottom">Subir nueva imagen
                                </button>
                                <br><br>
                                <div id="smgBlog">

                                </div>

                              

                            </form>
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

            var ruta = routesAppWeb() + 'galeria/core/subirImagen.php';
            sendEventFormDataApp('POST', ruta, formData, '#smgBlog');

            return false;
        });



     
    </script>
</body>

</html>
