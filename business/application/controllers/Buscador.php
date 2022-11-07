<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscador extends CI_Controller {
function __construct()
			{
				parent::__construct();
                
				
				$this ->load->model ('Mod_proyecto/Mod_general/Mod_general','general');
				$this ->load->model ('Mod_proyecto/Mod_buscador/Mod_buscador','m_buscador');
				
				
			}
			
			public function index()
			{
				
				
				   
					
					
			}
			
			
			
			
			
			function retorna_totales_sector($sector=0){
				$total_por_etapas_aux   = array();
				$total_por_etapas       = array();
				$sector=1;
				$tablita="";
				
				if (!empty($_REQUEST['sector'])) {
					 $sector = $_REQUEST['sector'];
				}
				
				$total_por_etapas[0]="";
				$total_por_etapas[1]="";
				$total_por_etapas[2]="";
				$total_por_etapas[3]="";
				$total_por_etapas[4]="";
				
				
				$total_por_etapas_aux = $this->general->get_total_por_etapas($sector); 
				
				
					
				    foreach($total_por_etapas_aux as $ma){
						if($ma['Estado_pro']=='A'){$total_por_etapas[0]  = $ma['total'] ;}
						if($ma['Estado_pro']=='D'){$total_por_etapas[1]  = $ma['total'] ;}
						if($ma['Estado_pro']=='P'){$total_por_etapas[2]  = $ma['total'] ;}
						if($ma['Estado_pro']=='O'){$total_por_etapas[3]  = $ma['total'] ;}
						if($ma['Estado_pro']=='F'){$total_por_etapas[4]  = $ma['total'] ;}
                       
					   
				    }
              			   
			   
			   $tablita= '
				    <td><div align="center"><b>'. $total_por_etapas[0].'</b></div></td>
					<td><div align="center"><b>'. $total_por_etapas[1].'</b></div></td>
					<td><div align="center"><b>'. $total_por_etapas[2].'</b></div></td>
					<td><div align="center"><b>'. $total_por_etapas[3].'</b></div></td>
					<td><div align="center"><b>'. $total_por_etapas[4].'</b></div></td>';
			
			   
			   
			   echo $tablita;
			   
			}
			
			
			function limpia_linea_id_proyecto()
			{
				$this->m_buscador->graba_linea_id_consultas("");
			}	

			
			
			function busca_inicial($sector=0,$inicio=0,$fin=0,$orden_elegido=0,$desc__acen=0,$linea_id_proyectos_filtro=""){
			
					
					
				 if (!empty($_REQUEST['inicio'])) {
					 $inicio  =$_REQUEST['inicio'];
				 }
				 
				 
				 if (!empty($_REQUEST['fin'])) {
					 $fin = $_REQUEST['fin'];
				 }
				 
				 
				 if (!empty($_REQUEST['sector'])) {
					 $sector = $_REQUEST['sector'];
				 }
					
				   if (!empty($_REQUEST['orden_elegido'])) {
					 $orden_elegido = $_REQUEST['orden_elegido'];
				 }
				
				
				 if (!empty($_REQUEST['desc__acen'])) {
					 $desc__acen = $_REQUEST['desc__acen'];
				 }
				 
				 if (!empty($_REQUEST['linea_id_proyectos_filtro'])) {
					 $linea_id_proyectos_filtro = $_REQUEST['linea_id_proyectos_filtro'];
				 }
				 
				 
				$respuesta = $this->m_buscador->carga_proyectos_inicial($sector,$inicio,$fin,$orden_elegido,$desc__acen,$linea_id_proyectos_filtro); 
				echo $respuesta;
			}
			
			
			
			function busca_por_nombre($sector=0,$inicio=0,$fin=0,$nombre="",$orden=0,$desc__acen=0){
			
					
					
				 if (!empty($_REQUEST['inicio'])) {
					 $inicio  = $_REQUEST['inicio'];
				 }
				  
				 
				 if (!empty($_REQUEST['fin'])) {
					 $fin = $_REQUEST['fin'];
				 }
				 
				 
				 if (!empty($_REQUEST['sector'])) {
					 $sector = $_REQUEST['sector'];
				 }
					
				if (!empty($_REQUEST['nombre'])) {
					 $nombre = $_REQUEST['nombre'];
				}
				
				
				 if (!empty($_REQUEST['orden'])) {
					 $orden = $_REQUEST['orden'];
				}
				
				
				 if (!empty($_REQUEST['desc__acen'])) {
					 $desc__acen = $_REQUEST['desc__acen'];
				 }
				 
				
		
				$respuesta = $this->m_buscador->carga_proyectos_nombre($sector,$inicio,$fin,$nombre,$orden,$desc__acen); 
				echo $respuesta;
			}
			
			/* genera linea de ID projectos */
			function aplica_filtro_inicial(){
				
				    $resto_where=" WHERE 1=1 ";
				
				     $respuesta ="";
					 $select_get_estados_proyecto  = '0';
				 	 $select_get_proyectos_tipo  =  0;
				 	 $select_get_mandantes_proyecto  = 0;
				 	 $select_get_u_pais  =  0;
					 $select_get_u_region  =  0;
				 	 $select_get_obras_principales  = 0;
					 $select_get_equipos_principales  =  0;
				 	 $select_get_suministros_principales  =  0;
				 	 $select_get_servicios_principales  =  0;
				 	 $select_get_proyectos_etapas  = 0;
					 $select_get_responsable_etapa_actual  =  0;
				 	 $sector  =  0;
				
				/*--------------------------------------------------------------------------------------------------*/
				 if (!empty($_REQUEST['select_get_proyectos_tipo'])) {
					 $select_get_proyectos_tipo  = $_REQUEST['select_get_proyectos_tipo'];
				 }
				 
				 if (!empty($_REQUEST['select_get_estados_proyecto'])) {
					 $select_get_estados_proyecto  = $_REQUEST['select_get_estados_proyecto'];
				 }
				 
				 if (!empty($_REQUEST['select_get_mandantes_proyecto'])) {
					 $select_get_mandantes_proyecto  = $_REQUEST['select_get_mandantes_proyecto'];
				 }
				 if (!empty($_REQUEST['select_get_u_pais'])) {
					 $select_get_u_pais  = $_REQUEST['select_get_u_pais'];
				 }
				 if (!empty($_REQUEST['select_get_u_region'])) {
					 $select_get_u_region  = $_REQUEST['select_get_u_region'];
				 }
				 if (!empty($_REQUEST['select_get_obras_principales'])) {
					 $select_get_obras_principales  = $_REQUEST['select_get_obras_principales'];
				 }
				 if (!empty($_REQUEST['select_get_equipos_principales'])) {
					 $select_get_equipos_principales  = $_REQUEST['select_get_equipos_principales'];
				 }
				 if (!empty($_REQUEST['select_get_suministros_principales'])) {
					 $select_get_suministros_principales  = $_REQUEST['select_get_suministros_principales'];
				 }
				 if (!empty($_REQUEST['select_get_servicios_principales'])) {
					 $select_get_servicios_principales  = $_REQUEST['select_get_servicios_principales'];
				 }
				 if (!empty($_REQUEST['select_get_proyectos_etapas'])) {
					 $select_get_proyectos_etapas  = $_REQUEST['select_get_proyectos_etapas'];
				 }
				 if (!empty($_REQUEST['select_get_responsable_etapa_actual'])) {
					 $select_get_responsable_etapa_actual  = $_REQUEST['select_get_responsable_etapa_actual'];
				 }
				 if (!empty($_REQUEST['sector'])) {
					 $sector  = $_REQUEST['sector'];
				 }
				 
				 
				 /*-------------------------------------------------------------------------------*/
				 
				if($select_get_proyectos_tipo !=0){
					$resto_where= $resto_where." AND id_pro in ( SELECT id_pro FROM  proyectos_x_tipo WHERE id_tipo = ".$select_get_proyectos_tipo." GROUP BY id_pro )";
				}
				
				if($select_get_estados_proyecto !='0'){
					$resto_where= $resto_where." AND Estado_pro = '".$select_get_estados_proyecto."'";
				}
				
				if($select_get_mandantes_proyecto !=0){
					$resto_where= $resto_where." AND id_man_emp = '".$select_get_mandantes_proyecto."'";
				}
				
				if($select_get_u_pais !=0){
					$resto_where= $resto_where." AND id_pais = '".$select_get_u_pais."'";
				}
				
				
				if($select_get_u_region !=0){
					$resto_where= $resto_where." AND id_region = '".$select_get_u_region."'";
				}
				
				
				if($select_get_obras_principales !=0){
					$resto_where= $resto_where." AND id_pro in ( SELECT id_pro FROM proyectos_x_obras WHERE id_obra =".$select_get_obras_principales." GROUP BY id_pro )";
				}
				
				if($select_get_equipos_principales !=0){
					$resto_where= $resto_where." AND id_pro in ( SELECT  id_pro FROM proyectos_x_equipos WHERE id_equipo = ".$select_get_equipos_principales." GROUP BY id_pro )";
				}
				
				if($select_get_suministros_principales !=0){
					$resto_where= $resto_where." AND id_pro in ( SELECT  id_pro FROM proyectos_x_suministros WHERE id_sumin = ".$select_get_suministros_principales." GROUP BY id_pro )";
				}
				
				
				if($select_get_servicios_principales !=0){
					$resto_where= $resto_where." AND id_pro in ( SELECT id_pro FROM proyectos_x_servicios WHERE id_serv = ".$select_get_servicios_principales." GROUP BY id_pro)";
				}
				
				if($select_get_proyectos_etapas !=0){
					$resto_where= $resto_where." AND Etapa_actual_pro = '".$select_get_proyectos_etapas."'";
				}
				
				
				if($select_get_responsable_etapa_actual !=0){
					$resto_where= $resto_where." AND id_pro in ( SELECT id_pro FROM proyectos_x_etapas WHERE id_emp <> 0 AND id_emp = ".$select_get_responsable_etapa_actual." GROUP BY id_pro )";
				}
				
				if($sector !=0  && $sector !=9){
				    $resto_where= $resto_where." AND ( id_sector = ".$sector.") ";
				}
				
				if($sector ==0){
					$sectores = $this->session->userdata('SES_sectores');
					$resto_where= $resto_where." AND ( id_sector IN (".$sectores.") )";
				}
				
				/*
				if($sector ==9){
					$id_socio = $this->session->userdata('SES_id_socio');
					$sectores = $this->session->userdata('SES_sectores');
				    $linea_sugeridos = $this->m_buscador->get_proyectos_sugeridos($sectores,$id_socio);
					
					$resto_where= $resto_where." AND ( id_pro IN  (".$linea_sugeridos.") ) ";
				}
				*/
				
				
				$respuesta = $this->m_buscador->m_aplica_filtro_inicial($resto_where);
				
				
				
				
			}
			
			function carga_proyectos_pagina($sector=0,$inicio=0,$fin=0,$linea_id_proyectos_filtro=""){
				
				$orden       =0;
				$desc__acen  =0;
				$nombre      ="";
				
				
				if (!empty($_REQUEST['inicio'])) {
					 $inicio  = $_REQUEST['inicio'];
				 }
				 
				 
				 if (!empty($_REQUEST['fin'])) {
					 $fin = $_REQUEST['fin'];
				 }
				 
				 
				 if (!empty($_REQUEST['sector'])) {
					 $sector = $_REQUEST['sector'];
				 }
				 
				 if (!empty($_REQUEST['orden'])) {
					 $orden = $_REQUEST['orden'];
				 }
				 
				 if (!empty($_REQUEST['desc__acen'])) {
					 $desc__acen = $_REQUEST['desc__acen'];
				 }
				 
				 if (!empty($_REQUEST['nombre'])) {
					 $nombre = $_REQUEST['nombre'];
				 }
				
				if (!empty($_REQUEST['linea_id_proyectos_filtro'])) {
					 $linea_id_proyectos_filtro = $_REQUEST['linea_id_proyectos_filtro'];
				 }
				 
				
				
				 if($nombre !=""){
					$respuesta = $this->m_buscador->busca_por_nombre($sector,$inicio,$fin,$nombre,$orden,$desc__acen);
				 }else{
					//echo $linea_id_proyectos_filtro;
					$respuesta = $this->m_buscador->carga_proyectos_inicial($sector,$inicio,$fin,$orden,$desc__acen,$linea_id_proyectos_filtro);
					                                                        
					                                                       
				 }
				
				
				
				echo $respuesta;
			}
          
} // fin


	  
