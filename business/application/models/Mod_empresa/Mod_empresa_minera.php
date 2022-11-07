<?php
class Mod_empresa_minera extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function buscar_empresas($texto="", $tipo="", $pais="", $operador){
		if($texto!="" && $texto!=NULL && $tipo!="" && $tipo!=NULL){
			$this->db->where("operador", $operador);
			$this->db->like($tipo, $texto, "both");
			if($pais==$this->params->pais_demp[0])
				$query=$this->db->get("empresas_chilenas");
			else if($pais==$this->params->pais_demp[1])
				$query=$this->db->get("empresas_peruanas");
			else{
				echo "ERROR1";
				return(false);
			}
			$rs=$query->result();
			if(is_array($rs) && sizeof($rs)>0){
				return($rs);
			}else{
				return(true);
			}
		}else{
			echo "ERROR2";
			return(false);
		}
	}
	
	
?>
