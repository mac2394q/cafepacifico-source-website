<?php



include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once(MODEL_PATH."blog.php");

require_once(MODEL_PATH."comentarios.php");

require_once(PDO_PATH."blogDao.php");

require_once(PDO_PATH."usuarioDao.php");
    class blogController{
        
        public static function editarBlogSub($id, $sub){
            return blogDao::editarBlogSub($id,$sub);
        }

        public static function blogIdSub($id){
            return blogDao::blogIdSub($id);
        }

        public static function blogId($idblog){
            return blogDao::blogId($idblog);
        }
        public static function ultimoBlog(){
            return blogDao::ultimoBlog();
        }
        public static function editarBlog($modelblog){
            return blogDao::editarBlog($modelblog);
        }
        public static function comentariosPost($idblog){
            $objEmpresa=blogDao::listadoComentariosBlog($idblog);
            if($objEmpresa != false){

            
            foreach ($objEmpresa as $key => $value) {
                $img = DOCUMENTS_SERVER."blog/".$objEmpresa[$key]->getId_blog()."/introduccion.jpg";
                $url = WEB_SERVER."modules/blog/verFicha.php?id=".$objEmpresa[$key]->getId_blog();
                $objUsuario = usuarioDao::usuarioId($objEmpresa[$key]->getId_usuario());

            echo "
           
            <div class='blog-comment'>
                            
                            <div class='comment-text overflow-hidden position-relative'>
                                <p class='blog-date no-padding-top'>".$objUsuario->getNombre()." ".$objUsuario->getApellido().", ".$objEmpresa[$key]->getFecha_comentario()." - ".$objEmpresa[$key]->getHora_comentario()." <span
                                href='#addcomment' class='comment-reply inner-link'>Reply</span></p>
                                <p class='text-justify'>".$objEmpresa[$key]->getEstructura().".</p>
                            </div>
                         
            </div>
            ";
            
                # code...
            }

        }else{
            echo "
            <div class='alert alert-warning' role='alert'>
                <i class='icon-caution'></i>
                <span><strong>Ohs!</strong> No hay comentarios en el pos.</span>
             </div>";

        }

        }

        public static function ultimosPost(){
            $objEmpresa=blogDao::ultimosPost();
            foreach ($objEmpresa as $key => $value) {
                $img = DOCUMENTS_SERVER."blog/".$objEmpresa[$key]->getId_blog()."/introduccion.jpg";
                $url = WEB_SERVER."modules/blog/verFicha.php?id=".$objEmpresa[$key]->getId_blog();
                $objUsuario = usuarioDao::usuarioId($objEmpresa[$key]->getId_usuario());

            echo "
            <li class='clearfix'>
                <div class='widget-posts-details'>
                    <a href='".$url."'>".$objEmpresa[$key]->getT_principal()."</a> ".$objUsuario->getNombre().$objUsuario->getApellido()." - ".$objEmpresa[$key]->getF_publicacion()."
                </div>
            </li>
            ";
            
                # code...
            }
        }

        public static function ultimosComentarios(){
            $objEmpresa=blogDao::ultimosComentarios();
            foreach ($objEmpresa as $key => $value) {
                
                $url = WEB_SERVER."modules/blog/verFicha.php?id=".$objEmpresa[$key]->getId_blog();
                $objUsuario = usuarioDao::usuarioId($objEmpresa[$key]->getId_usuario());
                $objBlog = blogDao::blogId($objEmpresa[$key]->getId_blog());
                $contenido = $objEmpresa[$key]->getEstructura();
                $comentario= "";
                
                if(strlen($contenido)>=100){
                    $comentario = substr($contenido, 0, 99);
                }else{
                    $comentario=$contenido;
                }
            echo "
            <li class='clearfix'>
                <div class='widget-posts-details'>
                    <a href='".$url."'>".$objBlog->getT_principal()."</a> ".$objUsuario->getNombre().$objUsuario->getApellido()." - ".$objBlog->getF_publicacion()."<br>
                    ".$comentario."
                </div>
            </li>
            ";
            
                # code...
            }
        }



        public static function listadoBlogWeb(){
            $objEmpresa=blogDao::listadoBlog();
            foreach ($objEmpresa as $key => $value) {
                $img = DOCUMENTS_SERVER."blog/".$objEmpresa[$key]->getId_blog()."/introduccion.jpg";
                $url = WEB_SERVER."modules/blog/verFicha.php?id=".$objEmpresa[$key]->getId_blog();
            echo "
            <div class='col-md-4  blog-listing wow fadeInUp animated' data-wow-duration='300ms' style='visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;'>
                <div class='blog-image'><a href='".$url."'><img src='".$img."' alt='' height='225' width='400'></a></div>
                <div class='blog-details'>
                    <div class='blog-date'><a href='".$url."'>".usuarioDao::usuarioId($objEmpresa[$key]->getId_usuario())->getNombre()."</a> | ".$objEmpresa[$key]->getF_publicacion()."</div>
                    <div class='blog-title'><a href='".$url."'>".$objEmpresa[$key]->getT_principal()."</a></div>
                    <div class='blog-short-description text-justify'>".$objEmpresa[$key]->getIntroduccion().".</div>
                    <div class='separator-line bg-black no-margin-lr'></div>
                    <div>
                        <a href='https://www.facebook.com/#' class='blog-like'><i class='fa fa-heart-o'></i>Likes</a>
                        <a href='https://www.facebook.com/#' class='blog-share'><i class='fa fa-share-alt'></i>Share</a>
                        <a href='#' class='comment'><i class='fa fa-comment-o'></i>".blogDao::ncomentarios($objEmpresa[$key]->getId_blog()) ."</a></div>
                </div>
            </div>";
            
                # code...
            }
        }
        public static function listadoBlog(){
            $objEmpresa=blogDao::listadoBlog();
            //print_r($objEmpresa);
            if($objEmpresa!= false){
            echo   "<table id='project-task-list' class='table table-responsive-md table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable'
                            role='grid' aria-describedby='project-task-list_info' style='position: relative;'>
                        <thead>
                            <tr role='row'>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-cog'></li>  Ver


                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-money-check'></li>  Titulo


                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-globe'></li>  Fecha de publicacion


                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Hora


                                </th>
                                <th class='sorting_disabled' rowspan='1' colspan='1' ><li class='fa fa-chart-line'></li>  Publicador


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
                                <td class='reorder sorting_1'><a href='verFicha.php?id=".$objEmpresa[$key]->getId_blog()."' class='dropdown-item'><i class='fa fa-book-open fa-2x'></i> </a></td>
                                
                                <td class='reorder sorting_1'>
                                <a href='verFicha.php?id=".$objEmpresa[$key]->getId_blog()."' class='dropdown-item'>".$objEmpresa[$key]->getT_principal()."</a>
                                </td>
                                <td class='reorder sorting_1'>
                                ".$objEmpresa[$key]->getF_publicacion()."
                                </td>
                                <td class='reorder sorting_1'>
                                ".$objEmpresa[$key]->getH_publicacion()."
                                </td>
                                <td class='reorder sorting_1'>
                                ".usuarioDao::usuarioId($objEmpresa[$key]->getId_usuario())->getNombre()."
                                </td>
                                <td class='reorder sorting_1'>
                                    <span class='badge badge-default badge-success'>Publicado</span>
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
        public static function consultarListadoBlog($consulta){
            return blogDao::consultarListadoBlog($consulta);
        }
        public static function registrarBlog($modelblog){
            return blogDao::registrarBlog($modelblog);
        }
        public static function registrarComentario($modelcomentario){
            return blogDao::registrarComentario($modelcomentario);
        }
        public static function editarComentario($modelcomentario){
            return blogDao::editarComentario($modelcomentario);
        }
        public static function blogIdUser($blog){
            return blogDao::blogIdUser($blog);
        }
        public static function listadoBlogLimit(){
           return blogDao::listadoBlogLimit();
        }

        public static function listadoGaleriaLimit(){
            return blogDao::listadoGaleriaLimit();
         }
 

        public static function blogFecha(){
            return blogDao::blogFecha();
        }

        public static function blogNFecha(){
        return blogDao::blogNFecha();
        }
    }
?>