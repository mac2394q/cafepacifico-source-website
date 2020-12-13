<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
    require_once(CONTROLLERS_PATH.'usuarioController.php');
    require_once(MODEL_PATH.'usuario.php');

    $objmodel = new usuario(
        $_POST['idusuario'],
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['telefono'],
        $_POST['email'],
        $_POST['usuario'],
        $_POST['clave'],
        'cliente',
        $_POST['informacion']
    );
    if($objcontroller=usuarioController::editarUsuario($objmodel)){
        echo    '<div class="alert alert-success fade in" role="alert">
                    <i class="fa fa-thumbs-up alert-success"></i>
                    <strong>Exito!</strong> Actualizacion realizada con exito
                </div>';
    }else{
        echo    '<div class="alert alert-danger fade in" role="alert">
                    <i class="fa fa-warning alert-danger"></i>
                    <strong>Error! </strong> Actualizacion no realizada
                </div>';
    }
    
?>