<?php
class Mod_adjudicacion extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	


public function graba_adjudicacion_socio($data){
		//$this->db->select("soc.tipo_socio");
		 $this->db->insert('socio_adjudicaciones',$data);
         return true;
	}	
	
	
	
	
	function trae_usuarios_socios(){

					//$sql = "SELECT * FROM Areas a WHERE a.Idf = '4' AND id IN ($ids) GROUP BY a.Id ORDER BY a.Nombre ASC";
					$sql = "SELECT
								socio.id_socio
								, empresas.Razon_social_emp
								, user_socio.username_socio
								, user_socio.password_socio
								, user_socio.cargo_socio
								, user_socio.email_socio
								, empresas.Direccion_emp
								, user_socio.id_user_socio
							FROM
								portalminero.socio
								INNER JOIN portalminero.empresas 
									ON (socio.id_emp = empresas.id_emp)
								INNER JOIN portalminero.user_socio 
									ON (user_socio.id_socio = socio.id_socio)
							WHERE (id_user_socio =)". $this->session->userdata('SES_id_user_socio');
									  
									  $query     = $this->db->query($sql);
									  $arreglo   = $query->result_array();
									  return ($arreglo);
							  
	}
			
			
} // fin


