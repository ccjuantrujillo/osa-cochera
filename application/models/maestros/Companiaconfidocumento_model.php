<?php
/* *********************************************************************************
Autor: Unknow
Fecha: Unknow

Dev: Rawil Ceballo
Dev: Luis Valdes
/* ******************************************************************************** */
class Companiaconfidocumento_model  extends CI_Model{

	## Dev: Rawil Ceballo -> Begin
	public function __construct(){
		parent::__construct();
	}
	## Dev: Rawil Ceballo -> End

	public function obtener($comp_confi, $documento){
		$where = array("COMPCONFIP_Codigo"=>$comp_confi,"DOCUP_Codigo"=>$documento,"COMPCONFIDOCP_FlagEstado"=>"1");
		$query = $this->db->where($where)->get('cji_companiaconfidocumento');
		if($query->num_rows() > 0){
			foreach($query->result() as $fila){
				$data[] = $fila;
			}
			return $data;
		}
	}

	public function modificar($codigo,$companiadato,$filter=null){
		$where = array("COMPCONFIDOCP_Codigo"=>$codigo,"COMPCONFIP_Codigo"=>$companiadato);
		$this->db->where($where);
		$this->db->update('cji_companiaconfidocumento',(array)$filter);
	}
}
?>