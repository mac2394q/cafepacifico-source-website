<?php

    class comentarios{
        
        private $id_comentarios;
        private $id_blog;
        private $id_usuario;
        private $estructura;
        private $fecha_comentario;
        private $hora_comentario;
        
        function __construct($id_comentarios, $id_blog, $id_usuario, $estructura,$fecha_comentario,$hora_comentario) {
            $this->id_comentarios = $id_comentarios;
            $this->id_blog = $id_blog;
            $this->id_usuario = $id_usuario;
            $this->estructura = $estructura;
            $this->fecha_comentario=$fecha_comentario;
            $this->hora_comentario=$hora_comentario;
        }
        
        function setId_comentarios($id_comentarios){$this->id_comentarios = $id_comentarios;}
        function getId_comentarios(){return $this->id_comentarios;}

        function setId_blog($id_blog){$this->id_blog = $id_blog;}
        function getId_blog(){return $this->id_blog;}

        function setId_usuario($id_usuario){$this->id_usuario = $id_usuario;}
        function getId_usuario(){return $this->id_usuario;}

        function setEstructura($estructura){$this->estructura = $estructura;}
        function getEstructura(){return $this->estructura;}

        function setFecha_comentario($fecha_comentario){$this->fecha_comentario = $fecha_comentario;}
        function getFecha_comentario(){return $this->fecha_comentario;}

        function setHora_comentario($hora_comentario){$this->hora_comentario = $hora_comentario;}
        function getHora_comentario(){return $this->hora_comentario;}
    }

?>