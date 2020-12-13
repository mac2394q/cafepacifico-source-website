<?php 
date_default_timezone_set('America/Bogota');
require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH.'contactoController.php');
require_once(MODEL_PATH.'contacto.php');

print_r($_POST);
$objmodel = new contacto(
    null,
    $_POST['name'],
    $_POST['asunto'],
    $_POST['email'],
    $_POST['comment'],
    date('H:i:s'),
    date('Y-m-d')
);
if($objController = contactoController::registrarContacto($objmodel)){
    echo '<div class="alert alert-success fade in" role="alert">
            <i class="fa fa-thumbs-up alert-success"></i>
            <strong>Exito!</strong> Mensaje enviado
        </div>';
}else{
    echo '<div class="alert alert-danger fade in" role="alert">
            <i class="fa fa-warning alert-danger"></i>
            <strong>Error! </strong> Mensaje no enviado
        </div>';
}

?>