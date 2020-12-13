<?php session_start(); 
include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
$idioma="";
$leyenda="";
if(strcmp($_SESSION['idioma'],"ESPAÑOL")== 0){
  $idioma="<i class='flag-icon flag-icon-co'></i>";
  $leyenda ="<i class='flag-icon flag-icon-co'></i>   ESPAÑOL LATINO AMERICA.";
}else{
  $idioma="<i class='flag-icon flag-icon-gb'></i>";
  $leyenda ="<i class='flag-icon flag-icon-gb'></i>   INGLES.";
}
?>
<nav
  class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-header expanded">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-lg-none mr-auto"><a
            class="nav-link nav-menu-main menu-toggle hidden-xs is-active" href="#"><i
              class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item mr-auto">
          <a class="navbar-brand" href="<?php echo INDEX_PLATFORM_PATH; ?>">
            <h3 class="brand-text"><i class="fa fa-sign"></i>&nbsp;CAFE PACIFICO </h3>
          </a>
        </li>
        <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0"
            data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white"
              data-ticon="ft-toggle-right"></i></a></li>
        <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
            data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
      </ul>
    </div>
    <div class="navbar-container content">
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#">
              <i class="ficon ft-maximize"></i></a>
          </li>
          <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="#"
              data-toggle="dropdown">Herramientas</a>
            <ul class="mega-dropdown-menu dropdown-menu row">
              <li class="col-md-3">
                <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-mail-bulk"></i> Plataforma Cafe pacifico
                </h6>
                <div id="mega-menu-carousel-example">
                  <div>
                    <img class="rounded img-fluid mb-1" src="http://cafepacifico.ml/vendor/cafepacifico/logo.png"
                      alt="First slide">
                    <p class="news-title mb-0 d-block"> <i class="fa fa-signal"></i> ONLINE</p>
                    <p class="news-content">
                      <span class="font-small-2"> <br><i class="fa fa-globe"></i> <?php echo "<span class='text-bold-600'>".date("d")."-".date("m")."-".date("Y")."</span> - 
                        <span class='text-bold-600'>".date("g")." : ".date("i")."</span>"; ?>
                      </span>
                    </p>
                  </div>
                </div>
              </li>
              <li class="col-md-3">
                <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-life-ring"></i> HELP DESK</h6>
                <ul>
                  <li class="menu-list">
                    <ul>
                      <li><a class="dropdown-item" href="<?php echo MODULE_APP_SERVER."panel/soporte.php";?>"><i class="fa fa-info-circle"></i> Soporte
                          tecnico</a>
                      </li>
                      <li><a class="dropdown-item" href="<?php echo MODULE_APP_SERVER."panel/ayuda.php";?>"><i class="fa fa-headset"></i> Ayuda
                          & FAQ
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="col-md-3">
                <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-link"></i> Enlaces </h6>
                <ul>
                  <li class="menu-list">
                    <ul>
                      <li><a class="dropdown-item" target="_blank" href="https://sanctionssearch.ofac.treas.gov/"><i
                            class="fa fa-external-link-alt"></i> LISTA CLINTON </a>
                      </li>
                      <li><a class="dropdown-item" target="_blank"
                          href="https://eris.contaduria.gov.co/BDME/#FormularioConsulta"><i
                            class="fa fa-external-link-alt"></i> BOLETÍN DE DEUDORES MOROSOS DEL ESTADO
                        </a></li>
                      <li><a class="dropdown-item" target="_blank"
                          href="https://www.procuraduria.gov.co/portal/consulta_antecedentes.page"><i
                            class="fa fa-external-link-alt"></i> PROCURADURÍA GENERAL DE LA NACIÓN</a>
                      </li>
                      <li><a class="dropdown-item" target="_blank"
                          href="https://antecedentes.policia.gov.co:7005/WebJudicial/"><i
                            class="fa fa-external-link-alt"></i> ANTECENDENTES JUDICIALES</a>
                      </li>
                      <li><a class="dropdown-item" target="_blank"
                          href="http://versionanterior.rues.org.co/RUES_Web/Consultas"><i
                            class="fa fa-external-link-alt"></i> RUE</a>
                      </li>
                      <li><a class="dropdown-item" target="_blank"
                          href="https://consulta.simit.org.co/Simit/index.html"><i class="fa fa-external-link-alt"></i>
                          SIMIT</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            
            </ul>
          </li>
          
          
        </ul>
        <ul class="nav navbar-nav float-right">
        <li class="dropdown dropdown-language  nav-item ">
            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="http://cafepacifico.ml/" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
             Regresar sitio web Cafe pacifico
            </a>
            
          </li>
          <li class="dropdown dropdown-language  nav-item ">
            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <?php echo $idioma; ?><span class="selected-language">IDIOMA</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
              <a class="dropdown-item" href="#"><?php echo $leyenda; ?> </a>
            </div>
          </li>
         
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <span class="mr-1">Hola ,<span
                  class="mr-1 user-name text-bold-700"><?php echo $_SESSION['nombre'];?></span></span>
              <span class="avatar avatar-online"><img
                  src="data:image/jpeg;base64,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"
                  alt="avatar">
                <i></i>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="<?php echo MODULE_APP_SERVER."usuarios/verFicha.php?id=".$_SESSION['idsesion'];?>"><i class="ft-user"></i> Editar mi perfil</a>
              
              <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo PLATFORM_SERVER."modules/sesion/core/cerrarSesion.php";  ?>"><i class="ft-power"></i> Cerrar
                sesion</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
