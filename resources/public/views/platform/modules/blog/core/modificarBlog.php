<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH.'blogController.php');
require_once(CONTROLLERS_PATH.'usuarioController.php');
require_once(CONTROLLERS_PATH.'rutasController.php');
require_once(MODEL_PATH.'blog.php');

$idusuario = usuarioController::usuarioIdBlog($_POST['idblog']);

$objmodel = new blog(
    $_POST['idblog'],
    $idusuario,
    $_POST['nombre'],
    $_POST['precio'],
    $_POST['textarea1'],
    date('Y-m-d'),
    date('H:i:s'),
    $_POST['textarea2']
);

if(!empty($_POST['idblog'])){
    $idblog=$_POST['idblog'];
    $directorio = DOCUMENTS_PATH.'blog/'.$idblog;
    $img = DOCUMENTS_PATH.'blog/'.$idblog.'/';
    if(!is_dir($directorio)){
        if(!mkdir($directorio,0755,true)){die('Fallo al crear las carpetas...');}}
            $contador=0;
            if(!empty($_FILES['file3'])){
                if(file_exists($img.'cabecera.jpg')){
                    unlink($img.'cabecera.jpg');
                }
                $temp_name1=$_FILES['file3']['tmp_name'];
                $archivo1=move_uploaded_file($temp_name1,$img.'cabecera.jpg');
                $contador=$contador+1;
            }
            
            if(!empty($_FILES['file1'])){
                if(file_exists($img.'introduccion.jpg')){
                    unlink($img.'introduccion.jpg');
                }
                $temp_name2=$_FILES['file1']['tmp_name'];
                $archivo2=move_uploaded_file($temp_name2,$img.'introduccion.jpg');
                $contador=$contador+1;
            }

            if(!empty($_FILES['file2'])){
                if(file_exists($img.'contenido.jpg')){
                    unlink($img.'contenido.jpg');
                }
                $temp_name3=$_FILES['file2']['tmp_name'];
                $archivo3=move_uploaded_file($temp_name3,$img.'contenido.jpg');
                $contador=$contador+1;
            }

            if($contador>0){
                echo '<script> alert("Imagenes cambiadas con exito"); </script> ';
            }

    if($objController = blogController::editarBlog($objmodel)){
        echo '<div class="alert alert-success fade in" role="alert">
        <i class="fa fa-thumbs-up alert-success"></i>
        <strong>Exito! </strong> Modificacion realizada
        </div>;';
        $objruta=rutasController::retornarVista(MODULE_APP_SERVER.'blog');
    }else{
        echo '<div class="alert alert-danger fade in" role="alert">
                <i class="fa fa-warning alert-danger"></i>
                <strong>Error! </strong> Modificacion no realizada
            </div>';
    }
    
    $objruta=rutasController::retornarVista(MODULE_APP_SERVER.'blog');
}


?>
