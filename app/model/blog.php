<?php

    class blog{
        
        private $id_blog;
        private $id_usuario;
        private $t_principal;
        private $subtitulo;
        private $introduccion;
        private $f_publicacion;
        private $h_publicacion;
        private $contenido;
        
        function __construct($id_blog, $id_usuario, $t_principal, $subtitulo, $introduccion, $f_publicacion, $h_publicacion, $contenido) {
            $this->id_blog = $id_blog;
            $this->id_usuario = $id_usuario;
            $this->t_principal = $t_principal;
            $this->subtitulo = $subtitulo;
            $this->introduccion = $introduccion;
            $this->f_publicacion = $f_publicacion;
            $this->h_publicacion = $h_publicacion;
            $this->contenido = $contenido;
        }

        function setId_blog($id_blog){$this->id_blog = $id_blog;}
        function getId_blog(){return $this->id_blog;}

        function setId_usuario($id_usuario){$this->id_usuario = $id_usuario;}
        function getId_usuario(){return $this->id_usuario;}

        function setT_principal($t_principal){$this->t_principal = $t_principal;}
        function getT_principal(){return $this->t_principal;}

        function setSubtitulo($subtitulo){$this->subtitulo = $subtitulo;}
        function getSubtitulo(){return $this->subtitulo;}

        function setIntroduccion($introduccion){$this->introduccion = $introduccion;}
        function getIntroduccion(){return $this->introduccion;}

        function setF_publicacion($f_publicacion){$this->f_publicacion = $f_publicacion;}
        function getF_publicacion(){return $this->f_publicacion;}

        function setH_publicacion($h_publicacion){$this->h_publicacion = $h_publicacion;}
        function getH_publicacion(){return $this->h_publicacion;}

        function setContenido($contenido){$this->contenido = $contenido;}
        function getContenido(){return $this->contenido;}

    }

?>