<?php
/* *********************************************************************************
Autor: Unknow
Fecha: Unknow

Autor: Rawil Ceballo
Dev: Luis Valdes
/* ******************************************************************************** */

class Companiaconfiguracion_model extends CI_Model
{

	## Dev: Rawil Ceballo -> Begin
	public function __construct()
	{
		parent::__construct();
	}
	## Dev: Rawil Ceballo -> End

	## Dev: Rawil Ceballo -> Begin
	public function getConfiguracion($compania)
	{
		$sql = "SELECT cc.*, cc.COMPCONFIC_Igv as igv,
									 cc.COMPCONFIC_PrecioContieneIgv as precioConIgv,
									 cc.COMPCONFIC_CodigoProductos as codigoProductos,
									 cc.COMPCONFIC_DeterminaPrecio as determinaPrecio,
									 cc.COMPCONFIC_BSCodigo as bsCodigo
							FROM cji_companiaconfiguracion cc
							WHERE cc.COMPP_Codigo = '$compania'
							AND cc.COMPCONFIC_FlagEstado LIKE '1'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
			return $query->row();
		else
			return NULL;
	}
	## Dev: Rawil Ceballo -> End

	## Dev: Rawil Ceballo -> Begin
	public function actualizar_configuracion($compania, $filter)
	{
		$this->db->where('COMPP_Codigo', $compania);
		return $this->db->update('cji_companiaconfiguracion', $filter);
	}
	## Dev: Rawil Ceballo -> End

	## Edit: Rawil Ceballo -> Begin
	public function obtener($compania)
	{
		$sql = "SELECT * FROM cji_companiaconfiguracion WHERE COMPP_Codigo = '$compania' AND COMPCONFIC_FlagEstado LIKE '1'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	## Edit: Rawil Ceballo -> End
}
