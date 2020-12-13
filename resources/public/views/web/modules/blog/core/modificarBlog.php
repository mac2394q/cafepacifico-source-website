<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH.'blogController.php');
require_once(MODEL_PATH.'blog.php');

$objmodel = blog(
    $_POST['idblog'],
    $_POST['idusuario'],
    $_POST['titulo_principal'],
    $_POST['subtitulo'],
    $_POST['introduccion'],
    date('Y-m-d'),
    date('H:i:s'),
    $_POST['contenido']
);
if($objController = blogController::editarBlog($objmodel)){
    echo '<div class="alert alert-success fade in" role="alert">
            <i class="fa fa-thumbs-up alert-success"></i>
            <strong>Exito!</strong> Actualizacion realizada con exito
        </div>';
}else{
    echo '<div class="alert alert-danger fade in" role="alert">
            <i class="fa fa-warning alert-danger"></i>
            <strong>Error! </strong> Actualizacion no realizada
        </div>';
}

?>
