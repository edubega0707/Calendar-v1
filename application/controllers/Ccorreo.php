<?php 

/**
* 
*/
class Ccorreo extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
	public function enviar_correo()
	{
		$this->load->library('email');

		$configmail= array(
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://smtp.googleemail.com',
			'smtp_port'=>465,
			'smtp_user'=>'eduisic94@gmail.com',
			'smtp_pass'=>'Eduardo070794',
			'mailtype'=>'html',
			'charset'=>'utf-8',
			'newline'=>"\r\n"
		 );
		$this->email->initialize($configmail);
		$this->email->from('eduisic94@gmail.com');
		$this->email->to('');
		$this->email->subject('Solicitud de tableta');
		$this->email->message('
			<h2>Solicitud de Tableta</h2>
			<hr>
			<p>Solicito autorizacion para el uso de la tableta </p>
			');
		for ($i=1; $i<=1 ; $i++) { 
			if ($this->email->send()) {
				echo "Enviado por asesor";
			}
			else {
				show_error($this->email->print_debugger());
			}
		}
	}
}
 ?>