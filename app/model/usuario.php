<?php

    class usuario{
        
        private $id_usuario;
        private $nombre;
        private $apellido;
        private $telefono;
        private $email;
        private $usuario;
        private $clave;
        private $tipo_usuario;
        private $informacion;
        
        function __construct($id_usuario, $nombre, $apellido, $telefono, $email, $usuario, $clave, $tipo_usuario, $informacion) {
            $this->id_usuario = $id_usuario;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->telefono = $telefono;
            $this->email = $email;
            $this->usuario = $usuario;
            $this->clave = $clave;
            $this->tipo_usuario = $tipo_usuario;
            $this->informacion = $informacion;
        }

        function setId_usuario($id_usuario){$this->id_usuario = $id_usuario;}
        function getId_usuario(){return $this->id_usuario;}

        function setNombre($nombre){$this->nombre = $nombre;}
        function getNombre(){return $this->nombre;}

        function setApellido($apellido){$this->apellido = $apellido;}
        function getApellido(){return $this->apellido;}

        function setTelefono($telefono){$this->telefono = $telefono;}
        function getTelefono(){return $this->telefono;}

        function setEmail($email){$this->email = $email;}
        function getEmail(){return $this->email;}

        function setUsuario($usuario){$this->usuario = $usuario;}
        function getUsuario(){return $this->usuario;}

        function setClave($clave){$this->clave = $clave;}
        function getClave(){return $this->clave;}

        function setTipo_usuario($tipo_usuario){$this->tipo_usuario = $tipo_usuario;}
        function getTipo_usuario(){return $this->tipo_usuario;}

        function setInformacion($informacion){$this->informacion = $informacion;}
        function getInformacion(){return $this->informacion;}

    }

?>
