<?php



include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once(DATABASE_PATH."DataSource.php");

require_once(MODEL_PATH.'usuario.php');

require_once(MODEL_PATH."blog.php");

require_once(MODEL_PATH."comentarios.php");

class blogDao


{
   
    public static function blogId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `blog` where idblog = $id";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objblog = new blog(
            $data_table[0]["idblog"],
            $data_table[0]["idusuario"],
            $data_table[0]["titulo_principal"],
            $data_table[0]["subtitulo"],
            $data_table[0]["introduccion"],
            $data_table[0]["fecha_publicacion"],
            $data_table[0]["hora_publicacion"],
            $data_table[0]["contenido"]
        );
        return $objblog;
    }
    public static function ncomentarios($idblog)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT count(*) as 'numero' FROM `comentarios` where idblog = ". $idblog;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        return $data_table[0]["numero"];
    }
    public static function ultimoBlog()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT idblog FROM `blog` ORDER BY idblog DESC LIMIT 1";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        return $data_table[0]['idblog'];
        
    }

    public static function blogIdSub($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT subtitulo FROM `blog` WHERE idblog = $id";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        return $data_table[0]['subtitulo'];
        
    }
    public static function blogIdUser($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `blog` JOIN usuario ON blog.idusuario=usuario.idusuario WHERE idusuario = $id";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objblog = new blog(
            $data_table[0]["idblog"],
            $data_table[0]["idusuario"],
            $data_table[0]["titulo_principal"],
            $data_table[0]["subtitulo"],
            $data_table[0]["introduccion"],
            $data_table[0]["fecha_publicacion"],
            $data_table[0]["hora_publicacion"],
            $data_table[0]["contenido"]
        );
        return $objblog;
    }
    public static function registrarBlog($blog)
    {
        
        $data_source = new DataSource();
        $sql ="INSERT INTO `blog` VALUES  
        (null,:idusuario,:titulo_principal,:subtitulo,:introduccion,:fecha_publicacion,:hora_publicacion,:contenido)";        
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ':idusuario'=>$blog->getId_usuario(),
            ':titulo_principal'=>$blog->getT_principal(),
            ':subtitulo'=>$blog->getSubtitulo(),
            ':introduccion'=>$blog->getIntroduccion(),
            ':fecha_publicacion'=>$blog->getF_publicacion(),
            ':hora_publicacion'=>$blog->getH_publicacion(),
            ':contenido'=>$blog->getContenido()
        ));   
        return $resultado;
    }
    public static function editarBlog($blog)
    {
        
        $data_source = new DataSource();
        $sql ="UPDATE `blog` SET 
        idusuario=:idusuario,
        titulo_principal=:titulo_principal,
        subtitulo=:subtitulo,
        introduccion=:introduccion,
        contenido=:contenido


        WHERE idblog=:idblog";        
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ":idblog"=>$blog->getId_blog(),
            ':idusuario'=>$blog->getId_usuario(),
            ':titulo_principal'=>$blog->getT_principal(),
            ':subtitulo'=>$blog->getSubtitulo(),
            ':introduccion'=>$blog->getIntroduccion(),
            ':contenido'=>$blog->getContenido()
        ));   
        return $resultado;
    }
    public static function editarBlogSub($id,$sub)
    {
        
        $data_source = new DataSource();
        $sql ="UPDATE `blog` SET 
        subtitulo=:subtitulo

        WHERE idblog=:idblog";        
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ":idblog"=>$id,
            ':subtitulo'=>$sub,
        ));   
        return $resultado;
    }
    public static function registrarComentario(comentarios $comentario)
    {
        
        $data_source = new DataSource();
        $sql ="INSERT INTO `comentarios` VALUES  
        (null,:idblog,:idusuario,:estructura,:fecha_comentario,:hora_comentario)";        
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ':idblog'=>$comentario->getId_blog(),
            ':idusuario'=>$comentario->getId_usuario(),
            ':estructura'=>$comentario->getEstructura(),
            ':fecha_comentario'=>$comentario->getFecha_comentario(),
            ':hora_comentario'=>$comentario->getHora_comentario()
        ));   
        return $resultado;
    }
    public static function editarComentario(comentarios $comentario)
    {
        
        $data_source = new DataSource();
        $sql ="UPDATE `comentarios` SET 
        idblog=:idblog,
        idusuario=:idusuario,
        estructura=:estructura,
        fecha_comentario=:fecha_comentario,
        hora_comentario=:hora_comentario


        WHERE idcomentarios=:idcomentarios";        
        $resultado = $data_source->ejecutarActualizacion($sql,array(
            ":idcomentarios"=>$comentario->getId_comentarios(),
            ':idblog'=>$comentario->getId_blog(),
            ':idusuario'=>$comentario->getId_usuario(),
            ':estructura'=>$comentario->getEstructura(),
            ':fecha_comentario'=>$comentario->getFecha_comentario(),
            ':hora_comentario'=>$comentario->getHora_comentario()
        ));   
        return $resultado;
    }
    public static function listadoBlog()
    {
        
        $data_source = new DataSource();
        $sql =' SELECT * FROM `blog` WHERE introduccion<>"GALERIA" ORDER BY idblog ASC ';
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayblog=array();
            foreach ($data_table as $key => $value) {
                $objblog = new blog(
                    $data_table[$key]["idblog"],
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["titulo_principal"],
                    $data_table[$key]["subtitulo"],
                    $data_table[$key]["introduccion"],
                    $data_table[$key]["fecha_publicacion"],
                    $data_table[$key]["hora_publicacion"],
                    $data_table[$key]["contenido"]
                );
                array_push($arrayblog,$objblog);
            }
            return $arrayblog;
        }else{
            return false;
        }
    }

    public static function listadoGalerias()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `blog` WHERE introduccion='GALERIA' ORDER BY idblog ASC ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayblog=array();
            foreach ($data_table as $key => $value) {
                $objblog = new blog(
                    $data_table[$key]["idblog"],
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["titulo_principal"],
                    $data_table[$key]["subtitulo"],
                    $data_table[$key]["introduccion"],
                    $data_table[$key]["fecha_publicacion"],
                    $data_table[$key]["hora_publicacion"],
                    $data_table[$key]["contenido"]
                );
                array_push($arrayblog,$objblog);
            }
            return $arrayblog;
        }else{
            return false;
        }
    }

    public static function listadoComentariosBlog($idblog)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `comentarios`  where idblog = ".$idblog." ORDER BY idblog ASC ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayblog=array();
            foreach ($data_table as $key => $value) {
                $objblog = new comentarios(
                    $data_table[$key]["idcomentarios"],
                    $data_table[$key]["idblog"],
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["estructura"],
                    $data_table[$key]["fecha_comentario"],
                    $data_table[$key]["hora_comentario"]
                );
                array_push($arrayblog,$objblog);
            }
            return $arrayblog;
        }else{
            return false;
        }
    }


    public static function ultimosPost()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `blog` ORDER BY `blog`.`idblog` DESC limit 5";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayblog=array();
            foreach ($data_table as $key => $value) {
                $objblog = new blog(
                    $data_table[$key]["idblog"],
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["titulo_principal"],
                    $data_table[$key]["subtitulo"],
                    $data_table[$key]["introduccion"],
                    $data_table[$key]["fecha_publicacion"],
                    $data_table[$key]["hora_publicacion"],
                    $data_table[$key]["contenido"]
                );
                array_push($arrayblog,$objblog);
            }
            return $arrayblog;
        }else{
            return false;
        }
    }


    public static function ultimosComentarios()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `comentarios` ORDER BY `idcomentarios` ASC limit 5";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayblog=array();
            foreach ($data_table as $key => $value) {
                $objblog = new comentarios(
                    $data_table[$key]["idcomentarios"],
                    $data_table[$key]["idblog"],
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["estructura"],
                    $data_table[$key]["introduccion"],
                    $data_table[$key]["fecha_comentario"],
                    $data_table[$key]["hora_publicacion"],
                    $data_table[$key]["hora_comentario"]
                );
                array_push($arrayblog,$objblog);
            }
            return $arrayblog;
        }else{
            return false;
        }
    }
    
    public static function listadoBlogLimit()
    {
        
        $data_source = new DataSource();
        $sql = 'SELECT * FROM `blog` WHERE introduccion<>"GALERIA" ORDER BY idblog DESC LIMIT 3';
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayblog=array();
            foreach ($data_table as $key => $value) {
                $objblog = new blog(
                    $data_table[$key]["idblog"],
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["titulo_principal"],
                    $data_table[$key]["subtitulo"],
                    $data_table[$key]["introduccion"],
                    $data_table[$key]["fecha_publicacion"],
                    $data_table[$key]["hora_publicacion"],
                    $data_table[$key]["contenido"]
                );
                array_push($arrayblog,$objblog);
            }
            return $arrayblog;
        }else{
            return false;
        }
    }

    public static function listadoGaleriaLimit()
    {
        
        $data_source = new DataSource();
        $sql = 'SELECT * FROM `blog` WHERE introduccion="GALERIA" AND titulo_principal="PRODUCTOS"';
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objblog = new blog(
            $data_table[0]["idblog"],
            $data_table[0]["idusuario"],
            $data_table[0]["titulo_principal"],
            $data_table[0]["subtitulo"],
            $data_table[0]["introduccion"],
            $data_table[0]["fecha_publicacion"],
            $data_table[0]["hora_publicacion"],
            $data_table[0]["contenido"]
        );
        return $objblog;
    }
    public static function consultarListadoBlog($consulta)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `blog` LIKE '%".$consulta."%' ORDER BY idblog ASC ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayblog=array();
            foreach ($data_table as $key => $value) {
                $objblog = new blog(
                    $data_table[$key]["idblog"],
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["titulo_principal"],
                    $data_table[$key]["subtitulo"],
                    $data_table[$key]["introduccion"],
                    $data_table[$key]["fecha_publicacion"],
                    $data_table[$key]["hora_publicacion"],
                    $data_table[$key]["contenido"]
                );
                array_push($arrayblog,$objblog);
            }
            return $arrayblog;
        }else{
            return false;
        }
    }
    
    public static function blogFecha(){
        $data_source = new DataSource();
        $sql = "SELECT * from 'blog' WHERE YEAR(fecha_publicacion)='2018' AND introduccion<>'GALERIA'";

        $data_table = $data_source->ejecutarConsulta($sql);

        if(count($data_table)>9){
            $arrayblog=array();
            foreach ($data_table as $key => $value) {
                $objblog = new blog(
                    $data_table[$key]["idblog"],
                    $data_table[$key]["idusuario"],
                    $data_table[$key]["titulo_principal"],
                    $data_table[$key]["subtitulo"],
                    $data_table[$key]["introduccion"],
                    $data_table[$key]["fecha_publicacion"],
                    $data_table[$key]["hora_publicacion"],
                    $data_table[$key]["contenido"]
                );
                array_push($arrayblog,$objblog);
            }
            return $arrayblog;
        }else{
            return false;
        }
    }

    public static function blogNFecha(){
        $data_source = new DataSource();
        $sql = "SELECT count(*) from 'blog' WHERE YEAR(fecha_publicacion)='2018'";

        $data_table = $data_source->ejecutarConsulta($sql);

        return $data_table;
    }
}