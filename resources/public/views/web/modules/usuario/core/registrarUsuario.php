<?php session_start();
    require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
    require_once(CONTROLLERS_PATH.'usuarioController.php');
    require_once(CONTROLLERS_PATH.'rutasController.php');
    require_once(PDO_PATH.'usuarioDao.php');
    require_once(MODEL_PATH.'usuario.php');

    if($controller_Usuario = usuarioController::usuarioIdUser($_POST['usuario'])){
        echo '  <div class="alert alert-danger fade in" role="alert">
                    <i class="fa fa-warning alert-danger"></i>
                    <strong>Error!</strong> El usuario ingresado ya existe
                </div>';
        }else{

        $objmodel = new usuario(
            null,
            $_POST['nombre'],
            $_POST['apellido'],
            $_POST['telefono'],
            $_POST['email'],
            $_POST['usuario'],
            $_POST['clave'],
            'cliente',
            null
        );
         
        if($controllerUsuario=usuarioController::registrarUsuario($objmodel)){
            if(!empty($_SESSION)){
                unset($_SESSION);
                session_destroy();
            }else{
                $idusuario = usuarioController::ultimoUsuarioRegistrado();
                $objUsuario = usuarioController::usuarioId($idusuario);
                //print_r($objUsuario);
                $_SESSION['idsesion'] = $objUsuario->getId_usuario();
                $_SESSION['usuario'] = $objUsuario->getUsuario();
                $_SESSION['nombre'] = $objUsuario-> getNombre();
                $_SESSION['rol'] = $objUsuario->getTipo_usuario();
                //print_r($_SESSION);

                echo '  <div class="alert alert-success fade in" role="alert">
                            <i class="fa fa-thumbs-up alert-success"></i>
                            <strong>Exito!</strong> Registro realizado con exito
                        </div>';
                rutasController::retornarVista(WEB_SERVER.'modules');
            }

            
        }else{
            echo '  <div class="alert alert-danger fade in" role="alert">
                        <i class="fa fa-warning alert-danger"></i>
                        <strong>Error! </strong> Registro no realizado
                    </div>';
        }

    }
    
?>