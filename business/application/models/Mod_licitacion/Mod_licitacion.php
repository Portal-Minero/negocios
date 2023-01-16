<?php
class Mod_licitacion extends CI_Model{

	function __construct(){
		parent::__construct();
	}





	function graba_linea_id_consultas($linea=""){
				$sql="UPDATE user_socio SET linea_id_consultas ='".$linea."' WHERE id_user_socio = ".$this->session->userdata('SES_id_user_socio');
				$this->db->simple_query( $sql );
						
	}
	
	function busqueda_licitaciones_superior(){
		/*-------------------------------------------------*/
	     /* se ejeuta filtro especial superiro */
	     /*-------------------------------------------------*/
		
		global 	$numero_de_lineas_global;	
		$numero_de_lineas_global=0;
		$where=" where 1=1";
		
		if (!empty($_REQUEST['select_get_sector'])) {
			 $select_get_sector = $_REQUEST['select_get_sector'];				
	    }
		if (!empty($_REQUEST['select_get_empresa_lici'])) {
			  $select_get_empresa_lici = $_REQUEST['select_get_empresa_lici'];				
	    }
		if (!empty($_REQUEST['select_get_u_pais'])) {
			 $select_get_u_pais = $_REQUEST['select_get_u_pais'];				
	    }
		if (!empty($_REQUEST['select_get_u_region'])) {
			 $select_get_u_region = $_REQUEST['select_get_u_region'];				
	    }
		if (!empty($_REQUEST['select_get_reg_re'])) {
			 $select_get_reg_re= $_REQUEST['select_get_reg_re'];				
	    }
		if (!empty($_REQUEST['get_licitaciones_tipos'])) {
			 $get_licitaciones_tipos = $_REQUEST['get_licitaciones_tipos'];				
	    }
		if (!empty($_REQUEST['tipo_lici'])) {
			 $tipo_lici = $_REQUEST['tipo_lici'];				
	    }
		
	   //----------------------------------------------------
	
	    if($select_get_sector > 0 ){ 
	       $where = $where." and  ( id_sector = ".$select_get_sector.")";
	    }
	    
		
		 if($select_get_empresa_lici > 0 ){ 
	       $where = $where." and  ( id_mandante = ".$select_get_empresa_lici.")";
	    }
	}
	
	
	
	function linea_id_consultas($id_pais="",$id_region="",$id_lici_tipo="",$id_sector=""){
		/*-------------------------------------------------*/
	     /* se ejeuta al abir la vntana sin filtro especial */
	     /*-------------------------------------------------*/
		
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
		 
			 $sql = "SELECT id_lici,Nombre_lici_completo,Nombre_sector,Nombre_lici_tipo,Nombre_pais,Nombre_region FROM vista_buscador_licitacion WHERE id_lici IN (".$linea_id_proyectos_filtro.") LIMIT 0, 50";
		 			 
			
		     	   
			$query          = $this->db->query($sql);
			$arreglo        = $query->result_array();
			$total_query    = $GLOBALS['numero_de_lineas_global'];
			
			//return true;
			$respuesta      = $this->crea_html_inicial($arreglo,$total_query);
			//echo $respuesta;
				  
				 
	}
	
	function crea_html_inicial($arreglo,$total_query){
	    $respuesta="";
		foreach ($arreglo as $row){
			
			 $respuesta =$respuesta."<tr>";
			 $respuesta =$respuesta."<td><a href='#' onclick='trae_ficha_liciaciones(".$row['id_lici'].",1);'>".$row['Nombre_lici_completo']."</a>&nbsp; <a rel='shadowbox;width=1100;' data-toggle='modal' data-target='#exampleModalLong' href='#' onclick='popupproyecto(".$row['id_lici'].",1);' style='font-size:10px;color:#999;display:inline-block'>(Ver En Pop-Up)</a></td>";
			 $respuesta =$respuesta."<td>".$row['Nombre_sector']."</td>";
			 $respuesta =$respuesta."<td>".$row['Nombre_lici_tipo']."</td>";
			 $respuesta =$respuesta."<td>".$row['Nombre_pais']."</td>";
			 $respuesta =$respuesta."<td>".$row['Nombre_region']."</td>";
			 $respuesta =$respuesta."</tr>";
				
		}
		
		$dice="**";
		$total_query=100;
		$paginador_query=$this->paginador_vista(  $GLOBALS['numero_de_lineas_global']  );
		$arreglo_lineas=100;
		
		
				    $dice = "Mostrando 1 - $arreglo_lineas de un total de $total_query resultados.";
		            $tjson='[
							{
								"Jresultado": "'.$respuesta.'",
								"Jpaginador": "'.$arreglo_lineas.'",
								"Jinicio": "1",
								"Jfin": "50",
								"Jdice": "'.$dice.'",
								"Jtotal_query": "'.$total_query.'",
								"Jpaginador_query": "'.$paginador_query.'",
								"Jestado": "OK"
							}
							]';
		
