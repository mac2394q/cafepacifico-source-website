<?php session_start(); ?>

<!doctype html>

<html class="no-js" lang="en">

<head>

    <?php

    //print_r($_SESSION);



       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

       require_once (WEB_PATH."global/inc/head.php");

       

    ?>

</head>

<body>

    <!-- navigation -->

    <?php require_once (WEB_PATH."global/inc/component/navBar.php"); ?>

    <!-- end of navigation -->

    <!-- Slide -->

    <section id="myCarousel">

        <div class="tp-banner-container">

            <div class="revolution-onepage-restaurant">

                <ul>

                    <!-- slide 1 -->

                    <li data-transition="random" data-slotamount="1" data-masterspeed="1000"

                        data-thumb="images/revolution1-slider-img1.jpg" data-delay="13000" data-saveperformance="off"

                        data-title="h-code food">

                        <!-- main image -->

                        <img src="<?php echo VENDOR_SERVER."cafepacifico/manglares2.jpg"; ?>" alt="fullslide1" data-bgposition="center center"

                            data-bgfit="cover" data-bgrepeat="no-repeat">

                        <!-- layer 31 -->

                        <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="-23" data-y="center"

                            data-voffset="-97" data-speed="500" data-start="10200" data-easing="Power3.easeInOut"

                            data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1"

                            data-linktoslide="next" style="z-index: 37;"><img src="<?php echo VENDOR_SERVER."cafepacifico/dummy.png"; ?>" alt=""

                                width="300px" data-lazyload="<?php echo VENDOR_SERVER."cafepacifico/logo.png"; ?>">

                        </div>

                        <!-- LAYER 32 -->

                        <div class="tp-caption light_medium_28_shadowed tp-resizeme" data-x="center" data-hoffset="-23"

                            data-y="center" data-voffset="120" data-speed="500" data-start="10500"

                            data-easing="Power4.easeOut" data-splitin="none" data-splitout="none"

                            data-elementdelay="0.01" data-endelementdelay="0.1" data-endspeed="500"

                            data-endeasing="Power4.easeIn"

                            style="z-index: 47; max-width: auto; max-height: auto; text-align: center;">Sabores y



                            Saberes<br />del Pacífico Colombiano



                        </div>

                    </li>

                </ul>

                <div class="tp-bannertimer"></div>

            </div>

        </div>

    </section>

    <!--prueba-->

    <section class=" no-padding-top" style="background:#0E1416;">

        <div class="">

            <div class="row">

                <div class="col-md-8 text-center margin-ten no-margin-top">

                    <div class="col-md-12 col-sm-12 text-center center-col margin-ten">

                        <h1 class="white-text">acerca de Café Pacífico</h1>

                    </div><br/>

                    <div class="col-md-12 col-sm-12 text-center center-col">

                        <h1 class="white-text" style="text-align:none;">Nuestro proposito es fortalecer redes productivas de pescadores artesanales y agricultores de la región.</h1>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="pull-right">

                        <img src="<?php echo VENDOR_SERVER."cafepacifico/pescado2.png"; ?>" alt="" srcset="">

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!--finaliza prueba-->

    <section class="portfolio-short-description no-padding-bottom">

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <div class="portfolio-short-description-bg pull-left" style="background-image:url('<?php echo VENDOR_SERVER."cafepacifico/32191922_10156174121369564_1108107223134896128_n.jpg";?>');">

                            <figure class="pull-left wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">

                                <figcaption>

                                    <div class="separator-line bg-yellow no-margin-lr margin-ten no-margin-top"></div>

                                    <h3 class="white-text">Quieres reserva un lugar para compartir con nosotros! </h3>

                                    <a href="<?php echo WEB_SERVER."modules/reserva/index.php"; ?>" class="btn-small-white-background btn margin-ten no-margin-bottom">realizar reservar</a>

                                </figcaption>

                            </figure>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    <!-- <section class="cover-background" style="background-image:url('images/cafepacificoreserva.jpg');">

        <div class="opacity bg-dark-gray"></div>

        <div class="container position-relative">

            <div class="row">

                <div class="col-md-6 col-sm-11 center-col text-center">

                    <p class="title-large white-text text-uppercase letter-spacing-2"><strong>Acerca de Café



                            Pacífico</strong>

                        <p>

                            <p class="text-large white-text text-uppercase margin-five no-margin-bottom">Nuestro



                                proposito es fortalecer redes productivas de pescadores artesanales y agricultores de la



                                región.<p>

                </div>

            </div>

        </div>

    </section> -->

   <!--  special dishes section -->

    <section class="cover-background" style="background-image:url('images/onepage-restaurant-parallax-pattern2.jpg');">

        <div class="container">

            <div class="row">

                <!-- section title -->

                <div class="col-md-4 col-sm-8 dividers-header double-line center-col text-center margin-ten no-margin-top">

                    <div class="subheader bg-white">

                        <h3 class="title-med no-padding-bottom letter-spacing-2">COCINA LOCAL</h3>

                    </div>

                </div>

                <!-- end section title -->

            </div>

            <div class="row">

                <!-- dishes item -->

                <!--col-md-3 col-sm-6 no-padding travel-adventure overflow-hidden bg-black position-relative text-center-->

                <div class="col-sm-4 col-sm-12 special-dishes xs-margin-bottom-ten " >

                    <div class="position-relative travel-adventure overflow-hidden ">

                        <img src="<?php echo VENDOR_SERVER."cafepacifico/1.jpg";?>" alt="">

                    </div>

                    <p class="text-uppercase letter-spacing-2 black-text font-weight-600 margin-ten no-margin-bottom">

                        Corvina en salsa de mariscos</p>

                    <!--<p class="margin-two text-med width-90">Plato hecho de corvina, rellenado con mariscos para mas placer.</p>-->

                    <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>

                </div>

                <!-- end dishes item -->

                <!-- dishes item -->

                <div class="col-sm-4 col-sm-12 xs-margin-bottom-ten">

                    <div class="position-relative travel-adventure overflow-hidden">

                        <img src="<?php echo VENDOR_SERVER."cafepacifico/2.jpg";?>" alt="">

                    </div>

                    <p class="text-uppercase letter-spacing-2 black-text font-weight-600 margin-ten no-margin-bottom">

                        TAPAO DE PARGO</p>

                    <!--<p class="margin-two text-med width-90">Pescado 100% fresco y bien sasonado.</p>-->

                    <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>

                </div>

                <!-- end dishes item -->

                <!-- dishes item -->

                <div class="col-sm-4 col-sm-12 ">

                    <div class="position-relative travel-adventure overflow-hidden">

                        <img src="<?php echo VENDOR_SERVER."cafepacifico/3.jpg";?>" alt="">

                    </div>

                    <p class="text-uppercase letter-spacing-2 black-text font-weight-600 margin-ten no-margin-bottom">

                        ENCOCAO DE LANGOSTINOS</p>

                    <!--<p class="margin-two text-med width-90">Langostinos demostracion de sabor y de lo que es exquicito.</p>-->

                    <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>

                </div>

                <!-- end dishes item -->

            </div>

            <div class="row">

                <!-- dishes item -->

                <div class="col-sm-4 col-sm-12 special-dishes xs-margin-bottom-ten ">

                    <div class="position-relative travel-adventure overflow-hidden">

                        <img src="<?php echo VENDOR_SERVER."cafepacifico/4.jpg";?>" alt="">

                    </div>

                    <p class="text-uppercase letter-spacing-2 black-text font-weight-600 margin-ten no-margin-bottom">

                        ENCOCAO DE MUNCHILLA</p>

                    <!--<p class="margin-two text-med width-90">M.</p>-->

                    <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>

                </div>

                <!-- end dishes item -->

                <!-- dishes item -->

                <div class="col-sm-4 col-sm-12 xs-margin-bottom-ten ">

                    <div class="position-relative travel-adventure overflow-hidden">

                        <img src="<?php echo VENDOR_SERVER."cafepacifico/5.jpg";?>" alt="">

                    </div>

                    <p class="text-uppercase letter-spacing-2 black-text font-weight-600 margin-ten no-margin-bottom">

                        ARROZ ENDIABLADO</p>

                    <!--<p class="margin-two text-med width-90">Lorem Ipsum is simply dummy text of the printing &

                        typesetting industry.</p>-->

                    <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>

                </div>

                <!-- end dishes item -->

                <!-- dishes item -->

                <div class="col-sm-4 col-sm-12 ">

                    <div class="position-relative travel-adventure overflow-hidden">

                        <img src="<?php echo VENDOR_SERVER."cafepacifico/6.jpg";?>" alt="">

                    </div>

                    <p class="text-uppercase letter-spacing-2 black-text font-weight-600 margin-ten no-margin-bottom">

                        CASUELA TUMAQUEÑA</p>

                    <!--<p class="margin-two text-med width-90">Lorem Ipsum is simply dummy text of the printing &

                        typesetting industry.</p>-->

                    <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>

                </div>

                <!-- end dishes item -->

            </div>

        </div>

    </section>

    

    <!-- end special dishes section



 -->

    <!-- counter section -->

    <section class="parallax parallax-fix" style="background: url('<?php echo VENDOR_SERVER."cafepacifico/32191922_10156174121369564_1108107223134896128_n.jpg";?>') 50% 0%;">

            

        <div class="opacity-medium bg-black"></div>

        <div class="container">

            <div class="row">

                <div class="col-md-7 col-sm-12 text-center center-col">

                    <h1 class="white-text">Compartimos la alegría de servir desde el Amor por los valores de nuestra región.</h1>

                </div>

            </div>

        </div>

    </section>

    <!-- end counter section -->

    <!-- blog section -->

    <?php   

        require_once(CONTROLLERS_PATH.'blogController.php');

        require_once(CONTROLLERS_PATH.'usuarioController.php');

        $objblog = new blogController();

        $objuser = new usuarioController();

        $resultado=$objblog->listadoBlogLimit();

    ?>

    <section id="blog" class="xs-onepage-section">

        <div class="container">

            <div class="row">

                <!-- section title -->

                <div class="col-md-6 col-sm-8 dividers-header double-line center-col text-center margin-ten no-margin-top">

                    <div class="subheader bg-white">

                        <h3 class="title-med no-padding-bottom letter-spacing-2">ULTIMAS PUBLICACIONES</h3>

                    </div>

                </div>

                <!-- end section title -->

            </div>

            <div class="row">

                <!-- post item -->

                <?php foreach ($resultado as $key => $value):

                    $usuario =  $objuser->usuarioId($resultado[$key]->getId_usuario());

                    ?>

                <div class="col-md-4 col-sm-4 col-xs-12 blog-listing wow fadeInUp xs-margin-bottom-seven" data-wow-duration="300ms">

                    <div class="blog-image"><a href="<?= MODULE_WEB_SERVER.'/blog/index.php?id='.$resultado[$key]->getId_blog();?>"><img style="height:300px; width:100%;" src="<?=DOCUMENTS_SERVER.'blog/'.$resultado[$key]->getId_blog().'/introduccion.jpg';?>"/></a></div>

                    <div class="blog-details">

                        <div class="blog-date">Posteado por <a href="blog-masonry-2columns.html"><?=$usuario->getNombre();?></a> | <?=$resultado[$key]->getF_publicacion();?></div>

                        <div class="blog-title"><a href="blog-single-right-sidebar.html"><?=$resultado[$key]->getT_principal();?></a></div>

                        <div class="blog-short-description" style="text-align:justify;"><?=$resultado[$key]->getIntroduccion();?></div>

                        <div class="separator-line bg-black no-margin-lr"></div>

                    </div>

                </div>

                <?php endforeach;?>

                <!-- end post item -->

            </div>

            <div class="row">

                <div class="col-md-12 text-center">

                    <a href="<?php echo WEB_SERVER."modules/blog/index.php"; ?>" class="btn btn-black btn-small margin-four no-margin-bottom">VER TODAS LAS PUBLICACIONES</a>

                </div>

            </div>

        </div>

    </section>

    <!-- end blog section -->

    

    <!-- end content section -->

    <section></section>

    

    <!-- footer -->

    <?php require_once (WEB_PATH."global/inc/component/footer.php"); ?>

    <!-- end footer -->

    <!-- javascript libraries / javascript files set #2 -->

    <?php require_once (WEB_PATH."global/inc/lib.php"); ?>

    

</body>

</html>