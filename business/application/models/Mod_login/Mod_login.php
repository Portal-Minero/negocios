<?php
class Mod_login extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function ingreso($username_socio='0',$password_socio='0'){
		
			
		 $sql = "SELECT
				 socio.Razon_social_socio
				 ,socio.id_socio
				 ,user_socio.id_user_socio
				 ,user_socio.nombre_completo_socio
				 ,user_socio.username_socio
				 ,user_socio.password_socio
				 ,socio.Estado_socio
				 ,socio.tipo_socio
				 ,socio.fecha_caduca,user_socio.email_socio,user_socio.fono_user_socio
			FROM
				portalminero.socio
				INNER JOIN portalminero.user_socio 
					ON (socio.id_socio = user_socio.id_socio)
			WHERE (user_socio.username_socio ='".$username_socio."'
				AND user_socio.password_socio ='".$password_socio."');";
				
								  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				  
	}

	
} 
?>