<?php session_start();
  header("Access-Control-Allow-Origin: *");
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');

    unset($_SESSION['idsesion']);
    session_destroy();

    $url =PLATFORM_SERVER."modules/sesion/login.php"; 
    echo  "<script>window.location.replace('".$url."');</script> ";
    

?>  