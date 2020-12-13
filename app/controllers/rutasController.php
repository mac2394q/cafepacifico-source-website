<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');

    class rutasController{

        public static function retornarVista($url){
       
            echo  "<script>window.location.replace('".$url."');</script> ";
             
        }

    }
?>