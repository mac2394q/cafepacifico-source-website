<?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
    require_once(PDO_PATH.'reservacionDao.php');
    require_once(PDO_PATH.'usuarioDao.php');
    require_once(MODEL_PATH.'reservacion.php');
    class reservacionController{
        
      
        public static function registrarReservacion($modelReservacion){
            return reservacionDao::registrarReservacion($modelReservacion);
        }
        public static function editarReservacion($modelReservacion){
            return reservacionDao::editarReservacion($modelReservacion);
        }
        public static function editarCampo($idReservacion,$campo,$registro){
            return reservacionDao::editarCampo($idReservacion,$campo,$registro);
        }
        public static function reservacionId($idReservacion){
            return reservacionDao::reservacionId($idReservacion);
        }
        public static function usuarioIdReservacion($idusuario){
            return reservacionDao::usuarioIdReservacion($idusuario);
        }
        public static function ultimaReservacionRegistrada(){
            return reservacionDao::ultimaReservacionRegistrada();
        }
        public static function reservacionIdDateTime($fecha,$hora){
            return reservacionDao::reservacionIdDateTime($fecha,$hora);
        }
        public static function listadoReservacion(){
           $data=reservacionDao::listadoReservacion();
           
           if($data!= false){
            echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                            role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                        <thead>
                            <tr role='row'>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Acciones
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Fecha
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Hora
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Servicio
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Evento
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Personas
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Cliente
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Estado
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr class='group'>
                              <td colspan='8'>
                                <h6 class='mb-0'>Ultima actualizacion del listado: 
                                      <span class='text-bold-600'>".date("d")."-".date("m")."-".date("Y")."</span> - 
                                      <span class='text-bold-600'>".date("g")." : ".date("i")."</span>
                                 </h6>
                              </td>
                            </tr>";
                            foreach ($data as $key => $value) {
                            echo"
                            <tr role='row' class='even'>
                                <td class='reorder sorting_1'><a href='verFicha.php?id=".$data[$key]->getId_reservacion()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                                <td class='reorder sorting_1'>
                                  ".$data[$key]->getFecha_reserva()."
                                </td>
                                <td class='reorder sorting_1'>
                                ".$data[$key]->getHora_reserva()."
                                </td>
                                <td class='reorder sorting_1'>
                                ".$data[$key]->getTipo_servicio()."
                                </td>
                                <td class='reorder sorting_1'>
                                ".$data[$key]->getTipo()."
                                </td>
                                <td class='reorder sorting_1'>
                                ".$data[$key]->getNpersonas()."
                                </td>
                                <td class='reorder sorting_1'>
                                ".usuarioDao::usuarioId($data[$key]->getId_usuario())->getNombre()."
                                </td>";
                                if($data[$key]->getEstado() == "PROGRAMADA"){
                                echo "  <td class='reorder sorting_1'>
                                            <span class='badge badge-info'>PROGRAMADA</span>
                                        </td>";
                                }else{
                                echo "  <td class='reorder sorting_1'>
                                            <span class='badge badge-success'>CONFIRMADA</span>
                                        </td>";
                                }
                                echo "
                                
                            </tr>";
                            
                            }
                            echo"
                        </tbody>
                    </table>";
            }else{
            
          echo "
                <div class='bs-callout-pink callout-square callout-transparent mt-1'>
                    <div class='media align-items-stretch'>
                        <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                            <i class='fa fa-exclamation-triangle text-white'></i>
                        </div>
                        <div class='media-body p-1'>
                            <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay empresas registradas con la consulta anterior</p>
                        </div>
                    </div>
                </div>
                ";
            }
        }

        public static function listadoReservacion2($idusuario){
            $data=reservacionDao::listadoReservacion2($idusuario);
            
            if($data!= false){
             echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                             role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                         <thead>
                             <tr role='row'>
                                 <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Acciones
                                 </th>
                                 <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Fecha
                                 </th>
                                 <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Hora
                                 </th>
                                 <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Servicio
                                 </th>
                                 <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Evento
                                 </th>
                                 <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Personas
                                 </th>
                                 <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Cliente
                                 </th>
                                 <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Estado
                                 </th>
                                 
                             </tr>
                         </thead>
                         <tbody>
                             <tr class='group'>
                               <td colspan='8'>
                                 <h6 class='mb-0'>Ultima actualizacion del listado: 
                                       <span class='text-bold-600'>".date("d")."-".date("m")."-".date("Y")."</span> - 
                                       <span class='text-bold-600'>".date("g")." : ".date("i")."</span>
                                  </h6>
                               </td>
                             </tr>";
                             foreach ($data as $key => $value) {
                             echo"
                             <tr role='row' class='even'>
                                 <td class='reorder sorting_1'><a href='verFicha.php?id=".$data[$key]->getId_reservacion()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                                 <td class='reorder sorting_1'>
                                   ".$data[$key]->getFecha_reserva()."
                                 </td>
                                 <td class='reorder sorting_1'>
                                 ".$data[$key]->getHora_reserva()."
                                 </td>
                                 <td class='reorder sorting_1'>
                                 ".$data[$key]->getTipo_servicio()."
                                 </td>
                                 <td class='reorder sorting_1'>
                                 ".$data[$key]->getTipo()."
                                 </td>
                                 <td class='reorder sorting_1'>
                                 ".$data[$key]->getNpersonas()."
                                 </td>
                                 <td class='reorder sorting_1'>
                                 ".usuarioDao::usuarioId($data[$key]->getId_usuario())->getNombre()."
                                 </td>";
                                 if($data[$key]->getEstado() == "PROGRAMADA"){
                                 echo "  <td class='reorder sorting_1'>
                                             <span class='badge badge-info'>PROGRAMADA</span>
                                         </td>";
                                 }else{
                                 echo "  <td class='reorder sorting_1'>
                                             <span class='badge badge-success'>CONFIRMADA</span>
                                         </td>";
                                 }
                                 echo "
                                 
                             </tr>";
                             
                             }
                             echo"
                         </tbody>
                     </table>";
             }else{
             
           echo "
                 <div class='bs-callout-pink callout-square callout-transparent mt-1'>
                     <div class='media align-items-stretch'>
                         <div class='media-left media-middle bg-pink callout-arrow-left position-relative p-2'>
                             <i class='fa fa-exclamation-triangle text-white'></i>
                         </div>
                         <div class='media-body p-1'>
                             <strong>UPS tenemos un problema!!</strong> <p>Actualmente no hay empresas registradas con la consulta anterior</p>
                         </div>
                     </div>
                 </div>
                 ";
             }
         }
        public static  function disponibilidadReservacion($servicio,$fecha,$hora){
            if($servicio == "hc"){
                $hora = date("H:i",strtotime($hora." PM")).":00";
               
            }else{
                $hora = $hora.":00";
            }
            return reservacionDao::disponibilidadReservacion($fecha,$hora);
        }
        public static function verificacionDisponibilidadReserva($servicio,$fecha,$hora){
            $array1 = array("12:00" ,"12:15" ,"12:30" ,"12:45" ,"1:00" ,"1:15" ,"1:30" ,"1:45"  ,"2:00" ,"2:15"  ,"2:30" ,"2:45" );
            $array2 = array("6:00" ,"6:15"  ,"6:30" ,"6:45"  ,"7:00" ,"7:15" ,"7:30" ,"7:45"  ,"8:00" ,"8:15"  ,"8:30" ,"8:45"  );
            $arrayReservaciones = reservacionDao::cargarHorariosDisponibles($fecha,$servicio);
            $arrayReservacion = null;
            $div ="";
            $id= "";
            if($servicio == "ha"){ 
                $arrayReservacion=$array1;
                $div ="almuerzoDiv";
                $id= "ha";
            }else{
                $arrayReservacion=$array2;
                $div ="cenaDiv";
                $id= "hc";
            }
            if($arrayReservaciones != false){
                
                
                echo "
                        <label>Horarios:</label>
                        <select id='".$id."' name='".$id."'>";
                for ($i=0; $i < sizeof($arrayReservacion); $i++) { 
                    $c = 0;
                    $hora=0;
                    foreach ($arrayReservaciones as $key2 => $value) { 
                       
                        if($servicio == "hc"){
                            $hora = date("H:i",strtotime($arrayReservacion[$i]." PM"));
                            if($hora.":00" ==  $arrayReservaciones[$key2]->getHora_reserva()){ $c++;}
                        
                        }else{
                            if($arrayReservacion[$i].":00" ==  $arrayReservaciones[$key2]->getHora_reserva()){$c++;}
                        }
                        //echo $hora.":00 - ".$arrayReservaciones[$key2]->getHora_reserva()."<br><br>";
                    }
                    echo "contador ".$c;
                        if(intval($c) > 0){
                            echo "<option disabled value='".$arrayReservacion[$i]."' class='nodisponible'>".$arrayReservacion[$i]."</option>";
                        }else{
                            echo "<option value='".$arrayReservacion[$i]."'>".$arrayReservacion[$i]."</option>";
                        }  
                    
                }
                echo "   </select>";
            }else{
                echo "
                        <label>Horarios:</label>
                        <select id='".$id."' name='".$id."'>";
                for ($i=0; $i <sizeof($arrayReservacion) ; $i++) { 
                    echo "<option value='".$arrayReservacion[$i]."'>".$arrayReservacion[$i]."</option>";
                }
                echo "   </select>";
            }
        }
    }
?>