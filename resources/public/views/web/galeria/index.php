<?php session_start();

include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once (LIB_PATH."session.php");

require_once (PROVIDERS_PATH."pdo/reservacionDao.php");
$objReservacion = reservacionDao::reservacionId($_GET['id']);
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
                    <h1 class="black-text">Galeria de eventos e imagenes CAFE PACIFICO </h1>
                    <!-- end page title -->
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none animated"
                    data-wow-duration="600ms"
                    style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                    <!-- breadcrumb -->
                    <ul>
                        <li><a href="#">Mi perfil </a></li>
                        <li><a href="#">Mi reserva</a></li>
                        <li>la carta</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray wow fadeIn fondo">
        <div class="container">
            <div class="row">
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
                <section class="no-padding case-study bg-gray wow fadeIn animated"
                    style="visibility: visible; animation-name: fadeIn;">
                    <div class="container-fluid">
                        <div class="row">
                            <div id="owl-demo-small"
                                class="owl-carousel owl-theme dark-pagination  dark-pagination-without-next-prev-arrow"
                                style="opacity: 1; display: block;">
                                <!-- case study item -->
                                <div class="owl-wrapper-outer">
                                    <div class="owl-wrapper"
                                        style="width: 8124px; left: 0px; display: block; transform: translate3d(0px, 0px, 0px); transition: all 300ms ease 0s;">
                                        <div class="owl-item" style="width: 1354px;">
                                            <div class="item">
                                                <div class="col-lg-6 col-md-6 case-study-img cover-background"
                                                    style="background-image:url('images/case-study3.jpg');"></div>
                                                <div class="col-lg-6 col-md-6 case-study-details">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <span
                                                            class="about-number black-text font-weight-400 letter-spacing-2 xs-no-border xs-no-padding-left xs-display-none">01</span>
                                                    </div>
                                                    <div
                                                        class="col-lg-8 col-md-9 col-sm-9 col-xs-12 about-text position-relative xs-text-center">
                                                        <p
                                                            class="title-small text-uppercase letter-spacing-3 black-text font-weight-600 no-margin-bottom">
                                                            Corinne Product</p>
                                                        <span class="case-study-work letter-spacing-3">Brand Strategy |
                                                            Graphic Design</span>
                                                        <p class="width-90 xs-width-100">Lorem Ipsum is simply dummy
                                                            text of the printing &amp; typesetting industry. Lorem Ipsum
                                                            has been the industry's standard dummy. Lorem Ipsum is
                                                            simply dummy text of the printing &amp; typesetting
                                                            industry.</p>
                                                        <a href="single-project-page1.html"
                                                            class="highlight-button-black-border btn btn-small no-margin-bottom sm-no-margin">View
                                                            Case Study</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 1354px;">
                                            <div class="item">
                                                <div class="col-lg-6 col-md-6 case-study-img cover-background"
                                                    style="background-image:url('images/case-study2.jpg');"></div>
                                                <div class="col-lg-6 col-md-6 case-study-details">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <span
                                                            class="about-number black-text font-weight-400 letter-spacing-2 xs-no-border xs-no-padding-left xs-display-none">02</span>
                                                    </div>
                                                    <div
                                                        class="col-lg-8 col-md-9 col-sm-9 col-xs-12 about-text position-relative xs-text-center">
                                                        <p
                                                            class="title-small text-uppercase letter-spacing-3 black-text font-weight-600 no-margin-bottom">
                                                            Rebrand Coffee</p>
                                                        <span class="case-study-work letter-spacing-3">Web Design |
                                                            Brand Strategy</span>
                                                        <p class="width-90 xs-width-100">Lorem Ipsum is simply dummy
                                                            text of the printing &amp; typesetting industry. Lorem Ipsum
                                                            has been the industry's standard dummy. Lorem Ipsum is
                                                            simply dummy text of the printing &amp; typesetting
                                                            industry.</p>
                                                        <a href="single-project-page1.html"
                                                            class="highlight-button-black-border btn btn-small no-margin-bottom sm-no-margin">View
                                                            Case Study</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 1354px;">
                                            <div class="item">
                                                <div class="col-lg-6 col-md-6 case-study-img cover-background"
                                                    style="background-image:url('images/case-study1.jpg');"></div>
                                                <div class="col-lg-6 col-md-6 case-study-details">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <span
                                                            class="about-number black-text font-weight-400 letter-spacing-2 xs-no-border xs-no-padding-left xs-display-none">03</span>
                                                    </div>
                                                    <div
                                                        class="col-lg-8 col-md-9 col-sm-9 col-xs-12 about-text position-relative xs-text-center">
                                                        <p
                                                            class="title-small text-uppercase letter-spacing-3 black-text font-weight-600 no-margin-bottom">
                                                            William Stormdal</p>
                                                        <span class="case-study-work letter-spacing-3">Brand Strategy |
                                                            Graphic Design</span>
                                                        <p class="width-90 xs-width-100">Lorem Ipsum is simply dummy
                                                            text of the printing &amp; typesetting industry. Lorem Ipsum
                                                            has been the industry's standard dummy. Lorem Ipsum is
                                                            simply dummy text of the printing &amp; typesetting
                                                            industry.</p>
                                                        <a href="single-project-page1.html"
                                                            class="highlight-button-black-border btn btn-small no-margin-bottom sm-no-margin">View
                                                            Case Study</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end case study item -->
                                <!-- case study item -->

                                <!-- end case study item -->
                                <!-- case study item -->

                                <!-- end case study item -->
                                <div class="owl-controls clickable">
                                    <div class="owl-pagination">
                                        <div class="owl-page active"><span class=""></span></div>
                                        <div class="owl-page"><span class=""></span></div>
                                        <div class="owl-page"><span class=""></span></div>
                                    </div>
                                    <div class="owl-buttons">
                                        <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
                                        <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
