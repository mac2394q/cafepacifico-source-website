<?php session_start();
date_default_timezone_set('America/Bogota');
require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(CONTROLLERS_PATH.'blogController.php');
require_once(CONTROLLERS_PATH.'rutasController.php');
require_once(MODEL_PATH.'blog.php');

if(!EMPTY($_SESSION['idsesion'])){

    $objmodel = new blog(
        null,
        $_POST['idusuario'],
        $_POST['titulo'],
        $_POST['subtitulo'],
        $_POST['textarea2'],
        date('Y-m-d'),
        date('H:i:s'),
        $_POST['textarea1']
    );


    if($objController = blogController::registrarBlog($objmodel)){
        
        $ultimoblog = blogController::ultimoBlog();

        $directorio = DOCUMENTS_PATH.'blog/'.$ultimoblog;
        $img = DOCUMENTS_PATH.'blog/'.$ultimoblog.'/';
        if(!is_dir($directorio)){
            if(!mkdir($directorio,0755,true)){die('Fallo al crear las carpetas...');}}

                if(!empty($_FILES['file1'])){
                    
                    $temp_name1=$_FILES['file1']['tmp_name'];
                    $archivo1=move_uploaded_file($temp_name1,$img.'cabecera.jpg');

                }else{
                    if (!copy(notFound, $directorio . "/".$ultimoblog.".jpg")) {
                        echo "Error al copiar ...\n";
                    }
                }
                
                if(!empty($_FILES['file2'])){
                    $temp_name2=$_FILES['file2']['tmp_name'];
                    $archivo2=move_uploaded_file($temp_name2,$img.'introduccion.jpg');
                }else{
                    if (!copy(notFound, $directorio . "/".$ultimoblog.".jpg")) {
                        echo "Error al copiar ...\n";
                    }
                }

                if(!empty($_FILES['file3'])){
                    $temp_name3=$_FILES['file3']['tmp_name'];
                    $archivo3=move_uploaded_file($temp_name3,$img.'contenido.jpg');
                }else{
                    if (!copy(notFound, $directorio . "/".$ultimoblog.".jpg")) {
                        echo "Error al copiar ...\n";
                    }
                }
                echo '<script> alert("registro realizado con exito"); </script>';
            $objruta=rutasController::retornarVista(WEB_SERVER.'modules/blog/verFicha.php?id='.$ultimoblog);

    }else{
        echo '<div class="alert alert-danger fade in" role="alert">
                <i class="fa fa-warning alert-danger"></i>
                <strong>Error! </strong> Registro no realizado
            </div>';
    }
}else{
    echo '<div class="alert alert-danger fade in" role="alert">
                <i class="fa fa-warning alert-danger"></i>
                <strong>Error! </strong> Debe estar logueado para registrar un blog
            </div>';

            $ruta = rutasController::retornarVista(MODULE_APP_SERVER.'sesion/login.php);
}
?>
