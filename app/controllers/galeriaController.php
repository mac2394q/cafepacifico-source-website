<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(MODEL_PATH."blog.php");
require_once(MODEL_PATH."comentarios.php");
require_once(PDO_PATH."blogDao.php");
require_once(PDO_PATH."usuarioDao.php");


    class galeriaController{
        
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
        public static function listadoGalerias(){
            $objEmpresa=blogDao::listadoGalerias();
            //print_r($objEmpresa);
            if($objEmpresa!= false){
            
            foreach ($objEmpresa as $key => $value) {
                # code...
            $url = WEB_SERVER."modules/galeria/verFicha.php?id=".$objEmpresa[$key]->getId_blog();
            $portada = DOCUMENTS_SERVER."galeria/".$objEmpresa[$key]->getId_blog()."/portada.jpg";
            echo   "
            
            <section class='portfolio-short-description no-padding-bottom'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-md-12'>";

                        echo    '<div class="portfolio-short-description-bg pull-left"
                                    style="background-image:url('.$portada.');"  >';

                                echo    "
                                    <figure class='pull-right wow fadeInRight animated'
                                        style='visibility: visible; animation-name: fadeInRight;'>
                                        <figcaption>
                                            <div class='separator-line bg-yellow no-margin-lr margin-ten no-margin-top'>
                                            </div>
                                            <h3 class='white-text'>".$objEmpresa[$key]->getT_principal()."</h3>
                                            <br>
                                            <p class='light-gray-text text-justify'>".$objEmpresa[$key]->getContenido().".</p>
                                            <a href='".$url."'
                                                class='btn-small-white-background btn margin-ten no-margin-bottom'>Ver galeria</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            
            ";
            }
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


        public static function verGalerias($idElemento){
            $objEmpresa=blogDao::blogId($idElemento);
            //print_r($objEmpresa);
            
            
            
                # code...
            $url = WEB_SERVER."modules/galeria/verFicha.php?id=".$objEmpresa->getId_blog();
            $portada = DOCUMENTS_SERVER."galeria/".$objEmpresa->getId_blog()."/portada.jpg";
            $numeroFotos = $objEmpresa->getSubtitulo();
            $urlFoto =DOCUMENTS_SERVER."galeria/".$objEmpresa->getId_blog()."/";
            
            if($numeroFotos > 0){
            echo "<div class='row lightbox-gallery'>";
            for ($i=1; $i <= intval($numeroFotos) ; $i++) { 
             
            
            echo   "
            
                    <div class='col-md-2 col-sm-6 wow fadeIn animated'
                        style='visibility: visible; animation-name: fadeIn;'>

                        <a href='".$urlFoto.$i.".jpg'><img src='".$urlFoto.$i.".jpg' alt=''
                                class='project-img-gallery' height='180' width='204'></a>
                    </div>

                    
            
            ";
            }
            echo "</div>";


            
            }else{
            
            echo "
            <div class='alert alert-warning' role='alert'>
                <i class='icon-caution'></i>
                <span><strong>ups !</strong> actualmente no hay fotos en esta galeria.</span>
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
    }
?>