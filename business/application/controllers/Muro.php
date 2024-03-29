<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muro extends CI_Controller {
function __construct()
			{
				parent::__construct();
                
				$this ->load->model ('Mod_muro/Mod_muro_general','muro');
				$this ->load->model ('Mod_proyecto/Mod_general/Mod_general','general');
				$this ->load->model ('Mod_proyecto/Mod_buscador/Mod_buscador','buscador');
				$this ->load->model ('Mod_adjudicacion/Mod_adjudicacion','m_adjudicacion');
				$this ->load->model ('Mod_utiles/Mod_Comunes','m_utiles');
			}
			
			public function index()
			{
				//echo "bien222sssss2";
				//$this->load->view('welcome_message');
				
			}
			
			
						
			
			function graba_sectores_selecionados(){
				
				 $SES_id_user_socio = $this->session->userdata('SES_id_user_socio');

                 $this->muro->borra_sectores_selecionados($SES_id_user_socio);
				 
				 

                 if (!empty($_REQUEST['sector_1'])) {
					 $sector_1 = $_REQUEST['sector_1'];
					 if($sector_1=='true'){   $this->muro->query_graba_sectores_selecionados($SES_id_user_socio,1);  }
				 }
				 if (!empty($_REQUEST['sector_2'])) {
					 $sector_2 = $_REQUEST['sector_2'];
					  if($sector_2=='true'){   $this->muro->query_graba_sectores_selecionados($SES_id_user_socio,2);  }
				 }
				  if (!empty($_REQUEST['sector_3'])) {
					 $sector_3 = $_REQUEST['sector_3'];
					  if($sector_3=='true'){   $this->muro->query_graba_sectores_selecionados($SES_id_user_socio,3);  }
				 }
				  if (!empty($_REQUEST['sector_4'])) {
					 $sector_4 = $_REQUEST['sector_4'];
					  if($sector_4=='true'){   $this->muro->query_graba_sectores_selecionados($SES_id_user_socio,4);  }
				 }
				  if (!empty($_REQUEST['sector_5'])) {
					 $sector_5 = $_REQUEST['sector_5'];
					 if($sector_5=='true'){   $this->muro->query_graba_sectores_selecionados($SES_id_user_socio,5);  }
				 }
				  if (!empty($_REQUEST['sector_6'])) {
					 $sector_6 = $_REQUEST['sector_6'];
					  if($sector_6=='true'){   $this->muro->query_graba_sectores_selecionados($SES_id_user_socio,6);  }
				 }
				  if (!empty($_REQUEST['sector_7'])) {
					 $sector_7 = $_REQUEST['sector_7'];
					  if($sector_7=='true'){   $this->muro->query_graba_sectores_selecionados($SES_id_user_socio,7);  }
				 }
				 
				 
				 echo "<b>Estimado :&nbsp;".$this->session->userdata('SES_nombre_completo_socio')." Su selección fue grabada</b>" ;
				 

				
			}	
				
			function retorna_sectores_selecionados(){
				
				
				$sectores_selecionados   =  $this->muro->sectores_selecionados();
				
				
				$linea="";
				  foreach ($sectores_selecionados as $row){
					  
					   $selecionado ="";
					   if($row['elegido']>0){ $selecionado =" checked='checked'"; }
					  
					   $linea=$linea.'<input type="checkbox" name="chec'.$row['id_sector'].'" id="chec'.$row['id_sector'].'"  value="'.$row['id_sector'].'"  '.$selecionado.'/><label for="chec'.$row['id_sector'].'">&nbsp;&nbsp;&nbsp;'.$row['Nombre_sector'].'</label>'.'<br>';
  
				  }	  
				echo $linea;
			}
			
			
				
			public function inicio()
			{
				
				 $this->m_utiles->sesionOk();
				
				 $datos=array();
				 
				 
				 
				 $username =  $this->session->userdata('SES_username_socio');
				
 
				 $socio_cabezera               =  $this->muro->tipo_socio($username);
				 $datos['sectores']            =  $this->session->userdata('SES_sectores');
				 $datos['nombre_usuario']      =  $socio_cabezera->nombre_completo_socio;
		         $datos['email_usuario']       =  $socio_cabezera->email_socio;
		         $datos['fono_usuario']        =  $socio_cabezera->fono_user_socio;
		         $datos['nombre_socio']        =  $socio_cabezera->Razon_social_socio;
		         $datos['membresia']           =  $socio_cabezera->tipo_socio;
		         $datos['fecha_inicio']        =  $socio_cabezera->fecha_inscripcion;
		         $datos['fecha_renovacion']    =  $socio_cabezera->fecha_caduca;
				 //$datos['fono_contacto_socio'] =  $contacto_socio->fono_user_socio;
			     $datos['rut_id_socio']        =  $socio_cabezera->rut_id_socio;
		         $id_vendedor                  =  $socio_cabezera->id_vendedora;				 
			     $datos_vendedor               = $this->muro->datos_vendedor($id_vendedor);
			
				
				
				$telefono=$datos_vendedor->Fono_user;
				if($datos_vendedor->Anexo_user!=0){
					$telefono.=" Anexo: ".$datos_vendedor->Anexo_user;
				}
				
				$datos['fono_vendedor']                          = $telefono;
				$datos['email_vendedor']                         = $datos_vendedor->Email_user;
			    $datos['nombre_vendedor']                        = $datos_vendedor->Nombre_completo_user;
			    $datos['recientemente_actualizado_proyectos']    = $this->muro->recientemente_actualizado_proyectos(1);
				$datos['recientemente_actualizado_licitaciones'] = $this->muro->recientemente_actualizado_licitaciones(1);
				$datos['actividad_usuario']                      = $this->m_utiles->mostrar_actividad_usuario();
				
				// pantalla inicial del cliente 
				 $this->load->view('View_muro/View_muro_general',$datos);
				 
			}
			
			function informacion_mineria_datos(){
				$datos['sectores']            =  $this->session->userdata('SES_sectores');
				$this->load->view('View_muro/view_mineria_datos',$datos);
			}
			
            function informacion_mineria_datos_solicitar(){
				$datos['sectores']            =  $this->session->userdata('SES_sectores');
				$datos['producto']            =  "Mineria de Datos";
				$this->load->view('View_muro/View_solicitar_mineria_datos',$datos);
			}
			
			function informes_mensuales(){
				$datos['sectores']            =  $this->session->userdata('SES_sectores');
				$this->load->view('View_muro/View_informes_mensuales',$datos);
			}	
			
			function informacion_articulacion_negocio(){
				$datos['sectores']            =  $this->session->userdata('SES_sectores');
				$this->load->view('View_muro/view_articulacion_negocio',$datos);
			}
			
			 function informacion_articulacion_negocio_solicitar(){
				$datos['sectores']            =  $this->session->userdata('SES_sectores');
				$datos['producto']            =  "Articulación de Negocios";
				$this->load->view('View_muro/View_solicitar_mineria_datos',$datos);
			}
			
			function informacion_membresia(){
				$datos=array();
				 
				 
				 
				 $username =  $this->session->userdata('SES_username_socio');
				
 
				 $socio_cabezera               =  $this->muro->tipo_socio($username);
				 $datos['sectores']            =  $this->session->userdata('SES_sectores');
				 $datos['nombre_usuario']      =  $socio_cabezera->nombre_completo_socio;
		         $datos['email_usuario']       =  $socio_cabezera->email_socio;
		         $datos['fono_usuario']        =  $socio_cabezera->fono_user_socio;
		         $datos['nombre_socio']        =  $socio_cabezera->Razon_social_socio;
		         $datos['membresia']           =  $socio_cabezera->tipo_socio;
		         $datos['fecha_inicio']        =  $socio_cabezera->fecha_inscripcion;
		         $datos['fecha_renovacion']    =  $socio_cabezera->fecha_caduca;
				 //$datos['fono_contacto_socio'] =  $contacto_socio->fono_user_socio;
			     $datos['rut_id_socio']        =  $socio_cabezera->rut_id_socio;
		         $id_vendedor                  =  $socio_cabezera->id_vendedora;				 
			     $datos_vendedor               =  $this->muro->datos_vendedor($id_vendedor);
			     $datos['usuarios_empresa']    =  $this->muro->usuarios_empresa($this->session->userdata('SES_id_socio'));
			
				
				
				$telefono=$datos_vendedor->Fono_user;
				if($datos_vendedor->Anexo_user!=0){
					$telefono.=" Anexo: ".$datos_vendedor->Anexo_user;
				}
				
				$datos['fono_vendedor']                          = $telefono;
				$datos['email_vendedor']                         = $datos_vendedor->Email_user;
			    $datos['nombre_vendedor']                        = $datos_vendedor->Nombre_completo_user;
			    
				
				$this->load->view('View_muro/View_informacion_membresia',$datos);
			}	
				
			function listado_boletines(){
				$datos=array();
				 
				 
				 
				 $username =  $this->session->userdata('SES_username_socio');
				
 
				 $socio_cabezera               =  $this->muro->tipo_socio($username);
				 $datos['sectores']            =  $this->session->userdata('SES_sectores');
				 $datos['nombre_usuario']      =  $socio_cabezera->nombre_completo_socio;
		         $datos['email_usuario']       =  $socio_cabezera->email_socio;
		         $datos['fono_usuario']        =  $socio_cabezera->fono_user_socio;
		         $datos['nombre_socio']        =  $socio_cabezera->Razon_social_socio;
		         $datos['membresia']           =  $socio_cabezera->tipo_socio;
		         $datos['fecha_inicio']        =  $socio_cabezera->fecha_inscripcion;
		         $datos['fecha_renovacion']    =  $socio_cabezera->fecha_caduca;
				 //$datos['fono_contacto_socio'] =  $contacto_socio->fono_user_socio;
			     $datos['rut_id_socio']        =  $socio_cabezera->rut_id_socio;
		         $id_vendedor                  =  $socio_cabezera->id_vendedora;				 
			     $datos_vendedor               = $this->muro->datos_vendedor($id_vendedor);
			
				
				
				$telefono=$datos_vendedor->Fono_user;
				if($datos_vendedor->Anexo_user!=0){
					$telefono.=" Anexo: ".$datos_vendedor->Anexo_user;
				}
				
				$datos['fono_vendedor']                          = $telefono;
				$datos['email_vendedor']                         = $datos_vendedor->Email_user;
			    $datos['nombre_vendedor']                        = $datos_vendedor->Nombre_completo_user;
			    $datos['boletin_premium']                        = $this->muro-> boletin_premium();
				
				$this->load->view('View_muro/View_listado_boletin',$datos);
			}
			
			
			function buscador_proyectos(){
				
				/*
				 Carga datos para generar grilla de proyectos
				 para la vista View_buscador_proyectos
				*/
				
				if(   $this->session->userdata('SES_id_socio') =="" ) {
					
					echo "<p>No Hay Sesión Activa debe ingresar nuevamente</p>";
					echo "<p><a href='http://200.6.115.193/wp/app/business/'>Inicio Sistema Prueba</a></p>";
					exit;
					
				}
				
				 $datos         = array();
				 $seleccion     = 0;
				 $tit_sector    = "";
				 
				 
				 if (!empty($_REQUEST['seleccion'])) {
					 $seleccion = $_REQUEST['seleccion'];
				 }
				 
				 if (!empty($_REQUEST['parametro'])) {
					 $parametro = $_REQUEST['parametro'];
				 }




                /* inicion retorna de un link de la ficha */
				
				  $__parametro_menu = '';
				  $__seleccion_menu = 0;
				  $__va_menu        = 0;
	   
	   
                 if (!empty($_REQUEST['__parametro_menu'])) {
					 $__parametro_menu = $_REQUEST['__parametro_menu'];
				 }
				 
				 if (!empty($_REQUEST['__seleccion_menu'])) {
					 $__seleccion_menu = $_REQUEST['__seleccion_menu'];
				 }
				 
				 if (!empty($_REQUEST['__va_menu'])) {
					 $__va_menu = $_REQUEST['__va_menu'];
				 }
 
				 $datos['__parametro_menu']                         = $__parametro_menu;
				 $datos['__seleccion_menu']                         = $__seleccion_menu;
				 $datos['__va_menu']                                = $__va_menu;
				 
				  /* fin retorna de un link de la ficha */
				  
				  
				  
				  
				  
				  $datos['sector_elegido']                         = $seleccion;
				  $datos['sectores']                               = $this->session->userdata('SES_sectores');
				  $datos['id_sectores']                            = $seleccion;
				  $datos['get_proyectos_tipo']                     = $this->general->get_proyectos_tipo();
				  $datos['get_total_por_etapas']                   = $this->retorna_totales_sector_ordenado($seleccion);
				  $datos['get_estados_proyecto']                   = $this->general->get_estados_proyecto();
			      $datos['get_mandantes_proyecto']                 = $this->general->get_mandantes_proyecto();
				  $datos['get_u_pais']                             = $this->general->get_u_pais($seleccion);
				  $datos['get_u_region']                           = $this->general->get_u_region();
				  $datos['get_obras_principales']                  = $this->general->get_obras_principales();
				  $datos['get_equipos_principales']                = $this->general->get_equipos_principales();
				  $datos['get_suministros_principales']            = $this->general->get_suministros_principales();
				  $datos['get_servicios_principales']              = $this->general->get_servicios_principales();
				  $datos['get_proyectos_etapas']                   = $this->general->get_proyectos_etapas();
				  $datos['get_responsable_etapa_actual']           = $this->general->get_responsable_etapa_actual($seleccion);
				  $this->load->view('View_muro/View_buscador_proyectos',$datos);
				
			}
			
			
			function retorna_totales_sector_ordenado($sector=0){
				$total_por_etapas_aux   = array();
				$total_por_etapas       = array();
				
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
              
			
			   
			   
			   return $total_por_etapas;
			   
			}
			
			 
			function equipos_mineria(){
				$datos['sectores']                               = $this->session->userdata('SES_sectores');
				$this->load->view('View_muro/View_equipos_mineria',$datos);
            }
			
			
			function buscar_equipos_mineria(){
				
				 $texto         = "";
				 $faena         = "";
				 $categoria     = "";
				 $pag           = 0;
				 $id_faena      = "";
				 $id            = 0;
				 $procesos      = "";
				 
				if (!empty($_REQUEST['texto'])) {
					 $texto = $_REQUEST['texto'];
				 }
				 
				 if (!empty($_REQUEST['faena'])) {
					 $faena = $_REQUEST['faena'];
				 }
				 
				 if (!empty($_REQUEST['categoria'])) {
					 $categoria = $_REQUEST['categoria'];
				 }
				 
				 if (!empty($_REQUEST['texto'])) {
					 $texto = $_REQUEST['texto'];
				 }
				 
				 if (!empty($_REQUEST['procesos'])) {
					 $procesos = $_REQUEST['procesos'];
				 }
				 
				 
				 
				
			    $rs  = $this->muro->buscar_faenas($id, $texto, $categoria, $procesos, $faena, $pag);
			  
		       
			   if(is_array($rs) && sizeof($rs)){
				  foreach($rs as $r){ 
					  $x=0;
					  $list="";       
					  $imagen_empresa ="";
					  $id_ominera = "";
					  if($r->imagen!=''){ $imagen_empresa =$r->imagen;}
					  $img="<div style='float:left;'><img src='".URL_PM_BASE."images/procesos/".$imagen_empresa."' style='vertical-align:middle;'width='50' height='30' /></div>";
					  $id_ominera=$r->Id;
					  $rs2 = $this->muro->buscar_procesos(0, $r->Id, $texto, $categoria, $procesos, $faena);
					 
							if(is_array($rs2) && sizeof($rs2)>0){
								++$x;
			  						
							    $list=$list. "<div style='border: 1px solid #9cbebd;' align='center'>
								<div style='clear:both; width:100%; margin:0 auto; background-color:#9cbebd; display:table;' align='center'>&nbsp;&nbsp;
									".$img."<div style='float:left; font-weight:bold; padding-left:20px; vertical-align:middle;'></div></div><div style='clear:both;'>&nbsp;</div>";
								  
								
								$ids ="";
								foreach($rs2 as $r2){
									$list=$list.  " <div style='clear:both; padding-left:30px;' align='left'><div style='clear:both;'></div><a href='#' onclick='ver_faenas_detalle(º@idesFPº,º@empre_faenaº,º".$texto."º)'> *".$r2->Nombre."</a></div>";
									$ids = $ids.$r2->Id."K";
									
								}
								$ids = $ids."0"; 
								
								$list              = str_replace("@idesFP",$ids,$list) ;
								$list              = str_replace("@empre_faena",$id_ominera,$list) ;
								$list              = str_replace('º','"',$list) ;
								$list              = $list.  "<div style='clear:both;'>&nbsp;</div></div><br>";
								
							}
							
							
							
					
					echo $list;		
				   } 
				  
			    }else{ echo "<br><br><h4 align='center'>No se encontraron considencias, revise criterios de búsqueda.</h4>";}
			  
			  
			}
			
			function combo_region_pais(){
				$pais="";
				 if (!empty($_REQUEST['pais'])) {
					 $pais = $_REQUEST['pais'];
				 }
				
				$css= "  style='width: 100%px' class='combobox form-control'  ";
				echo  $this->m_utiles->mostrar_region_pais_combo($pais,"region",$css);
			}
			
			
			function usuario_adjudicacion($op=0){
				$this->m_utiles->sesionOk();
				$datos['sectores']                         = $this->session->userdata('SES_sectores');
				$datos['paises']                           = $this->m_utiles->mostrar_paises();
				$this->load->view('View_muro/View_agregar_adjudicaciones',$datos);
				  
			}
			
		    function modifica_adjudicacion_socio($id_socio_adj=0){
			
			    $this->m_utiles->sesionOk();
				$datos['sectores']                         = $this->session->userdata('SES_sectores');
				$datos['paises']                           = $this->m_utiles->mostrar_paises();
				$datos['id_socio_adj']                     = $id_socio_adj;
				$datos['adjudicacion_socio']               = $this->m_adjudicacion->ver_adjudicacion_socio($id_socio_adj);
				$this->load->view('View_muro/View_modifica_adjudicaciones',$datos);
			}
			
			
			function graba_adjudicaciones_usuario(){
				$data =array();
			    $datos['sectores']                          = $this->session->userdata('SES_sectores');
				/*-----------------------------------------------------------------------------------*/
				$nombre_adj          ="";
				$trim_fecha_adj      ="";
				$ano_fecha_adj       ="";
				$id_proy_adj         ="";
				$inicio_contrato     ="";
				$duracion_contrato   ="";
				$id_lici_adj         ="";
				$monto_aprox_adj     ="";
				$id_rango            ="";
				$id_sector           ="";
				$otro_comprador      ="";
				$region              ="";
				$id_via              ="";
				$equipos_suministros ="";
				$descripcion_adj     ="";
				$id_socio_adj        = 0;
				$pais                ="";
				
				$Razon_social_emp    = "";
				$username            = "";
				$password_socio      = "";
				$cargo_contacto      = "";
				$email_contacto      = "";
				$direccion_contacto  = "";
				$id_socio_adj        = "";
				$fecha_ingreso_adj   = "";	
				$nombre_completo_socio ="";
				
				
				$rcad = $this->m_adjudicacion->trae_usuarios_socios();
				 
				 foreach ($rcad as $row) {
						$Razon_social_emp       =    $row['Razon_social_emp'];
						$username               = 	 $row['username_socio'];
						$password_socio         = 	 $row['password_socio'];
						$cargo_contacto         = 	 $row['cargo_socio'];
						$email_contacto         = 	 $row['email_socio'];
						$direccion_contacto     = 	 $row['Direccion_emp'];
						$id_socio_adj           =    $this->session->userdata('SES_id_socio');
						$id_socio               =    $this->session->userdata('SES_id_socio');
						$nombre_completo_socio  = 	 $row['nombre_completo_socio'];
				}
				
		
				
				date_default_timezone_set("America/Santiago");
	            $fecha_ingreso_adj = date('Y/m/d H:i:s');
				
				
				
				
				if (!empty($_REQUEST['nombre_adj'])) { $nombre_adj = $_REQUEST['nombre_adj']; }
				if (!empty($_REQUEST['trim_fecha_adj'])) { $trim_fecha_adj = $_REQUEST['trim_fecha_adj']; }
				if (!empty($_REQUEST['ano_fecha_adj'])) { $ano_fecha_adj = $_REQUEST['ano_fecha_adj']; }
				if (!empty($_REQUEST['id_proy_adj'])) { $id_proy_adj = $_REQUEST['id_proy_adj']; }
				if (!empty($_REQUEST['inicio_contrato'])) { $inicio_contrato = $_REQUEST['inicio_contrato']; }
				if (!empty($_REQUEST['duracion_contrato'])) { $duracion_contrato = $_REQUEST['duracion_contrato']; }
				if (!empty($_REQUEST['id_lici_adj'])) { $id_lici_adj= $_REQUEST['id_lici_adj']; }
				if (!empty($_REQUEST['monto_aprox_adj'])) { $monto_aprox_adj = $_REQUEST['monto_aprox_adj']; }
				if (!empty($_REQUEST['id_rango'])) { $id_rango = $_REQUEST['id_rango']; }
				if (!empty($_REQUEST['id_sector'])) { $id_sector = $_REQUEST['id_sector']; }
				if (!empty($_REQUEST['otro_comprador'])) { $otro_comprador = $_REQUEST['otro_comprador']; }
				if (!empty($_REQUEST['pais'])) { $pais = $_REQUEST['pais']; }
				if (!empty($_REQUEST['region'])) { $region = $_REQUEST['region']; }
				if (!empty($_REQUEST['id_via'])) { $id_via = $_REQUEST['id_via']; }
				if (!empty($_REQUEST['equipos_suministros'])) { $equipos_suministros = $_REQUEST['equipos_suministros']; }
				if (!empty($_REQUEST['descripcion_adj'])) { $descripcion_adj = $_REQUEST['descripcion_adj']; }
				if (!empty($_REQUEST['id_socio_adj'])) { $id_socio_adj = $_REQUEST['id_socio_adj']; }
				
                				
				
				$data = array( 
				'nombre_adj'=>$nombre_adj,
				'trim_fecha_adj'=>$trim_fecha_adj,
				'ano_fecha_adj'=>$ano_fecha_adj,
				'id_proy_adj'=>$id_proy_adj,
				'inicio_contrato'=>$inicio_contrato,
				'duracion_contrato'=>$duracion_contrato,
				'id_lici_adj'=>$id_lici_adj,
				'monto_aprox_adj'=>$monto_aprox_adj,
				'id_rango'=>$id_rango,
				'id_sector'=>$id_sector,
				'otro_comprador'=>$otro_comprador,
				'id_pais'=>$pais,
				'id_region'=>$region,
				'id_via'=>$id_via,
				'equipos_suministros'=>$equipos_suministros,
				'descripcion_adj'=>$descripcion_adj,
				'empresa_contacto'=>$Razon_social_emp,
				'username'=>$username,
				'cargo_contacto'=>$cargo_contacto, 
				'email_contacto'=>$email_contacto,
				'direccion_contacto'=>$direccion_contacto,
				'id_socio_adj'=>$id_socio_adj,
				'nombre_contacto'=>$nombre_completo_socio,
				'fecha_ingreso_adj'=>$fecha_ingreso_adj,
				'id_socio'=>$id_socio
				);
		
	
				
				 $rc = $this->m_adjudicacion->graba_adjudicacion_socio($data,$id_socio_adj);
				 if($rc ){
					 echo "<strong>La información se grabó correctamente y fue enviada</strong><img src='".URL_PM_APP."imagen/vb2.png' width='40' height='32' align='bottom' />	";
					 $this->m_utiles->mail_usuario_adjudicacion($id_socio_adj);
				 }else{
					 echo "Ocurrió un error y la información no se grabó correctamente.";
				 }

			
			}
			
			/*function mostrar_usuario_adjudicacion($id){
				 $datos['sectores']                  = $this->session->userdata('SES_sectores');
				 $this->load->view('View_muro/View_listar_mis_adjudicaciones',$datos);
			}*/
			
			function listar_mis_adjudicaciones($order=0,$tipo_orden=0){
				$this->m_utiles->sesionOk();
				$_tipo_orden="";
				$_order="";
				
				if($order==0){$_order ='fecha_ingreso_adj';}
				if($order==1){$_order ='fecha_ingreso_adj';}
				if($order==2){$_order ='fecha_ingreso_adj';}
				
				if($tipo_orden==0){$_tipo_orden ='DESC';}
				if($tipo_orden==1){$_tipo_orden ='ASC';}
				
			    $datos['sectores']                          = $this->session->userdata('SES_sectores');
				$datos['paises']                            = $this->m_utiles->mostrar_paises();
				$id_socio                                   = $this->session->userdata('SES_id_socio');
				
				
				$datos['adj_socio']   = $this->m_adjudicacion->lista_adjudicacion_socio($id_socio,$_order,$_tipo_orden);
				
				
				$this->load->view('View_muro/View_listar_mis_adjudicaciones',$datos);
			
			}
			
			function ver_adjudicacion_socio($id_socio_adj=0){
				$this->m_utiles->sesionOk();
				$datos['sectores']                     = $this->session->userdata('SES_sectores');
				$datos['adjudicacion_socio']           = $this->m_adjudicacion->ver_adjudicacion_socio($id_socio_adj);
				$this->load->view('View_muro/View_ver_adjudicacion_socio',$datos);
			}
			
			
			
			
			function companias_mineras($pais=81){
				if($pais==81){ $npais="CHILE";} else {$npais="PERU";}
				
				$datos['npais']                                  = $npais;
				$datos['sectores']                               = $this->session->userdata('SES_sectores');
				$this->load->view('View_muro/View_pide_empresa',$datos);
			
			}
			
			
			
			function detalle_faena(){
				$this ->load->model ('Mod_empresa/Mod_empresa_minera','empresa_minera');
				
				if (!empty($_REQUEST['codigo'])) {
					$codigo = $_REQUEST['codigo'];
				 }
				 
				 
				 if (!empty($_REQUEST['pais'])) {
					$pais = $_REQUEST['pais'];
				 }
				 
				 if($pais=="CHILE"){ $tabla     ="empresas_chilenas"; }
				 if($pais=="PERU"){ $tabla      ="empresas_peruanas"; }
				 
				
				$datos['sectores']        = $this->session->userdata('SES_sectores');
				$datos['detalle_faena']   = $this->empresa_minera->buscar_detalle_faena($codigo,$tabla);
				$this->load->view('View_muro/View_detalle_faena',$datos);
			}
			
			
			
			
			
			
			
			function listado_empresas_mineras(){
								
				 $this ->load->model ('Mod_empresa/Mod_empresa_minera','empresa_minera');
				 $texto     = "";
				 $tipo      = "";
				 $pais      = "";
				 $operador  = "";
				 
				if (!empty($_REQUEST['buscar'])) {
					 $texto = $_REQUEST['buscar'];
				 }
				 if (!empty($_REQUEST['tipo'])) {
					$tipo = $_REQUEST['tipo'];
				 }
				
				 if (!empty($_REQUEST['pais'])) {
					$pais = $_REQUEST['pais'];
				 }
				 
				  if (!empty($_REQUEST['operador'])) {
					$operador = $_REQUEST['operador'];
				 }
				 
				 if($pais=="CHILE"){ $tabla     ="empresas_chilenas"; }
				 if($pais=="PERU"){ $tabla      ="empresas_peruanas"; }
			     
				 $texto     = "cobre";
				 $tipo      = "minerales";
				 
				 $html="<h3 align='center'>No se encontraron resultados</h3>";
				 $rs = $this->empresa_minera->buscar_empresas($texto, $tipo, $pais,$tabla);
				
				if(is_array($rs) && sizeof($rs)){
				    $html="";
				
					foreach($rs as $r2){
										$html=$html."<b>".$r2['operador']."</b><br>";
										$rsf = $this->empresa_minera->buscar_empresa_faena( $r2['operador'], $pais,$tabla);
										$ul="<ul>";
										if(is_array($rsf) && sizeof($rsf)){
											foreach($rsf as $rsf2){
												$ul=$ul."<li onclick='ver(".$rsf2['codigo'].");'>Faena &nbsp;:&nbsp;&nbsp;<a href='#'>".$rsf2['nombre']."</a> </li>";
											}
										}
										$ul=$ul."</ul>";
										$html= $html. $ul."<hr>";
					}
				
				}
				echo $html;
			}


			 
			function trae_descripcion_faena($ids=0){
				
				
			$html = "";	
			$faenas   = "";
	        $oemp     = "";
	        $busca    = "";
				
				
				if (!empty($_REQUEST['parame_1'])) {
					 $faenas = $_REQUEST['parame_1'];
				 }
				 
				 if (!empty($_REQUEST['parame_2'])) {
					 $oemp = $_REQUEST['parame_2'];
				 }
				 
				 
				 if (!empty($_REQUEST['parame_3'])) {
					 $busca = $_REQUEST['parame_3'];
				 }
				 
				 
			$rs       = array();
			$Omineras = array();
			
			$ids      = str_replace("K",",",$faenas) ;
			$Omineras = $this->muro->trae_Omineras_faena($oemp);
			$rs       = $this->muro->trae_proceso_faena($ids);
			
			$lafaena ="";
			$imagen  ="";
			
			if(is_array($Omineras) && sizeof($Omineras)){
				foreach($Omineras as $Omi){
					$lafaena= $Omi['Faena'];
					$imagen = $Omi['imagen'];
				}
			}	
			
			$texto="";
			if(is_array($rs) && sizeof($rs)){
			
				 
					  
			$html= $html."<br><div style='border: 1px solid #9cbebd;' align='center'>
								<div style='clear:both; width:100%; margin:0 auto; background-color:#9cbebd; display:table;' align='center'>
									<div style='float:left;'><img src='".URL_PM_BASE."images/procesos/".$imagen."' style='vertical-align:middle;' width='80px'></div><div style='float:left; font-weight:bold; padding-left:20px; vertical-align:middle;'>".$lafaena."</div>
								</div>
								<div style='clear:both;'>&nbsp;</div>
								<div style='clear:both; padding-left:30px;' align='left'><div style='clear:both;' align='left'>";
								
								foreach($rs as $res){
									$html= $html. "<table border='1' width='90%' cellspacing='0' cellpadding='5' align='center'>
										<tbody><tr>
											<td  style='border-color:#066293;' width='20%'><div align='right'>Área:</div></td>
											<td  style='border-color:#066293;'><div align='left'>* ".$res['Nombre']."</div></td>
										</tr>
										<tr>
											<td  style='border-color:#066293;' width='20%'><div align='right'>Descripción:</div></td>
											<td  style='border-color:#066293;'><div align='left'>* ".$this->destacador($busca,$res['Descripcion'])."
</div></td>
										</tr><tr>
											<td  style='border-color:#066293;' width='20%'><div align='right'>Equipos:</div></td>
											<td  style='border-color:#066293;'><div align='left'>".$this->destacador($busca,$res['Equiposp'])."</div></td>
										</tr><tr>
											<td  style='border-color:#066293;' width='20%'><div align='right'>Insumos:</div></td>
											<td  style='border-color:#066293;'><div align='left'>".$this->destacador($busca,$res['Insumos'])."</div></td>
										</tr></tbody></table><br><hr style='color: orange'><br>";
										}
										
										
										
									
										
									$html= $html. "</div><div style='clear:both; width:100%;'>&nbsp;</div></div>
								<div style='clear:both;'>&nbsp;</div>
							</div>";
							
				
                             }				
							
							
							$datos['sectores']                               = $this->session->userdata('SES_sectores');
							$datos['html']                                   = $html;
				            $this->load->view('View_muro/View_equipos_detalle_faena',$datos);
							
							
			}
			
			 
			  
			function destacador($p="",$t=""){
				
			 if($p=="0"){ return($t) ;}
			 
			  $nuevo_p = "<font color='red'><b>".strtoupper($p)."</b></font>";
			  
			  
			  $t = str_ireplace($p,$nuevo_p,$t) ;
			  
			  return ($t);
			}
} // fin


	  
