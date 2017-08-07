<?php 

/**
* 
*/
class Ccorreo extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mregistro');
		$this->load->helper(array('form', 'url'));
	}
	public function enviar_correo_oficina()
	{
			$nombre_asesor=$this->input->post('nombre_asesor');
			$nombre_oficina=$this->input->post('nombre_oficina');
			$des_evento=$this->input->post('des_evento');
			$desc_tableta_evento=$this->input->post('desc_tableta_evento');
			$desc_biometrico_evento=$this->input->post('desc_biometrico_evento');
		

			$correo_usuario=$this->input->post('correo_usuario');
            $correo_oficina=$this->Mregistro->correo_oficina($nombre_oficina);

			$para =$correo_oficina;

			// título
			$título = 'RESPUESTA SOLICITUD DE TABLETA';

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
				<h5> DESCRIPCION TABLETA: '.$desc_tableta_evento.'</h5>
				<br>
				<h5>DESCRIPCION BIOMETRICO:  '.$desc_biometrico_evento.'</h5>
				<br>
				<h4>TU SOLICITUD HA SIDO ACEPTADA POR FAVOR PASAR A LA OFICINA POR EL EQUIPO SOLICITADO</h4>
				<br>
				
							
				</body>
			</html>
			';

 				// <p>FECHA DE INICIO: '.$fecInicio.'</p>	
				// <p>HORA INICIO: '.$hora_inicio.' </p>
				// <br>
				// <p>FECHA DE TERMINO: '.$fecFin.' </p>	
				// <p>HORA TERMINO: '.$hora_fin.'</p>	
			
			

			// Para enviar un correo HTML, debe establecerse la cabecera Content-type
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Cabeceras adicionales
			$cabeceras .= 'From: ' . $correo_usuario . " \r\n";		

			// Enviarlo
			mail($para, $título, $mensaje, $cabeceras);

	}


		public function enviar_correo_claves()
	{
			$nombre_usuario=$this->input->post('nombre_usuario');
			$rol_usuario=$this->input->post('rol_usuario');
			$correo_usuario=$this->input->post('correo_usuario');
			$correo_usuario_admin=$this->input->post('correo_usuario_admin');
			$clave_usuario=$this->input->post('clave_usuario');
			$pass_usuario=$this->input->post('pass_usuario');


		
			$para =$correo_usuario;

			// título
			$título = 'REGISTRO DE USUARIOS';

			// mensaje
			$mensaje = '
			<html>
			<head>

			<title>Sistema de Integracion Dinamica de Tableta</title>
			</head>
				<body>
				<p>Bienvenido '.$nombre_usuario.' al Sistema de Integracion Dinamica de Tableta</p>
				<br>
				<br>
				<p>Descripcion De la solicitud:<p>
				<br>
				<p>Para poder ingresar al sistema  ingresa a la siguiente liga:</p>
				<br>
				<p>www.agenda.dipradigital.com</p>
				<p>TUS CREDENCIALES DE ACCESO SON LA SIGUIENTES:</p>
				<br>
				<h5>ROL DE USUARIO: '.$rol_usuario.'</h5>
				<br>
				<h5>CLAVE: '.$clave_usuario.'</h5>
				<br>
				<h5>PIN:  '.$pass_usuario.'</h5>
				<br>
				<br>
				
							
				</body>
			</html>
			';

 
			// Para enviar un correo HTML, debe establecerse la cabecera Content-type
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Cabeceras adicionales
			$cabeceras .= 'From: ' . $correo_usuario_admin . " \r\n";		

			// Enviarlo
			mail($para, $título, $mensaje, $cabeceras);

	}




	public function enviar_correo_dos()
	{
					
			$nombre_asesor=$this->input->post('nombre_asesor');
			$nombre_oficina=$this->input->post('nombre_oficina');
			$des_evento=$this->input->post('des_evento');
			$desc_tableta_evento=$this->input->post('desc_tableta_evento');
			$desc_biometrico_evento=$this->input->post('desc_biometrico_evento');
		


			$correo_usuario=$this->input->post('correo_usuario');
            $correo_oficina=$this->Mregistro->correo_oficina($nombre_oficina);


			$para =$correo_oficina;

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
				<h5> DESCRIPCION TABLETA: '.$desc_tableta_evento.'</h5>
				<br>
				<h5>DESCRIPCION BIOMETRICO:  '.$desc_biometrico_evento.'</h5>
				<br>
				<h4>POR FAVOR REVISAR MI SOLICITUD</h4>
				<br>
				
							
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