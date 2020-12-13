<?php

    class elemento{
        
        private $id_elemento;
        private $nombre_producto;
        private $descripcion;
        private $precio;
        
        function __construct($id_elemento, $nombre_producto, $descripcion, $precio) {
            $this->id_elemento = $id_elemento;
            $this->nombre_producto = $nombre_producto;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
        }
        
        function setId_elemento($id_elemento){$this->id_elemento = $id_elemento;}
        function getId_elemento(){return $this->id_elemento;}

        function setNombre_producto($nombre_producto){$this->nombre_producto = $nombre_producto;}
        function getNombre_producto(){return $this->nombre_producto;}

        function setDescripcion($descripcion){$this->descripcion = $descripcion;}
        function getDescripcion(){return $this->descripcion;}

        function setPrecio($precio){$this->precio = $precio;}
        function getPrecio(){return $this->precio;}
      

    }

?>