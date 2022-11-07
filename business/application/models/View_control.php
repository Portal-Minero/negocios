<?php
class M_diremp extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->model("adjudicacion/m_adjudicacion", "adjudicacion");
	}

	function get_dir_emp($id=""){
		if($id!="")
			$this->db->where("Codigo", $id);
		$this->db->where("guardado",1);
		$this->db->order_by('Codigo','DESC');
		$this->db->where("ep.id_pagina_prov !=",'NULL');
		$this->db->join("emp_prov ep", "ep.id_socio=socio.id_socio", "left");
		$dt=$this->db->get('socio');
		if($id!="")
			$dt=$dt->first_row();
		else
			$dt=$dt->result();
		return($dt);
	}
	
	function get_sin_dir_emp($id=""){
		$this->db->select('socio.*');
		$where_id='';
		if($id!="")
			$where_id="&&(Codigo=".$id.")";
		//$this->db->or_where("tiene_directorio",'0');
		$this->db->where("((tiene_directorio=0)&&(tipo_socio!='Mandante')&&(Estado_socio='A'))||((productos_servicios='')&&(tipo_socio!='Mandante')&&(Estado_socio='A'))".$where_id);
		$this->db->join("user_socio us", "us.id_user_socio=socio.id_contacto_admin_socio", "left");
		$this->db->join("emp_prov ep", "ep.id_socio=socio.id_socio", "left");
		//$this->db->from("emp_prov");
		$dt=$this->db->get('socio');
		if($id!="")
			$dt=$dt->first_row();
		else
			$dt=$dt->result();
		return($dt);
	}
	
	function validar_asociaciones($id){
		//revisar si existe suministro asociado
			$this->db->where('id_emp_prov',$id);
			$query1 = $this->db->get('emp_prov_x_suministros');
			if($query1->num_rows()>0){
				return(true);
			}
			
		//revisar si existe equipo asociado
			$this->db->where('id_emp_prov',$id);
			$query2 = $this->db->get('emp_prov_x_equipos');
			if($query2->num_rows()>0){
				return(true);
			}
			
		//revisar si existe servicio asociado
			$this->db->where('id_emp_prov',$id);
			$query3 = $this->db->get('emp_prov_x_servsubcat');
			if($query3->num_rows()>0){
				return(true);
			}
		return(false);
	}

	function get_servicios(){
		$this->db->from("servicios_principales");
		$dt=$this->db->get();
		$dt=$dt->result();
		return($dt);
	}
	
	function guardar_directorio($datos,$id){
		if($id==0){
			$this->db->insert("emp_prov", $datos);
			$id=$this->db->insert_id();
			$this->db->where('id_socio',$datos['id_socio']);
			$this->db->update('socio',array('tiene_directorio'=>1));
		}
		else{
			$this->db->where('Codigo',$id);
			$this->db->update('emp_prov', $datos);
		}
		
		return $id;
	}

	function guardar_suministros($id, $sumins){
		if($id!="" && $id!=NULL){
			if(is_array($sumins) && sizeof($sumins)>0){
				foreach($sumins as $id_sum){
					if($id_sum!=0){
						$datos_sumin = array(
							'id_sumin'=>$id_sum,
							'id_emp_prov'=>$id);
							
						$this->db->where($datos_sumin);
						$query=$this->db->get('emp_prov_x_suministros');	
						if($query->num_rows()==0){
							$this->db->insert("emp_prov_x_suministros", $datos_sumin);
						}
					}
				}
			}
						
			$total_relaciones=$this->total_rel_sumin($id);
		
			if($total_relaciones!=NULL){
				foreach($total_relaciones as $id_sumin_ant){		  
					if(!in_array($id_sumin_ant, $sumins)){
						$datos_sumin = array(
						'id_sumin'=>$id_sumin_ant,
						'id_emp_prov'=>$id);
						$this->db->where($datos_sumin);					
						$this->db->delete("emp_prov_x_suministros");
					}
				}
			}
		}else{
			return(false);
		}
	}
	
	function total_rel_sumin($id){
		$query=$this->db->where('id_emp_prov',$id);
		$sum=0;
		$query = $this->db->get('emp_prov_x_suministros');
		//$lista[""]='- Empresa -'; Opción sin valor, servirá de selección por defecto.
		if($query->num_rows()>0){
			foreach($query->result_array() as $resultado){
				$lista[$sum]= $resultado['id_sumin'];
				$sum ++;
			}
			return $lista;
		}
	}

	/*function guardar_equipos($id, $equipos){
		if($id!="" && $id!=NULL){
			$this->db->where("id_emp_prov", $id);
			if($this->db->delete("emp_prov_x_equipos")){
				if(is_array($equipos) && sizeof($equipos)){
					foreach($equipos as $e){
						$data["id_equipo"]=$e;
						$data["id_emp_prov"]=$id;
						$this->db->insert("emp_prov_x_equipos", $data);

					}
					return(true);
				}else{
					return(false);
				}
			}else{
				return(false);
			}
		}else{
			return(false);
		}
	}*/
	
	function guardar_equipos($id, $equipos){
		if($id!="" && $id!=NULL){
			if(is_array($equipos) && sizeof($equipos)>0){
				foreach($equipos as $id_eq){
					if($id_eq!=0){
						$datos_eq = array(
							'id_equipo'=>$id_eq,
							'id_emp_prov'=>$id);
							
						$this->db->where($datos_eq);
						$query=$this->db->get('emp_prov_x_equipos');	
						if($query->num_rows()==0){
							$this->db->insert("emp_prov_x_equipos", $datos_eq);
						}
					}
				}
			}
						
			$total_relaciones_eq=$this->total_rel_equipo($id);
		
			if($total_relaciones_eq!=NULL){
				foreach($total_relaciones_eq as $id_eq_ant){		  
					if(!in_array($id_eq_ant, $equipos)){
						$datos_eq = array(
						'id_equipo'=>$id_eq_ant,
						'id_emp_prov'=>$id);
						$this->db->where($datos_eq);					
						$this->db->delete("emp_prov_x_equipos");
					}
				}
			}
		}else{
			return(false);
		}
	}
	
	function total_rel_equipo($id){
		$query=$this->db->where('id_emp_prov',$id);
		$sum=0;
		$query = $this->db->get('emp_prov_x_equipos');
		//$lista[""]='- Empresa -'; Opción sin valor, servirá de selección por defecto.
		if($query->num_rows()>0){
			foreach($query->result_array() as $resultado){
				$lista[$sum]= $resultado['id_equipo'];
				$sum ++;
			}
			return $lista;
		}
	}
	
	function guardar_servicios($id, $servicios){
		if($id!="" && $id!=NULL){
			if(is_array($servicios) && sizeof($servicios)>0){
				foreach($servicios as $id_serv){
					if($id_serv!=0){
						$datos = array(
							'id_serv'=>$id_serv,
							'id_emp_prov'=>$id);
							
						$this->db->where($datos);
						$query=$this->db->get('emp_prov_x_servicios');	
						if($query->num_rows()==0){
							$this->db->insert("emp_prov_x_servicios", $datos);
						}
					}
				}
			}
						
			$total_relaciones=$this->total_rel_serv($id);
		
			if($total_relaciones!=NULL){
				foreach($total_relaciones as $id_serv_ant){		  
					if(!in_array($id_serv_ant, $servicios)){
						$datos = array(
						'id_serv'=>$id_serv_ant,
						'id_emp_prov'=>$id);
						$this->db->where($datos);					
						$this->db->delete("emp_prov_x_servicios");
					}
				}
			}
		}else{
			return(false);
		}
	}
	
	function total_rel_serv($id){
		$query=$this->db->where('id_emp_prov',$id);
		$sum=0;
		$query = $this->db->get('emp_prov_x_servicios');
		if($query->num_rows()>0){
			foreach($query->result_array() as $resultado){
				$lista[$sum]= $resultado['id_serv'];
				$sum ++;
			}
			return $lista;
		}
	}

	function guardar_cat_servicios($id, $cs){
		if($id!="" && $id!=NULL){
			$sum=0;
			if(is_array($cs) && sizeof($cs)>0){
				foreach($cs as $a){
					if($a!=0){
						$a=explode("_",$a);
						$scat[$sum]=$a[1];
						$datos = array(
							'id_serv'=>$a[0],
							'id_cat_serv'=>$a[1],
							'id_emp_prov'=>$id);
							
						$this->db->where($datos);
						$query=$this->db->get('emp_prov_x_servcat');	
						if($query->num_rows()==0){
							$this->db->insert("emp_prov_x_servcat", $datos);
						}
					   $sum++;
					}
				}
			}
						
			$total_relaciones=$this->total_rel_serv_cat($id);
		
			if($total_relaciones!=NULL){
				foreach($total_relaciones as $id_cat_ant){	
					if(!in_array($id_cat_ant, $scat)){
						$datos = array(
						'id_cat_serv'=>$id_cat_ant,
						'id_emp_prov'=>$id);
						$this->db->where($datos);					
						$this->db->delete("emp_prov_x_servcat");
					}
				}
			}
		}else{
			return(false);
		}
	}
	
	
	
	function total_rel_serv_cat($id){
		$query=$this->db->where('id_emp_prov',$id);
		$sum=0;
		$query = $this->db->get('emp_prov_x_servcat');
		if($query->num_rows()>0){
			foreach($query->result_array() as $resultado){
				$lista[$sum]= $resultado['id_cat_serv'];
				$sum ++;
			}
			return $lista;
		}
	}

	function guardar_subcat_servicios($id, $ss){
		if($id!="" && $id!=NULL){
			$sum=0;
			if(is_array($ss) && sizeof($ss)>0){
				foreach($ss as $a){
					if($a!=0){
						$a=explode("_",$a);
						$ssub[$sum]=$a[2];
						$datos = array(
							'id_serv'=>$a[0],
							'id_cat_serv'=>$a[1],
							'id_sub_serv'=>$a[2],
							'id_emp_prov'=>$id);
							
						$this->db->where($datos);
						$query=$this->db->get('emp_prov_x_servsubcat');	
						if($query->num_rows()==0){
							$this->db->insert("emp_prov_x_servsubcat", $datos);
						}
					   $sum++;
					}
				}
			}
						
			$total_relaciones=$this->total_rel_serv_subcat($id);
		
			if($total_relaciones!=NULL){
				foreach($total_relaciones as $id_sub_ant){	
					if(!in_array($id_sub_ant, $ssub)){
						$datos = array(
						'id_sub_serv'=>$id_sub_ant,
						'id_emp_prov'=>$id);
						$this->db->where($datos);					
						$this->db->delete("emp_prov_x_servsubcat");
					}
				}
			}
		}else{
			return(false);
		}
	}
	
	function total_rel_serv_subcat($id){
		$query=$this->db->where('id_emp_prov',$id);
		$sum=0;
		$query = $this->db->get('emp_prov_x_servsubcat');
		if($query->num_rows()>0){
			foreach($query->result_array() as $resultado){
				$lista[$sum]= $resultado['id_sub_serv'];
				$sum ++;
			}
			return $lista;
		}
	}

	function cargar_cat_serv_emp($servs, $id){
		$data=explode(',',$servs);
		$cat_adj=$this->get_catserv($id);
		$return="";

				if($data!=""){
					foreach($data as $id_serv){
					$query=$this->db->order_by('Nombre_cat_serv', 'asc');
					$query=$this->db->where('id_serv', $id_serv);
					$query=$this->db->get('servicios_princ_cat');
					$result=$query->result();
					if($query->num_rows()>0){
						$query=$this->db->where('id_serv', $id_serv);
						$query=$this->db->get('servicios_principales');
						$servicio=$query->first_row();
						$return.="<div id='serv_".$servicio->id_serv."'><fieldset style='width:97%; padding-right:10px'>";
						if(isset($servicio->Nombre_serv)){
							$titulo="<b>".$servicio->Nombre_serv."</b><br>";
						}else{
							$titulo="";
						}
						$return=$return.$titulo;
						foreach($result as $rs){
							if(in_array($rs->id_cat_serv, $cat_adj)){
								$checked="checked='checked'";
							}else{
								$checked="";
							}
							
							$fila="<div style='clear:both; width:100%;'><input type='checkbox' name='serv_cat[]' ".$checked." id='".$rs->id_serv."_".$rs->id_cat_serv."' value='".$rs->id_serv."_".$rs->id_cat_serv."' class='check_cat' /><label for='".$rs->id_serv."_".$rs->id_cat_serv."'>".$rs->Nombre_cat_serv."</label><div style='clear:both; padding-left:20px; padding-right:20px; width:97%' id='serv_subcat_".$rs->id_serv."_".$rs->id_cat_serv."'></div></div>";
							$return.=$fila;

						}
						$return.="</fieldset></div>";
						
					}
				}
			}
		
		return(array("result"=>$return));
	}

	function cargar_subcat_serv_emp($id_sub, $id){
		$cat_adj=$this->get_subcatserv($id);
		$return="";
		$servs=explode("_", $id_sub);
		if(is_array($servs) && sizeof($servs)>1){
			$query=$this->db->where('id_serv', $servs[0]);
			$query=$this->db->where('id_cat_serv', $servs[1]);
			$query=$this->db->order_by('Nombre_sub_serv', 'asc');
			$query=$this->db->get('servicios_princ_subcat');
			$result=$query->result();
			if($query->num_rows()>0){
				$return="<fieldset style='padding:4px;'><div style='float:left;'>";
				foreach($result as $rs){
					if(in_array($rs->id_sub_serv, $cat_adj)){
						$checked="checked='checked'";
					}else{
						$checked="";
					}
					$fila="<div style='float:left; padding-right:20px; padding-top:4px; padding-bottom:4px;'><input type='checkbox' name='serv_subcat[]' ".$checked." value='".$rs->id_serv."_".$rs->id_cat_serv."_".$rs->id_sub_serv."' id='".$rs->id_serv."_".$rs->id_cat_serv."_".$rs->id_sub_serv."'/><label for='".$rs->id_serv."_".$rs->id_cat_serv."_".$rs->id_sub_serv."'>".$rs->Nombre_sub_serv."</label></div>";
					$return.=$fila;
				}
				$return.="</div></fieldset>";
			}
		}
		return(array("result"=>$return));
	}

	function get_serv($id){
		$where="";
		
		$this->db->where("eps.id_emp_prov", $id);
		$this->db->from("servicios_principales spc");
		$this->db->join("emp_prov_x_servicios eps", "spc.id_serv=eps.id_serv", "inner");
		$this->db->order_by("Nombre_serv asc");
		$dt=$this->db->get();
		$dt=$dt->result();
		$dt2=array();
		if(is_array($dt) && sizeof($dt)>0){
			foreach($dt as $d){
				$dt2[]=$d->id_serv;
			}
		}
		return($dt2);
	}

	function cargar_subcat_serv($id){
		$return="";
		$servs=explode("_", $id);
		if(is_array($servs) && sizeof($servs)>1){
			$query=$this->db->where('id_serv', $servs[0]);
			$query=$this->db->where('id_cat_serv', $servs[1]);
			$query=$this->db->order_by('Nombre_sub_serv', 'asc');
			$query=$this->db->get('servicios_princ_subcat');
			$result=$query->result();
			if($query->num_rows()>0){
				$return="<fieldset style='padding:4px;'><div style='float:left;'>";
				foreach($result as $rs){
					$fila="<div style='float:left; padding-right:20px; padding-top:4px; padding-bottom:4px;'><input type='checkbox' name='serv_subcat[]' value='".$rs->id_serv."_".$rs->id_cat_serv."_".$rs->id_sub_serv."' id='".$rs->id_serv."_".$rs->id_cat_serv."_".$rs->id_sub_serv."'/><label for='".$rs->id_serv."_".$rs->id_cat_serv."_".$rs->id_sub_serv."'>".$rs->Nombre_sub_serv."</label></div>";
					$return.=$fila;
				}
				$return.="</div></fieldset>";
			}
		}
		return(array("result"=>$return));
	}

	function get_equipos($id){
		$where="";
		
		$this->db->where("exs.id_emp_prov", $id);
		$this->db->from("equipos_principales ep");
		$this->db->join("emp_prov_x_equipos exs", "ep.id_equipo=exs.id_equipo", "inner");
		$this->db->order_by("Nombre_equipo asc");
		$dt=$this->db->get();
		$dt=$dt->result();
		return($dt);
	}

	function get_suministros($id){
		$where="";
		
		$this->db->where("exs.id_emp_prov", $id);
		$this->db->from("suministros_principales sp");
		$this->db->join("emp_prov_x_suministros exs", "sp.id_sumin=exs.id_sumin", "inner");
		$this->db->order_by("Nombre_sumin asc");
		$dt=$this->db->get();
		$dt=$dt->result();
		return($dt);
	}

	function get_catserv($id){
		$where="";
		
		$this->db->where("eps.id_emp_prov", $id);
		$this->db->from("servicios_princ_cat spc");
		$this->db->join("emp_prov_x_servcat eps", "spc.id_cat_serv=eps.id_cat_serv", "inner");
		$this->db->order_by("Nombre_cat_serv asc");
		$dt=$this->db->get();
		$dt=$dt->result();
		$dt2=array();
		if(is_array($dt) && sizeof($dt)>0){
			foreach($dt as $d){
				$dt2[]=$d->id_cat_serv;
			}
		}
		return($dt2);
	}

	function get_subcatserv($id){
		$where="";
		
		$this->db->where("eps.id_emp_prov", $id);
		$this->db->from("servicios_princ_subcat spc");
		$this->db->join("emp_prov_x_servsubcat eps", "spc.id_sub_serv=eps.id_sub_serv", "inner");
		$this->db->order_by("Nombre_sub_serv asc");
		$dt=$this->db->get();
		$dt=$dt->result();
		$dt2=array();
		if(is_array($dt) && sizeof($dt)>0){
			foreach($dt as $d){
				$dt2[]=$d->id_sub_serv;
			}
		}
		return($dt2);
	}

	function buscar_equipos($equipo){
		//$this->db->where('Razon_social_socio',$nombre);
		$sum=0;
		$lista=array();
		$this->db->like('Nombre_equipo', $equipo); 
		$this->db->from("equipos_principales");
		$query=$this->db->get();
		foreach($query->result_array() as $resultado){
			$lista[$sum]['id']= $resultado['id_equipo'];
			$lista[$sum]['label']= $resultado['Nombre_equipo'];
			$lista[$sum]['value']= $resultado['Nombre_equipo'];
			$sum ++;
		}
		return($lista);
	}
	
	function buscar_equipos_id($equipo){
		$this->db->where('id_equipo', $equipo); 
		$query=$this->db->get("equipos_principales");
		return($query->first_row());
	}

	function buscar_suministros($sumin){
		//$this->db->where('Razon_social_socio',$nombre);
		$sum=0;
		$lista=array();
		$this->db->like('Nombre_sumin', $sumin); 
		$this->db->from("suministros_principales");
		$query=$this->db->get();
		foreach($query->result_array() as $resultado){
			$lista[$sum]['id']= $resultado['id_sumin'];
			$lista[$sum]['label']= $resultado['Nombre_sumin'];
			$lista[$sum]['value']= $resultado['Nombre_sumin'];
			$sum ++;
		}
		return($lista);
	}
	
	
	
	function buscar_suministros_id($sumin){
		$this->db->where('id_sumin', $sumin); 
		$query=$this->db->get("suministros_principales");
		return($query->first_row());
	}
	
	function buscar_subcat_serv_id($sub){
		$this->db->where('id_sub_serv', $sub); 
		$query=$this->db->get("servicios_princ_subcat");
		return($query->first_row());
	}

	function guarda_pagina($id, $id_pag, $nro_version, $url, $pais){
		$datos=array("id_pagina_emp"=>$id_pag, "nro_version"=>$nro_version, "url_confluence_emp"=>$url); 
		$this->db->where('codigo', $id);
		if($pais==$this->params->pais_demp[0])
			return($this->db->update('empresas_chilenas', $datos));
		else if($pais==$this->params->pais_demp[1])
			return($this->db->update('empresas_peruanas', $datos));
		else
			return(false);
	}

	function buscar_operadores($texto="", $tipo="", $pais=""){
		if($texto!="" && $texto!=NULL && $tipo!="" && $tipo!=NULL){
			$this->db->group_by("operador");
			$this->db->like($tipo, $texto, "both");
			if($pais==$this->params->pais_demp[0])
				$query=$this->db->get("empresas_chilenas");
			else if($pais==$this->params->pais_demp[1])
				$query=$this->db->get("empresas_peruanas");
			else{
				echo "ERROR1";
				return(false);
			}
			$rs=$query->result();
			if(is_array($rs) && sizeof($rs)>0){
				return($rs);
			}else{
				return(true);
			}
		}else{
			echo "ERROR2";
			return(false);
		}
	}

	function buscar_empresas($texto="", $tipo="", $pais="", $operador){
		if($texto!="" && $texto!=NULL && $tipo!="" && $tipo!=NULL){
			$this->db->where("operador", $operador);
			$this->db->like($tipo, $texto, "both");
			if($pais==$this->params->pais_demp[0])
				$query=$this->db->get("empresas_chilenas");
			else if($pais==$this->params->pais_demp[1])
				$query=$this->db->get("empresas_peruanas");
			else{
				echo "ERROR1";
				return(false);
			}
			$rs=$query->result();
			if(is_array($rs) && sizeof($rs)>0){
				return($rs);
			}else{
				return(true);
			}
		}else{
			echo "ERROR2";
			return(false);
		}
	}

	function genera_html_template($id, $pais){
		if($id!="" && $id!=NULL){
			if($rs=$this->buscar_empresa($id, $pais)){
				return($this->load->view("dir_emp/ver_soap", array("emp"=>$rs, "pais"=>$pais), true));
			}else{
				return(false);
			}
		}else{
			return(false);
		}
	}

	function buscar_empresa($id, $pais){
		if($id!="" && $id!=NULL){
			$this->db->where("codigo", $id);
			if($pais==$this->params->pais_demp[0])
				$query=$this->db->get("empresas_chilenas");
			else if($pais==$this->params->pais_demp[1])
				$query=$this->db->get("empresas_peruanas");
			$rs=$query->first_row();
			if(is_object($rs)){
				return($rs);
			}else{
				return(false);
			}
		}else{
			return(false);
		}
	}
	
	function buscar_directorio_id($id_socio){
			$this->db->where("ep.id_socio", $id_socio);
			$this->db->where("soc.tiene_directorio", 1);
			$this->db->join("socio soc", "soc.id_socio=ep.id_socio", "left");
			$query=$this->db->get("emp_prov ep");
			$rs=$query->first_row();
			if(is_object($rs)){
				return($rs);
			}else{
				return(false);
			}
	}
} 
?>