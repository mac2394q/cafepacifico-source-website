<?php session_start(); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (WEB_PATH."global/inc/head.php");
    ?>
</head>

<body>
    <!-- navigation -->
    <?php require_once (WEB_PATH."global/inc/component/navBar.php"); ?>
    <!-- end of navigation -->

    <section class="content-top-margin page-title page-title-small border-top-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 wow fadeInUp" data-wow-duration="300ms">
                    <!-- page title -->
                    <h1 class="black-text">Contacto - Ubicacion</h1>
                    <!-- end page title -->
                </div>

            </div>
        </div>
    </section>
    <!-- end head section -->

    <!-- content section -->
    <section class="wow fadeIn no-padding">
        <div class="container-fuild">
            <div class="row no-margin">
                <div id="canvas1" class="col-md-12 col-sm-12 no-padding contact-map map">
                    <!--<iframe id="map_canvas1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.843821917424!2d144.956054!3d-37.817127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1427947693651"></iframe>-->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d966.8304228387472!2d-77.07647549821827!3d3.8865007485017413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sco!4v1561386750011!5m2!1ses!2sco" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="wow fadeIn ">
        <div class="container">
            <div class="row">
                <!-- office address -->
                <div class="col-md-4 col-sm-4 xs-margin-bottom-ten">
                    <div class="position-relative"><img src="https://lh5.googleusercontent.com/p/AF1QipPZY78CQRSoPL9dUCF-oVw7R2X77xUNx5vezIS7=w426-h240-k-no" alt="" /><a
                            class="highlight-button-dark btn btn-very-small view-map no-margin bg-black white-text"
                            href="https://wego.here.com/directions/mylocation/e-eyJuYW1lIjoiQ2FmXHUwMGU5IFBhY1x1MDBlZGZpY28iLCJhZGRyZXNzIjoiQ2FsbGUgMSAjIDVBLTE1LiBTZWd1bmRvIFBpc28sIENvbG9tYmlhIEJ1ZW5hdmVudHVyYSwgVmFsbGUgZGVsIENhdWNhIiwibGF0aXR1ZGUiOjMuODg2NDIsImxvbmdpdHVkZSI6LTc3LjA3NjU1LCJwcm92aWRlck5hbWUiOiJmYWNlYm9vayIsInByb3ZpZGVySWQiOjk0NTgxMjM0NTYzfQ==?map=3.88642,-77.07655,15,normal&ref=facebook&link=directions&fb_locale=en_US"
                            target="_blank">Mostrar mapa</a></div>
                    <p
                        class="text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five">
                        Sede principal</p>
                    <p>
                        Calle 1 # 5A-15. Segundo Piso
                        <br>Buenaventura, Valle del Cauca Colombia</p>
                    <div class="wide-separator-line bg-mid-gray no-margin-lr"></div>
                    <p class="black-text no-margin-bottom"><strong>T.</strong>+57 316 8303976</p>
                    <p class="black-text"><strong>Link.</strong><code> <a
                            href="https://m.me/CafePacificoBuenaventura?fbclid=IwAR3YzWRrvZ6vKWwzDbIxJwHRhsWKsADzEkEn85I5s__yNszu-KMA2nNY8wI">Messenger</a></code>
                    </p>
                </div>
                <!-- end office address -->
                <!-- office address -->

            </div>
            <!-- end office address -->
            <!-- office address -->

            <!-- end office address -->
        </div>

        <div class="container ">
            <div class="row">
                <div
                    class="col-md-4 col-sm-8 dividers-header double-line center-col text-center margin-ten no-margin-top">
                    <div class="subheader bg-white">
                        <h3 class="title-med no-padding-bottom letter-spacing-2">CONTACTANOS</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- form -->
                <form id="contactusform" action="javascript:void(0)" method="post">
                    <div class="col-md-10 col-sm-12 center-col">
                        <div class="col-md-6 col-sm-12">
                            <input name="name" type="text" placeholder="Ingresa tu nombre" />
                            <input name="asunto" type="text" placeholder="Ingresa tu asunto" />
                            <input name="email" type="text" placeholder="Ingresa tu correo" />
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <textarea name="comment" placeholder="Ingresa tu mensaje"></textarea>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="col-md-3 col-sm-6 f-right no-padding-right"><input id="contact-us-button"
                                    name="Enviar Mensaje" type="button" value="Enviar mensaje"
                                    class="btn btn-white no-margin-top f-right no-margin-lr" style="color:black;"></div>
                            <div class="col-md-6 col-sm-6 no-padding-left"><span class="required"
                                    style="color:rgb(221, 9, 9);">*Por favor llena los campos</span></div>
                        </div>
                    </div>
                    
                </form>
                
                <!-- end form -->
            </div>
            <div id="smgContacto">
                            
            </div>
        </div>

        </div>
        </div>

    </section>

    <!-- end special dishes section
 -->


    <!-- counter section -->

    <!-- blog section -->


    <!-- end contact us section -->
    <!-- footer -->
    <?php require_once (WEB_PATH."global/inc/component/footer.php"); ?>
    <!-- end footer -->
    <!-- javascript libraries / javascript files set #2 -->
    <?php require_once (WEB_PATH."global/inc/lib.php"); ?>
    <script src="<?php echo CORE_JS_SERVER."core_views/directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."core_views/app.js"; ?>"></script>
    <script>
        $(document).on('click', '#contact-us-button', function (e) {
            sendEventApp('POST', routesAppWeb() + 'contacto/core/realizarContacto.php',
                params = {
                    "name": document.getElementsByName("name")[0].value,
                    "asunto": document.getElementsByName("asunto")[0].value,
                    "email": document.getElementsByName("email")[0].value,
                    "comment": document.getElementsByName("comment")[0].value
                }, '#smgContacto');
        });

    </script>


</body>

</html>