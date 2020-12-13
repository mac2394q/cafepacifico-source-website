<!doctype html>
<html class="no-js" lang="en">
 
    <head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (WEB_PATH."global/inc/head.php");
    ?>
    <style>
    .fondo{
            background-image: url(<?php echo VENDOR_SERVER."cafepacifico/w.jpg";?>);
            /* background-repeat: no-repeat; */
            /* filter: blur(1px); */
            
        }

        
    </style>
        
    </head>
    <body>
        <!-- navigation panel -->
        <?php require_once (WEB_PATH."global/inc/component/navBar.php"); ?>
        <!--end navigation panel --> 
        <!-- head section -->
        <section class="content-top-margin page-title page-title-small border-bottom-light border-top-light">
            <div class="container">
                <div class="row" >
                    <div class="col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="300ms" >
                        <!-- page title -->
                        <h1 class="black-text">Iniciar sesion</h1>
                        <!-- end page title -->
                    </div>
                    <div class="col-md-6 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none" data-wow-duration="600ms">
                        <!-- breadcrumb -->
                        <ul>
                            <li><a href="/index.php">pagina principal</a></li>
                            <li>Iniciar sesion</li>
                            <li><a href="<?php echo WEB_SERVER."modules/sesion/registarUsuarioWeb.php"; ?>">Registrar usuario</a></li>
                            
                        </ul>
                        <!-- end breadcrumb -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end head section -->

        <!-- content section -->
        <section class="bg-gray wow fadeIn fondo">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-4 col-sm-10 col-xs-11 center-col login-box">
                        <!-- form title  -->
                        <h1>CAFE PACIFICO</h1>
                        <!-- end form title  -->
                        <!-- form sub title  -->
                        <p class="text-uppercase margin-three no-margin-bottom">Inicia sesion o registrate  <a href="<?php echo WEB_SERVER."modules/usuario/registarUsuarioWeb.php"; ?>">Aqui</a></p>
                        <!-- end form sub title  -->
                        <div class="separator-line bg-black no-margin-lr margin-ten"></div>
                        <div>
                            <div class="form-group no-margin-bottom">
                                <!-- label  -->
                                <label for="username" class="text-uppercase">Usuario</label>
                                <!-- end label  -->
                                <!-- input  -->
                                <input type="text" name="usuario" id="usuario">
                                <!-- end input  -->
                            </div>
                            <div class="form-group no-margin-bottom">
                                <!-- label  -->
                                <label for="password" class="text-uppercase">Clave</label>
                                <!-- end label  -->
                                <!-- input  -->
                                <input type="password" name="clave" id="clave">
                                <!-- end input  -->
                            </div>
                            
                            <!-- button  -->
                            <button id="validarSesion" class="btn btn-black no-margin-bottom btn-small btn-round no-margin-top" ><li class="fa fa-user-lock"></li>&nbsp;Iniciar sesion</button>
                            <!-- end button  -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end content section -->

        <!-- footer -->
        <?php require_once (WEB_PATH."global/inc/component/footer.php"); ?>
        <!-- end footer -->
        <!-- javascript libraries / javascript files set #1 --> 
        <?php require_once (WEB_PATH."global/inc/lib.php"); ?>
        <script src="<?php echo CORE_JS_SERVER."core_views/directory.js"; ?>"></script>
        <script src="<?php echo CORE_JS_SERVER."core_views/app.js"; ?>"></script>
        <script src="<?php echo WEB_SERVER."modules/usuario/triggers/module.js"; ?>"></script>
    </body>


</html>
