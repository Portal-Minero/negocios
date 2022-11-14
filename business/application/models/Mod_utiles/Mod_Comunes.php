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
	
	
       function mostrar_region_pais($id_pais){
		$sql = "SELECT
				  id_region,
				  id_pais,
				  Nombre_region
				FROM portalminero.u_region
				WHERE id_pais".$id_pais."
				ORDER BY Nombre_region";
				
							  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
 	}
	
	
	function mostrar_paises(){
		$sql = "SELECT * from u_pais ORDER BY u_pais.Nombre_pais ASC";
				
							  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  return ($arreglo);
				 
	}	
	
	 
	function mostrar_region_pais_combo($id_pais,$select,$css=""){
		
		  $html="<select ".$css." name='".$select."' id='".$select."' >";
			$sql = "SELECT
				  id_region,
				  id_pais,
				  Nombre_region
				FROM portalminero.u_region
				WHERE id_pais=".$id_pais."
				ORDER BY Nombre_region";
				
							  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  foreach ($arreglo as $row) {
				       $html=$html."<option value='".$row['id_region']."'>".$row['Nombre_region']."</option>";
				  }
				   $html=$html."</select>";
				  return($html);
	}
	
}
?>