		echo $tjson;
	}
	
	
	
	function get_u_pais_tipo_sector($tipo=0){
		$tip_lici="";
		$sectores  = $this->session->userdata('SES_sectores');
		if($tipo==0){ $tip_lici="0 or 1=1 ";}
		 $sql = "SELECT
					id_pais
					, Nombre_pais
				FROM
					portalminero.vista_buscador_licitacion
				WHERE (id_sector IN (".$sectores.")
					AND id_lici_tipo =".$tipo.")
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
	
	
	function get_empresa_licita($sectores=0,$id_lici_tipo=0){
		$id_lici_tipo_db ="";
		if($id_lici_tipo >0 ){ $id_lici_tipo_db = " AND licitaciones.id_lici_tipo =".$id_lici_tipo; }
		
		
		 $sql = "SELECT
				licitaciones.id_mandante
				, TRIM(empresas.Razon_social_emp) AS Razon_social_empresa
			FROM
				portalminero.licitaciones
				INNER JOIN portalminero.empresas 
					ON (licitaciones.id_mandante = empresas.id_emp)
			WHERE (licitaciones.id_sector IN (".$sectores.") ".$id_lici_tipo_db." )
			GROUP BY empresas.Razon_social_emp
			ORDER BY empresas.Razon_social_emp ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	function get_registro_proveedores($sectores=0,$id_lici_tipo=0){
		
		$id_lici_tipo_db ="";
		if($id_lici_tipo >0 ){ $id_lici_tipo_db = " AND licitaciones.id_lici_tipo =".$id_lici_tipo; }
		
		 $sql = "SELECT
					registro_proveedores.id_registro
					, registro_proveedores.Nombre_registro
				FROM
					portalminero.licitaciones_x_registro_proveedores
					INNER JOIN portalminero.registro_proveedores 
						ON (licitaciones_x_registro_proveedores.id_registro = registro_proveedores.id_registro)
					INNER JOIN portalminero.licitaciones 
						ON (licitaciones.id_lici = licitaciones_x_registro_proveedores.id_lici)
				WHERE (licitaciones.id_sector IN (".$sectores.") ".$id_lici_tipo_db." )
				GROUP BY registro_proveedores.Nombre_registro
				ORDER BY registro_proveedores.Nombre_registro ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	function get_obras_principales($sectores=0,$id_lici_tipo=0){
		$id_lici_tipo_db ="";
		if($id_lici_tipo >0 ){ $id_lici_tipo_db = " AND licitaciones.id_lici_tipo =".$id_lici_tipo; }
		
		
		 $sql = "SELECT
				obras_principales.id_obra
				, obras_principales.Nombre_obra
			FROM
				portalminero.licitaciones
				INNER JOIN portalminero.licitaciones_x_obras 
					ON (licitaciones.id_lici = licitaciones_x_obras.id_lici)
				INNER JOIN portalminero.obras_principales 
					ON (licitaciones_x_obras.id_obra = obras_principales.id_obra)
			WHERE (licitaciones.id_sector IN (".$sectores.") ".$id_lici_tipo_db .")
			GROUP BY obras_principales.Nombre_obra
			ORDER BY obras_principales.Nombre_obra ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	
	function get_equipos_principales($sectores=0,$id_lici_tipo=0){
		$id_lici_tipo_db ="";
		if($id_lici_tipo >0 ){ $id_lici_tipo_db = " AND licitaciones.id_lici_tipo =".$id_lici_tipo; }
		
		
		 
				
				 $sql = "SELECT
			equipos_principales.id_equipo
			, equipos_principales.Nombre_equipo
		FROM
			portalminero.licitaciones_x_equipos
			INNER JOIN portalminero.equipos_principales 
				ON (licitaciones_x_equipos.id_equipo = equipos_principales.id_equipo)
			INNER JOIN portalminero.licitaciones 
				ON (licitaciones.id_lici = licitaciones_x_equipos.id_lici)
		WHERE (licitaciones.id_sector  IN (".$sectores.") ".$id_lici_tipo_db.")
		GROUP BY equipos_principales.Nombre_equipo
		ORDER BY equipos_principales.Nombre_equipo ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	function get_proyectos_tipo($sectores=0){
		
		
				
				 $sql = "SELECT
				proyectos_tipo.id_tipo
				, proyectos_tipo.Nombre_tipo
				
			FROM
				portalminero.proyectos_x_tipo
				INNER JOIN portalminero.proyectos_tipo 
					ON (proyectos_x_tipo.id_tipo = proyectos_tipo.id_tipo)
				INNER JOIN portalminero.licitaciones 
					ON (licitaciones.id_pro = proyectos_x_tipo.id_pro)
			WHERE (licitaciones.id_sector IN (".$sectores.") )
			GROUP BY proyectos_tipo.Nombre_tipo
			ORDER BY proyectos_tipo.Nombre_tipo ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	function get_rubros_principales($sectores=0,$id_lici_tipo=0){
		$id_lici_tipo_db ="";
		if($id_lici_tipo >0 ){ $id_lici_tipo_db = " AND licitaciones.id_lici_tipo =".$id_lici_tipo; }
		
				
				 $sql = "SELECT
						rubros.id_rubro
						, rubros.Nombre_rubro
					FROM
						portalminero.licitaciones
						INNER JOIN portalminero.licitaciones_x_rubros 
							ON (licitaciones.id_lici = licitaciones_x_rubros.id_lici)
						INNER JOIN portalminero.rubros 
							ON (licitaciones_x_rubros.id_rubro = rubros.id_rubro)
					WHERE (licitaciones.id_sector IN (".$sectores.") ".$id_lici_tipo_db.")
					GROUP BY rubros.Nombre_rubro
					ORDER BY rubros.Nombre_rubro ASC;
					";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	
	
	function get_licitaciones_tipos($sectores=0,$id_lici_tipo=0){
		
		$id_lici_tipo_db ="";
		if($id_lici_tipo >0 ){ $id_lici_tipo_db = " AND licitaciones.id_lici_tipo =".$id_lici_tipo; }
				
				 $sql = "SELECT
					licitaciones_tipos.id_lici_tipo
					, licitaciones_tipos.Nombre_lici_tipo
				FROM
					portalminero.licitaciones
					INNER JOIN portalminero.licitaciones_tipos 
						ON (licitaciones.id_lici_tipo = licitaciones_tipos.id_lici_tipo)
				WHERE (licitaciones.id_sector IN (".$sectores.") ".$id_lici_tipo_db.")
				GROUP BY licitaciones_tipos.Nombre_lici_tipo
				ORDER BY licitaciones_tipos.Nombre_lici_tipo ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	
	function get_servicios_principales($sectores=0,$id_lici_tipo =0){
		$id_lici_tipo_db ="";
		if($id_lici_tipo >0 ){ $id_lici_tipo_db = " AND licitaciones.id_lici_tipo =".$id_lici_tipo; }
				
				$sql = "SELECT
					servicios_principales.id_serv
					, servicios_principales.Nombre_serv
				FROM
					portalminero.licitaciones
					INNER JOIN portalminero.licitaciones_x_servicios 
						ON (licitaciones.id_lici = licitaciones_x_servicios.id_lic)
					INNER JOIN portalminero.servicios_principales 
						ON (licitaciones_x_servicios.id_serv = servicios_principales.id_serv)
				WHERE (licitaciones.id_sector IN (".$sectores.") ".$id_lici_tipo_db.")
				GROUP BY servicios_principales.Nombre_serv
				ORDER BY servicios_principales.Nombre_serv ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	
	
		function get_suministros_principales($sectores=0,$id_lici_tipo=0){
		$id_lici_tipo_db ="";
		if($id_lici_tipo >0 ){ $id_lici_tipo_db = " AND licitaciones.id_lici_tipo =".$id_lici_tipo; }
		
				
				 $sql = "SELECT
					suministros_principales.id_sumin
					, suministros_principales.Nombre_sumin
				FROM
					portalminero.licitaciones
					INNER JOIN portalminero.licitaciones_x_suministros 
						ON (licitaciones.id_lici = licitaciones_x_suministros.id_lici)
					INNER JOIN portalminero.suministros_principales 
						ON (licitaciones_x_suministros.id_sumin = suministros_principales.id_sumin)
				WHERE (licitaciones.id_sector IN (".$sectores.") ".$id_lici_tipo_db.")
				GROUP BY suministros_principales.Nombre_sumin
				ORDER BY suministros_principales.Nombre_sumin ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	
	
	function paginador_vista($total=0){
		
		$total =100;
		$numero_de_cuadros = 0;
		$numero_de_cuadros = round($total / 20 );
		
		
		$li="";
		

		for($i=1;$i<=20;$i++){
			$li=$li."<li class='page-item'  ><a  style='font-size: 9px;' class='page-link' href='#'>".$i."</a></li>";
		}
		
		$pagi="";
		$pagi=$pagi."<nav aria-label='...'>";
		$pagi=$pagi."<ul class='pagination pagination-sm'>";
		$pagi=$pagi.$li;
		$pagi=$pagi."</ul>";
		$pagi=$pagi."</nav>".$numero_de_cuadros;
		return $pagi;

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
