<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
function __construct()
			{
				parent::__construct();
             //   $this->load->library('session');
				$this ->load->model ('Mod_login/Mod_login','m_login');
				$this ->load->model ('Mod_muro/Mod_muro_general','muro');
				$this ->load->model ('Mod_utiles/Mod_Comunes','Pm_Email');
				
			}
			
			public function index()
			{
				//$this->Pm_Email-> enviar_correo("enriquepintofuentes@gmail.com","el kiko","epinto@portalminero.com","el contenido del correo","prueba centos 8");
				
				
				//exit;
				$this->ingreso();
			}
			
			public function ingreso()
			{
				 
				$membresias      = array();
				$usuario_permiso = array();
				
                $this->load->helper('url');

				
				 if (!empty($_REQUEST['usuario'])) {
					 $usuario  = strtoupper($_REQUEST['usuario']);
				 }
				 
				 if (!empty($_REQUEST['clave'])) {
					 $clave   = strtoupper($_REQUEST['clave']);
				 }
				 
				 
				 $usuario="epintof2760";
		         $clave="epintof2760";
				 
				// $usuario="w.jofre";
		       //  $clave="wjofre764";
		
		
				 $usuario_permiso    = $this->m_login->ingreso($usuario,$clave);
				 
			
				 foreach ($usuario_permiso as $row)
				  {
					  
				     
					  
					     $Razon_social_socio      = $row['Razon_social_socio']; 
						 $id_socio                = $row['id_socio']; 
						 $id_user_socio           = $row['id_user_socio']; 
						 $nombre_completo_socio   = $row['nombre_completo_socio']; 
						 $username_socio          = $row['username_socio']; 
						 $password_socio          = $row['password_socio']; 
						 $Estado_socio            = $row['Estado_socio']; 
						 $tipo_socio              = $row['tipo_socio']; 
						 $fecha_caduca            = $row['fecha_caduca']; 
						 $email_socio             = $row['email_socio']; 
						 $fono_user_socio         = $row['fono_user_socio']; 
					  
					  
					 				      
				     
				  }
				 
				if(empty($usuario_permiso)){
					echo "Error usuario no existe";
					exit;
				}
				
				// ver fecha caduca
				 
				$sectores ="";
				if( $tipo_socio == 'Premium' ){ $sectores ="0,1,2,3,4,5,6,7";}
				if( $tipo_socio == 'Preferencial' ){ $sectores ="0,1,2";}
				if( $tipo_socio == 'Especial' ){
					
					 $membresias = $this->muro->SectoresSocios($username_socio);
				
				     if(!empty($membresias)) {
						$sectores="0";
						for($i = 0; $i < sizeof($membresias);$i++)
						{
							$sectores=$sectores.",".trim($membresias[$i][2]);
						}
				     }
				}
				
				
				
				
								 
				 //$this->load->library('session');
				 $seccion_usuario = array(
					'SES_id_socio'               =>  $id_socio,
					'SES_nombre_completo_socio'  =>  $nombre_completo_socio,
					'SES_id_user_socio'          =>  $id_user_socio,
					'SES_username_socio'         =>  $username_socio,
					'SES_sectores'               =>  $sectores,
					'SES_tipo_socio'             =>  $tipo_socio,
					'SES_email_socio'            =>  $email_socio,
					'SES_fono_user_socio'        =>  $fono_user_socio
                 );
				 $this->session->set_userdata($seccion_usuario);
				 
				 			 
				 
				 redirect('muro/inicio', 'refresh');
			}
} // fin
