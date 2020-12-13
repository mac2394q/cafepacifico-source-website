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
    'galeria',
    null,
    date('Y-m-d'),
    date('H:i:s'),
    null

);

if($objController = blogController::registrarBlog($objmodel)){
    $titulo=$_POST['titulo'];
    $directorio = DOCUMENTS_PATH.'blog/'.$titulo;
    if(!is_dir($directorio)){
        if(!mkdir($directorio,0755,true)){die('Fallo al crear las carpetas...');}}
        $objruta=rutasController::retornarVista(MODULE_APP_SERVER.'galeria/verFicha.php?id='.$titulo);
}else{
    echo '<div class="alert alert-danger fade in" role="alert">
            <i class="fa fa-warning alert-danger"></i>
            <strong>Error! </strong> Galeria no creada

        </div>';
}
?>
