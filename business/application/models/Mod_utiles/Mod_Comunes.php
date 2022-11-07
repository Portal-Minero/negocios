<?php
class Mod_Comunes extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	    public function enviar_correo($remitente,$nombre_remi="",$destino,$contenido,$asunto){
			 $this->load->library('email');
			 
				$config['protocol'] = 'sendmail';
				//$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;

			    $this->email->initialize($config);

				 $this->email->from($remitente, $nombre_remi);
				 $this->email->to($destino);
				 $this->email->subject($asunto);
				 $this->email->message($contenido);
				 if ($this->email->send()) {
				   echo 'Your Email has successfully been sent.';
				} else {
					show_error($this->email->print_debugger());
				}

	} 
		
	
} 





function actualiza_cliente_html_proyecto($id,$html_cliente,$html_estado){
		date_default_timezone_set("America/Santiago");
	    $html_date = date('Y/m/d H:i:s');
	   		
		$data_insert= array();
		  
				  $data_update = array(
                    'html_cliente' => $html_cliente,
                    'html_estado'  => $html_estado,
					'html_date'    => $html_date
                );
				
					$this->db->where('id_pro', $id);
                    $this->db->update('proyectos', $data_update);
		
		
		
		
		
		
	}
	
	
	
?>
