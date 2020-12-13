<?php

    class contacto{
        
        private $id_contacto;
        private $nombre_contacto;
        private $asunto;
        private $correo;
        private $mensaje;
        private $hora;
        private $fecha;
        
        function __construct($id_contacto, $nombre_contacto, $asunto, $correo, $mensaje,$hora,$fecha) {
            $this->id_contacto = $id_contacto;
            $this->nombre_contacto = $nombre_contacto;
            $this->asunto = $asunto;
            $this->correo = $correo;
            $this->mensaje = $mensaje;
            $this->hora = $hora;
            $this->fecha = $hora;
        }
        
        function setId_contacto($id_contacto){$this->id_contacto = $id_contacto;}
        function getId_contacto(){return $this->id_contacto;}

        function setNombre_contacto($nombre_contacto){$this->nombre_contacto = $nombre_contacto;}
        function getNombre_contacto(){return $this->nombre_contacto;}

        function setAsunto($asunto){$this->asunto = $asunto;}
        function getAsunto(){return $this->asunto;}

        function setCorreo($correo){$this->correo = $correo;}
        function getCorreo(){return $this->correo;}

        function setMensaje($mensaje){$this->mensaje = $mensaje;}
        function getMensaje(){return $this->mensaje;}

        function setHora($hora){$this->hora = $hora;}
        function getHora(){return $this->hora;}

        function setFecha($fecha){$this->fecha = $fecha;}
        function getFecha(){return $this->fecha;}
    }

?>