<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH.'elementoController.php');
require_once(CONTROLLERS_PATH.'rutasController.php');
require_once(MODEL_PATH.'elemento.php');


$objmodel = new elemento(
    $_POST['idElemento'],
    $_POST['nombre'],
    $_POST['textarea2'],
    $_POST['precio']
);

if(!empty($_POST['idElemento'])){
    $idelemento=$_POST['idElemento'];
    $con = 0;
    $directorio = DOCUMENTS_PATH.'fotosElementos/'.$idelemento;
    
    if(!is_dir($directorio)){
        if(!mkdir($directorio,0755,true)){die('Fallo al crear las carpetas...');}
    }    
    
    if(!empty($_FILES['file'])){
        $img = DOCUMENTS_PATH.'fotosElementos/'.$idelemento.'/'.$idelemento.'.jpg';
        if(file_exists($img)){
            unlink($img);
        }
            $temp_name=$_FILES['file']['tmp_name'];
            $archivo=move_uploaded_file($temp_name,$img);
            $objruta=rutasController::retornarVista(MODULE_APP_SERVER.'elementos');
            $con+=1;
    }
    
    if($con>0){
    echo '<script> alert("Modificacion Realizada"); </script> ';
    }

    if($objController = elementoController::editarElemento($objmodel)){
        echo '<div class="alert alert-success fade in" role="alert">
        <i class="fa fa-thumbs-up alert-success"></i>
        <strong>Exito! </strong> Modificacion realizada
        </div>;';
        $objruta=rutasController::retornarVista(MODULE_APP_SERVER.'elementos');
    }else{
        echo '<div class="alert alert-danger fade in" role="alert">
                <i class="fa fa-warning alert-danger"></i>
                <strong>Error! </strong> Registro no realizado
            </div>';
    }

    $objruta=rutasController::retornarVista(MODULE_APP_SERVER.'elementos');
}


?>
