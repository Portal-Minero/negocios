<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fichaproyecto extends CI_Controller {
function __construct()
			{
				parent::__construct();
                
				
				$this ->load->model ('Mod_proyecto/Mod_general/Mod_general','general');
				$this ->load->model ('Mod_proyecto/Mod_buscador/Mod_buscador','m_buscador');
				$this ->load->model ('Mod_proyecto/Mod_Ficha/Mod_FichaProyecto','m_Mod_FichaProyecto');
				$this ->load->model ('Mod_utiles/Mod_Comunes','m_utiles');
				
				
			}
			
			public function index()
			{
				
				    $datos['licitaciones_detalle']    = $this->m_Mod_FichaProyecto->get_licitaciones_detalle(215);
					
                    exit;					
			}
			
			
			
			
			function ficha_proyectos($id_pro=0,$sector=0,$modal=0){
				   
							
				 $id_pro =$id_pro;
				 $datos  =array();
				 $datos['ti_etapas']                = $this->m_Mod_FichaProyecto->get_fechas_tl($id_pro);
				 $datos['nombre_completo_socio']    = $this->session->userdata('SES_nombre_completo_socio');
				 $datos['email_socio']              = $this->session->userdata('SES_email_socio');
				 $datos['fono_user_socio']          = $this->session->userdata('SES_fono_user_socio');
				 $datos['sectores']                 = $this->session->userdata('SES_sectores');
				 $datos['id_pro']                   = $id_pro;
				 $datos['datos_general']            = $this->m_Mod_FichaProyecto->editar_proyecto($id_pro);
				 
				 $datos['datos_adjuntos']           = $this->m_Mod_FichaProyecto->get_adjuntos_proyecto($id_pro);
				 $datos['get_etapas_proyecto']      = $this->m_Mod_FichaProyecto->get_etapas_proyecto($id_pro);
				 $datos['get_hitos_importantes']    = $this->m_Mod_FichaProyecto->get_hitos_importantes($id_pro);
				 
				  
				 $datos['datos_contactos']          = $this->m_Mod_FichaProyecto->buscar_contactos_pro($id_pro,1);
				 $datos['proyecto_tipos']           = $this->m_Mod_FichaProyecto->mostrar_tipos($id_pro);
				 $datos['propietarios_proyecto']    = $this->m_Mod_FichaProyecto->mostrar_propietarios($id_pro);
				 $datos['etapa_actual']             = $this->m_Mod_FichaProyecto->cargar_datos_etapa_actual($id_pro);
				 $datos['contacto_principal']       = $this->m_Mod_FichaProyecto->buscar_contactos_pro($id_pro,1);
				 $datos['contacto_otros']           = $this->m_Mod_FichaProyecto->buscar_contactos_pro($id_pro,0);
				 $datos['get_obras_pr']             = $this->m_Mod_FichaProyecto->get_obras_proyecto($id_pro);
				 $datos['get_equipo_pr']            = $this->m_Mod_FichaProyecto->get_equipo_proyecto($id_pro);
				 $datos['get_suminis_pr']           = $this->m_Mod_FichaProyecto->get_suministros_proyecto($id_pro);
				 $datos['get_servicios_pr']         = $this->m_Mod_FichaProyecto->get_servicios_proyecto($id_pro);
				 $datos['get_barra_grafico_proyectos']  = $this->m_Mod_FichaProyecto->get_barra_grafico_proyectos($sector);
				 $datos['get_barra_grafico_proyectos_sectores']  = $this->m_Mod_FichaProyecto->get_barra_grafico_proyectos_sectores();
				 $datos['get_adjudicaciones_asociadas']            = $this->m_Mod_FichaProyecto->get_adjudicaciones_asociadas($id_pro);
				
				 $datos['get_licitaciones_detalle']                = $this->m_Mod_FichaProyecto->get_licitaciones_detalle($id_pro);
				 
				 
				 $datos['sector_elegido']                           = $sector;
				  
				 $datos['tiene_rca']  = $this->m_utiles->tiene_rca($id_pro);
				  
				 
				  
				 // $rc=array();
				 // print_r($this->m_Mod_FichaProyecto->get_servicios_proyecto($id_pro));
				//  $rc = $this->m_Mod_FichaProyecto->get_servicios_proyecto($id_pro);
				 // print_r($rc);
				//  echo "<br>";
				//foreach ($rc as $row){ 
				
				
                //   echo $row['id_serv']."<br>";
				   
				   
			
		       // } 
			   
				  $nombre_pro = $this->m_utiles->trae_un_dato("SELECT Nombre_pro AS dato FROM proyectos WHERE id_pro = ".$id_pro);
				  $SES_id_user_socio = $this->session->userdata('SES_id_user_socio');
				  $this->m_utiles->actividad_usuario($nombre_pro, $id_pro,"P",$SES_id_user_socio);
				 
				  
				  
				  
				// print_r(   $this->m_Mod_FichaProyecto->buscar_contactos_pro($id_pro,0)  );
				//exit;
				if($modal==1){ $this->load->view('View_ficha/View_ficha_proyecto_popup',$datos);}
				if($modal==0){ $this->load->view('View_ficha/View_ficha_proyecto',$datos);}
				
			}
			
			
			/*function crea_ficha_proy($id_pro=0){
				$pro=array();
				$id_pro=2339;
				$pro=$this->m_Mod_FichaProyecto->editar_proyecto($id_pro);
				print_r($pro);
				
			}*/
          
} // fin


	  
