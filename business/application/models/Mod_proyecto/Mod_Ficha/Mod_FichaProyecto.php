<?php
class Mod_FichaProyecto extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	
	
	
	function get_obras_proyecto($pro=0){
		
		
		
		 $sql = "SELECT
						obras_principales.id_obra
						, obras_principales.Nombre_obra
						, proyectos_x_obras.id_pro
					FROM
						portalminero.proyectos_x_obras
						INNER JOIN portalminero.obras_principales 
							ON (proyectos_x_obras.id_obra = obras_principales.id_obra)
					WHERE (proyectos_x_obras.id_pro = ".$pro.")
					ORDER BY obras_principales.id_obra ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	function get_adjudicaciones_asociadas($pro=0){
		
		
		
		 $sql = "SELECT
			  id_adj,
			  descripcion_adj,
			  id_proy_adj,
			  id_lici_adj
			FROM portalminero.adjudicaciones
			WHERE id_proy_adj = ".$pro;
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	
	
	
	
	function get_licitaciones_detalle($pro=0){
		
		          $array = ['Estimada', 'Definida', 'Adjudicada'   , 'En Proceso de Adjudicación', 'Desierta', 'Cerrada', 'Revocada'];
				  $escribe="";
				  for ($i = 0; $i <= 6; $i++) {
		  
				   /*------------------------------------------------------*/
						  
						  $sql = "SELECT id_lici, Nombre_lici_completo FROM portalminero.licitaciones WHERE id_pro=".$pro." AND id_lici_tipo = ".($i+1);
						  //echo $sql;
						  $query     = $this->db->query($sql);
						  if( $query->num_rows() > 0 ) {
							  $escribe = $escribe."<ul id='lista_licitacion_ficha'><strong>".$array[$i]."</strong>\n<ul>\n";
							  foreach ($query->result() as $row){
								  
								   $escribe = $escribe."<li><a href='#' onclick='muestra_licitacion(".$row->id_lici.")'>".$row->Nombre_lici_completo."</a></li>\n";
								   
								  
							  }
							  $escribe = $escribe."</ul>\n</ul>\n";
							  
						  }
				  
				  /*------------------------------------------------------*/
				}
				return ($escribe);
				
	}
	
	
	
	
	function get_equipo_proyecto($pro=0){
		
		
		
		 $sql = "SELECT
					proyectos_x_equipos.id_pro
					, equipos_principales.id_equipo
					, equipos_principales.Nombre_equipo
				FROM
					portalminero.proyectos_x_equipos
					INNER JOIN portalminero.equipos_principales 
						ON (proyectos_x_equipos.id_equipo = equipos_principales.id_equipo)
				WHERE (proyectos_x_equipos.id_pro =".$pro.") 
				GROUP BY id_pro,id_equipo,Nombre_equipo
				ORDER BY id_equipo;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	
	function get_barra_grafico_proyectos($id_sector=0){
		
		
		
		 $sql = "SELECT
				COUNT(*) AS total,
					`u_region`.`signo`
				   
				FROM
					`portalminero`.`vista_buscador_proyecto`
					INNER JOIN `portalminero`.`u_region` 
						ON (`vista_buscador_proyecto`.`id_region` = `u_region`.`id_region`)
				WHERE (`u_region`.`id_region` <> 0
					AND `vista_buscador_proyecto`.`id_pais` = 81) AND vista_buscador_proyecto.id_sector = ".$id_sector."
				GROUP BY `u_region`.`nombre_corto`, `u_region`.`id_region`
				ORDER BY `u_region`.`orden` ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	function get_barra_grafico_proyectos_sectores(){
		
		 
		$sectores = "1,2";
		
		$sql = "SELECT
			COUNT(*) AS total
			 , proyectos_sector.Nombre_sector
		FROM
			portalminero.proyectos_x_etapas
			INNER JOIN portalminero.proyectos_etapas 
				ON (proyectos_x_etapas.id_etapa = proyectos_etapas.id_etapa)
			INNER JOIN portalminero.vista_buscador_proyecto 
				ON (vista_buscador_proyecto.id_pro = proyectos_x_etapas.id_pro)
			INNER JOIN portalminero.proyectos_sector 
				ON (vista_buscador_proyecto.id_sector = proyectos_sector.id_sector)
		WHERE (vista_buscador_proyecto.id_sector IN (".$sectores.")
			AND proyectos_etapas.id_etapa =2)
		GROUP BY vista_buscador_proyecto.id_sector, proyectos_sector.Nombre_sector;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	function get_suministros_proyecto($pro=0){
		
		
		
		 $sql = "SELECT
				proyectos_x_suministros.id_pro
				, suministros_principales.id_sumin
				, suministros_principales.Nombre_sumin
			FROM
				portalminero.proyectos_x_suministros
				INNER JOIN portalminero.suministros_principales 
					ON (proyectos_x_suministros.id_sumin = suministros_principales.id_sumin)
			WHERE (proyectos_x_suministros.id_pro = ".$pro.")
			GROUP BY proyectos_x_suministros.id_pro, suministros_principales.id_sumin, suministros_principales.Nombre_sumin
			ORDER BY suministros_principales.id_sumin ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	
	function get_etapas_proyecto($pro=0){
		
		
		
		 $sql = "SELECT
				proyectos_x_etapas.trim_inicio
				, proyectos_x_etapas.ano_inicio
				, proyectos_x_etapas.trim_fin
				, proyectos_x_etapas.ano_fin
				, proyectos_etapas.Nombre_etapa
				, proyectos_x_etapas.id_pro
			FROM
				portalminero.proyectos_x_etapas
				INNER JOIN portalminero.proyectos_etapas 
					ON (proyectos_x_etapas.id_etapa = proyectos_etapas.id_etapa)
			WHERE (proyectos_x_etapas.trim_inicio >0
				AND proyectos_x_etapas.id_pro = ".$pro.") ORDER BY id_proyxetapa;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	function get_hitos_importantes($pro=0){
		
		
		
		 $sql = "SELECT
					proyectos_hitos.Nombre_hito
					, proyectos_x_hitos.trim_hito
					, proyectos_x_hitos.ano_hito
					, proyectos_x_hitos.id_pro
					, proyectos_x_hitos.id_proyxhito
				FROM
					portalminero.proyectos_x_hitos
					INNER JOIN portalminero.proyectos_hitos 
						ON (proyectos_x_hitos.id_hito = proyectos_hitos.id_hito)
				WHERE (proyectos_x_hitos.id_pro = 3645)
				ORDER BY proyectos_x_hitos.id_proyxhito DESC;";
								  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	
	
	function get_servicios_proyecto($pro=0){
		
		
		
		 $sql = "SELECT
					servicios_principales.Nombre_serv
					, servicios_princ_cat.Nombre_cat_serv
					, servicios_princ_subcat.Nombre_sub_serv
					, proyectos_x_servsubcat.id_pro
					, servicios_principales.id_serv
					, servicios_princ_cat.id_cat_serv
					, servicios_princ_subcat.id_sub_serv
				FROM
					portalminero.servicios_princ_cat
					INNER JOIN portalminero.servicios_princ_subcat 
						ON (servicios_princ_cat.id_cat_serv = servicios_princ_subcat.id_cat_serv)
					INNER JOIN portalminero.servicios_principales 
						ON (servicios_princ_subcat.id_serv = servicios_principales.id_serv)
					INNER JOIN portalminero.proyectos_x_servsubcat 
						ON (proyectos_x_servsubcat.id_sub_serv = servicios_princ_subcat.id_sub_serv)
				WHERE (proyectos_x_servsubcat.id_pro = ".$pro.")
				GROUP BY servicios_principales.Nombre_serv, servicios_princ_cat.Nombre_cat_serv, servicios_princ_subcat.Nombre_sub_serv, proyectos_x_servsubcat.id_pro, servicios_principales.id_serv, servicios_princ_cat.id_cat_serv, servicios_princ_subcat.id_sub_serv
				ORDER BY servicios_principales.Nombre_serv ASC;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}
	




    function editar_proyecto($id=0){
		$query = $this->db->where('id_pro', $id);
		$query = $this->db->select('proyectos_sector.Nombre_sector, pmp.Sigla_med, proyectos_sector.Space_sector, u_pais.Nombre_pais, u_region.Nombre_region, u_comuna.Nombre_comuna, empresas.Nombre_fantasia_emp, proyectos.*');
		$query = $this->db->join("proyectos_medicion_produccion pmp", "pmp.id_med = proyectos.Medicion_produccion_pro", 'left');
		$query = $this->db->join("proyectos_sector", "proyectos_sector.id_sector = proyectos.id_sector", 'left');
		$query = $this->db->join("u_pais", "u_pais.id_pais = proyectos.id_pais", 'left');
		$query = $this->db->join("u_region", "u_region.id_region = proyectos.id_region", 'left');
		$query = $this->db->join("u_comuna", "u_comuna.id_comuna = proyectos.id_comuna", 'left');
		$query = $this->db->join("empresas", "empresas.id_emp = proyectos.id_man_emp", 'left');
		$query=$this->db->get("proyectos");
		$result = $query->first_row();
		return $result;
	}


       function buscar_contactos_pro($id=0,$princ=2){
		if($princ==1){
			$this->db->where('Principal_contact',1);
		}
		else if($princ==0){
			$this->db->where('Principal_contact',0);
		}

		$this->db->where('id_pro',$id);
		$resp=$this->db->get('proyectos_contactos');
		return $resp->result();
	}
	
	function mostrar_tipos($id){
		$query = $this->db->where('id_pro', $id);
		$query = $this->db->join("proyectos_tipo", "proyectos_tipo.id_tipo = proyectos_x_tipo.id_tipo", "inner");
		$query=$this->db->get("proyectos_x_tipo");
		$result = $query->result();
		return $result;
	}
	
	function mostrar_propietarios($id){
		$query = $this->db->where('proyectos.id_pro', $id);
		$query = $this->db->join("empresas", "empresas.id_emp = proyectos_x_empresas.id_emp", "inner");
		$query = $this->db->join("proyectos", "proyectos.id_pro = proyectos_x_empresas.id_pro", "inner");
		$query=$this->db->get("proyectos_x_empresas");
		$result = $query->result();
		return $result;
	}
	
	
	
	/*--------------------------------------------------------------------------------------------*/
	
	
	function get_etapas($id_pro=""){
		if($id_pro!=""){
			$this->db->select("pro.Etapa_actual_pro etapa_actual, etp.*, eta.*, emp.Nombre_fantasia_emp empresa, tcon.Nombre_tipo_contrato tipo_con, tcon.Abreviacion_tipo_contrato av_tipo_con");
			$this->db->where("pro.id_pro", $id_pro);
			$this->db->join("proyectos_x_etapas etp", "pro.id_pro=etp.id_pro", "left");
			$this->db->join("proyectos_etapas eta", "etp.id_etapa=eta.id_etapa", "left");
			$this->db->join("empresas emp", "emp.id_emp=etp.id_emp", "left");
			$this->db->join("tipos_contratos tcon", "tcon.id_tipo_contrato=etp.id_tipo_contrato", "left");
			$this->db->order_by("eta.id_etapa", "asc");
			$query=$this->db->get("proyectos pro");
			$rs=$query->result();
			if(is_array($rs) && sizeof($rs)>0){
				return($rs);
			}else{
				$this->db->select("pro.Etapa_actual_pro etapa_actual, eta.*");
				$this->db->where("pro.id_pro", $id_pro);
				$this->db->join("proyectos_etapas eta", "pro.Etapa_actual_pro=eta.id_etapa", "inner");
				$query=$this->db->get("proyectos pro");
				$rs=$query->result();
				if(is_array($rs) && sizeof($rs)>0){
					return($rs);
				}else{
					return(false);
				}
			}
		}else{
			return(false);
		}
	}




function get_fechas_tl($id_pro){
		$etp=$this->get_etapas($id_pro);
		if(is_array($etp) && sizeof($etp)>0){

			$min_ano=0;
			$min_trim=0;
			$max_ano=0;
			$max_trim=0;
			$x=0;
			foreach($etp as $index=>$stg){
				if($stg->trim_inicio > 0 && $stg->trim_fin > 0 && $stg->ano_inicio > 0 && $stg->ano_fin > 0){
					if($x==0){

						$min_ano=$stg->ano_inicio;
						$min_trim=$stg->trim_inicio;
						$max_ano=$stg->ano_fin;
						$max_trim=$stg->trim_fin;
					}else{
						if($stg->ano_inicio<$min_ano){

							$min_ano=$stg->ano_inicio;
							$min_trim=$stg->trim_inicio;
							$actual=$index;
						}

						if($stg->ano_fin>$max_ano){

								$max_ano=$stg->ano_fin;
								$max_trim=$stg->trim_fin;
								$actual=$index;
						}else if($stg->ano_fin==$max_ano){

							if($stg->trim_fin>$max_trim){
								$max_ano=$stg->ano_fin;
								$max_trim=$stg->trim_fin;
								$actual=$index;
							}
						}
					}
					if($stg->etapa_actual==$stg->id_etapa){
						$actual=$index;
					}
					++$x;
				}
			}
			if(isset($actual)){
				$et_act=$etp[$actual];




				if($et_act->trim_inicio==$et_act->trim_fin){
					$trim_act=$et_act->trim_inicio;
				}else{
					$trim_act=round((intval($et_act->trim_fin)+intval($et_act->trim_inicio))/2);
				}
				if($et_act->ano_inicio==$et_act->ano_fin){
					$ano_act=$et_act->ano_inicio;
				}else{
					$ano_act=round((intval($et_act->ano_fin)+intval($et_act->ano_inicio))/2);
				}
				$dia=15;
				if($trim_act==1){
					$mes=2;
				}elseif($trim_act==2){
					$mes=5;
				}elseif($trim_act==3){
					$mes=8;
				}elseif($trim_act==4){
					$mes=11;
				}
				$fecha_inicio=(date("D M d Y H:i:s", mktime(0, 0, 0, intval($mes)+9, $dia, $ano_act))." GMT-0600");
			}
			if(is_array($etp) && sizeof($etp)>0){
				if($min_trim==1){
					$mes=1;
				}elseif($min_trim==2){
					$mes=3;
				}elseif($min_trim==3){
					$mes=6;
				}elseif($min_trim==4){
					$mes=9;
				}
				if(isset($mes)){
					$fecha_desde=(date("D M d Y H:i:s", mktime(0, 0, 0, $mes, 1, $min_ano))." GMT-0600");
					$fecha_inicio=(date("D M d Y H:i:s", mktime(0, 0, 0, intval($mes)+7, 1, $min_ano))." GMT-0600");
					$fecha_desde_f=(date("Y-m-d", mktime(0, 0, 0, $mes, 1, $min_ano)));
					//$fecha_desde_f=date("Y-m-d",strtotime("-1 second",strtotime("01/01/".(intval($min_ano))." 00:00:00")));
					//$fecha_desde_f=date("Y-m-d", mktime(0, 0, 0, $mes, 1, intval($min_ano)-1));

					if($max_trim==1){

						$mes=3;
						$dia=date("d",strtotime("-1 second",strtotime("4/01/".$max_ano." 00:00:00")));
					}elseif($max_trim==2){

						$mes=6;
						$dia=date("d",strtotime("-1 second",strtotime("7/01/".$max_ano." 00:00:00")));
					}elseif($max_trim==3){

						$mes=9;
						$dia=date("d",strtotime("-1 second",strtotime("10/01/".$max_ano." 00:00:00")));
					}elseif($max_trim==4){

						$mes=12;
						$dia=date("d",strtotime("-1 second",strtotime("1/01/".(intval($max_ano)+1)." 00:00:00")));
					}

					$fecha_hasta=(date("D M d Y H:i:s", mktime(0, 0, 0, $mes, $dia, $max_ano))." GMT-0600");
					$fecha_hasta_f=date("Y-m-d", mktime(0, 0, 0, $mes, $dia, intval($max_ano)+1));
					return(array($fecha_inicio, $fecha_desde, $fecha_hasta, $fecha_desde_f, $fecha_hasta_f));
				}else{
					return(false);
				}
			}else{
				return(false);
			}

		}else{
			return(false);
		}
	}
	
	
	
	
	
	/*--------------------------------------------------------------------------------------------*/
	
	
	function cargar_datos_etapa_actual($id){
		$this->db->select("eta.id_etapa, eta.Nombre_etapa, tc.Nombre_tipo_contrato, tc.Abreviacion_tipo_contrato , emp.Nombre_fantasia_emp, emp.id_emp");
		$this->db->where("pro.id_pro", $id);
		$this->db->join("proyectos_x_etapas peta", "peta.id_pro=pro.id_pro and peta.id_etapa=pro.etapa_actual_pro", "inner");
		$this->db->join("proyectos_etapas eta", "eta.id_etapa=pro.etapa_actual_pro", "inner");
		$this->db->join("empresas emp", "emp.id_emp=peta.id_emp", "inner");
		$this->db->join("tipos_contratos tc", "tc.id_tipo_contrato=peta.id_tipo_contrato", "inner");
		$query=$this->db->get("proyectos pro");
		$result=$query->first_row();
		if(is_object($result)){
			return($result);
		}else{
			return(false);
		}
	}
} 
?>