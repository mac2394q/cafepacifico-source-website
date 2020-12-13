<?php session_start();

include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once (LIB_PATH."session.php");



require_once (CONTROLLERS_PATH."blogController.php");

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
        .espacio{
					height:30px;
				}
    </style>
</head>
<body>
    <input type="hidden" value="ha" name="tipoServicio" />
    <input type="hidden" value="NO" name="tipoReserva" />
    <input type="hidden" value="1" name="npersonas" />
    <input type="hidden" value="12:00" name="horario" />
    <input type="hidden" value="<?php echo $idsesion; ?>" name="idsesion" />
    <!-- navigation -->
    <div id="top_bar">
        <?php require_once (WEB_PATH."global/inc/component/navBar.php"); ?>
        <!-- end of navigation -->
        <!-- Slide -->
    </div>
    <section class="content-top-margin page-title page-title-small bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-12 wow fadeInUp animated" data-wow-duration="300ms"
                    style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                    <!-- page title -->
                    <h1 class="black-text">Nuestro espacio en  Cafe Pacifico Blog</h1>
                    <!-- end page title -->
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none animated"
                    data-wow-duration="600ms"
                    style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                    <!-- breadcrumb -->
                    <ul>
                        <li><a href="#">Mi perfil </a></li>
                       
                        <li><a href="<?php echo WEB_SERVER."modules/blog/nuevoPos.php"; ?>" class="btn-success btn btn-small  btn-round xs-margin-bottom-five text-white">Nuevo pos</a></li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray wow fadeIn ">
        
        <div class="container">
            
            <div class="row">
                <!-- content  -->
                
                <div class="col-md-8 col-sm-8">
                    <!-- post item -->
                    
                    <?php  blogController::listadoBlogWeb(); ?>
                    <!-- end post item -->
                </div>
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
                    <!-- end post item -->
                </div>
               
            </div>
        </section>
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


        $("#mensajeEvento").hide();
        $("#almuerzoDiv").show();
        $("#cenaDiv").hide();
        $("#disponibilidadReserva").hide();
        var servicio = "";
        $(document).on('click', '#reserva', function (e) {
            var date = $('#fecha').val();
            var tipo = document.getElementsByName("tipoServicio")[0].value;
            var div = "";
            if (tipo == "hc") {
                div = "cenaDiv";
                servicio = "CENA";
            } else {
                div = "almuerzoDiv";
                servicio = "ALMUERZO";
            }
            sendEventApp('POST', routesAppWeb() + 'reserva/core/registrarReserva.php',
                params = {
                    "idsesion": document.getElementsByName("idsesion")[0].value,
                    "npersonas": document.getElementsByName("reserva")[0].value,
                    "tipoReserva": document.getElementsByName("tipoReserva")[0].value,
                    "servicio": servicio,
                    "horario": document.getElementsByName("horario")[0].value,
                    "fecha": date


                }, '#estadoReserva');
        });
        $(document).on('click', '#servicio', function (e) {
            var servicio = document.getElementsByName("servicio")[0].value;
            if (parseInt(servicio) == 1) {
                $("#almuerzoDiv").show();
                $("#cenaDiv").hide();
                document.getElementsByName("tipoServicio")[0].value = "ha";
            } else {
                $("#almuerzoDiv").hide();
                $("#cenaDiv").show();
                document.getElementsByName("tipoServicio")[0].value = "hc";
            }
            return false;
        });
        $(document).on('click', '#ha', function (e) {
            document.getElementsByName("horario")[0].value = document.getElementsByName("ha")[0].value;
        });
        $(document).on('click', '#hc', function (e) {
            document.getElementsByName("horario")[0].value = document.getElementsByName("hc")[0].value;
        });
        $(document).on('click', '#reserva', function (e) {
            var reserva = document.getElementsByName("reserva")[0].value;
            if (parseInt(reserva) == 10) {
                $("#mensajeEvento").show();
                document.getElementsByName("tipoReserva")[0].value = "SI";
                document.getElementsByName("npersonas")[0].value = document.getElementsByName("reserva")[0]
                    .value;
            } else {
                $("#mensajeEvento").hide();
                document.getElementsByName("tipoReserva")[0].value = "NO";
                document.getElementsByName("npersonas")[0].value = document.getElementsByName("reserva")[0]
                    .value;
            }
            return false;
        });
        $(document).on('change', '#fecha', function (e) {
            var date = $('#fecha').val();
            var tipo = document.getElementsByName("tipoServicio")[0].value;
            var div = "";
            if (tipo == "hc") {
                div = "cenaDiv";
                servicio = "CENA";
            } else {
                div = "almuerzoDiv";
                servicio = "ALMUERZO";
            }
            sendEventApp('POST', routesAppWeb() + 'reserva/core/verificarReserva.php',
                params = {
                    "servicio": tipo,
                    "horario": document.getElementsByName("horario")[0].value,
                    "fecha": date


                }, '#' + div);
            sendEventApp('POST', routesAppWeb() + 'reserva/core/disponibilidad.php',
                params = {
                    "servicio": tipo,
                    "horario": document.getElementsByName("horario")[0].value,
                    "fecha": date


                }, '#disponibilidadReserva');
            sendEventApp('POST', routesAppWeb() + 'reserva/core/fichaReserva.php',
                params = {
                    "npersonas": document.getElementsByName("reserva")[0].value,
                    "tipoReserva": document.getElementsByName("tipoReserva")[0].value,
                    "servicio": servicio,
                    "horario": document.getElementsByName("horario")[0].value,
                    "fecha": date


                }, '#reservaEstado');
            $("#disponibilidadReserva").show();
            return false;
        });
        $(document).on('click', '#imprimirFactura', function (e) {
            //$('#areaImprimir').hide();
            $('#top_bar').hide();
            $('#top_bar2').hide();
            $('#top_bar3').hide();
            window.print();
            $('#areaImprimir').show();
            $('#top_bar').show();
            $('#top_bar2').show();
            $('#top_bar3').show();
        });
    </script>
</body>
</html>


