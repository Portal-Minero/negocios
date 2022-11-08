<?php
class Mod_empresa_minera extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	
	
	
	
	function buscar_empresas($texto="", $tipo="", $pais="",$tabla=""){
		$where = " 1=1 ";
		//echo $tipo;
		if($tipo=="minerales"){ $where=$where." and minerales LIKE '%".$texto."%'"; }
		if($tipo=="nombre"){ $where=$where." and nombre LIKE '%".$texto."%'"; }
		if($tipo=="operador"){ $where=$where." and operador LIKE '%".$texto."%'"; }
		
		
		 $sql = "SELECT operador  FROM ".$tabla."
				WHERE ".$where."
				GROUP BY operador 
				ORDER BY operador
				";
				//echo  $sql;
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  $this->db->close(); 
				  return ($arreglo);
				  
	}
	
	
	
	function buscar_empresa_faena($texto="", $pais="",$tabla=""){
		
		
		 $sql = "SELECT nombre,codigo  FROM ".$tabla."
				WHERE operador ='".$texto."'
				GROUP BY nombre 
				ORDER BY nombre
				";
				//echo  $sql;
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  $this->db->close(); 
				  return ($arreglo);
				  
	}
	
	
	
	
	function buscar_detalle_faena($codigo=0,$tabla=""){
		
		
		 $sql = "SELECT *  FROM ".$tabla."
				WHERE codigo =".$codigo;
				//echo  $sql;
				  
				  $query     = $this->db->query($sql);
				  $arreglo   = $query->result_array();
				  $this->db->close(); 
				  return ($arreglo);
				  
	}
}
?>
