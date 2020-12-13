<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH.'elementoController.php');
require_once(CONTROLLERS_PATH.'rutasController.php');
require_once(MODEL_PATH.'elemento.php');

$objmodel = new elemento(
    null,
    $_POST['nombre'],
    $_POST['textarea2'],
    $_POST['precio']
);
if($objController = elementoController::registrarElemento($objmodel)){
    $ultimoid = elementoController::ultimoElemento();
    
    $directorio = DOCUMENTS_PATH.'fotosElementos/'.$ultimoid;
    $img = DOCUMENTS_PATH.'fotosElementos/'.$ultimoid.'/'.$ultimoid.'.jpg';
    if(!is_dir($directorio)){
        if(!mkdir($directorio,0755,true)){die('Fallo al crear las carpetas...');}}
        
        if(!empty($_FILES['file'])){
            $temp_name=$_FILES['file']['tmp_name'];
            $archivo=move_uploaded_file($temp_name,$img);

            $objruta=rutasController::retornarVista(MODULE_APP_SERVER.'elementos/verFicha.php?id='.$ultimoid);
        }else{
            if (!copy(notFound, $directorio . "/".$ultimoid.".jpg")) {
                echo "Error al copiar ...\n";
            }
        }
}else{
    echo '<div class="alert alert-danger fade in" role="alert">
            <i class="fa fa-warning alert-danger"></i>
            <strong>Error! </strong> Registro no realizado
        </div>';
}

?>
