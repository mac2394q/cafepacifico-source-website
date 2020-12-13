<?php session_start();

include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once (LIB_PATH."session.php");

require_once (PROVIDERS_PATH."pdo/reservacionDao.php");

require_once (CONTROLLERS_PATH."blogController.php");

require_once (CONTROLLERS_PATH."usuarioController.php");
$objReservacion = blogController::blogId($_GET['id']);
$objUsuario = usuarioController::usuarioId($objReservacion->getId_usuario());
$statusSesion=session::verificarSesionWeb($_SESSION['idsesion']);
$img1 = DOCUMENTS_SERVER."blog/".$objReservacion->getId_blog()."/cabecera.jpg";
$img2 = DOCUMENTS_SERVER."blog/".$objReservacion->getId_blog()."/contenido.jpg";
$img3 = DOCUMENTS_SERVER."blog/".$objReservacion->getId_blog()."/introduccion.jpg";
// $url = WEB_SERVER."modules/blog/verFicha.php?id=".$objEmpresa[$key]->getId_blog();
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
       
    ?>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" />
    <style>
        .fondo {
            background-image: url(<?php echo VENDOR_SERVER."cafepacifico/w.jpg";?>);
            /* background-repeat: no-repeat; */
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

    <input type="hidden" value="<?php echo $idsesion; ?>" name="idsesion" />
    <input type="hidden" value="<?php echo $objReservacion->getId_blog(); ?>" name="idblog" />
    <!-- navigation -->
    <div id="top_bar">
        <?php require_once (WEB_PATH."global/inc/component/navBar.php"); ?>
        <!-- end of navigation -->
        <!-- Slide -->
    </div>

    <section class="bg-gray wow fadeIn ">
        <div class="container">
            <div class="row">
                <!-- content  -->
                <div class="col-md-8 col-sm-8">
                    <!-- post title  -->
                    <h2 class="blog-details-headline text-black"><?php echo $objReservacion->getT_principal(); ?></h2>
                    <!-- end post title  -->
                    <!-- post date and categories  -->
                    <div class="blog-date no-padding-top">Posteado por
                        <?php echo $objUsuario->getNombre()." ".$objUsuario->getApellido(); ?>|
                        <?php echo $objReservacion->getF_publicacion(); ?>
                        |<?php echo $objReservacion->getH_publicacion(); ?> </div>
                    <!-- end date and categories   -->
                    <!-- post image -->
                    <div class="blog-image margin-eight"><img src="<?php echo $img1 ?>" alt=""></div>
                    <!-- end post image -->
                    <!-- post details text -->
                    <div class="blog-details-text">
                        <p class="text-large"><?php echo $objReservacion->getSubtitulo(); ?></p>
                        <blockquote class="bg-gray">
                            <p class="text-justify"><?php echo $objReservacion->getIntroduccion(); ?>
                                <footer><?php echo $objUsuario->getNombre()." ".$objUsuario->getApellido(); ?></footer>

                            </p>
                        </blockquote>
                        <div class="blog-image bg-white">
                            <!-- post details blockquote -->
                            <blockquote>
                                <img src="<?php echo $img3 ?>" alt="">
                                <footer>
                                    <?php echo $objUsuario->getNombre()." ".$objUsuario->getApellido()." - Fotografía con licencia Creative Commons (CC)"; ?>
                                </footer>
                            </blockquote>
                            <!-- end post details blockquote -->
                        </div>
                        <p class="text-justify"><?php echo $objReservacion->getContenido(); ?>
                        </p>
                        <!-- end post tags -->
                        <div class="blog-image bg-white">
                            <blockquote>
                                <img src="<?php echo $img2 ?>" alt="">
                                <footer>
                                    <?php echo $objUsuario->getNombre()." ".$objUsuario->getApellido()." - Fotografía con licencia Creative Commons (CC)"; ?>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                    <!-- end post details text -->
                    <!-- about author -->
                    <div class="text-center margin-ten no-margin-bottom about-author text-left bg-gray">
                        <div class="blog-comment text-left clearfix no-margin">
                            <!-- author image -->
                            <a class="comment-avtar no-margin-top"><img
                                    src="http://www.cavsi.com/preguntasrespuestas/images/que-es-usuario.jpg" alt=""></a>
                            <!-- end author image -->
                            <!-- author text -->
                            <div class="comment-text overflow-hidden position-relative">
                                <h5 class="widget-title">Sobre el autor</h5>
                                <p class="blog-date no-padding-top">
                                    <?php echo $objUsuario->getNombre()." ".$objUsuario->getApellido()." - ".$objUsuario->getTipo_usuario();  ?>
                                </p>
                                <p class="about-author-text no-margin text-justify"><?php echo $objUsuario->getInformacion(); ?>.</p>
                            </div>
                            <!-- end author text -->
                        </div>
                    </div>
                    <!-- end about author -->
                    <!-- social icon -->

                    <!-- end social icon -->
                    <div id="addcomment" class="blog-comment-form-main">
                        <h5 class="widget-title margin-five no-margin-top">Agregar comentario</h5>
                        <div class="blog-comment-form">
                            <form>
                            <?php  if($statusSesion == 1){  ?>

                                <input type="text" readonly name="name" placeholder="Nombre" value="<?php echo $_SESSION['nombre']." ".$_SESSION['apellidos']; ?>">
                                
                                <input type="text" readonly name="email" placeholder="E-mail" value="<?php  echo $_SESSION['email']; ?>">
                               
                                <textarea name="comentario" id="comentario" placeholder="Commentario"></textarea>
                                
                                <span class="required">*Por favor complete todos los campos correctamente</span>
                               
                                <button id="enviarComentario"
                                    class="highlight-button-dark btn btn-small no-margin-bottom">Enviar comentario</button>
                                <br><br>
                                <div id="smgBlog">
                                    
                                </div>
                                
                            <?php }else{ ?>
                                <div class="alert alert-warning" role="alert">
                                    <i class="icon-caution"></i>
                                    <span><strong>A tener en cuenta!</strong> para poder realizar un comentario en el <code>pos</code>, debe iniciar sesion en la plataforma.</span>
                                </div>
                            <?php } ?>

                            </form>
                        </div>
                    </div>
                    <br><br>
                    <!-- post comment -->
                    <div class="blog-comment-main xs-no-padding-top">
                        <h5 class="widget-title">Comentarios</h5>
                        <?php blogController::comentariosPost($_GET['id']); ?>
                        
                        
                    </div>
                    <!-- end post comment -->
                    <!-- comment form -->

                    <!-- end comment form -->
                </div>
                <!-- end content  -->
                <!-- sidebar  -->
                <div class="col-md-3 col-sm-4 col-md-offset-1 sidebar xs-margin-top-ten">
                    <!-- widget  -->
                    <div class="widget">
                        <form>
                            <i class="fa fa-search close-search search-button"></i>
                            <input type="text" placeholder="Buscar..." class="search-input" name="search">
                        </form>
                    </div>
                    <!-- end widget  -->
                    <!-- widget  -->

                    <!-- end widget  -->
                    <!-- widget  -->
                    <div class="widget">
                        <h5 class="widget-title font-alt">Ultimos post</h5>
                        <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>
                        <div class="widget-body">
                            <ul class="widget-posts">
                                <?php blogController::ultimosPost(); ?>
                            </ul>
                        </div>
                    </div>
                    <!-- end widget  -->
                    <!-- widget  -->

                    <!-- end widget  -->
                    <!-- widget  -->
                    <div class="widget">
                        <h5 class="widget-title font-alt">Comentarios recientes</h5>
                        <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>
                        <div class="widget-body">
                            <ul class="widget-posts">
                                <?php blogController::ultimosComentarios(); ?>
                            </ul>
                        </div>
                    </div>
                    <!-- end widget  -->
                    <!-- widget  -->
                    <div class="widget">
                        <h5 class="widget-title font-alt">Café Pacífico <br> La mejor comida del Pacífico</h5>
                        <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>
                        <div class="widget-body text-justify">
                            <p>Delicioso rincón de la gastronomía del Pacífico … no olvides pedir la variedad de viches…
                                La cazuela tumaqueña, el encocado de muchilla, el pargo frito , el arroz con langostinos
                                etc.</p>
                        </div>
                    </div>
                    <!-- end widget  -->
                    <!-- widget  -->
                    <div class="widget">
                        <h5 class="widget-title font-alt">Archivo</h5>
                        <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>
                        <div class="widget-body">
                            <ul class="category-list">
                                <li><a href="blog-masonry-3columns.html">Año 2022<span>48</span></a></li>
                                <li><a href="blog-masonry-3columns.html">Año 2021<span>48</span></a></li>
                                <li><a href="blog-masonry-3columns.html">Año 2020<span>25</span></a></li>
                                <li><a href="blog-masonry-3columns.html">Año 2019<span>40</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end widget  -->
                </div>
                <!-- end sidebar  -->
            </div>
        </div>
    </section>
    <!-- footer -->
    <?php require_once (WEB_PATH."global/inc/component/footer.php"); ?>
    <!-- end footer -->
    <!-- javascript libraries / javascript files set #2 -->
    <?php require_once (WEB_PATH."global/inc/lib.php"); ?>
    <script src="<?php echo CORE_JS_SERVER."core_views/directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."core_views/app.js"; ?>"></script>
    <script>
        //init


       
       
       
        $(document).on('click', '#enviarComentario', function (e) {
            
            sendEventApp('POST', routesAppWeb() + 'blog/core/registrarComentarios.php',
                params = {
                    "idsesion": document.getElementsByName("idsesion")[0].value,
                    "idblog": document.getElementsByName("idblog")[0].value,
                    "comentario": document.getElementsByName("comentario")[0].value
                }, '#smgBlog');
            
        
            return false;
        });
        
    </script>
</body>

</html>
