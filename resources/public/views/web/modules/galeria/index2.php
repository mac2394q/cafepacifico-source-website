<?php session_start();

include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once (LIB_PATH."session.php");

require_once (CONTROLLERS_PATH."galeriaController.php");
require_once (CONTROLLERS_PATH."elementoController.php");

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
    <!-- navigation -->

        <?php require_once (WEB_PATH."global/inc/component/navBar.php"); ?>
        <!-- end of navigation -->
        <!-- Slide -->

    <section class="parallax2 parallax-fix full-screen no-padding spa-slider"
        style="background: url('<?php echo VENDOR_SERVER."cafepacifico/paisaje.jpg"; ?>') 50% 0px; min-height: 586px;">

        <div class="opacity-medium bg-black"></div>
        <div class="container full-screen position-relative" style="min-height: 586px;">
            <div class="slider-typography ">
                <div class="slider-text-middle-main">
                    <div class="slider-text-middle">

                        <p
                            class="text-large font-weight-500 white-text text-uppercase light-gray-text letter-spacing-3 margin-two">
                            Spa salon rest &amp; relax</p>
                        <h1 class="white-text letter-spacing-3">Refresh</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wow animated" style="visibility: visible;">
        <div class="container">

            <?php elementoController:: listadoElementos2(); ?>
            
                
                
                
                <!-- <div class="col-md-3 col-sm-6 col-xs-6 blog-listing" style="position: absolute; left: 295px; top: 0px;">
                    <div class="blog-image"><a href="blog-single-right-sidebar.html"><img src="images/blog-post5.jpg"
                                alt=""></a></div>
                    <div class="blog-details">
                        <div class="blog-date"><a href="blog-masonry-2columns.html">Paul Scrivens</a> | 02 January 2015
                        </div>
                        <div class="blog-title"><a href="blog-single-right-sidebar.html">You Design It, They Do It</a>
                        </div>
                        <div class="blog-short-description">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s.</div>
                        <div class="separator-line bg-black no-margin-lr"></div>
                        <div><a href="#" class="blog-share"><i class="fa fa-share-alt"></i>Share</a><a href="#"
                                class="comment"><i class="fa fa-comment-o"></i>3 comment(s)</a></div>
                    </div>
                </div>
               
                <div class="col-md-3 col-sm-6 col-xs-6 blog-listing" style="position: absolute; left: 591px; top: 0px;">
                    <div class="blog-image"><a href="blog-single-right-sidebar.html"><img src="images/blog-post6.jpg"
                                alt=""></a></div>
                    <div class="blog-details">
                        <div class="blog-date"><a href="blog-masonry-2columns.html">Nathan Ford</a> | 02 January 2015
                        </div>
                        <div class="blog-title"><a href="blog-single-right-sidebar.html">For A More Readable Web
                                Page</a></div>
                        <div class="blog-short-description">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s.</div>
                        <div class="separator-line bg-black no-margin-lr"></div>
                        <div><a href="#" class="blog-share"><i class="fa fa-share-alt"></i>Share</a><a href="#"
                                class="comment"><i class="fa fa-comment-o"></i>3 comment(s)</a></div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6 col-xs-6 blog-listing" style="position: absolute; left: 887px; top: 0px;">
                    <div class="blog-image"><a href="blog-single-right-sidebar.html"><img src="images/blog-post14.jpg"
                                alt=""></a></div>
                    <div class="blog-details">
                        <div class="blog-date"><a href="blog-masonry-2columns.html">Aarron Walter</a> | 02 January 2015
                        </div>
                        <div class="blog-title"><a href="blog-single-right-sidebar.html">Redesigning With
                                Personality</a></div>
                        <div class="blog-short-description">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s.</div>
                        <div class="separator-line bg-black no-margin-lr"></div>
                        <div><a href="#" class="blog-share"><i class="fa fa-share-alt"></i>Share</a><a href="#"
                                class="comment"><i class="fa fa-comment-o"></i>3 comment(s)</a></div>
                    </div>
                </div> -->
                
            
            
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
