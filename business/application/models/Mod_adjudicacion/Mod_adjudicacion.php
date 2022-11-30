<?php
class Mod_adjudicacion extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	


public function graba_adjudicacion_socio($data,$id_socio_adj=0){
		 if($id_socio_adj>0){
			 $this->db->where('id_socio_adj', $id_socio_adj);
             $this->db->update('socio_adjudicaciones', $data);
	        
			 return (true);

		}else{
			 $this->db->insert('socio_adjudicaciones',$data);
			  
			 $this->db->close();
			 return (true);
		 }
		 
		 
}	
	
	
	
	
	function trae_usuarios_socios(){

					
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
			



function ver_adjudicacion_socio($id_socio_adj=0){

					
					$sql = "SELECT
					socio_adjudicaciones.*
					, u_region.Nombre_region
					, u_pais.Nombre_pais
					, u_pais.id_pais
					, u_region.id_region
					, adjudicacion_rango.id_rango
					, adjudicacion_rango.Nombre_rango
					, adjudicacion_via.Nombre_via
					, adjudicacion_via.id_via
					, proyectos_sector.Nombre_sector
					, proyectos_sector.id_sector
					, trimestre.nombre as tri_nombre
				FROM
					portalminero.u_region
					INNER JOIN portalminero.u_pais 
						ON (u_region.id_pais = u_pais.id_pais)
					INNER JOIN portalminero.socio_adjudicaciones 
						ON (socio_adjudicaciones.id_region = u_region.id_region)
					INNER JOIN portalminero.adjudicacion_rango 
						ON (socio_adjudicaciones.id_rango = adjudicacion_rango.id_rango)
					INNER JOIN portalminero.adjudicacion_via 
						ON (socio_adjudicaciones.id_via = adjudicacion_via.id_via)
					INNER JOIN portalminero.proyectos_sector 
						ON (socio_adjudicaciones.id_sector = proyectos_sector.id_sector)
					INNER JOIN portalminero.trimestre 
						ON (socio_adjudicaciones.trim_fecha_adj = trimestre.num)
				WHERE (socio_adjudicaciones.id_socio_adj = ".$id_socio_adj.");";
									
						
					$query     = $this->db->query($sql);
					$arreglo   = $query->result_array();
					return ($arreglo);
							  
	}


	
function lista_adjudicacion_socio($id_socio=0,$order="",$tipo_orden=""){

					
					$sql = "SELECT
					  id_socio_adj,
					  id_sector,
					  tipo_adj,
					  trim_fecha_adj,
					  ano_fecha_adj,
					  nombre_adj,
					  descripcion_adj,
					  monto_aprox_adj,
					  id_proy_adj,
					  id_lici_adj,
					  emp_adj,
					  emp_compra_adj,
					  fecha_ingreso_adj,
					  id_socio,
					  estado,
					  id_adj,
					  id_via,
					  id_pais,
					  id_region,
					  id_comuna,
					  id_rango,
					  duracion_contrato,
					  inicio_contrato,
					  otro_comprador,
					  otra_emp_adjudicada,
					  equipos_suministros,
					  username,
					  nombre_contacto,
					  empresa_contacto,
					  cargo_contacto,
					  email_contacto,
					  telefono_contacto,
					  direccion_contacto,
					  otros_contacto,
					  id_cambio
					FROM portalminero.socio_adjudicaciones
					WHERE id_socio = ".$id_socio."  ORDER BY ".$order."  ".$tipo_orden;
					
							  
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


