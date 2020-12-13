<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."empresa.php");
require_once(MODEL_PATH."area.php");
require_once(MODEL_PATH."certificado.php");
require_once(MODEL_PATH."auditoria.php");

class auditoriaDao
{
    public static function listadoSimpleAuditorias($filtro,$tipo,$estado,$consulta)
    {
        $status ="";
         switch ($filtro) {
            case 'az':
            $status = "order by empresa.nombre_empresa ASC";
            break;
            case 'za':
            $status = "order by empresa.nombre_empresa  DESC";
            break;
            case 'fe':
            $status = "order by auditoria.fecha_programada_auditoria desc";
            break;
         }
         switch ($estado) {
            case 'te':
            $type =" ";
            break;
            
            case 'PRO01':
            $type ="where estado_auditoria = PRO01 ";
            break;
      
            case 'PRO010':
            $type ="where estado_auditoria = PRO010 ";
            break;
            case 'PRO02':
            $type ="where estado_auditoria = PRO02 ";
            break;
            case 'PRO11':
            $type ="where estado_auditoria = PRO11 ";
            break;
            case 'PRO12':
            $type ="where estado_auditoria = PRO12 ";
            break;
            case 'PRO121':
            $type ="where estado_auditoria = PRO121 ";
            break;
            case 'PRO13':
            $type ="where estado_auditoria = PRO13 ";
            break;
            case 'PRO14':
            $type ="where estado_auditoria = PRO14 ";
            break;
        }
        if(is_null($consulta)){
            $busqueda =" ";
        }elseif(!is_null($consulta) && strcmp($type," ")!==0){
            $busqueda="AND  (	nombre_empresa LIKE  '%".$consulta."%' or representante_legal_empresa LIKE  '%".$consulta."%' or  representante_sistema_gestion LIKE  '%".$consulta."%') or  nit_empresa LIKE  '%".$consulta."%' or  fecha_programada_auditoria LIKE  '%".$consulta."%'  ) ";
        }elseif(strcmp($type," ")===0){
            $busqueda="where  (	nombre_empresa LIKE  '%".$consulta."%' or representante_legal_empresa LIKE  '%".$consulta."%' or  representante_sistema_gestion LIKE  '%".$consulta."%') or  nit_empresa LIKE  '%".$consulta."%' or  fecha_programada_auditoria LIKE  '%".$consulta."%'  ) ";
        }
        
        $data_source = new DataSource();
        //.$type." ".$busqueda." ".$status
        $sql ="
        select * from auditoria join empresa as e1 on(auditoria.idempresa_ancla_auditoria=e1.idempresarial) join empresa as e2 on(auditoria.idempresa_asociada_auditoria=e2.idempresarial) ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"]
                );
                array_push($arrayAuditoria,$objAuditoria);
            }
            return $arrayAuditoria;
        }else{
            return false;
        }
    }


    public static function auditoriasCalendarioVerificacion($fecha)
    {
        $array = explode("-",$fecha);
        //print_r($array);
        //print_r(explode('-', $fecha));
        $dias=0;
        switch ( $array[1]) {
                case '1':
                $dias = 31;
                break;
                case '2':
                $dias = 28;
                break;
                case '3':
                $dias = 31;
                break;
                case '4':
                $dias = 30;
                break;
                case '5':
                $dias = 31;
                break;
                case '6':
                $dias = 30;
                break;
                case '7':
                $dias = 31;
                break;
                case '8':
                $dias = 31;
                break;
                case '9':
                $dias = 30;
                break;
                case '10':
                $dias = 31;
                break;
                case '11':
                $dias = 30;
                break;
                case '12':
                $dias = 31;
                break;
                
                
        }
        $fechai = $array[0]."-".$array[1]."-1";
        $fechaf = $array[0]."-".$array[1]."-31";
        $data_source = new DataSource();
        $sql =" SELECT * FROM `auditoria` WHERE auditoria.fecha_programada_auditoria BETWEEN '".$fechai."' and '".$fechaf."' ORDER BY `auditoria`.`fecha_programada_auditoria` ASC ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayAuditoria=array();
           
            foreach ($data_table as $key => $value) {
                
                $objAuditoria = new auditoria(
                    $data_table[$key]["idauditoria"],
                    $data_table[$key]["idempresa_ancla_auditoria"],
                    $data_table[$key]["idempresa_asociada_auditoria"],
                    $data_table[$key]["idsede_auditoria"],
                    $data_table[$key]["fecha_programada_auditoria"],
                    $data_table[$key]["fecha_cierre_auditoria"],
                    $data_table[$key]["idusuario_auditoria"],
                    $data_table[$key]["idplantilla_madre_auditoria"],
                    $data_table[$key]["idusuario_crea_auditoria"],
                    $data_table[$key]["estado_auditoria"]
                );
                array_push($arrayAuditoria,$objAuditoria);
            }
            return $arrayAuditoria;
        }else{
           
      }
   }  


    public static function auditoriaId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `auditoria` where idauditoria = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objEmpresa = new auditoria(
                    $data_table[0]["idauditoria"],
                    $data_table[0]["idempresa_ancla_auditoria"],
                    $data_table[0]["idempresa_asociada_auditoria"],
                    $data_table[0]["idsede_auditoria"],
                    $data_table[0]["fecha_programada_auditoria"],
                    $data_table[0]["fecha_cierre_auditoria"],
                    $data_table[0]["idusuario_auditoria"],
                    $data_table[0]["idplantilla_madre_auditoria"],
                    $data_table[0]["idusuario_crea_auditoria"],
                    $data_table[0]["estado_auditoria"]
        );
        
        return $objEmpresa ;
    }
    public static function crearEmpresa(empresa $empresa)
    {
        $data_source = new DataSource();
        $sql2 = "INSERT INTO empresa VALUES (
            null,
            :idgrupo_empresarial,
            :nombre_empresa,
            :nit_empresa,
            :ciudad_principal_empresa,
            :departamento_empresa,
            :direccion_empresa,
            :pais_empresa,
            :correo_empresa,
            :idarea_tecnica_empresa,
            :representante_legal_empresa,
            :cargo_representante_empresa,
            :telefono_movil_representante_empresa,
            :sitio_web_empresa,
            :fecha_corte_facturacion_empresa,
            :correo_facturacion_empresa,
            null,
            1,
            :representante_sistema_gestion,
            :cargo_representante_sistema_gestion_empresa,
            :telefono_movil_representante_sistema_gestion_empresa,
            :correo_sistema_gestion_empresa
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idgrupo_empresarial' =>$empresa->getIdgrupoEmpresarial(),
            ':nombre_empresa' =>$empresa->getNombre_empresa(),
            ':nit_empresa' =>$empresa->getNit_empresa() ,
            ':ciudad_principal_empresa' =>$empresa->getCiudad_principal_empresa() ,
            ':departamento_empresa' =>$empresa->getDepartamento(),
            ':direccion_empresa' =>$empresa->getDireccion_empresa(),
            ':pais_empresa' =>$empresa->getPais_empresa(),
            ':correo_empresa' =>$empresa->getCorreo_empresa(),
            ':idarea_tecnica_empresa' =>$empresa->getIdarea_tecnica_empresa(),
            ':representante_legal_empresa' =>$empresa->getRepresentante_legal_empresa(),
            ':cargo_representante_empresa' =>$empresa->getCargo_representante_empresa(),
            ':telefono_movil_representante_empresa' =>$empresa->getTelefono_movil_representante_empresa(),
            ':sitio_web_empresa' =>$empresa->getSitio_web_empresa(),
            ':fecha_corte_facturacion_empresa' =>$empresa->getFecha_corte_facturacion_empresa(),
            ':correo_facturacion_empresa' =>$empresa->getCorreo_facturacion_empresa(),
            ':representante_sistema_gestion' =>$empresa->getRepresentante_sistema_gestion(),
            ':cargo_representante_sistema_gestion_empresa' =>$empresa->getCargo_representante_sistema_gestion_empresa(),
            ':telefono_movil_representante_sistema_gestion_empresa' =>$empresa->getTelefono_movil_representante_sistema_gestion_empresa(),
            ':correo_sistema_gestion_empresa' =>$empresa->getCorreo_sistema_gestion_empresa()
        ));
        return $resultado2;
    }
    
    public static function crearCertificado( $certificado)
    { 
        //print_r($certificado);
        //echo "<br>xxxxx";
        $data_source = new DataSource();
        $sql2 = "INSERT INTO certificado VALUES (
            null,
            :idempresa_certificado,
            :etiqueta_certificado,
            :entidad_certificado,
            :codigo_certificado,	
            :fecha_certificado
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idempresa_certificado' =>$certificado->getIdempresa_certificado(),
            ':etiqueta_certificado' =>$certificado->getEtiqueta_certificado() ,
            ':entidad_certificado' =>$certificado->getEntidad_certificado() ,
            ':codigo_certificado' =>$certificado->getCodigo_certificado(),
            ':fecha_certificado' =>$certificado->getFecha_certificado()
        ));
        return $resultado2;
    }
   
    public static function modificarEmpresa(empresa $empresa)
    {
        
        $data_source = new DataSource();
        $sql = "UPDATE area_tecnica SET
            nombre_empresa=:nombre_empresa,
            nit_empresa=:nit_empresa,
            ciudad_principal_empresa=:ciudad_principal_empresa,
            direccion_empresa=:direccion_empresa,
            pais_empresa=:pais_empresa,
            correo_empresa=:correo_empresa,
            representante_legal_empresa=:representante_legal_empresa,
            cargo_representante_empresa=:cargo_representante_empresa,
            telefono_movil_representante_empresa=:telefono_movil_representante_empresa,
            sitio_web_empresa=:sitio_web_empresa,
            fecha_corte_facturacion_empresa=:fecha_corte_facturacion_empresa,
            correo_facturacion_empresa=:correo_facturacion_empresa,
            representante_sistema_gestion=:representante_sistema_gestion,
            cargo_representante_sistema_gestion_empresa=:cargo_representante_sistema_gestion_empresa,
            telefono_movil_representante_sistema_gestion_empresa=:telefono_movil_representante_sistema_gestion_empresa,
            correo_sistema_gestion_empresa=:correo_sistema_gestion_empresa
        WHERE idempresarial = :idempresarial";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':nombre_empresa' =>$empresa->getNombre_empresa(),
            ':nit_empresa' =>$empresa->getNit_empresa() ,
            ':ciudad_principal_empresa' =>$empresa->getCiudad_principal_empresa() ,
            ':departamento' =>$empresa->getDepartamento(),
            ':direccion_empresa' =>$empresa->getDireccion_empresa(),
            ':pais_empresa' =>$empresa->getPais_empresa(),
            ':correo_empresa' =>$empresa->getCorreo_empresa(),
            ':representante_legal_empresa' =>$empresa->getRepresentante_legal_empresa(),
            ':cargo_representante_empresa' =>$empresa->getCargo_representante_empresa(),
            ':telefono_movil_representante_empresa' =>$empresa->getTelefono_movil_representante_empresa(),
            ':sitio_web_empresa' =>$empresa->getSitio_web_empresa(),
            ':fecha_corte_facturacion_empresa' =>$empresa->getFecha_corte_facturacion_empresa(),
            ':correo_facturacion_empresa' =>$empresa->getCorreo_facturacion_empresa(),
            ':representante_sistema_gestion' =>$empresa->getRepresentante_sistema_gestion(),
            ':cargo_representante_sistema_gestion_empresa' =>$empresa->getCargo_representante_sistema_gestion_empresa(),
            ':telefono_movil_representante_sistema_gestion_empresa' =>$empresa->getTelefono_movil_representante_sistema_gestion_empresa(),
            ':correo_sistema_gestion_empresa' =>$empresa->getCorreo_sistema_gestion_empresa()
        ));
        return $resultado2;
    }
    public function borrarCertificado($idCertificado)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("DELETE FROM certificado
      WHERE idcertificado=:id ", array(':id' => $id));
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }
    public function habilitarEmpresa($idSesion)
    {
        $data_source = new DataSource(); 
        $data_table = $data_source->ejecutarConsulta("update sesion set estado_sesion=1
      WHERE idsesion=".$idSesion);
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }
    public function inhabilitarEmpresa($idSesion)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("update sesion set estado_sesion=0
      WHERE idsesion=".$idSesion);
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }
    public static function ultimaEmpresaRegistrada()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT MAX(idempresarial) as 'numero' FROM empresa ");
 
        return $data_table[0]["numero"];
    }
    public static function verificarNit($nit)
    {
        
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero' FROM empresa where nit_empresa='".$nit."'");
 
        return $data_table[0]["numero"];
    }
}