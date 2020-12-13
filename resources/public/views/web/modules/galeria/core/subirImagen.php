<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
    require_once(CONTROLLERS_PATH.'blogController.php');
    require_once(CONTROLLERS_PATH.'rutasController.php');
    require_once(MODEL_PATH.'blog.php');

    $idblog=$_POST['idblog'];
    (int) $sub = blogController::blogIdSub($idblog);
    $sub+=1;

    $directorio=DOCUMENTS_PATH.'galeria/'.$idblog;
    $img = DOCUMENTS_PATH.'galeria/'.$idblog.'/'.$sub.'.jpg';


    if(is_dir($directorio)){

        if(!empty($_FILES['file1'])){

            $temp_name=$_FILES['file1']['tmp_name'];

            if($archivo=move_uploaded_file($temp_name,$img)){

                $obj = blogController::editarBlogSub($idblog,$sub);
                echo '<script>alert("subida realizada con exito");</script>';
                
                $ruta = rutasController::retornarVista(WEB_SERVER.'modules/galeria/verFicha.php?id='.$idblog);
            }else{

                echo '<script>alert("no se pudo subir el archivo");</script>';

            }
        }
    }
?>