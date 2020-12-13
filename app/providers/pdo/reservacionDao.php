<?php 
    include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
    require_once(DATABASE_PATH."DataSource.php");
    require_once(MODEL_PATH."reservacion.php");
    
    class reservacionDao{
        public static function reservacionId($id)
        {
            
            $data_source = new DataSource();
            $sql =" SELECT * FROM `reservacion` where idreservacion = ".$id;
            //echo $sql;
            $data_table = $data_source->ejecutarConsulta($sql);
          
            $objreservacion = new reservacion(
                $data_table[0]["idreservacion"],
                $data_table[0]["npersonas_reservacion"],
                $data_table[0]["tipo_reservacion"],
                $data_table[0]["tipo_servicio_reservacion"],
                $data_table[0]["fecha_reservacion"],
                $data_table[0]["hora_reservacion"],
                $data_table[0]["idusuario_reservacion"],
                $data_table[0]["abono_reservacion"],
                $data_table[0]["estado_reservacion"],
                $data_table[0]["nota_reservacion"]
            );
            return $objreservacion;
        }
        public static function reservacionIdDateTime($fecha,$hora)
        {
            
            $data_source = new DataSource();
            $sql =" SELECT * FROM `reservacion` WHERE fecha_reservacion = ".$fecha." AND hora_reservacion =".$hora." AND estado_reservacion = reservado";
            //echo $sql;
            $data_table = $data_source->ejecutarConsulta($sql);
          
            if(count($data_table)<=20){
                return true;
            }else{
                return false;
            }
        }
        public static function usuarioIdReservacion($id)
        {
            
            $data_source = new DataSource();
            $sql =" SELECT * FROM `reservacion` JOIN usuario ON idusuario_reservacion=idusuario WHERE idusuario = ".$id;
            //echo $sql;
            $data_table = $data_source->ejecutarConsulta($sql);
          
            $objreservacionUsuario = new reservacion(
                $data_table[0]["idreservacion"],
                $data_table[0]["npersonas_reservacion"],
                $data_table[0]["tipo_reservacion"],
                $data_table[0]["tipo_servicio_reservacion"],
                $data_table[0]["fecha_reservacion"],
                $data_table[0]["hora_reservacion"],
                $data_table[0]["idusuario_reservacion"],
                $data_table[0]["abono_reservacion"],
                $data_table[0]["estado_reservacion"],
                $data_table[0]["nota_reservacion"]
            );
            return $objreservacionUsuario;
        }
    
        public static function registrarReservacion($reservacion)
        {
            //print_r($reservacion);
            $data_source = new DataSource();
            $sql ="INSERT INTO `reservacion` VALUES  (
            null,
            :npersonas_reservacion,
            :tipo_reservacion,
            :tipo_servicio_reservacion,
            :fecha_reservacion,
            :hora_reservacion,
            :idusuario_reservacion,
            :abono_reservacion,
            :estado_reservacion,
            :nota_reservacion )";        
            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ":npersonas_reservacion"=>$reservacion->getNpersonas(),
                ":tipo_reservacion"=>$reservacion->getTipo(),
                ":tipo_servicio_reservacion"=>$reservacion->getTipo_servicio(),
                ":fecha_reservacion"=>$reservacion->getFecha_reserva(),
                ":hora_reservacion"=>$reservacion->getHora_reserva(),
                ":idusuario_reservacion"=>$reservacion->getId_usuario(),
                ":abono_reservacion"=>$reservacion->getAbono(),
                ":estado_reservacion"=>$reservacion->getEstado(),
                ':nota_reservacion'=>$reservacion->getNota()
            ));   
            return $resultado;
        }
    
        public static function editarReservacion($reservacion)
        {
            
            $data_source = new DataSource();
            $sql ="UPDATE `reservacion` SET 
            npersonas_reservacion=:npersonas_reservacion,
            tipo_reservacion=:tipo_reservacion,
            tipo_servicio_reservacion=:tipo_servicio_reservacion,
            fecha_reservacion=:fecha_reservacion,
            hora_reservacion=:hora_reservacion,
            idusuario_reservacion=:idusuario_reservacion,
            abono_reservacion=:abono_reservacion,
            estado_reservacion=:estado_reservacion,
            nota_reservacion=:nota_reservacion       
            WHERE idreservacion=:idreservacion";        
            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ":idreservacion"=>$reservacion->getId_reservacion(),
                ":npersonas_reservacion"=>$reservacion->getNpersonas(),
                ":tipo_reservacion"=>$reservacion->getTipo(),
                ":tipo_servicio_reservacion"=>$reservacion->getTipo_servicio(),
                ":fecha_reservacion"=>$reservacion->getFecha_reserva(),
                ":hora_reservacion"=>$reservacion->getHora_reserva(),
                ":idusuario_reservacion"=>$reservacion->getId_usuario(),
                ":abono_reservacion"=>$reservacion->getAbono(),
                ":estado_reservacion"=>$reservacion->getEstado(),
                ':nota_reservacion'=>$reservacion->getNota()
            ));   
            return $resultado;
        }
        
        public static function editarCampo($idreservacion,$campo,$registro)
        {
        
            $data_source = new DataSource();
            $sql = "UPDATE reservacion SET
            :campo=:registro  where idreservacion = :idreservacion";
            $resultado2 = $data_source->ejecutarActualizacion($sql, array(
                ':campo' => $campo,
                ':registro' => $registro,
                ':idreservacion' => $idreservacion
            ));
            return $resultado2;
        }
        public static function listadoReservacion()
        {
            
            $data_source = new DataSource();
            $sql =" SELECT * FROM `reservacion` ORDER BY `reservacion`.`fecha_reservacion` DESC ";
            //echo $sql;
            $data_table = $data_source->ejecutarConsulta($sql);
            
            if(count($data_table)>0){
                $arrayUsuario=array();
                foreach ($data_table as $key => $value) {
                    $objreservacion = new reservacion(
                        $data_table[$key]["idreservacion"],
                        $data_table[$key]["npersonas_reservacion"],
                        $data_table[$key]["tipo_reservacion"],
                        $data_table[$key]["tipo_servicio_reservacion"],
                        $data_table[$key]["fecha_reservacion"],
                        $data_table[$key]["hora_reservacion"],
                        $data_table[$key]["idusuario_reservacion"],
                        $data_table[$key]["abono_reservacion"],
                        $data_table[$key]["estado_reservacion"],
                        $data_table[$key]["nota_reservacion"]
                    );
                    array_push($arrayUsuario,$objreservacion);
                }
                return $arrayUsuario;
            }else{
                return false;
            }
        }
        
        public static function listadoReservacion2($idusuario)
        {
            
            $data_source = new DataSource();
            $sql =" SELECT * FROM `reservacion` where idusuario_reservacion = ".$idusuario." ORDER BY `reservacion`.`fecha_reservacion` DESC ";
            //echo $sql;
            $data_table = $data_source->ejecutarConsulta($sql);
            
            if(count($data_table)>0){
                $arrayUsuario=array();
                foreach ($data_table as $key => $value) {
                    $objreservacion = new reservacion(
                        $data_table[$key]["idreservacion"],
                        $data_table[$key]["npersonas_reservacion"],
                        $data_table[$key]["tipo_reservacion"],
                        $data_table[$key]["tipo_servicio_reservacion"],
                        $data_table[$key]["fecha_reservacion"],
                        $data_table[$key]["hora_reservacion"],
                        $data_table[$key]["idusuario_reservacion"],
                        $data_table[$key]["abono_reservacion"],
                        $data_table[$key]["estado_reservacion"],
                        $data_table[$key]["nota_reservacion"]
                    );
                    array_push($arrayUsuario,$objreservacion);
                }
                return $arrayUsuario;
            }else{
                return false;
            }
        }
        public static function cargarHorariosDisponibles($fecha,$servicio)
        {
            
            $data_source = new DataSource();
            if($servicio == "ha"){
                $sql =" SELECT * FROM `reservacion` where fecha_reservacion = '".$fecha."' and  hora_reservacion < '14:51'   ORDER BY `reservacion`.`hora_reservacion` ASC ";
            }else{
                $sql =" SELECT * FROM `reservacion` where fecha_reservacion = '".$fecha."' and  hora_reservacion > '17:59'   ORDER BY `reservacion`.`hora_reservacion` ASC ";
            }
            
            //echo $sql;
            $data_table = $data_source->ejecutarConsulta($sql);
            
            if(count($data_table)>0){
                $arrayUsuario=array();
                foreach ($data_table as $key => $value) {
                    $objreservacion = new reservacion(
                        $data_table[$key]["idreservacion"],
                        $data_table[$key]["npersonas_reservacion"],
                        $data_table[$key]["tipo_reservacion"],
                        $data_table[$key]["tipo_servicio_reservacion"],
                        $data_table[$key]["fecha_reservacion"],
                        $data_table[$key]["hora_reservacion"],
                        $data_table[$key]["idusuario_reservacion"],
                        $data_table[$key]["abono_reservacion"],
                        $data_table[$key]["estado_reservacion"],
                        $data_table[$key]["nota_reservacion"]
                    );
                    array_push($arrayUsuario,$objreservacion);
                }
                return $arrayUsuario;
            }else{
                return false;
            }
        }
        public static function disponibilidadReservacion($fecha,$hora)
        {
            $data_source = new DataSource();
            $sql =" SELECT * FROM `reservacion` where fecha_reservacion = '".$fecha."' and  hora_reservacion = '".$hora."'   ";
            //echo $sql;
            $data_table = $data_source->ejecutarConsulta($sql);
            if(count($data_table)>0){
                return true;}
            else{
                return false;}
        }
        
        public static function ultimaReservacionRegistrada()
        {
            
            $data_source = new DataSource();
            $sql =" SELECT * FROM `reservacion` ORDER BY `reservacion`.`idreservacion` DESC LIMIT 1";
            //echo $sql;
            $data_table = $data_source->ejecutarConsulta($sql);
          
            return $data_table[0]['idreservacion'];
        }
    }
?>