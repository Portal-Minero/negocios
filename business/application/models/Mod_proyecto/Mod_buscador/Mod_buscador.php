<?php
class Mod_buscador extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	
function m_linea_id_proyectos_filtro($linea_id_proyectos_filtro=""){
	
	if($linea_id_proyectos_filtro==""){return("");}
	return ( " AND id_pro in ( ".$linea_id_proyectos_filtro." )");
}


function todos_los_sectores($sector){
	$rc="";
	if($sector==0){
		$sector_todos=$this->session->userdata('SES_sectores');
		
		$rc="   $sector_todos  ";
		
	}
	
	if($sector==9){
		$sector_todos=$this->session->userdata('SES_sectores');
		
		$rc=" AND ( id_sector in ( $sector_todos)  ) ";
		
	}
	
	return($rc);
}


	function carga_proyectos_inicial($sector,$inicio,$fin,$orden=0,$desc__acen=0,$linea_id_proyectos_filtro=""){
	
					
    $order_by = " Fecha_actualizacion_pro ";	
	
	switch ($orden) {
		  case 1:
			$order_by=" Nombre_pro ";
			break;
		  case 2:
			$order_by=" Inversion_pro ";
			break;
		  case 3:
			$order_by=" Fecha_actualizacion_pro ";
			break;
   
   } 
   
         $linea_id_proyectos_filtro = $this->lee_linea_id_consultas();
		 
         
		 if($desc__acen==0){
			 $order_by=$order_by." DESC";
		 }else{
			 $order_by=$order_by." ASC";
		 }
	     
		 $total_query = 0;
		 /*Un los sectores*/

		 if($sector!=0  && $sector!=9){
			 $sql = "SELECT id_pro,TRIM(Nombre_pro) AS tNombre_pro,Inversion_pro,Nombre_pais,Nombre_pais,Fecha_actualizacion_pro,Nombre_region
			 FROM vista_buscador_proyecto WHERE id_sector = ".$sector.$this->m_linea_id_proyectos_filtro($linea_id_proyectos_filtro)." ORDER BY   ".$order_by."  LIMIT ".$inicio.", ".$fin.";";
		 			 
			 $sql_cantidad = "select count(*)	as total FROM vista_buscador_proyecto WHERE id_sector = ".$sector.$this->m_linea_id_proyectos_filtro($linea_id_proyectos_filtro);
			 
		     $total_query = $this->count_query($sql_cantidad);
		     
		 
		 }
		 
		 
		 
		 /*todos los sectores*/
		  if($sector==0){
			  
				 
				 if($linea_id_proyectos_filtro==""){ 
				        // cunado carga pagina primera vez 
						
						$todos_los_sectores   = $this->todos_los_sectores($sector);
						
						$sql = "SELECT id_pro,TRIM(Nombre_pro) AS tNombre_pro,Inversion_pro,Nombre_pais,Nombre_pais,Fecha_actualizacion_pro,Nombre_region
						FROM vista_buscador_proyecto WHERE id_sector IN ( $todos_los_sectores )  ORDER BY   ".$order_by."  LIMIT ".$inicio.", ".$fin.";";
						
						$sql_cantidad = "Select count(*)	as total FROM vista_buscador_proyecto WHERE id_sector IN ( $todos_los_sectores )";
						$total_query  = $this->count_query($sql_cantidad);
						
				 }else{
					 
					     
						 $sql = "SELECT id_pro,TRIM(Nombre_pro) AS tNombre_pro,Inversion_pro,Nombre_pais,Nombre_pais,Fecha_actualizacion_pro,Nombre_region
						 FROM vista_buscador_proyecto WHERE 1 = 1".$this->m_linea_id_proyectos_filtro($linea_id_proyectos_filtro)." ORDER BY   ".$order_by."  LIMIT ".$inicio.", ".$fin.";";
						 
						 
						 $sql_cantidad = "Select count(*)	as total 
						 FROM vista_buscador_proyecto WHERE 1 = 1".$this->m_linea_id_proyectos_filtro($linea_id_proyectos_filtro);
						 $total_query = $this->count_query($sql_cantidad);
						 
						
			   } 
		 
		 }
		 
		 
		 
		 if($sector==9){// sugeridos para UD
		 
		      if($linea_id_proyectos_filtro==""){
				  // cunado carga pagina primera vez 
		             $id_socio = $this->session->userdata('SES_id_socio');
					 $sectores = $this->session->userdata('SES_sectores');
			         $linea_id_proyectos_filtro = $this->get_proyectos_sugeridos($sectores,$id_socio);
					 
					 $sql = "SELECT id_pro,TRIM(Nombre_pro) AS tNombre_pro,Inversion_pro,Nombre_pais,Nombre_pais,Fecha_actualizacion_pro,Nombre_region
			         FROM vista_buscador_proyecto WHERE id_pro in (". $linea_id_proyectos_filtro.")  ORDER BY   ".$order_by."  LIMIT ".$inicio.", ".$fin.";";
			
					$sql_cantidad = "Select count(*)	as total
			         FROM vista_buscador_proyecto WHERE id_pro in (". $linea_id_proyectos_filtro.") ";
					$total_query = $this->count_query($sql_cantidad);
					
			}else{		
			 		 
				 $sql = "SELECT id_pro,TRIM(Nombre_pro) AS tNombre_pro,Inversion_pro,Nombre_pais,Nombre_pais,Fecha_actualizacion_pro,Nombre_region
				 FROM vista_buscador_proyecto WHERE id_pro in (". $linea_id_proyectos_filtro.")  ORDER BY   ".$order_by."  LIMIT ".$inicio.", ".$fin.";";	
				 
				     $sql_cantidad = "Select count(*)	as total
			         FROM vista_buscador_proyecto WHERE id_pro in (". $linea_id_proyectos_filtro.") ";
					 
					 $total_query = $this->count_query($sql_cantidad);
					
		   }
		 
		} 
				  
				  
				   
				  $query        = $this->db->query($sql);
				  $arreglo      = $query->result_array();
				  $respuesta=$this->crea_html_inicial($arreglo,$inicio,$fin,$total_query,$sector);
				  echo $respuesta;
				  
				 
	}
	 
