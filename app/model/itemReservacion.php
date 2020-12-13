<?php

    class itemReservacion{
        
        private $iditem_reservacion;
        private $id_reservacion;
        private $id_elemento;
        private $cantidad;
        private $valor;
        
        function __construct($iditem_reservacion, $id_reservacion, $id_elemento, $cantidad, $valor) {
            $this->iditem_reservacion = $iditem_reservacion;
            $this->id_reservacion = $id_reservacion;
            $this->id_elemento = $id_elemento;
            $this->cantidad = $cantidad;
            $this->valor = $valor;
        }

        function setIditem_reservacion($iditem_reservacion){$this->iditem_reservacion = $iditem_reservacion;}
        function getIditem_reservacion(){return $this->iditem_reservacion;}

        function setId_reservacion($id_reservacion){$this->id_reservacion = $id_reservacion;}
        function getId_reservacion(){return $this->id_reservacion;}

        function setId_elemento($id_elemento){$this->id_elemento = $id_elemento;}
        function getId_elemento(){return $this->id_elemento;}

        function setCantidad($cantidad){$this->cantidad = $cantidad;}
        function getCantidad(){return $this->cantidad;}

        function setValor($valor){$this->valor = $valor;}
        function getValor(){return $this->valor;}

    }

?>