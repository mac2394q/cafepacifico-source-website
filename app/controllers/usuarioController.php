<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(MODEL_PATH."usuario.php");
require_once(PDO_PATH."usuarioDao.php");
    class usuarioController{
        public static function index(){
            echo  "<script>window.location.replace('".PLATFORM_SERVER."index.php');</script> ";
         }
        public static function validarSesion($usuario,$clave){
            return usuarioDao::validarSesion($usuario,$clave);
        }
        
        public static function usuarioIdBlog($idblog){
            return usuarioDao::usuarioIdBlog($idblog);
        }
        public static function usuarioId($idusuario){
            return usuarioDao::usuarioId($idusuario);
        }
        public static function editarUsuario($modelusuario){
            return usuarioDao::editarUsuario($modelusuario);
        }
        public static function listadoUsuario(){
            $data= usuarioDao::listadoUsuario();
            if($data){
            }else{
                
            }
        }
        public static function consultarListadoUsuario($consulta){
            return usuarioDao::consultarListadoUsuario($consulta);
        }
        public static function registrarUsuario($modelUsuario){
            return usuarioDao::registrarUsuario($modelUsuario);
        }
        public static function ultimoUsuarioRegistrado(){
            return usuarioDao::ultimoUsuarioRegistrado();
        }
        public static function usuarioIdUser($usuario){
            return usuarioDao::usuarioIdUser($usuario);
        }
        public static function listadoUsuarios(){
            $objEmpresa= usuarioDao::listadoUsuario();
            if($objEmpresa!= false){
                echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                                role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                            <thead>
                                <tr role='row'>
                                    <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver
                                    </th>
                                    <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Nombre usuario
                                    </th>
                                    <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Tipo de usuario
                                    </th>
                                    <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  E-mail
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
                                    <td class='reorder sorting_1'><a href='verFicha.php?id=".$objEmpresa[$key]->getId_usuario()."' class='dropdown-item'><i class='fa fa-eye fa-2x'></i> </a></td>
                                    
                                    <td class='reorder sorting_1'>
                                    ".$objEmpresa[$key]->getNombre." ".$objEmpresa[$key]->getApellido()."
                                    </td>
                                    <td class='reorder sorting_1'>
                                    ".$objEmpresa[$key]->getTipo_usuario()."
                                    </td>
                                    <td class='reorder sorting_1'>
                                    ".$objEmpresa[$key]->getEmail()."
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
    }
?>