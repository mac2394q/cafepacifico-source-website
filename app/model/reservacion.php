<?php
    
    class reservacion{
        
        private $id_reservacion;
        private $npersonas;
        private $tipo;
        private $tipo_servicio;
        private $fecha_reserva;
        private $hora_reserva;
        private $id_usuario;
        private $abono;
        private $estado;
        private $nota;
        
        public function __construct($id_reservacion, $npersonas, $tipo, $tipo_servicio,$fecha_reserva, $hora_reserva, $id_usuario, $abono, $estado, $nota) {
            $this->id_reservacion = $id_reservacion;
            $this->npersonas = $npersonas;
            $this->tipo = $tipo;
            $this->tipo_servicio = $tipo_servicio;
            $this->fecha_reserva = $fecha_reserva;
            $this->hora_reserva = $hora_reserva;
            $this->id_usuario = $id_usuario;
            $this->abono = $abono;
            $this->estado = $estado;
            $this->nota = $nota;
        }

        function setId_reservacion($id_reservacion){$this->id_reservacion = $id_reservacion;}
        function getId_reservacion(){return $this->id_reservacion;}

        function setNpersonas($npersonas){$this->npersonas = $npersonas;}
        function getNpersonas(){return $this->npersonas;}

        function setTipo($tipo){$this->tipo = $tipo;}
        function getTipo(){return $this->tipo;}

        function setTipo_servicio($tipo_servicio){$this->tipo_servicio = $tipo_servicio;}
        function getTipo_servicio(){return $this->tipo_servicio;}

        function setFecha_reserva($fecha_reserva){$this->fecha_reserva = $fecha_reserva;}
        function getFecha_reserva(){return $this->fecha_reserva;}

        function setHora_reserva($hora_reserva){$this->hora_reserva = $hora_reserva;}
        function getHora_reserva(){return $this->hora_reserva;}

        function setId_usuario($id_usuario){$this->id_usuario = $id_usuario;}
        function getId_usuario(){return $this->id_usuario;}

        function setAbono($abono){$this->abono = $abono;}
        function getAbono(){return $this->abono;}

        function setEstado($estado){$this->estado = $estado;}
        function getEstado(){return $this->estado;}

        function setNota($nota){$this->nota = $nota;}
        function getNota(){return $this->nota;}

    }

?>