function cantidad_lineas_consulta($sql){
	              $numero_filas = 0;
	              $query        = $this->db->query($sql);
				  $numero_filas = $query->num_rows();
				  return ($numero_filas);
	
}	
	
	
function carga_proyectos_nombre($sector,$inicio,$fin,$nombre=0,$orden=0,$desc__acen=0){
	 
	
		 $order_by = " Fecha_actualizacion_pro ";	
	
	      switch ($orden) {
				  case 1:
					$order_by=" Nombre_pro ";
					break;
				  case 2:
					$order_by=" Inversion_pro ";
					break;
				  case 3:
					$order_by=" Fecha_actualizacion_pro ";
					break;
   
          } 
   
         
		 if($desc__acen==0){
			 $order_by=$order_by." DESC";
		 }else{
			 $order_by=$order_by." ASC";
		 }
		
		if($sector!=0  && $sector!=9){
		  $sql = "SELECT id_pro,TRIM(Nombre_pro) AS tNombre_pro,Inversion_pro,Nombre_pais,Nombre_pais,Fecha_actualizacion_pro,Nombre_region FROM vista_buscador_proyecto WHERE id_sector = ".$sector.$this->todos_los_sectores($sector)."  and Nombre_pro like '%".$nombre."%' ORDER BY   ".$order_by."  LIMIT ".$inicio.", ".$fin.";";
		  
		  $cuenta_linea ="SELECT  count(*) as total FROM vista_buscador_proyecto WHERE id_sector = ".$sector.$this->todos_los_sectores($sector)."  and Nombre_pro like '%".$nombre."%' ";
		//  echo $cuenta_linea;
	//exit;
	       
	
		  $total_query = $this->count_query($cuenta_linea);
		 }
		  
		  if($sector==0){
			 
			   $sql = "SELECT id_pro,TRIM(Nombre_pro) AS tNombre_pro,Inversion_pro,Nombre_pais,Nombre_pais,Fecha_actualizacion_pro,Nombre_region FROM vista_buscador_proyecto WHERE  id_sector IN (".$this->todos_los_sectores($sector).")  and Nombre_pro like '%".$nombre."%' ORDER BY   ".$order_by."  LIMIT ".$inicio.", ".$fin.";";
			   //echo $sql;
		
               $cuenta_linea= "SELECT count(*) as total FROM vista_buscador_proyecto WHERE   id_sector IN (".$this->todos_los_sectores($sector).")  and Nombre_pro like '%".$nombre."%' ";

			   $total_query = $this->count_query($cuenta_linea);
		  }  
		  
		  
		  if($sector==9){
			  $sql = "SELECT id_pro,TRIM(Nombre_pro) AS tNombre_pro,Inversion_pro,Nombre_pais,Nombre_pais,Fecha_actualizacion_pro,Nombre_region FROM vista_buscador_proyecto WHERE 1 = 1".$this->todos_los_sectores($sector)."  and Nombre_pro like '%".$nombre."%' ORDER BY   ".$order_by."  LIMIT ".$inicio.", ".$fin.";";
		
			 $cuenta_linea= "SELECT count(*) as total FROM vista_buscador_proyecto WHERE   id_sector IN (".$this->todos_los_sectores(0).")  and Nombre_pro like '%".$nombre."%' ";

			   $total_query = $this->count_query($cuenta_linea);
		  }
			  
		

				 
				   
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  $respuesta = $this->crea_html_inicial($arreglo,$inicio,$fin,$total_query,$sector);
				  echo $respuesta;
				  
				 
	}

 function count_query($sql=""){
	 // echo $sql;
	  $query = $this->db->query($sql);
	   
	    foreach ($query->result() as $row)
	    {
	         
	         $respuesta = $row->total;	            
	    }
	    $query->free_result();
	    	  
	    return($respuesta);
	  
  }

	function crea_html_inicial($arreglo,$inicio,$fin,$total_query,$sector){
		$this->load->helper('url');
        $pagina_pro = base_url()."Fichaproyecto/ficha_proyectos/";
		$arreglo_lineas = count($arreglo); 
		$respuesta="";
		$timestamp ="";
		
		
		foreach ($arreglo as $row){
			
			
			        $popup="&nbsp; <a rel='shadowbox;width=1100;' data-toggle='modal' data-target='#exampleModalLong' href='#' onclick='popupproyecto(".$row['id_pro'].",$sector);' style='font-size:10px;color:#999;display:inline-block'>(Ver En Pop-Up)</a>";
					
			        $encriptada = $pagina_pro.$row['id_pro']."/".$sector."/0/";
					
			        $timestamp = strtotime($row['Fecha_actualizacion_pro']); 
                    $newDate = date("m-d-Y", $timestamp );
					
			        $respuesta =$respuesta."<tr>";
				    $respuesta =$respuesta."<td><a href='".$encriptada."' >".$row['tNombre_pro']."</a>".$popup."</td>"; 
					$respuesta =$respuesta."<td>".$row['Nombre_pais']."</td>";
					$respuesta =$respuesta."<td>".$row['Nombre_region']."</td>";
					$respuesta =$respuesta."<td  align='right'>".number_format($row['Inversion_pro'], 0, ",", ".")."</td>";
					$respuesta =$respuesta."<td>".$newDate."</td>";
					$respuesta =$respuesta."<td><span style='font-size:10px;color:#999; text-decoration:none'><a href='#' onclick='seguir_proyecto(".$row['id_pro'].");'><img src='../../../app/imagen/observar.png'></a>Agregar</span></td>";
					$respuesta = $respuesta."</tr>";
				   
		}
		            $paginador_query = $this->paginador($total_query,$fin,$nombre=0,$orden=0);
				    $dice = "Mostrando 1 - $arreglo_lineas de un total de $total_query resultados.";
		            $tjson='[
							{
								"Jresultado": "'.$respuesta.'",
								"Jpaginador": "$arreglo_lineas",
								"Jinicio": "$inicio",
								"Jfin": "$fin",
								"Jdice": "'.$dice.'",
								"Jtotal_query": "'.$total_query.'",
								"Jpaginador_query": "'.$paginador_query.'",
								"Jestado": "OK"
							}
							]';
		
		echo $tjson;
		
	}   

