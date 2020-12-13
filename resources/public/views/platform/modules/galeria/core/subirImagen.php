<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

    $tituloGaleria=$_POST['titulo'];
    $directorio=DOCUMENTS_PATH.'galeria/'.$tituloGaleria;
    $contador = count(glob($directorio.'/"{*.jpg,*.jpeg,*.png}',GLOB_BRACE));
    $img = DOCUMENTS_PATH.'galeria/'.$titulo.'/'.($contador+1).'jpg';
    if(is_dir($directorio)){
        if(!empty($_FILES['file'])){
            $temp_name=$_FILES['file']['temp_name'];

            if($archivo=move_uploaded_file($temp_name1,$img)){
                echo '<script>alert("subida realizada con exito");</script>';
            }else{
                echo '<script>alert("no se pudo subir el archivo");</script>';
            }
        }
    }
?>