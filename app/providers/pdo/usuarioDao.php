<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."usuario.php");

class usuarioDao
{
   
    public static function usuarioId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `usuario` where idusuario = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objusuario = new usuario(
            $data_table[0]["idusuario"],
            $data_table[0]["nombre"],
            $data_table[0]["apellido"],
            $data_table[0]["telefono"],
            $data_table[0]["email"],
            $data_table[0]["usuario"],
            $data_table[0]["clave"],
            $data_table[0]["tipo_usuario"],
            $data_table[0]["informacion"]
        );
        return $objusuario;
    }

    public static function validarSesion($usuario,$clave)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `usuario` WHERE usuario = '".$usuario."' AND clave = '".$clave."'";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
        $objusuario = new usuario(
            $data_table[0]["idusuario"],
            $data_table[0]["nombre"],
            $data_table[0]["apellido"],
            $data_table[0]["telefono"],
            $data_table[0]["email"],
            $data_table[0]["usuario"],
            $data_table[0]["clave"],
            $data_table[0]["tipo_usuario"],
            $data_table[0]["informacion"]
        );
        return $objusuario;
    }else{
        return false;
    }
    }

    public static function usuarioIdUser($usuario)
    {
        
        $data_source = new DataSource();
        $sql ="SELECT usuario.usuario FROM `usuario` WHERE usuario.usuario = '$usuario'";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            return true;
        }else{
            return false;
        }
    }

    public static function usuarioIdBlog($id_blog)
    {
        
        $data_source = new DataSource();
        $sql ="SELECT usuario.idusuario FROM `usuario` JOIN blog ON usuario.idusuario=blog.idusuario WHERE idblog = '$id_blog'";
        $data_table = $data_source->ejecutarConsulta($sql);
        
        return $data_table[0]['idusuario'];
    }

    public static function registrarUsuario( $usuario)
    {
        
        $data_source = new DataSource();
        $sql ="INSERT INTO `usuario` VALUES  
        (null,:nombre,:apellido,:telefono,:email,:usuario,:clave,:tipo_usuario,:informacion)";        
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ':nombre'=>$usuario->getNombre(),
            ':apellido'=>$usuario->getApellido(),
            ':telefono'=>$usuario->getTelefono(),
            ':email'=>$usuario->getEmail(),
            ':usuario'=>$usuario->getUsuario(),
            ':clave'=>$usuario->getClave(),
            ':tipo_usuario'=>$usuario->getTipo_usuario(),
            ':informacion' =>'Este usuario todavia no tiene una bio registrada'
        ));   
        return $resultado;
    }

    public static function editarUsuario(usuario $usuario)
    {
        
        $data_source = new DataSource();
        $sql ="UPDATE `usuario` SET 
        nombre=:nombre,
        apellido=:apellido,
        telefono=:telefono,
        email=:email,
        usuario=:usuario,
        clave=:clave,
        tipo_usuario=:tipo_usuario,
        informacion=:informacion
        WHERE idusuario=:idusuario";        
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ":idusuario"=>$usuario->getId_usuario(),
            ":nombre"=>$usuario->getNombre(),
            ":apellido"=>$usuario->getApellido(),
            ":telefono"=>$usuario->getTelefono(),
            ":email"=>$usuario->getEmail(),
            ":usuario"=>$usuario->getUsuario(),
            ":clave"=>$usuario->getClave(),
            ":tipo_usuario"=>$usuario->getTipo_usuario(),
            ":informacion"=>$usuario->getInformacion()
        ));   
        return $resultado;
    }

    public static function listadoUsuario()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `usuario` ORDER BY idusuario ASC ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayUsuario=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new usuario(
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["nombre"],
                    $data_table[$key]["apellido"],
                    $data_table[$key]["telefono"],
                    $data_table[$key]["email"],
                    $data_table[$key]["usuario"],
                    $data_table[$key]["clave"],
                    $data_table[$key]["tipo_usuario"],
                    $data_table[$key]["informacion"]
                );
                array_push($arrayUsuario,$objusuario);
            }
            return $arrayUsuario;
        }else{
            return false;
        }
    }
    
    public static function consultarListadoUsuario($consulta)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `usuario` LIKE '%".$consulta."%' ORDER BY idusuario ASC ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayUsuario=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new usuario(
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["nombre"],
                    $data_table[$key]["apellido"],
                    $data_table[$key]["telefono"],
                    $data_table[$key]["email"],
                    $data_table[$key]["usuario"],
                    $data_table[$key]["clave"],
                    $data_table[$key]["tipo_usuario"],
                    $data_table[$key]["informacion"]
                );
                array_push($arrayUsuario,$objusuario);
            }
            return $arrayUsuario;
        }else{
            return false;
        }
    }
    
    public static function ultimoUsuarioRegistrado()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT idusuario FROM `usuario` ORDER BY idusuario DESC LIMIT 1";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        return $data_table[0]['idusuario'];
    }
    
}