/*trae lo id de proyectos del filtro */
function m_aplica_filtro_inicial($resto_where=""){
		
		$sql=" SELECT id_pro FROM vista_buscador_proyecto ".$resto_where;
		
		
			       $respuesta = "0,";
					$arreglo   = array();
					
					 $query     = $this->db->query($sql);
				     $arreglo   = $query->result_array();
				  
		            foreach ($arreglo as $row){
			                $respuesta =$respuesta.$row['id_pro'].",";
				    }
		            $respuesta =$respuesta."0";
					if($respuesta=="0,0"){$respuesta="";}
					
					$this->graba_linea_id_consultas($respuesta);
					
		            $tjson='[
							{
								"Jresultado": "0,0",
								"Jestado": "OK"
							}
							]';
		
		echo $tjson;
	}
	 
function graba_linea_id_consultas($linea=""){
            $sql="UPDATE user_socio SET linea_id_consultas ='".$linea."' WHERE id_user_socio = ".$this->session->userdata('SES_id_user_socio');
			$this->db->simple_query( $sql );
					
}	




function lee_linea_id_consultas(){
           
						
			  $rc = "";
		     $sql="SELECT linea_id_consultas FROM user_socio WHERE id_user_socio = ".$this->session->userdata('SES_id_user_socio');
		
				$query = $this->db->query($sql);
			   
				foreach ($query->result() as $row)
				{
					 
					 $rc = $row->linea_id_consultas;	            
				}
				$query->free_result();
				
				
				return ( $rc );
				
					
}
	

