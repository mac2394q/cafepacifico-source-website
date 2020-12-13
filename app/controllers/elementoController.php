<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(MODEL_PATH."elemento.php");
require_once(PDO_PATH."elementoDao.php");
    class elementoController{
        
        public static function elementoId($idelemento){
            return elementoDao::elementoId($idelemento);
        }
        public static function ultimoElemento(){
            return elementoDao::ultimoElemento();
        }
        public static function editarElemento($modelelemento){
            return elementoDao::editarElemento($modelelemento);
        }
        public static function listadoElemento(){
            $data= elementoDao::listadoElemento();
            if($data){
            }else{
                
            }
        }
        public static function registrarElemento($modelelemento){
            return elementoDao::registrarElemento($modelelemento);
        }  



        public static function listadoElementos(){
            $objEmpresa=elementoDao::listadoelemento();
            //print_r($objEmpresa);
            if($objEmpresa!= false){
            echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                            role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                        <thead>
                            <tr role='row'>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Nombre
                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  precio
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
                            foreach ($objEmpresa as $key => $value) {
                                $id=$objEmpresa[$key]->getId_elemento();
                                $rutaImagen=DOCUMENTS_SERVER."fotosElementos/".$id."/".$id.".jpg";
                            echo"
                            
                            <tr role='row' class='even'>
                                <td class='reorder sorting_1'><a href='verFicha.php?id=".$objEmpresa[$key]->getId_elemento()."' class='dropdown-item'><img style='border-radius: 40px 40px;'src='". $rutaImagen."' width='80' height='80' /> </a></td>
                                <td class='reorder sorting_1'>
                                <a href='verFicha.php?id=".$objEmpresa[$key]->getId_elemento()."' class='dropdown-item'>".$objEmpresa[$key]->getNombre_producto()."</a>
                                </td>
                                <td class='reorder sorting_1'>
                                ".$objEmpresa[$key]->getPrecio()."
                                </td>
                                <td class='reorder sorting_1'>
                                    <span class='badge badge-default badge-success'>ACTIVO</span>
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



        public static function listadoElementos2(){
            $objEmpresa=elementoDao::listadoelemento();
            //print_r($objEmpresa);
            if($objEmpresa!= false){
            echo   "
            <div class='row blog-masonry blog-masonry-4col no-transition'
                style='position: relative; height: 1988.42px;'>
            "; 
                            $con = 1;
                            $var ="";
                            foreach ($objEmpresa as $key => $value) {
                                $id=$objEmpresa[$key]->getId_elemento();
                                $rutaImagen=DOCUMENTS_SERVER."fotosElementos/".$id."/".$id.".jpg";
                                //<div class='blog-short-description text-justify'>".$objEmpresa[$key]->getDescripcion()."</div>

                            switch ($con) {
                                case '1':
                                    $var ="0px";
                                break;

                                case '2':
                                    $var ="295px";
                                break;

                                case '3':
                                    $var ="591px";
                                break;

                                case '4':
                                    $var ="887px";
                                    $con = 1;
                                break;
                                
                                
                            }
                            echo"
                            <div class='col-md-3 col-sm-6 col-xs-6 blog-listing' style='position: absolute; left: ". $var."; top: 0px;'>
                                <div class='blog-image'><a href='verProducto.php?id=".$id."'><img src='$rutaImagen'
                                            alt=''></a></div>
                                <div class='blog-details'>
                                    
                                    <div class='blog-title'><a href='verProducto.php?id=".$id."'>".$objEmpresa[$key]->getNombre_producto()."</a></div>
                                    <div class='blog-date'> | Precio $".$objEmpresa[$key]->getPrecio()." |
                                    </div>
                                    
                                    <div class='separator-line bg-black no-margin-lr'></div>
                                    
                                </div>
                            </div>
                            
                           ";
                            
                            }
                            echo"
                </div>";
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
    }
?>