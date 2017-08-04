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
			$correo_asesor=$this->input->post('correo_asesor');
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
			$this->email->from($correo_asesor);
			$this->email->to('eduisic94@gmail.com');
			$this->email->subject('Solicitud de tableta');
			$this->email->message('
			<h2>Solicitud de Tableta</h2>
			<hr>
			<p>Solicito autorizacion para el uso de la tableta </p>
			');
			for ($i=1; $i<=1 ; $i++) 
			{ 
				if ($this->email->send())
				{
					echo "Enviado por asesor";
				}
				else 
				{
					show_error($this->email->print_debugger());
				}
			}
	}


	public function enviar_correo_dos()
	{
					
			$nombre_asesor=$this->input->post('nombre_asesor');
			$nombre_oficina=$this->input->post('nombre_oficina');
			$des_evento=$this->input->post('des_evento');
			$desc_tableta_evento=$this->input->post('desc_tableta_evento');
			$desc_biometrico_evento=$this->input->post('desc_biometrico_evento');
			$fecInicio=$this->input->post('fecInicio')
			$hora_inicio=$this->input->post('hora_inicio');				
			$fecFin=$this->input->post('fecFin');
			$hora_fin=$this->input->post('hora_fin');
			$correo_usuario=$this->input->post('correo_usuario');
			
		
            $row=$this->Mregistro->get_correo_oficina($nombre_oficina);
			$correo_jefe_oficina=$row->correo_usuario;


			$para = $correo_jefe_oficina;

			// título
			$título = 'Solicitud de Prestamo de tableta';

			// mensaje
			$mensaje = '
			<html>
			<head>
			<title>Sistema de Integracion Dinamica de Tableta</title>
			</head>
				<body>
				<p>El asesor '.$nombre_asesor.' Solicita prestamo de tableta</p>
				<br>
				<br>
				<p>Descripcion De la solicitud:<p>
				<br>
				<p>'.$des_evento.'</p>
				<br>
				<br>
				<h5>TABLETA'.$desc_tableta_evento.'</h5>
				<br>
				<h5>TABLETA'.$desc_biometrico_evento.'</h5>
				<br>
				<br>
				<h4>El asesor solicita la tableta para la fecha siguiente</h4>
				<br>
				<p>FECHA DE INICIO: '.$fecInicio.'   HORA INICIO: '.$hora_inicio.'</p>
				<br>
				<p>FECHA DE TERMINO: '.$fecFin.'     HORA INICIO: '.$hora_fin.'</p>				
				</body>
			</html>
			';

			// Para enviar un correo HTML, debe establecerse la cabecera Content-type
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Cabeceras adicionales
			$cabeceras .= 'From: ' . $correo_usuario . " \r\n";		

			// Enviarlo
			mail($para, $título, $mensaje, $cabeceras);
	
	}
}
 ?>