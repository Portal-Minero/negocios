<?php
class Mod_adjudicacion extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	


public function graba_adjudicacion_socio($data){
		
		 $this->db->insert('socio_adjudicaciones',$data);
		 $this->db->close();
         return (true);
		 
		 
		 
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
								,nombre_completo_socio
							FROM
								portalminero.socio
								INNER JOIN portalminero.empresas 
									ON (socio.id_emp = empresas.id_emp)
								INNER JOIN portalminero.user_socio 
									ON (user_socio.id_socio = socio.id_socio)
							WHERE id_user_socio =". $this->session->userdata('SES_id_user_socio');
									  
									  $query     = $this->db->query($sql);
									  $arreglo   = $query->result_array();
									  return ($arreglo);
							  
	}
			
	


public function trae_clientes_rys(){
		
		$query="SELECT
				id_emp
				, UPPER(trim(Nombre_empresa_cliente)) as nombre
			FROM
				socio_reclutamiento
			WHERE (estado_cliente ='A')
			GROUP BY id_emp
			ORDER BY Nombre_empresa_cliente ASC;";
			$query=$this->db->query($query);
			return($query->result());
			
	}



 public function borra_socio_reculutamiento($id=0,$opcion=0){
		 if($pcion==0){
		   $sql ="DELETE FROM socio_reclutamiento WHERE id_emp = ".$id;
		 }
		 
		  if($pcion==1){
		   $sql ="delete from  socio_reclu_x_membresia where id_cliente = ".$id;
		 }
		 
		  if($pcion==2){
		   $sql ="delete from socio_reclu_x_membresia where id_cliente = ".$id;
		 }
		 
		 if($pcion==3){
		   $sql ="delete from socio_memb_rys where id_cliente = ".$id;
		 }
		 
		  if($pcion==4){
		   $sql =" delete from user_reclutamiento where id_cliente =".$id;
		 }
		 
		 $rc=false;

	    if ($this->db->simple_query($sql))
	    {
	        $rc=true;
	    }
	    
	    $this->db->close();
	    return $rc;
		 
	 }


	
} // fin


