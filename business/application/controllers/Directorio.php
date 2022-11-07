<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Directorio extends CI_Controller {
function __construct()
			{
				parent::__construct();
                
			/*	$this ->load->model ('Mod_muro/Mod_muro_general','muro');
				$this ->load->model ('Mod_general/Mod_general','general');
				$this ->load->model ('Mod_buscador/Mod_buscador','buscador');
				*/
				
				
				$this->load->model ('Mod_directorio/Mod_directorio','proveedores');
			}
			
			public function index()
			{
				//echo "bien222sssss2";
				//$this->load->view('welcome_message');
			}
			
			
			
			public function informacion_directorio(){
				$SES_username_socio            =  $this->session->userdata('SES_username_socio');
				$datos['sectores']             =  $this->session->userdata('SES_sectores');
				$datos['datos_general']        =  $this->proveedores->ver_directorio($SES_username_socio);
				//print_r($datos);
				$this->load->view('View_directorio/view_informacion_directorio',$datos);
				
			}	
			
			public function informacion_directorio_update(){
				
				$SES_username_socio           = $this->session->userdata('SES_username_socio');
		 		$datos['sectores']            =  $this->session->userdata('SES_sectores');
				$datos['datos_general']       = $this->proveedores->ver_directorio($SES_username_socio);
				//print_r($datos);
				$this->load->view('View_directorio/view_informacion_directorio_update.php',$datos);
				
			}
			
			
			public function informacion_directorio_grabar(){
				
				//echo "grabar";
				$datos['data']   = $this->proveedores->graba_directorio();
				return $datos['data'] ;
			}
			
			
			function sube_imagen(){
				
				$phtml=URL_PM_BASE."images_dp";
				
				
				//echo "kkkkk";
				
				
				// Definitions
							$accept_types = array(
								"image/pjpeg",
								"image/jpeg",
								"image/png",
								"image/gif",
							);

							$to_path = URL_PM_HOST_LINUX_HTML."images_dp";

							// Check directory
							if(!is_dir($to_path)){
								echo "[ERROR]Internal directory not exists";
								return;
							}

							// Check file type
							if(!in_array($_FILES["file"]["type"], $accept_types)){
								echo "[ERROR]Error en tipo Archivo";
								return;
							}


							// Move the file
							if (move_uploaded_file($_FILES["file"]["tmp_name"], $to_path . "/" . $_FILES['file']['name'])) {
								echo $_FILES['file']['name'];
								return;
							}

							// Default error
							echo "[ERROR]Move image failed!";
											
									  }
          
} // fin


	  
