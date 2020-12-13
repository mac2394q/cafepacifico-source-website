<?php 
date_default_timezone_set('America/Bogota');
require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH.'blogController.php');
require_once(CONTROLLERS_PATH.'rutasController.php');
require_once(MODEL_PATH.'comentarios.php');

$objmodel = new comentarios(
    null,
    $_POST['idblog'],
    $_POST['idsesion'],
    $_POST['comentario'],
    date('Y-m-d'),
    date('H:i:s')
);
if($objController = blogController::registrarComentario($objmodel)){
    echo '<div class="alert alert-success fade in" role="alert">
            <i class="fa fa-thumbs-up alert-success"></i>
            <strong>Exito!</strong> comentario realizado 
        </div>';

        $objrutas = rutasController::retornarVista(WEB_SERVER.'modules/blog/verFicha.php?id='.$_POST['idblog']);
}else{
    echo '<div class="alert alert-danger fade in" role="alert">
            <i class="fa fa-warning alert-danger"></i>
            <strong>Error! </strong> comentario no realizado
        </div>';
}

?>