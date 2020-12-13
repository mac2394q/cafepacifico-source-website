<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH.'usuarioController.php');
require_once(CONTROLLERS_PATH.'rutasController.php');
require_once(PDO_PATH.'usuarioDao.php');
require_once(MODEL_PATH.'usuario.php');
    
    $objmodel = new usuario(
        $_POST['idElemento'],
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['telefono'],
        $_POST['correo'],
        $_POST['usuario'],
        $_POST['clave'],
        'cliente',
        $_POST['textarea2']
    );
    if($objcontroller=usuarioController::editarUsuario($objmodel)){
        echo    '<div class="alert alert-success fade in" role="alert">
                    <i class="fa fa-thumbs-up alert-success"></i>
                    <strong>Exito!</strong> Actualizacion realizada con exito
                </div>';

        rutasController::retornarVista(MODULE_APP_SERVER.'usuarios/index.php');

    }else{
        echo    '<div class="alert alert-danger fade in" role="alert">
                    <i class="fa fa-warning alert-danger"></i>
                    <strong>Error! </strong> Actualizacion no realizada
                </div>';
    }
?>