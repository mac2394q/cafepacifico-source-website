<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php

       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (WEB_PATH."/global/inc/head.php");
    ?>
    <style>
        .fondo {
            background-image: url(<?php echo VENDOR_SERVER."cafepacifico/w.jpg";?>);
            /* background-repeat: no-repeat; */
            /* filter: blur(1px); */
        }
    </style>
</head>
<body>
    <!-- navigation panel -->
    <?php require_once (WEB_PATH."/global/inc/component/navBar.php"); ?>
    <!--end navigation panel -->
    <!-- head section -->
    <section class="content-top-margin page-title page-title-small border-bottom-light border-top-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="300ms">
                    <!-- page title -->
                    <h1 class="black-text">Iniciar sesion</h1>
                    <!-- end page title -->
                </div>
                <div class="col-md-6 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none"
                    data-wow-duration="600ms">
                    <!-- breadcrumb -->
                    <ul>
                        <li><a href="/index.php">pagina principal</a></li>
                        <li>Iniciar sesion</li>
                        <li><a href="<?php echo WEB_SERVER."modules/sesion/registarUsuarioWeb.php"; ?>">Registrar

                                usuario</a></li>
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
                <div class="col-md-10  center-col login-box">
                    <!-- form title  -->
                    <h1>CAFE PACIFICO</h1><
                       
                    
                    <!-- end form title  -->
                    <!-- form sub title  -->
                    
                    <!-- end form sub title  -->
                    <div class="separator-line bg-black no-margin-lr margin-ten"></div>
                    <div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group no-margin-bottom">
                                    <!-- label  -->
                                    <label for="nombre" class="text-uppercase">Nombre</label>
                                    <!-- end label  -->
                                    <!-- input  -->
                                    <input type="text" name="nombre" id="nombre">
                                    <!-- end input  -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group no-margin-bottom">
                                    <!-- label  -->
                                    <label for="apellido" class="text-uppercase">Apellido</label>
                                    <!-- end label  -->
                                    <!-- input  -->
                                    <input type="text" name="apellido" id="apellido">
                                    <!-- end input  -->
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group no-margin-bottom">
                                    <!-- label  -->
                                    <label for="telefono" class="text-uppercase">Telefono</label>
                                    <!-- end label  -->
                                    <!-- input  -->
                                    <input type="text" name="telefono" id="telefono">
                                    <!-- end input  -->
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group no-margin-bottom">
                                    <!-- label  -->
                                    <label for="email" class="text-uppercase">E-mail</label>
                                    <!-- end label  -->
                                    <!-- input  -->
                                    <input type="email" name="email" id="email">
                                    <!-- end input  -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group no-margin-bottom">
                                    <!-- label  -->
                                    <label for="usuario" class="text-uppercase">Usuario</label>
                                    <!-- end label  -->
                                    <!-- input  -->
                                    <input type="text" name="usuario" id="usuario">
                                    <!-- end input  -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group no-margin-bottom">
                                    <!-- label  -->
                                    <label for="clave" class="text-uppercase">Clave</label>
                                    <!-- end label  -->
                                    <!-- input  -->
                                    <input type="password" name="clave" id="clave">
                                    <!-- end input  -->
                                </div>
                            </div>
                        </div>
                        <!-- button  -->
                        <button id="registrarse"
                            class="btn btn-black no-margin-bottom btn-small btn-round no-margin-top">
                            <li class="fa fa-user-lock"></li>&nbsp;Registrar

                        </button>
                        <!-- end button  -->
                        
                    </div><br/>
                    <div id="smg_registrar"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end content section -->
    <!-- footer -->
    <?php require_once (WEB_PATH."/global/inc/component/footer.php"); ?>
    <!-- end footer -->
    <!-- javascript libraries / javascript files set #1 -->
    <?php require_once (WEB_PATH."/global/inc/lib.php"); ?>
    <script src="<?php echo CORE_JS_SERVER."/core_views/directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."/core_views/app.js"; ?>"></script>
    <script src="<?php echo WEB_SERVER."/modules/usuario/triggers/module.js"; ?>"></script>
</body>
</html>
