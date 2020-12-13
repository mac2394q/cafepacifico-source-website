<?php 
date_default_timezone_set('America/Bogota');
require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH.'blogController.php');
require_once(CONTROLLERS_PATH.'rutasController.php');
require_once(MODEL_PATH.'blog.php');


$objmodel = new blog(
    null,
    $_POST['idusuario'],
    $_POST['titulo'],
    '0',
    'GALERIA',
    date('Y-m-d'),
    date('H:i:s'),
    $_POST['textarea2']
);

if($objController = blogController::registrarBlog($objmodel)){

    $id=blogController::ultimoBlog();
    $directorio = DOCUMENTS_PATH.'galeria/'.$id;
    if(!is_dir($directorio)){
        if(!mkdir($directorio,0755,true)){die('Fallo al crear las carpetas...');}}

    if(!empty($_FILES['file1'])){
        $tmp_name = $_FILES['file1']['tmp_name'];
        $archivo = move_uploaded_file($tmp_name,$directorio.'/portada.jpg');
    }
        $objruta=rutasController::retornarVista(WEB_SERVER."modules/galeria/verFicha.php?id=".$id);

}else{
    echo '<div class="alert alert-danger fade in" role="alert">
            <i class="fa fa-warning alert-danger"></i>
            <strong>Error! </strong> Galeria no creada
        </div>';
}

?>
