<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
    require_once(CONTROLLERS_PATH.'reservacionController.php');
    require_once(MODEL_PATH.'reservacion.php');
    
    $objmodel = reservacion(
        $_POST['idreservacion'],
        $_POST['npersonas'],
        null,
        $_POST['tipo_servicio'],
        $_POST['fecha_reservacion'],
        $_POST['hora_reservacion'],
        $_POST['idusuario'],
        null,
        'reservado',
        $_POST['nota']
    );
    if($objController = reservacionController::editarReservacion($objmodel)){
        echo '<div class="alert alert-success fade in" role="alert">
                <i class="fa fa-thumbs-up alert-success"></i>
                <strong>Exito!</strong> Registro realizado con exito
            </div>';
    }else{
        echo '<div class="alert alert-danger fade in" role="alert">
                <i class="fa fa-warning alert-danger"></i>
                <strong>Error! </strong> Registro no realizado
            </div>';
    }

?>