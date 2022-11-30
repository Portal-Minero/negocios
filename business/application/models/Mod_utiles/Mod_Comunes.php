<?php
class Mod_Comunes extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	    public function enviar_correo($remitente,$nombre_remi="",$destino,$contenido,$asunto){
			 $this->load->library('email');
			 
				$config['protocol'] = 'sendmail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;

			    $this->email->initialize($config);

				 $this->email->from($remitente, $nombre_remi);
				 $this->email->to($destino);
				 $this->email->subject($asunto);
				 $this->email->message($contenido);
				 $this->email->cc('epinto@portalminero.com');
				 if ($this->email->send()) {
				  // echo 'Your Email has successfully been sent.';
				} else {
					//show_error($this->email->print_debugger());
				}

	} 
		
	


function sesionOk(){
	if($this->session->userdata('SES_id_socio')==''){
			   echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
				<html xmlns='http://www.w3.org/1999/xhtml'>
				<head>
				<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
				<title>Portal Minero</title>
				</head>

				<body>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p align='center'><img src='https://www.portalminero.com/wp/wp-content/uploads/2018/08/portalminero-logo.png' /></p>
				<h1 align='center'>Aviso Del Sistema !!</h1>
				<p align='center'>
				<h3 align='center'><a href='".URL_PM_BASE."wp/app/business/'>Su sesión ha finalizado por favor vuelva a conectarse al sistema.</a></h3></p>
				<p>&nbsp;</p>
				</body>
				</html>";
				die();
	}
		
} 


public function actividad_usuario($texto=0,$id_registro=0,$Tipo=0,$SES_id_user_socio=0){
	
	        $data = array('texto'=>$texto,'id_registro'=>$id_registro,'Tipo'=>$Tipo,'id_usuario'=>$SES_id_user_socio);

		 
			 $this->db->insert('actividad_usuario',$data);
			 $this->db->close();
			 return (true);
		
		 
		 
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
	
	 
	 function trae_un_dato($sql){
	          $query = $this->db->query($sql);
			  $arreglo   = $query->result_array();
			  foreach ($arreglo as $row) {
				       return $row['dato'];
			  }
      }


  function  tiene_rca($id_pro=0){
   	/* Ve si el proyecto tiene el hito RCA  EPF */
     $query = $this->db->query('SELECT id_hito  AS rca FROM proyectos_x_hitos WHERE id_pro = '.$id_pro.' AND id_hito = 1');
     return $query->num_rows();
   }

   function mostrar_actividad_usuario(){
	              $id_usuario = $this->session->userdata('SES_id_user_socio');
		          $sql        = "SELECT * FROM actividad_usuario WHERE id_usuario = ".$id_usuario." ORDER BY id DESC LIMIT 0, 20;";
				  $query      = $this->db->query($sql);
				  $arreglo    = $query->result_array();
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
	
	
	function mail_usuario_adjudicacion($id_socio_adj=0){
		
		$id_user_socio = $this->session->userdata('SES_id_user_socio');;
		
		$sql = "SELECT
			socio_adjudicaciones.id_socio_adj
			, socio_adjudicaciones.nombre_adj
			, socio_adjudicaciones.id_socio
			, user_socio.nombre_completo_socio
			, user_socio.email_socio
			, user_socio.id_user_socio
			, socio_adjudicaciones.empresa_contacto
		FROM
			portalminero.socio_adjudicaciones
			INNER JOIN portalminero.user_socio 
				ON (socio_adjudicaciones.id_socio = user_socio.id_socio)
		WHERE (socio_adjudicaciones.id_socio_adj =".$id_socio_adj."
			AND user_socio.id_user_socio =".$id_user_socio.");";
				
							  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
		
		foreach ($arreglo as $row) {
			$nombre_completo_socio  = $row['nombre_completo_socio'];
			$empresa_contacto       = $row['empresa_contacto'];
			$email_socio            = $row['email_socio'];
			$nombre_adj             = $row['nombre_adj'];
		}
		/*-------------------------------------------------------------------------------------------------------------------------------*/
		$body="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html xmlns='http://www.w3.org/1999/xhtml'>
		<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>Portal Minero</title>
		</head>

		<body>
		<div align='center'>
		  <table width='40%' border='0'>
			<tr>
			  <br><br><td><div align='center'><strong>ADJUDUCACION USUARIO </strong></div><br><br><br></td>
			</tr>
			<tr>
			  <td><div align='center'><img src='https://www.portalminero.com/wp/wp-content/uploads/2018/08/portalminero-logo.png'  /></div><hr><br><br></td>
			</tr>
			<tr>
			  <td><p>El usuario ".$nombre_completo_socio." de la empresa  ".$empresa_contacto." con correo ".$email_socio.", a efectuado un ingreso o modificación a la adjudicación :  <em><strong>".$nombre_adj."</strong></em><strong></strong></p></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td><p>Consultar el siguiente link para más  detalles:</p></td>
			</tr>
			<tr>
			  <td><a href='".URL_PM_BASE."wp/app/business/muro/ver_adjudicacion_socio/541/' target='_blank'>".$nombre_adj."</a></td>
			</tr>
			
		  </table>
<br><br><br><br><p>* <em>Este correo ha sido generado en forma automática  por el sistema</em></p>
		</div>
		</body>
		</html>";
		echo $body;
		
		 $this->enviar_correo("epinto@portalminero.com","Enrique Pinto","enriquepintofuentes@gmail.com",$body,"ADJUDICACION SOCIO PORTAL");
		exit;
		/*------------------------------------------------------------------------------------------------------------------------*/
		
	}
}
?>
