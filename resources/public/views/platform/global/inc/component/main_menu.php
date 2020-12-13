<?php session_start(); 
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');?>
<div class="main-menu material-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header open"><span>Menu</span>
                <i class="fa fa-keyboard" data-toggle="tooltip" data-placement="right"
                    data-original-title="Paneles de administracion"></i>
            </li>
            <?php if($_SESSION['rol'] == "ADMINISTRADOR"){?>
            <li class=" nav-item"><a href="<?php echo MODULE_APP_SERVER."reservaciones/";?>"><i class="fa fa-receipt"></i><span
                        class="menu-title">Reservaciones</span></a>
            </li>
            <?php }else{?>
            <li class=" nav-item"><a href="<?php echo MODULE_APP_SERVER."reservaciones/index2.php";?>"><i class="fa fa-receipt"></i><span
                class="menu-title">Mis reservaciones</span></a>
            </li>
            <?php }?>

            <?php if($_SESSION['rol'] == "ADMINISTRADOR"){?>
            <li class=" nav-item"><a href="<?php echo MODULE_APP_SERVER."elementos/";?>"><i class="fa fa-utensils"></i>
                    <span class="menu-title">Menu y otros</span></a>
            </li>
            <?php }?>


            <?php if($_SESSION['rol'] == "ADMINISTRADOR"){?>
            <li class=" nav-item"><a href="<?php echo MODULE_APP_SERVER."blog/";?>"><i class="fa fa-blog"></i>
                    <span class="menu-title">Blog</span></a>
            </li>
            <?php }?>

            <?php if($_SESSION['rol'] == "ADMINISTRADOR"){?>
            <li class=" nav-item"><a href="<?php echo MODULE_APP_SERVER."galeria/";?>"><i class="fa fa-images"></i>
                    <span class="menu-title">Galeria</span></a>
            </li>
            <?php }?>
            <?php if($_SESSION['rol'] == "ADMINISTRADOR"){?>
            <li class=" nav-item"><a href="<?php echo MODULE_APP_SERVER."contacto/";?>"><i class="fa fa-address-card"></i>
                    <span class="menu-title">Contacto</span></a>
            </li>
            <?php }?>

            <?php if($_SESSION['rol'] == "ADMINISTRADOR"){?>
            <li class=" nav-item"><a href="<?php echo MODULE_APP_SERVER."usuarios/";?>"><i class="fa fa-users"></i>
                    <span class="menu-title">Usuarios</span></a>
            </li>
            <?php }?>
        </ul>
    </div>
</div>