<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."elemento.php");
require_once(MODEL_PATH."comentarios.php");

class elementoDao
{
   
    public static function elementoId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `elemento` where idelemento = $id";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objelemento = new elemento(
            $data_table[0]["idelemento"],
            $data_table[0]["nombre_producto"],
            $data_table[0]["descripcion"],
            $data_table[0]["precio"]
        );
        return $objelemento;
    }

    public static function ultimoElemento()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT idelemento FROM `elemento` ORDER BY idelemento DESC LIMIT 1";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);     
        
        return $data_table[0]["idelemento"];
    }

    public static function registrarElemento(elemento $elemento)
    {
        
        $data_source = new DataSource();
        $sql ="INSERT INTO `elemento` VALUES  
        (null,:nombre_producto,:descripcion,:precio)";        
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ':nombre_producto'=>$elemento->getNombre_producto(),
            ':descripcion'=>$elemento->getDescripcion(),
            ':precio'=>$elemento->getPrecio()
        ));   
        return $resultado;
    }

    public static function editarElemento($elemento)
    {
        
        $data_source = new DataSource();
        $sql ="UPDATE `elemento` SET 
        nombre_producto=:nombre_producto,
        descripcion=:descripcion,
        precio=:precio
        WHERE idelemento=:idelemento";        
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ':idelemento'=>$elemento->getId_elemento(),
            ':nombre_producto'=>$elemento->getNombre_producto(),
            ':descripcion'=>$elemento->getDescripcion(),
            ':precio'=>$elemento->getPrecio()
        ));   
        return $resultado;
    }

   
    public static function listadoelemento()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `elemento` ORDER BY idelemento ASC ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayelemento=array();
            foreach ($data_table as $key => $value) {
                $objelemento = new elemento(
                    $data_table[$key]["idelemento"],
                    $data_table[$key]["nombre_producto"],
                    $data_table[$key]["descripcion"],
                    $data_table[$key]["precio"]
                );
                array_push($arrayelemento,$objelemento);
            }
            return $arrayelemento;
        }else{
            return false;
        }
    }
    
    public static function listadoElementoLimit()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `elemento` ORDER BY idelemento ASC LIMIT 20";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayelemento=array();
            foreach ($data_table as $key => $value) {
                $objelemento = new elemento(
                    $data_table[$key]["idelemento"],
                    $data_table[$key]["nombre_producto"],
                    $data_table[$key]["descripcion"],
                    $data_table[$key]["precio"]
                );
                array_push($arrayelemento,$objelemento);
            }
            return $arrayelemento;
        }else{
            return false;
        }
    }
}