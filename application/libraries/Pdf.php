<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* *********************************************************************************
Autor: Rawil Ceballo
Fecha: 07/10/2020

Dev: Luis Valdes
/* ******************************************************************************** */
use Dompdf\Dompdf;

class pdf{
	public function __construct(){
		require APPPATH.'/third_party/dompdf-v0.8.6/src/Dompdf.php';
	}
}
?>