<?php
class Mod_directorio extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function ver_directorio($username){
		$this->db->where("us.username_socio", $username);
		$this->db->where("s.tiene_directorio", 1);
		$this->db->where("ep.guardado", 1);
		$this->db->select("ep.*, s.*, us.id_user_socio");
		$this->db->join("user_socio us", "us.id_socio=ep.id_socio", "inner");
		$this->db->join("socio s", "s.id_socio=us.id_socio", "inner");
		$query=$this->db->get("emp_prov ep");
		$query->first_row();
		$arreglo   = $query->result_array();
		return($arreglo);
		
	}



      function graba_directorio(){
		  
		  $Nombre               ="";
		  $Pais                 ="";
		  $Ciudad               ="";
		  $Direccion            ="";
		  $Fono                 ="";
		  $Fax                  ="";
		  $mail                 ="";
		  $Sitio                ="";
		  $descripcion_full     ="";
		  $productos_servicios  ="";
		  $sucursales           ="";
		  $Codigo               ="";
		  $tiene_directorio     ="";
		  $Casilla              ="";
		  $image               ="";
		  
		  
		  if (!empty($_REQUEST['Nombre_p'])) {
					 $Nombre = $_REQUEST['Nombre_p'];
		  }
		  
		   if (!empty($_REQUEST['image_p'])) {
					 $image = $_REQUEST['image_p'];
		  }
		  
		   if (!empty($_REQUEST['Pais_p'])) {
					 $Pais = $_REQUEST['Pais_p'];
		  }
		  
		  if (!empty($_REQUEST['Ciudad_p'])) {
					 $Ciudad = $_REQUEST['Ciudad_p'];
		  }
		  if (!empty($_REQUEST['Direccion_p'])) {
					 $Direccion = $_REQUEST['Direccion_p'];
		  }
		  if (!empty($_REQUEST['Fono_p'])) {
					 $Fono = $_REQUEST['Fono_p'];
		  }
		   if (!empty($_REQUEST['Fax_p'])) {
					 $Fax = $_REQUEST['Fax_p'];
		  }
		   if (!empty($_REQUEST['Fax_p'])) {
					 $Fax = $_REQUEST['Fax_p'];
		  }
		   if (!empty($_REQUEST['mail_p'])) {
					 $mail = $_REQUEST['mail_p'];
		  }
		   if (!empty($_REQUEST['Sitio_p'])) {
					 $Sitio = $_REQUEST['Sitio_p'];
		  }
		   if (!empty($_REQUEST['productos_servicios_p'])) {
					 $productos_servicios = $_REQUEST['productos_servicios_p'];
		  }
		   if (!empty($_REQUEST['descripcion_full_p'])) {
					 $descripcion_full = $_REQUEST['descripcion_full_p'];
		  }
		    if (!empty($_REQUEST['sucursales_p'])) {
					 $sucursales = $_REQUEST['sucursales_p'];
		  }
		    if (!empty($_REQUEST['Codigo_p'])) {
					 $Codigo = $_REQUEST['Codigo_p'];
		  }
		     if (!empty($_REQUEST['tiene_directorio_p'])) {
					 $tiene_directorio = $_REQUEST['tiene_directorio_p'];
		  }
		       if (!empty($_REQUEST['Casilla_p'])) {
					 $Casilla = $_REQUEST['Casilla_p'];
		  }
		 
		 
		 
		          $data_insert= array();
		  
				  $data_update = array(
                    'Nombre' => $Nombre,
                    'Pais' => $Pais,
					'Imagen' => $image,
					'Ciudad' => $Ciudad,
					'Direccion' => $Direccion,
					'Fono' => $Fono,
					'Casilla' =>$Casilla,
					'Fax' => $Fax,
					'mail' => $mail,
					'Sitio' => $Sitio,
					'descripcion_full' => $descripcion_full,
					'productos_servicios' => $productos_servicios,
					'sucursales' => $sucursales
                );
				
				//print_r($data_update);
				
				if($Codigo>0){
					$this->db->where('Codigo', $Codigo);
                    $this->db->update('emp_prov', $data_update);
				}else{	 
				    $this->db->insert('emp_prov', $data_insert);
				}

				 $Estado="OK";
				 $data= array(
                    'Estado' => $Estado
					);

	 
return($data);
			//	$this->db->insert('emp_prov', $data);
				
	}
			
} // fin


