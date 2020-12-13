<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(MODEL_PATH."contacto.php");
require_once(PDO_PATH."contactoDao.php");

    class contactoController{

        
        public static function contactoId($idcontacto){
            return contactoDao::contactoId($idcontacto);
        }

        public static function editarContacto($modelcontacto){
            return contactoDao::editarContacto($modelcontacto);
        }

        public static function listadoContacto(){
            $objEmpresa= contactoDao::listadoContacto();

            if($objEmpresa!= false){
                echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                                role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                            <thead>
                                <tr role='row'>
                                    <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                                    </th>
                                    <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  nombre
                                    </th>
                                    <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  asunto
                                    </th>
                                    <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Hora
                                    </th>
                                    <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Fecha
                                    </th>
                                    <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li> Estado
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
                                foreach ($objEmpresa as $key => $value) {
                                    
                                echo"
                                
                                <tr role='row' class='even'>
                                    <td class='reorder sorting_1'><a href='verFicha.php?id=".$objEmpresa[$key]->getId_contacto()."' class='dropdown-item'><i class='fa fa-envelope-open-text fa-2x'></i> </a></td>
                                    
                                    <td class='reorder sorting_1'>
                                    <a href='verFicha.php?id=".$objEmpresa[$key]->getId_contacto()."' class='dropdown-item'>".$objEmpresa[$key]->getNombre_contacto()."</a>
                                    </td>
                                    <td class='reorder sorting_1'>
                                    ".$objEmpresa[$key]->getAsunto()."
                                    </td>
                                    <td class='reorder sorting_1'>
                                    ".$objEmpresa[$key]->getHora()."
                                    </td>
                                    <td class='reorder sorting_1'>
                                    ".$objEmpresa[$key]->getFecha()."
                                    </td>
                                    
                                    <td class='reorder sorting_1'>
                                        <span class='badge badge-default badge-success'>Entregado</span>
                                    </td>
                                    
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

        public static function registrarContacto($modelcontacto){
            return contactoDao::registrarContacto($modelcontacto);
        }
    }

?>