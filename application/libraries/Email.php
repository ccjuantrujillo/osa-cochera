<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* *********************************************************************************
Autor: Rawil Ceballo
Fecha: 07/10/2020

Dev: Luis Valdes
/* ******************************************************************************** */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email{
	public function __construct(){
		require APPPATH.'/third_party/PHPMailer-v6.1.7/src/Exception.php';
		require APPPATH.'/third_party/PHPMailer-v6.1.7/src/PHPMailer.php';
		require APPPATH.'/third_party/PHPMailer-v6.1.7/src/SMTP.php';
	}
}
?>