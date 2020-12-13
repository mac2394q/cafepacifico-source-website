<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH.'blogController.php');
require_once(MODEL_PATH.'comentarios.php');

$objmodel = comentarios(
    null,
    $_POST['idblog'],
    $_POST['idusuario'],
    $_POST['estructura']
);
if($objController = blogController::registrarComentario($objmodel)){
    echo '<div class="alert alert-success fade in" role="alert">
            <i class="fa fa-thumbs-up alert-success"></i>
            <strong>Exito!</strong> Registro realizado 
        </div>';
}else{
    echo '<div class="alert alert-danger fade in" role="alert">
            <i class="fa fa-warning alert-danger"></i>
            <strong>Error! </strong> Registro no realizado
        </div>';
}

?>