function paginador($total_query=0,$traidos_por_pagina=0,$por_nom=0,$orden=0){
		
		
		            $tab_p="<tr>";
				    $tab_f="</tr>";
					
	                if(	$total_query  < $traidos_por_pagina){
					    $td="<td onclick='trae_pagina(0,50)'>&nbsp;<a href='#'>Resultado - Página Única</a></td>";
						return( $tab_p.$td.$tab_f);
				   }
		
		           
				  
					$cantidad_de_paginas         = $total_query / $traidos_por_pagina;
					$cantidad_de_paginas_entero  = intval($cantidad_de_paginas);
					
					if($cantidad_de_paginas > $cantidad_de_paginas_entero){
						$cantidad_de_paginas=$cantidad_de_paginas_entero + 1;
					}
					
					$contador_cubos=0;
					$nro_pag = 1;
					$de      = 0;
					$j       = 0;
					$entro_ya    = 0;
					$td      = "";
					for ($i = 0; $i <= $total_query; $i++) {
							$j++;
							if($j>$traidos_por_pagina){
								//echo $j-1;
								if($entro_ya==0){
								   $entro_ya=1;
								}else{
									$de = $de+1;
									$nro_pag++;
							    }
							
								 $contador_cubos++;  
								$td=$td."<td onclick='trae_pagina($de,$i,$por_nom,$orden)'>&nbsp;<a href='#'>$nro_pag&nbsp;</a></td>";
								if($contador_cubos>30){ $td=$td."</tr><tr>"; $contador_cubos=0;}
								
								$de  = $i;
								$j   = 0;
								
							}
							
					}
					
					return( $tab_p.$td."".$tab_f);
		
		
		
	}
	
	function paginador2($total_query=0,$traidos_por_pagina=0,$por_nom=0,$orden=0){
	
	
	}
	
	
	function m_carga_proyectos_pagina($sector,$inicio,$fin){
		
		
		
		 $sql = "SELECT id_pro,TRIM(Nombre_pro) AS tNombre_pro,Inversion_pro,Nombre_pais,Nombre_pais,Fecha_actualizacion_pro,Nombre_region FROM vista_buscador_proyecto WHERE id_sector = ".$sector.$this->todos_los_sectores($sector)."
		 ORDER BY   Fecha_actualizacion_pro DESC  LIMIT ".$inicio.", ".$fin.";";
				  
				  				   
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  $respuesta=$this->crea_html_pagina($arreglo,$inicio,$fin,$total_query,$sector);
				  echo $respuesta;
				  
				 
         

} 



