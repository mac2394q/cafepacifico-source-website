<?php session_start();

include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once (LIB_PATH."session.php");
$statusSesion=session::verificarSesionWeb($_SESSION['idsesion']);
$idsesion =0;

print_r($_SESSION);

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
    <section class="content-top-margin page-title page-title-small bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-12 wow fadeInUp animated" data-wow-duration="300ms"
                    style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                    <!-- page title -->
                    <h1 class="black-text">Sistema de reserva online </h1>
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
                <div class="col-md-10 col-sm-10 col-xs-11 center-col login-box">
                    <div class="container clearfix">
                        <div class="row margin-seven no-margin-top">
                            <div class="col-md-8  alert-style4 pull-left">
                                <?php  if($statusSesion == 0){  ?>
                                <div 
                                    class="alert alert-warning border text-uppercase black-text letter-spacing-1 text-small">
                                    Recuerda que para realizar una reserva debes haber iniciado sesion!<br>
                                    <a href="http://cafepacifico.ml/resources/public/views/platform/modules/sesion/login.php"
                                        class="font-weight-600 text-decoration-underline">Click aqui para iniciar


                                        sesion</a>
                                    o registrate si eres un nuevo cliente <a


                                        href="<?php echo WEB_SERVER."modules/usuario/registrarUsuarioWeb.php"; ?>"
                                        class="font-weight-600 text-decoration-underline">Click aqui para registrarte


                                    </a>
                                </div>
                                
                                <?php } ?>
                            </div>
                            <!--aqui puede ir otra fila  -->
                        </div>
                        <div class="row margin-five no-margin-top">
                            <div class="col-md-9 col-sm-12 pull-left sm-margin-bottom-seven">
                                <p class="black-text font-weight-600 text-uppercase text-large">Numero de personas para


                                    reservar</p>
                                <form id="billing-form" method="post" action="javascript:void(0)" name="billing-form">
                                    <div class="col-md-12  no-padding sm-no-padding">
                                        <div class="col-md-5  ">
                                            <label>
                                                <li class="fa fa-window-restore"></li>&nbsp;Personas para reserva:
                                            </label>
                                            <select name="reserva" id="reserva">
                                                <option value="">Eliga un numero</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10 </option>
                                            </select>
                                        </div>
                                        <div class="col-md-5  ">
                                            <!-- <label>Puede elegir has:</label>
                                            <input type="number" name="npersonasSelector" id="npersonasSelector"
                                                value="0" min="1" max="10"> -->
                                            <div class="alert alert-info fade in" role="alert" id="mensajeEvento">
                                                <i class="fa fa-warning alert-danger"></i>
                                                <strong>Tenga en cuenta!</strong> Una reserva con mas de 10 personas se


                                                considera evento!
                                                <button aria-hidden="true" data-dismiss="alert" class="close"
                                                    type="button">×</button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <p class="black-text font-weight-600 text-uppercase text-large">fecha de reserva y verificacion de disponibilidad</p>
                                    <div class="col-md-12 no-padding sm-no-padding">
                                        <div class="col-md-6 ">
                                            <label>Fecha de reserva:</label>
                                            <input type="date" name="fecha" id="fecha" value="">
                                        </div>
                                        <div class="col-md-6 no-padding"><br>
                                            <div id="disponibilidadReserva">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="black-text font-weight-600 text-uppercase text-large">Tipo de servicio</p>
                                    <div class="col-md-12  no-padding sm-no-padding">
                                        <div class="col-md-5  ">
                                            <label>&nbsp;</label>
                                            <select id="servicio" name="servicio">
                                                <option value="1">Almuerzo</option>
                                                <option value="2">Cena</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3  " id="almuerzoDiv">
                                            <label>Horarios:</label>
                                            <select id="ha" name="ha">
                                                <option value="0">Eliga una hora</option>
                                                <option value="12:00">12:00</option>
                                                <option value="12:15">12:15</option>
                                                <option value="12:30">12:30</option>
                                                <option value="12:45">12:45</option>
                                                <option value="1:00">1:00</option>
                                                <option value="1:15">1:15</option>
                                                <option value="1:30">1:30</option>
                                                <option value="1:45">1:45</option>
                                                <option value="2:00">2:00</option>
                                                <option value="2:15">2:15</option>
                                                <option value="2:30">2:30</option>
                                                <option value="2:45">2:45</option>
                                                <option value="3:00">3:00</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3  " id="cenaDiv">
                                            <label>Horarios:</label>
                                            <select id="hc" name="hc">
                                                <option value="0">Eliga una hora</option>
                                                <option value="6:00">6:00</option>
                                                <option value="6:15">6:15</option>
                                                <option value="6:30">6:30</option>
                                                <option value="6:45">6:45</option>
                                                <option value="7:00">7:00</option>
                                                <option value="7:15">7:15</option>
                                                <option value="7:30">7:30</option>
                                                <option value="7:45">7:45</option>
                                                <option value="8:00">8:00</option>
                                                <option value="8:15">8:15</option>
                                                <option value="8:30">8:30</option>
                                                <option value="8:45">8:45</option>
                                                <option value="9:00">9:00</option>
                                                <option value="9:15">9:15</option>
                                                <option value="9:30">9:30</option>
                                                <option value="9:45">9:45</option>
                                                <option value="10:00">10:10</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 no-padding">
                                        <p>.</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div id="reservaEstado">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer>
        <div class=" bg-white footer-top">
            <div class="container">
                <div class="row margin-four">
                    <!-- phone -->
                    <div class="col-md-4 col-sm-4 text-center"><i class="icon-phone small-icon black-text"></i>
                        <h6 class="black-text margin-two no-margin-bottom">
                            <li class="fa fa-mobile-alt"></li> 24 134 28 <li class="fa fa-phone-volume"></li>+57 316 830


                            3976


                        </h6>
                    </div>
                    <!-- end phone -->
                    <!-- address -->
                    <div class="col-md-4 col-sm-4 text-center">
                        <img alt="" src="<?php echo VENDOR_SERVER."cafepacifico/logo.png";?> class=" logo"
                            style="max-width:130px;" />
                    </div>
                    <!-- end address -->
                    <!-- email -->
                    <div class="col-md-4 col-sm-4 text-center"><i class="icon-map-pin small-icon black-text"></i>
                        <h6 class="margin-two no-margin-bottom"><span class="black-text">Calle 1 # 5A-15. Segundo Piso


                                Buenaventura, Valle del Cauca</span></h6>
                    </div>
                    <!-- end email -->
                </div>
            </div>
        </div>
        <div class="container footer-middle">
            <div class="row">
                <div class="col-md-3 col-sm-3 footer-link1 xs-display-none">
                    <!-- headline -->
                    <h5>CAFE PACIFICO</h5>
                    <!-- end headline -->
                    <!-- text -->
                    <p class="footer-text">Espacio cultural con énfasis en cocina tradicional del Pacífico Colombiano.
                    </p>
                    <!-- end text -->
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4 footer-link2 col-md-offset-3">
                    <!-- headline -->
                    <h5>Nosotros</h5>
                    <!-- end headline -->
                    <!-- link -->
                    <ul>
                        <li><a href="nosotros.php">Cafe pacifico</a></li>
                        <li><a href="momentos.php">Nuestros mejores momentos</a></li>
                        <li><a href="menu.php">Nuestra carta</a></li>
                    </ul>
                    <!-- end link -->
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4  footer-link3">
                    <!-- headline -->
                    <h5>Herramientas</h5>
                    <!-- end headline -->
                    <!-- link -->
                    <ul>
                        <li><a href="mailto:cafepacifico@me.com">Envianos un correo</a></li>
                        <li><a


                                href="https://m.me/CafePacificoBuenaventura?fbclid=IwAR3YzWRrvZ6vKWwzDbIxJwHRhsWKsADzEkEn85I5s__yNszu-KMA2nNY8wI">Chatea


                                con nosotros</a></li>
                        <li><a href="">Verificar Disponibilidad</a></li>
                        <li><a href="">Mi sitio en google maps</a></li>
                    </ul>
                    <!-- end link -->
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4  footer-link4">
                    <!-- headline -->
                    <h5>link Buenaventura</h5>
                    <!-- end headline -->
                    <!-- link -->
                    <ul>
                        <li><a href="https://buenaventuraenlinea.com/">Buenaventura en linea</a></li>
                        <li><a href="http://www.soydebuenaventura.com/">Soy buenaventura</a></li>
                        <li><a href="http://www.buenaventura.gov.co/">Alcaldia buenaventura</a></li>
                    </ul>
                    <!-- end link -->
                </div>
            </div>
            <div class="wide-separator-line bg-mid-gray no-margin-lr margin-three no-margin-bottom"></div>
            <div class="row margin-four no-margin-bottom">
                <div class="col-md-12 col-sm-12 sm-text-center sm-margin-bottom-four">
                    <!-- link -->
                    <ul class="list-inline footer-link text-uppercase">
                        <li>ACTIVIDADES EN LA RED</a></li>
                        <li><a href="https://www.facebook.com/pg/CafePacificoBuenaventura/reviews/">Review Facebook</a>
                        </li>
                        <li><a href="https://www.facebook.com/pg/CafePacificoBuenaventura/events/">Eventos


                                publicados</a></li>
                        <li><a href="https://www.facebook.com/pg/CafePacificoBuenaventura/photos/">Fotos Facebook</a>
                        </li>
                        <li><a href="https://www.instagram.com/cafepacifico/">Instagram</a></li>
                        <li><a href="https://twitter.com/cafepacifico">twitter</a></li>
                        <li><a href="https://www.innovatur.co/en/cafe-pacifico-en-buenaventura">innovatur</a></li>
                        <li><a


                                href="https://www.tripadvisor.co/Restaurant_Review-g671591-d4106161-Reviews-Cafe_Pacifico-Buenaventura_Valle_del_Cauca_Department.html">tripadvisor</a>
                        </li>
                    </ul>
                    <!-- end link -->
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark-gray footer-bottom">
            <div class="container">
                <div class="row margin-three">
                    <!-- copyright -->
                    <div


                        class="col-md-6 col-sm-6 col-xs-12 copyright text-left letter-spacing-1 xs-text-center xs-margin-bottom-one">
                        © 2019 Cafe pacifico


                    </div>
                    <!-- end copyright -->
                    <!-- logo -->
                    <div class="col-md-6 col-sm-6 col-xs-12 footer-logo text-right xs-text-center">
                        <a href="index.php"><span class="white-text">&hearts; CAFE PACIFICO CON AMOR A


                                BUENAVENTURA</span></a>
                    </div>
                    <!-- end logo -->
                </div>
            </div>
        </div>
        <!-- scroll to top -->
        <a href="javascript:;" class="scrollToTop" style="display: inline;"><i class="fa fa-angle-up"></i></a>
        <!-- scroll to top End... -->
    </footer>
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
        $(document).on('click', '#registrarReserva', function (e) {
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
        $(document).ready(function () {
            $("#mostrarmodal").modal("hide");
        });
    </script>
</body>
</html>
<!-- <div class="col-md-6 col-sm-12">
                                <table class="table cart-total">
                                    <tbody>
                                        <tr>
                                            <th


                                                class="padding-two text-right no-padding-right text-uppercase font-weight-600 letter-spacing-2 text-small xs-no-padding">
                                                Numero de personas en la reserva</th>
                                            <td


                                                class="padding-two text-uppercase text-right no-padding-right font-weight-600 black-text xs-no-padding">
                                                0</td>
                                        </tr>
                                        <tr>
                                            <th


                                                class="padding-two text-right no-padding-right text-uppercase font-weight-600 letter-spacing-2 text-small xs-no-padding">
                                                Reserva para evento</th>
                                            <td


                                                class="padding-two text-uppercase text-right no-padding-right font-weight-600 black-text text-small xs-no-padding">
                                                NO</td>
                                        </tr>
                                        <tr>
                                            <th


                                                class="padding-two text-right no-padding-right text-uppercase font-weight-600 letter-spacing-2 text-small xs-no-padding">
                                                Tipo de servicio</th>
                                            <td


                                                class="padding-two text-uppercase text-right no-padding-right font-weight-600 black-text xs-no-padding">
                                                Sin establecer</td>
                                        </tr>
                                        <tr>
                                            <th


                                                class="padding-two text-right no-padding-right text-uppercase font-weight-600 letter-spacing-2 text-small xs-no-padding">
                                                Fecha y hora verificada</th>
                                            <td


                                                class="padding-two text-uppercase text-right no-padding-right font-weight-600 black-text xs-no-padding">
                                                No verificada</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="padding-one no-padding-right xs-no-padding">
                                                <hr>
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <th


                                                class="padding-two text-uppercase text-right no-padding-right font-weight-600 text-large xs-no-padding">
                                                Valor total</th>
                                            <td


                                                class="padding-two text-uppercase text-right no-padding-right font-weight-600 black-text text-large no-letter-spacing xs-no-padding">
                                                $0</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="padding-one no-padding-right xs-no-padding">
                                                <hr class="no-margin-bottom">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="shop-checkout.html"
                                    class="highlight-button-black-background btn no-margin pull-right checkout-btn xs-width-100 xs-text-center">Generar reserva</a>
                            </div> -->