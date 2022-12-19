<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fichalicitacion extends CI_Controller {
function __construct()
			{
				parent::__construct();
                
			
				$this->load->model ('Mod_utiles/Mod_Comunes','m_utiles');
				$this->load->model ('Mod_licitacion/Mod_licitacion','m_licitacion');
				$this ->load->model ('Mod_proyecto/Mod_general/Mod_general','general');
			}
			
			public function index()
			{
				//echo "bien222sssss2";
				//$this->load->view('welcome_message');
			}
			
			
			function prueba(){
				
			    $this->m_licitacion->linea_id_consultas($id_pais="",$id_region="",$id_lici_tipo=0,$id_sector=0);
				$this->m_licitacion->carga_licitaciones_inicial();
				 echo $GLOBALS['numero_de_lineas_global'];
			}
			function licitaciones($tipo=0){
				
				$this->m_utiles->sesionOk();
				$orden=0;
				$tipo_orden ="desc";
				$inicio     = 0;
				$fin        = 50;
				$datos['id_sectores']          = 1; // ojo
				
				$sectores                  = $this->session->userdata('SES_sectores');
				$datos['paises']           = $this->m_licitacion->get_u_pais_general($tipo);
				$datos['sectores']         = $sectores;
				//$datos['grilla_db']        = $this->m_licitacion->crea_grilla_db($orden,$tipo_orden,$tipo,$sectores,$inicio,$fin);
				$datos['get_sectores']     = $this->m_licitacion->get_sectores();
				$datos['get_u_region']     = $this->m_licitacion->get_u_region();
				
				
				
				//print_r($datos);
				$this->load->view('View_licitacion/View_buscador_licitacion',$datos);
				
			}
          
} // fin


	  
