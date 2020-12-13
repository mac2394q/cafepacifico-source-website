<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
    require_once(CONTROLLERS_PATH.'reservacionController.php');
    require_once(MODEL_PATH.'reservacion.php');





    // echo "<br> npersonas ".$_POST['npersonas'];
    // echo "<br> tipo de servico ".$_POST['servicio'];
    // echo "<br>evento ".$_POST['tipoReserva'];
    // echo "<br>".$_POST['fecha'];
    // echo "<br>".$_POST['horario'];
    $reservacion=reservacionController::disponibilidadReservacion($_POST['servicio'],$_POST['fecha'],$_POST['horario']);
    if($reservacion == false){

        echo "
        <div class='alert alert-success fade in' role='alert' >
            <i class='fa fa-success alert-success'></i>
            <strong>enhorabuena!</strong> el dia y la hora estan disponibles para reservar </strong>
        </div>";
        

    }else{
        

        echo "
        <div class='alert alert-danger fade in' role='alert' >
            <i class='fa fa-warning alert-danger'></i>
            <strong>Lo siento!</strong> el dia y la hora estan reservados o no se encuentrarn disponibles</strong>
        </div>";
        

    }





   






?>