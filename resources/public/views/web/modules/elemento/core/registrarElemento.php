<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH.'elementoController.php');
require_once(MODEL_PATH.'elemento.php');

$objmodel = elemento(
    null,
    $_POST['nombre_producto'],
    $_POST['descripcion'],
    $_POST['precio']
);
if($objController = elementoController::registrarElemento($objmodel)){
    echo '<div class="alert alert-success fade in" role="alert">
            <i class="fa fa-thumbs-up alert-success"></i>
            <strong>Exito!</strong> Registro realizado con exito
        </div>';
}else{
    echo '<div class="alert alert-danger fade in" role="alert">
            <i class="fa fa-warning alert-danger"></i>
            <strong>Error! </strong> Registro no realizado
        </div>';
}

?>
