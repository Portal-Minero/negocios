<?php
class Mod_muro_general extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function ingresar($datos){
		
		
	}





  public function tipo_socio($username){
		//$this->db->select("soc.tipo_socio");
		$this->db->where("us.username_socio", $username);
		$this->db->join("user_socio us", "us.id_socio=soc.id_socio", "inner");
		$query=$this->db->get("socio soc");
		$rs=$query->first_row();
		return($rs);
	}
	
	
	
	function usuario_contacto($id_socio,$id_user_socio){
		$this->db->where('id_socio',$id_socio);
		$this->db->where('contacto_admin_socio',1);
		$this->db->where('id_user_socio',$id_user_socio);
		$query=$this->db->get('user_socio');
		$result=$query->first_row();
		return $result;
	}
	
	
	function datos_vendedor($id_vendedor){
		$this->db->where('id_user',$id_vendedor);
		$query=$this->db->get('m_user');
		$result=$query->first_row();
		return $result;

	}
	
	
	function mostrar_sectores($membresia=0,$id_socio=0){
		if($membresia=='Preferencial'){
			$this->db->or_where('id_sector',1);
			$this->db->or_where('id_sector',2);
			$query=$this->db->get('proyectos_sector');
		}
		else if($membresia=='Premium'){
			$query=$this->db->get('proyectos_sector');
		}
		else if((($membresia=='Mandante')||($membresia=='Especial'))&&($id_socio!=0)){
			$this->db->where('socio_x_sector.id_socio',$id_socio);
			$this->db->join('proyectos_sector','proyectos_sector.id_sector=socio_x_sector.id_sector');
			$query=$this->db->get('socio_x_sector');
		}
		$result=$query->result();
		return $result;
	}
	
	
	function query_graba_sectores_selecionados($id_user_socio,$id_sector){
				  $data = array(
                    'id_user_socio' => $id_user_socio,
                    'id_sector' => $id_sector
                );

				$this->db->insert('user_socio_sector', $data);
				
			}
			
			
	function borra_sectores_selecionados($SES_id_user_socio){
				
				$this->db->where('id_user_socio', $SES_id_user_socio);
                $this->db->delete('user_socio_sector');

				
				
	}
	
	
	function sectores_selecionados(){
		$SES_id_user_socio = $this->session->userdata('SES_id_user_socio');
		$SES_sectores      = $this->session->userdata('SES_sectores');
		
		 $sql = "SELECT
			  id_sector,
			  Nombre_sector,
			  ( SELECT id_sector FROM user_socio_sector WHERE id_sector = proyectos_sector.id_sector AND id_user_socio = ".$SES_id_user_socio." ) AS elegido
			FROM portalminero.proyectos_sector WHERE id_sector IN (".$SES_sectores.")";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
		
	}
	
	
	function recientemente_actualizado_proyectos($id_usuario=0){
		
		
		
		 $sql = "SELECT	  id_pro,
				  Nombre_pro,
				  Fecha_actualizacion_pro
				FROM portalminero.proyectos
				WHERE id_pagina_pro IS NOT NULL AND borrar =0 AND id_sector IN (1,2,3,4,5,6)
				ORDER BY Fecha_actualizacion_pro DESC
				LIMIT 0, 25;
				";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				  
	}
	
	
	
	
	function recientemente_actualizado_licitaciones($id_usuario=0){
		
		
		
		 $sql = "SELECT
				  id_lici,
				  Nombre_lici_completo,
				  Fecha_creacion_lici
				FROM portalminero.licitaciones
				WHERE borrar=0 AND id_pagina_lici IS NOT NULL  AND id_sector IN (1,2,3,4,5,6)
				ORDER BY id_lici DESC
				LIMIT 0, 25;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				  
	}
	
	function usuarios_empresa($id_socio=0){
		
		
		
		 $sql = "SELECT
			  id_user_socio,
			  id_socio,
			  nombre_completo_socio
			FROM portalminero.user_socio
			WHERE id_socio =".$id_socio." ;";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				  
	}
	
	function boletin_premium(){
		
		
		
		 $sql = "SELECT
				  id_bol,
				  Fecha_bol,
				  Texto_bol,
				  Link_bol
				FROM portalminero.socio_boletin_premium
				ORDER BY Fecha_bol DESC";
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				  
	}
	
	
	 public function SectoresSocios($username)
	{
	    
	    $respuesta =  array();
	    $indice    =        0;
	    $i         =        0;
	   

	    $query = "SELECT
					socio_x_sector.id_socio
					, proyectos_sector.id_sector
					, proyectos_sector.Nombre_sector
					, socio_x_sector.id_socio
					, socio.tipo_socio
					, user_socio.username_socio
					, user_socio.password_socio
					
				FROM
					portalminero.socio_x_sector
					INNER JOIN portalminero.proyectos_sector 
						ON (socio_x_sector.id_sector = proyectos_sector.id_sector)
					INNER JOIN portalminero.socio 
						ON (socio.id_socio = socio_x_sector.id_socio)
					INNER JOIN portalminero.user_socio 
						ON (socio.id_socio = user_socio.id_socio)
				WHERE (user_socio.username_socio = '".$username."');";
				
				//echo $query;
				
		$query = $this->db->query($query);
	    
				
	    foreach ($query->result() as $row)
	    {
			
	        $respuesta[$i][0]  = $row->Nombre_sector;
	        $respuesta[$i][1]  = $row->tipo_socio;
			$respuesta[$i][2]  = $row->id_sector;
	        
	        $i++;
	    }
	    
	    $query->free_result();
	    $this->db->close();
	    return($respuesta);
	}	
	
	
	
	
	
	
	function buscar_faenas($id=0, $texto="", $categoria="", $procesos="", $faena="", $pag=0){
		if($id=="" || $id==NULL || $id==0){
			$this->db->order_by("o.Faena", "asc");
			$this->db->group_by("o.Id");
			$this->db->select("o.*, a.id AS id_ominera");
			$this->db->join("Areas a", "a.Idf=o.Id", "inner");

			if(intval($categoria)==0){
				$this->db->where("(a.equiposp like '%".$texto."%' or a.equiposs like '%".$texto."%')");
			}else{
				$this->db->or_like("a.Insumos", $texto);
			}

			if($procesos!="" && $procesos!=NULL)
				$this->db->like("a.Nombre", $procesos);
			
			if($faena!="" && $faena!=NULL){
				if(strlen($faena)>2){
					$str="";
					$ids=ceil(strlen($faena)/2);
					for($x=0; $x<$ids; ++$x){
						if($str==""){
							$str.="(o.Id='".substr($faena, 2*$x, 2)."'";
						}else{
							$str.=" or o.Id='".substr($faena, 2*$x, 2)."'";
						}
					}
					if($str!=""){
						$str.=")";
						$this->db->where($str);
					}
				}else{
					$this->db->where("o.Id", $faena);
				}
			}

			if($pag!=0){
				$query=$this->db->get("Omineras o", 1, intval($pag)-1);	
			}else{
				$query=$this->db->get("Omineras o");	
			}

			$rs=$query->result();
			if(is_array($rs) && sizeof($rs)){
				return($rs);
			}else{
				return(array());
			}
		}else{
			$this->db->where("o.Id", $id);
			$this->db->group_by("o.Id");
			$this->db->select("o.*");
			$this->db->join("Areas a", "a.Idf=o.Id", "inner");
			$query=$this->db->get("Omineras o");
			$rs=$query->first_row();
			if(is_object($rs))
				return($rs);
			else
				return(array());
		}
	}
	
	   
	
	function buscar_procesos($id=0, $id_faena=0, $texto, $categoria="", $procesos="", $faena=""){
		if($id=="" || $id==NULL || $id==0){
			$this->db->group_by("a.Id");
			$this->db->order_by("a.Nombre", "asc");
			$this->db->where("a.Idf", $id_faena);
			if(intval($categoria)==0){
				$this->db->where("(a.equiposp like '%".$texto."%' or a.equiposs like '%".$texto."%')");
			}else{
				$this->db->or_like("a.Insumos", $texto);
			}

			/*if($faena!="" && $faena!=NULL){
				$this->db->like("a.Idf", $faena);
			}*/

			if($procesos!="" && $procesos!=NULL)
				$this->db->like("a.Nombre", $procesos);

			$query=$this->db->get("Areas a");
			$list="";
			$rs2=$query->result();
			if(is_array($rs2) && sizeof($rs2)){
				return($rs2);
			}else{
				return(array());
			}
		}else{  
			$this->db->where("a.Id", $id);
			$this->db->group_by("a.Id");
			$this->db->select("a.*");
			$query=$this->db->get("Areas a");
			$rs=$query->first_row();
			if(is_object($rs))
				return($rs);
			else
				return(array());
		}
	}
	


			function trae_proceso_faena($ids){

					//$sql = "SELECT * FROM Areas a WHERE a.Idf = '4' AND id IN ($ids) GROUP BY a.Id ORDER BY a.Nombre ASC";
					$sql = "SELECT * FROM Areas a WHERE  id IN ($ids) GROUP BY a.Id ORDER BY a.Nombre ASC";
									  
									  $query     = $this->db->query($sql);
									  $arreglo   = $query->result_array();
									  return ($arreglo);
							  
			}	


          function trae_Omineras_faena($id=0){

					//$sql = "SELECT * FROM Areas a WHERE a.Idf = '4' AND id IN ($ids) GROUP BY a.Id ORDER BY a.Nombre ASC";
					$sql = "SELECT Faena,imagen FROM Omineras WHERE Id=".$id;
									  
									  $query     = $this->db->query($sql);
									  $arreglo   = $query->result_array();
									  return ($arreglo);
							  
			}

			
	
} // fin clase 
?>