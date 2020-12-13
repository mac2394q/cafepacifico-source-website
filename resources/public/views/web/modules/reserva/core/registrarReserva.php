<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
    require_once(CONTROLLERS_PATH.'reservacionController.php');
    require_once(PROVIDERS_PATH.'pdo/reservacionDao.php');
    require_once(MODEL_PATH.'reservacion.php');
    //print_r($_POST);

    $tipoReservacion = "";
    if( $_POST['tipoReserva'] == "NO"){
        $tipoReservacion="SIMPLE";
    }else{
        $tipoReservacion="EVENTO";

    }
    
    $objmodel = new reservacion(
        null,
        $_POST['npersonas'],
        $tipoReservacion,
        $_POST['servicio'],
        $_POST['fecha'],
        $_POST['horario'],
        $_POST['idsesion'],
        0,
        "PROGRAMADA",
        ''
    );
    if(intval( $_POST['idsesion']) != 0){
        reservacionController::registrarReservacion($objmodel);
        $url=WEB_SERVER."modules/reserva/verFicha.php?id=".reservacionDao::ultimaReservacionRegistrada();
      echo "<div class='alert alert-success fade in' role='alert'>
                    <i class='fa fa-thumbs-up alert-success'></i>
                    <strong>Exito!</strong> Registro realizado con exito 
                    <a href='".$url."' target='_self' class='inner-link button btn margin-right-20px xs-margin-five-bottom button-3d btn-round btn-small btn-success btn-round'>Ver registro de la reserva</a>
            </div>
            
            <br><br<br<br";
        

    }else{
        echo '<div class="alert alert-warning fade in" role="alert">
                    <i class="fa fa-warning alert-danger"></i>
                    <strong>Error</strong> El usuario debe iniciar sesion para reservar!.
                </div>';
    }
    

?>