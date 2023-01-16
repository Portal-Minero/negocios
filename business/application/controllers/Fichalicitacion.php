<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fichalicitacion extends CI_Controller {
function __construct()
			{
				parent::__construct();
                
			
				$this->load->model ('Mod_utiles/Mod_Comunes','m_utiles');
				$this->load->model ('Mod_licitacion/Mod_licitacion','m_licitacion');
				$this ->load->model('Mod_proyecto/Mod_general/Mod_general','general');
			}
			
			public function index()
			{
				//echo "bien222sssss2";
				//$this->load->view('welcome_message');
			}
			
			
			function carga_inicial_licitacion(){
				
			    $this->m_licitacion->linea_id_consultas($id_pais="",$id_region="",$id_lici_tipo=0,$id_sector=0);
				$this->m_licitacion->carga_licitaciones_inicial();
				// echo $GLOBALS['numero_de_lineas_global'];
			}
			
			function busqueda_licitaciones_superior(){
				
				 $this->m_licitacion->busqueda_licitaciones_superior();
				
				
			}
			
			function licitaciones($tipo_licitacion=0){
				//echo $tipo_licitacion;
				$this->m_utiles->sesionOk();
				$orden       = 0;
				$tipo_licitacion_orden  ="desc";
				$inicio      = 0;
				$fin         = 50;
				
				$sectores                               = $this->session->userdata('SES_sectores');
				$datos['id_sectores']                   = $sectores;
				
				$datos['tipo_lici']                     = $tipo_licitacion; 
				$datos['paises']                        = $this->m_licitacion->get_u_pais_tipo_sector($tipo_licitacion);
				$datos['get_u_region']                  = $this->m_licitacion->get_u_region();
				$datos['get_empresa_licita']            = $this->m_licitacion->get_empresa_licita($sectores,$tipo_licitacion);
				$datos['sectores']                      = $this->session->userdata('SES_sectores');
				$datos['get_sectores']                  = $this->m_licitacion->get_sectores();
				$datos['get_registro_proveedores']      = $this->m_licitacion->get_registro_proveedores($sectores,$tipo_licitacion);
				$datos['get_obras_principales']         = $this->m_licitacion->get_obras_principales($sectores,$tipo_licitacion);
				$datos['get_equipos_principales']       = $this->m_licitacion->get_equipos_principales($sectores,$tipo_licitacion);
				$datos['get_suministros_principales']   = $this->m_licitacion->get_suministros_principales($sectores,$tipo_licitacion);
				$datos['get_servicios_principales']     = $this->m_licitacion->get_servicios_principales($sectores,$tipo_licitacion);
				$datos['get_licitaciones_tipos']        = $this->m_licitacion->get_licitaciones_tipos($sectores,$tipo_licitacion);
				$datos['get_rubros_principales']        = $this->m_licitacion->get_rubros_principales($sectores,$tipo_licitacion);
				$datos['get_proyectos_tipo']            = $this->m_licitacion->get_proyectos_tipo($sectores);
				
				
				
				
				 
				
				//print_r($datos);
				$this->load->view('View_licitacion/View_buscador_licitacion',$datos);
				
			}
          
} // fin


	  
