<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
    require_once(CONTROLLERS_PATH.'reservacionController.php');
    require_once(MODEL_PATH.'reservacion.php');

    

    // echo "<br> npersonas ".$_POST['npersonas'];
    // echo "<br> tipo de servico ".$_POST['servicio'];
    // echo "<br>evento ".$_POST['tipoReserva'];
    // echo "<br>".$_POST['fecha'];
    // echo "<br>".$_POST['horario'];
    reservacionController:: verificacionDisponibilidadReserva($_POST['servicio'],$_POST['fecha'],$_POST['horario']);
    




   






?>