function crea_html_pagina($arreglo){
		$respuesta="";
		foreach ($arreglo as $row){
			        $respuesta =$respuesta."<tr>";
				    $respuesta =$respuesta."<td><a href='#' onclick='F_pry(".$row['id_pro'].");'>".$row['tNombre_pro'].",0,0</a></td>"; 
					$respuesta =$respuesta."<td>".$row['Nombre_pais']."</td>";
					$respuesta =$respuesta."<td>".$row['Nombre_region']."</td>";
					$respuesta =$respuesta."<td>".$row['Inversion_pro']."</td>";
					$respuesta =$respuesta."<td>".$row['Fecha_actualizacion_pro']."</td>";
					$respuesta =$respuesta."<td><span style='font-size:10px;color:#999; text-decoration:none'><a href='#' onclick='seguir_proyecto(".$row['id_pro'].");'><img src='../../../app/imagen/observar.png'></a>Agregar</span></td>";
					$respuesta = $respuesta."</tr>";
				   
		}
		            
		            $tjson='[
							{
								"Jresultado": "'.$respuesta.'",
								"Jestado": "OK"
							}
							]';
		
		echo $tjson;
		
	}
	

function get_proyectos_sugeridos($sectores,$id_socio){
	
	    $emp_prov = $this->get_emp_prov($id_socio);
		$linea_id_proyecto="0,";
		$sql="SELECT id_proyecto
				FROM ((
						SELECT p.id_pro AS id_proyecto, p.fecha_actualizacion_pro AS fecha,
						COUNT(DISTINCT pxs.id_sumin) AS contador_coincidencias, '1' AS a
						FROM proyectos p
						INNER JOIN proyectos_x_suministros pxs ON p.id_pro = pxs.id_pro
						INNER JOIN emp_prov_x_suministros epxs ON pxs.id_sumin = epxs.id_sumin
						WHERE id_emp_prov = ".$emp_prov."
						GROUP BY p.id_pro
					)UNION(
						SELECT p.id_pro AS id_proyecto, p.fecha_actualizacion_pro AS fecha,
						COUNT(DISTINCT pxe.id_equipo) AS contador_coincidencias, '2' AS a
						FROM proyectos p
						INNER JOIN proyectos_x_equipos pxe ON p.id_pro = pxe.id_pro
						INNER JOIN emp_prov_x_equipos epxe ON pxe.id_equipo = epxe.id_equipo
						WHERE id_emp_prov = ".$emp_prov."
						GROUP BY p.id_pro
					)UNION(
						SELECT p.id_pro AS id_proyecto,p.fecha_actualizacion_pro AS fecha,
						COUNT(DISTINCT pxse.id_sub_serv) AS contador_coincidencias, '3' AS a
						FROM proyectos p
						INNER JOIN proyectos_x_servsubcat pxse ON p.id_pro = pxse.id_pro
						INNER JOIN emp_prov_x_servsubcat epxse ON (pxse.id_serv = epxse.id_serv
						AND pxse.id_cat_serv = epxse.id_cat_serv AND pxse.id_sub_serv = epxse.id_sub_serv)
						WHERE id_emp_prov = ".$emp_prov."
						GROUP BY p.id_pro)
					) AS rel_prov_proy, proyectos p
				
				WHERE p.id_pro = rel_prov_proy.id_proyecto
				AND p.id_sector IN (".$sectores.")
				
				GROUP BY id_proyecto";
		
				$query = $this->db->query($sql);
			   
				foreach ($query->result() as $row)
				{
					 
					 $linea_id_proyecto = $linea_id_proyecto.$row->id_proyecto.",";	            
				}
				$query->free_result();
				$linea_id_proyecto = $linea_id_proyecto."0"	;
				
				return ( $linea_id_proyecto );
				
	}


function get_emp_prov($id_socio){
		$rc = 0;
		$sql="SELECT  Codigo FROM portalminero.emp_prov WHERE id_socio = ".$id_socio." LIMIT 0, 1;";
		
				$query = $this->db->query($sql);
			   
				foreach ($query->result() as $row)
				{
					 
					 $rc = $row->Codigo;	            
				}
				$query->free_result();
				
				
				return ( $rc );
				
	}





		
}
?>