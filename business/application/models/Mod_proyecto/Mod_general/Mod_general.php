<?php
class Mod_general extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function get_proyectos_tipo(){
		
		
		  
		 $sql = "SELECT
				  id_tipo,
				  id_sector,
				  TRIM(Nombre_tipo) as tNombre_tipo,
				  Desc_tipo
				FROM portalminero.proyectos_tipo
				ORDER BY Nombre_tipo ";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	function get_estados_proyecto(){
		
		
		
		 $sql = "SELECT
			  est_id,
			  TRIM(est_descripcion) as test_descripcion
			FROM portalminero.estados_proyecto";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	} 
	
	
	function get_mandantes_proyecto(){
		
		
		
		 $sql = "SELECT
			empresas_x_tipos.id_emp
			, TRIM(empresas.Razon_social_emp) as tRazon_social_emp
			, empresas_tipos.id_tipoemp
			, empresas_tipos.Nombre_tipo
		FROM
			portalminero.empresas
			INNER JOIN portalminero.empresas_x_tipos 
				ON (empresas.id_emp = empresas_x_tipos.id_emp)
			INNER JOIN portalminero.empresas_tipos 
				ON (empresas_x_tipos.id_tipoemp = empresas_tipos.id_tipoemp)
		WHERE (empresas_tipos.id_tipoemp = 2)
		GROUP BY empresas_x_tipos.id_emp, empresas.Razon_social_emp, empresas_tipos.id_tipoemp
		ORDER BY TRIM(empresas.Razon_social_emp) ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	function get_u_pais($sector=0){
		
		
		
		 $sql = "SELECT
				u_pais.id_pais,
				TRIM(Nombre_pais) AS tNombre_pais
			FROM
				portalminero.proyectos
				INNER JOIN portalminero.u_pais 
					ON (proyectos.id_pais = u_pais.id_pais)
			WHERE (proyectos.id_sector =".$sector.")
			GROUP BY u_pais.id_pais, u_pais.Nombre_pais
			ORDER BY u_pais.Nombre_pais ASC;";
			
			if($sector==0 ||  $sector==9){
				
						$sectores = $this->session->userdata('SES_sectores');
						
						$sql = "SELECT
						u_pais.id_pais,
						TRIM(Nombre_pais) AS tNombre_pais
					FROM
						portalminero.proyectos
						INNER JOIN portalminero.u_pais 
							ON (proyectos.id_pais = u_pais.id_pais)
					WHERE (proyectos.id_sector IN (".$sectores."))
					GROUP BY u_pais.id_pais, u_pais.Nombre_pais
					ORDER BY u_pais.Nombre_pais ASC;";
			}
							  
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
	
	
	
	function get_obras_principales(){
		
		
		
		 $sql = "SELECT
				  id_obra,
				  TRIM(Nombre_obra) as tNombre_obra
				FROM portalminero.obras_principales
				ORDER BY TRIM(Nombre_obra)";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	function get_equipos_principales(){
		
		
		
		 $sql = "SELECT
				  id_equipo,
				  TRIM(Nombre_equipo) as tNombre_equipo
				FROM portalminero.equipos_principales ORDER BY TRIM(Nombre_equipo)";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	function get_suministros_principales(){
		
		
		
		 $sql = "SELECT
				  id_sumin,
				  TRIM(Nombre_sumin) as tNombre_sumin
				FROM portalminero.suministros_principales ORDER BY TRIM(Nombre_sumin)";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	function get_servicios_principales(){
		
		
		
		 $sql = "SELECT
				  id_serv,
				  TRIM(Nombre_serv) as tNombre_serv
				FROM portalminero.servicios_principales ORDER BY TRIM(Nombre_serv)";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	function get_proyectos_etapas(){
		
		
		
		 $sql = "SELECT
				  id_etapa,
				  TRIM(Nombre_etapa) as tNombre_etapa ,
				  Desc_etapa,
				  color
				FROM portalminero.proyectos_etapas ORDER BY TRIM(TRIM(Nombre_etapa))";
								  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	
	
	function get_total_por_etapas($sector=0){
		
		if($sector!=9){
		
			 $sql = "SELECT
						COUNT(Estado_pro)AS total ,Estado_pro
						FROM proyectos
						WHERE id_pagina_pro > 0 AND borrar =0  AND id_sector = $sector GROUP BY Estado_pro";
					
		}
		
		
		if($sector==9){ // sugeridos
			
					$this ->load->model ('Mod_buscador/Mod_buscador','buscador');
					$id_socio = $this->session->userdata('SES_id_socio');
					$sectores = $this->session->userdata('SES_sectores');
					
					
		     $linea_sugeridos = $this->buscador->get_proyectos_sugeridos($sectores,$id_socio);
			 
			 $sql = "SELECT
						COUNT(Estado_pro)AS total ,Estado_pro
						FROM proyectos
						WHERE id_pagina_pro > 0 AND borrar =0  AND id_pro IN  (".$linea_sugeridos.") GROUP BY Estado_pro";
					
		}
								
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	
	
	
	function get_responsable_etapa_actual($id_sector=1){
		
		
		
		/* $sql = "SELECT
    
				 empresas.id_emp
				, TRIM(empresas.Razon_social_emp) AS  tRazon_social_emp
				
			FROM
				portalminero.proyectos_x_etapas
				INNER JOIN portalminero.empresas 
					ON (proyectos_x_etapas.id_emp = empresas.id_emp)
				INNER JOIN portalminero.proyectos 
					ON (proyectos.id_pro = proyectos_x_etapas.id_pro)
			WHERE (proyectos_x_etapas.id_etapa =8
				AND proyectos.id_sector = ".$id_sector."
				AND proyectos.id_pagina_pro > 0
				AND proyectos.Borrar = 0)
			GROUP BY empresas.id_emp, empresas.Razon_social_emp
			ORDER BY TRIM(empresas.Razon_social_emp) ASC;";*/
			
			
			$sql="SELECT TRIM(emp.Nombre_fantasia_emp) AS  tRazon_social_emp , emp.id_emp
			 FROM proyectos pro INNER JOIN proyectos_x_etapas peta 
			 ON peta.id_pro=pro.id_pro AND peta.id_etapa=pro.etapa_actual_pro 
			 INNER JOIN proyectos_etapas eta ON eta.id_etapa=pro.etapa_actual_pro 
			 INNER JOIN empresas emp ON emp.id_emp=peta.id_emp INNER JOIN 
			 tipos_contratos tc ON tc.id_tipo_contrato=peta.id_tipo_contrato
			 WHERE pro.id_sector =".$id_sector." 
			 GROUP BY  emp.Nombre_fantasia_emp, emp.id_emp    ORDER BY emp.id_emp";
								  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	

	
} 
?>