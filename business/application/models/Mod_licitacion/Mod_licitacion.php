<?php
class Mod_licitacion extends CI_Model{

	function __construct(){
		parent::__construct();
	}





	function graba_linea_id_consultas($linea=""){
				$sql="UPDATE user_socio SET linea_id_consultas ='".$linea."' WHERE id_user_socio = ".$this->session->userdata('SES_id_user_socio');
				$this->db->simple_query( $sql );
						
	}
	
	function linea_id_consultas($id_pais="",$id_region="",$id_lici_tipo="",$id_sector=""){
		global 	$numero_de_lineas_global;	
		$numero_de_lineas_global=0;
		$where=" where 1=1";
		$sectores  = $this->session->userdata('SES_sectores');
		
		if($id_lici_tipo!=''){  
		
			if($id_lici_tipo > 0 ){ $where=$where." AND id_lici_tipo = ".$id_lici_tipo;  }
			if($id_lici_tipo == 0 ){ $where=$where." ";  }
		
		}
		
		
		
		if($id_pais!=''){  $where=$where." AND id_pais = ".$id_pais;  }
		if($id_region!=''){  $where=$where." AND id_region = ".$id_region;  }
		
		if($id_sector!=''){  $where=$where." AND id_sector = ".$id_sector;  } else {  $where=$where." AND id_sector IN (".$sectores." )"; }
		
		
		
		$sql="SELECT id_lici FROM licitaciones ".$where;
		
		
			        $respuesta = "0,";
					$arreglo   = array();
					
					 $query     = $this->db->query($sql);
				     $arreglo   = $query->result_array();
				  
		            foreach ($arreglo as $row){
			                $respuesta =$respuesta.$row['id_lici'].",";
								$numero_de_lineas_global++;
				    }
		            $respuesta =$respuesta."0";
					if($respuesta=="0,0"){return false;}
				
					$this->graba_linea_id_consultas($respuesta);
					
		            return true;
	}
	
		
	function lee_linea_id_consultas(){
           
			
			 $rc = "";
		     $sql="SELECT linea_id_consultas FROM user_socio WHERE id_user_socio = ".$this->session->userdata('SES_id_user_socio');
		     $numero_de_lineas_global=0;
				$query = $this->db->query($sql);
			    $i=0;
				foreach ($query->result() as $row)
				{
					 
					 $rc = $row->linea_id_consultas;
                    	
			 
				}
				$query->free_result();
				
				
				return ( $rc );
				
					
   }
	
	function carga_licitaciones_inicial(){
	   $linea_id_proyectos_filtro = $this->lee_linea_id_consultas();
	   $total_query = 0;
		 
			 $sql = "SELECT id_lici,Nombre_lici_completo,Nombre_sector,Nombre_lici_tipo,Nombre_pais,Nombre_region FROM vista_buscador_licitacion WHERE id_lici IN (".$linea_id_proyectos_filtro.")";
		 			 
			
		     	   
			$query          = $this->db->query($sql);
			$arreglo        = $query->result_array();
			$total_query    = $GLOBALS['numero_de_lineas_global'];
			
			return true;
			$respuesta      = $this->crea_html_inicial($arreglo,DB_REGISTRO_INICIO,DB_REGISTRO_FINAL,$total_query,$sector=0);
			echo $respuesta;
				  
				 
	}
	
	
	function get_u_pais_general($tipo=0){
		$tip_lici="";
		$sectores  = $this->session->userdata('SES_sectores');
		if($tipo==0){ $tip_lici="0 or 1=1 ";}
		 $sql = "SELECT
					id_pais
					, Nombre_pais
				FROM
					portalminero.vista_buscador_licitacion
				WHERE (id_sector IN (".$sectores.")
					AND id_lici_tipo =".$tip_lici.")
				GROUP BY id_pais, Nombre_pais
				ORDER BY Nombre_pais ASC;";
			
			
							  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	function get_u_region($pais=81){
		
		
		
		 $sql = "SELECT
				  id_region,
				  id_pais,
				  TRIM(Nombre_region) as tNombre_region ,
				  X,
				  Y,
				  exacto,
				  orden,
				  nombre_corto
				FROM portalminero.u_region
				WHERE id_pais = ".$pais." ORDER BY orden";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	function get_sectores($id_sector=0){
		
		$sectores  = $this->session->userdata('SES_sectores');
		
		 $sql = "SELECT
			  id_sector,
			  Nombre_sector
			FROM portalminero.proyectos_sector
			WHERE id_sector IN (".$sectores.");";
			
			
							  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
}
?>
