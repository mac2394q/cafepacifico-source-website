<?php session_start();
  header("Access-Control-Allow-Origin: *");
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."usuarioController.php");
  require_once(CONTROLLERS_PATH."rutasController.php");


  //echo "".$_POST['usuario']."-".$_POST['clave']."-".$_POST['idioma'];
  $objUsuario = usuarioController::validarSesion($_POST['usuario'],$_POST['clave']);
  //print_r($objUsuario);
  if($objUsuario  == false){
      echo "<div class='alert round bg-danger alert-dismissible mb-2' role='alert'>
                <button   class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
                <strong>Oh tenemos un problema !</strong> Los datos  de autentificacion estan erroneos.
            </div>";
      session_destroy();      
       
    
  }else{
    
    
  
     $_SESSION['idsesion'] = $objUsuario->getId_usuario();
     $_SESSION['idioma'] = $_POST['idioma'];
     $_SESSION['nombre'] = $objUsuario->getNombre();
     $_SESSION['apellidos'] = $objUsuario->getApellido();
     $_SESSION['email'] = $objUsuario->getEmail();
     $_SESSION['rol'] = $objUsuario->getTipo_usuario();
    
    //print_r($_SESSION);
    
    rutasController::retornarVista(WEB_SERVER.'modules/');

  } 

?>  