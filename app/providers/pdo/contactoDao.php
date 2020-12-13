<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."contacto.php");

class contactoDao
{
   
    public static function contactoId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `contacto` where idcontacto = $id";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objcontacto = new contacto(
            $data_table[0]["idcontacto"],
            $data_table[0]["nombre_contacto"],
            $data_table[0]["asunto"],
            $data_table[0]["correo_contacto"],
            $data_table[0]["mensaje"],
            $data_table[0]["hora"],
            $data_table[0]["fecha"]
        );
        return $objcontacto;
    }

    

    public static function registrarContacto($contacto)
    {
        
        $data_source = new DataSource();
        $sql ="INSERT INTO `contacto` VALUES  
        (null,:nombre_contacto,:asunto,:correo_contacto,:mensaje,:hora,:fecha)";        
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ':nombre_contacto'=>$contacto->getNombre_contacto(),
            ':asunto'=>$contacto->getAsunto(),
            ':correo_contacto'=>$contacto->getCorreo(),
            ':mensaje'=>$contacto->getMensaje(),
            ':hora'=>$contacto->getHora(),
            ':fecha'=>$contacto->getFecha()
            
        ));   
        return $resultado;
    }

    public static function editarContacto($contacto)
    {
        
        $data_source = new DataSource();
        $sql ="UPDATE `contacto` SET 
        nombre_contacto=:nombre_contacto,
        asunto=:asunto,
        correo_contacto=:correo_contacto,
        mensaje=:mensaje,
        
        WHERE idcontacto=:idcontacto";        
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ":idcontacto"=>$contacto->getId_contacto(),
            ':nombre_contacto'=>$contacto->getNombre_contacto(),
            ':asunto'=>$contacto->getAsunto(),
            ':correo_contacto'=>$contacto->getCorreo(),
            ':mensaje'=>$contacto->getMensaje()
        ));   
        return $resultado;
    }

    public static function listadoContacto()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `contacto` ORDER BY idcontacto ASC ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arraycontacto=array();
            foreach ($data_table as $key => $value) {
                $objcontacto = new contacto(
                    $data_table[$key]["idcontacto"],
                    $data_table[$key]["nombre_contacto"],
                    $data_table[$key]["asunto"],
                    $data_table[$key]["correo_contacto"],
                    $data_table[$key]["mensaje"],
                    $data_table[$key]["hora"],
                    $data_table[$key]["fecha"]
                );
                array_push($arraycontacto,$objcontacto);
            }
            return $arraycontacto;
        }else{
            return false;
        }
    }
    
}