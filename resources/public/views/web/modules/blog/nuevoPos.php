<?php session_start();

include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once (LIB_PATH."session.php");

require_once (PROVIDERS_PATH."pdo/reservacionDao.php");

require_once (CONTROLLERS_PATH."blogController.php");

require_once (CONTROLLERS_PATH."usuarioController.php");
$objReservacion = blogController::blogId($_GET['id']);
$objUsuario = usuarioController::usuarioId($objReservacion->getId_usuario());
$statusSesion=session::verificarSesionWeb($_SESSION['idsesion']);
$img1 = DOCUMENTS_SERVER."blog/".$objReservacion->getId_blog()."/cabezera.jpg";
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

    <input type="hidden" value="<?php echo $idsesion; ?>" name="idusuario" />

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
                    
                    
                    <div id="addcomment" class="blog-comment-form-main">
                        <h5 class="widget-title margin-five no-margin-top">Agregar comentario</h5>
                        <div class="blog-comment-form">
                            <form>
                                

                                <label>Imagen de encabezado</label>
                                <input type="file" name="file1" id="file1">

                                <input type="text" name="titulo" id="titulo" placeholder="TITULO" value="">

                                <input type="text" name="subtitulo" id="subtitulo" placeholder="SUBTITULO" value="">

                                <label>Imagen de introduccion</label>
                                <input type="file" name="file2" id="file2">

                                <textarea name="textarea2" id="textarea2" placeholder="INTRODUCCION"></textarea>

                                <label>Imagen de contenido</label>
                                <input type="file" name="file3" id="file3">

                                <textarea name="textarea1" id="textarea1" placeholder="CONTENIDO"></textarea>

                                <span class="required">*Por favor complete todos los campos correctamente</span>

                                <button id="registrarBlog"
                                    class="highlight-button-dark btn btn-small no-margin-bottom">Publicar pos
                                </button>
                                <br><br>
                                <div id="smgBlog">

                                </div>

                              

                            </form>
                        </div>
                    </div>
                    <br><br>
                    <!-- post comment -->
                  
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





        $(document).on('click', '#registrarBlog', function (e) {
            $("#smgElemento").html("");
            var formData = new FormData();
            formData.append("idusuario", document.getElementsByName("idusuario")[0].value);
            formData.append("titulo", document.getElementsByName("titulo")[0].value);
            formData.append("subtitulo", document.getElementsByName("subtitulo")[0].value);
            formData.append("textarea2", document.getElementsByName("textarea2")[0].value);
            formData.append("textarea1", document.getElementsByName("textarea1")[0].value);
            formData.append("file1", $('#file1')[0].files[0]);
            formData.append("file2", $('#file2')[0].files[0]);
            formData.append("file3", $('#file3')[0].files[0]);
            var ruta = routesAppWeb() + 'blog/core/registrarBlog.php';
            sendEventFormDataApp('POST', ruta, formData, '#smgBlog');

            return false;
        });
    </script>
</body>

</html>
