<?php  
 
class Cregistro extends CI_controller
{
 
	function __construct()
	{

		parent::__construct(); 
		
		$this->load->model('Mregistro');
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation', 'email')); 
	
	} 

	public function index() 
	{   
		$this->load->view('Registro/Registro');	
	}

	public function registrar()
	{ 	
	

		$this->form_validation->set_rules('nombre_usuario', 'Nombre de Usuario', 'required|trim',
                        array(
							'required' => 'Ingresar texto en mayusculas y sin acentos',					
						)						
						);
		$this->form_validation->set_rules('rol_usuario', 'Rol del Usuario', 'required|trim',
                        array(
							'required' => 'Debes ingresar  la contraseña'
						)
						);

		$this->form_validation->set_rules('sucursal_usuario', 'Sucursal del usuario', 'required|trim',
						array(
							'required' => 'Debes ingresar  la contraseña'
						)
						);
		$this->form_validation->set_rules('tel_usuario', 'Telefono del Usuario', 'required|trim|exact_length[10]|numeric',
                        array(
							'required' => 'Debes ingresar el telefono',
							'exact_length' => 'El telefono debe ser de 10 digitos',
							'numeric'=>'Solo se permiten numeros'
						)
						);
		$this->form_validation->set_rules('correo_usuario', 'Sucursal del usuario', 'required|trim|valid_email',
                        array(
							'required' => 'Debes ingresar  correo',
							'valid_email'=>'Correo Invalido'
						)
						);
		$this->form_validation->set_rules('clave_usuario', 'Clave del Usuario', 'required|trim|exact_length[5]|is_unique[usuarios.clave_usuario]',
                        array('required' => 'Ingrese Clave',
                        	  'is_unique'=>'La clave ya existe elije otro',
							  'exact_length'=>'La clave debe ser de 5 digitos',

						)
					    );
		$this->form_validation->set_rules('pass_usuario', 'Contraseña', 'required|trim',
                        array('required' => 'Debes ingresar  la contraseña'
						)
						);

		if ($this->form_validation->run())
		{
			$param['id_usuario']="usr".DATE('Ymdhis');
			$param['nombre_usuario']=$this->input->post('nombre_usuario');
			$param['rol_usuario']=$this->input->post('rol_usuario');
			$param['sucursal_usuario']=$this->input->post('sucursal_usuario');
			$param['tel_usuario']=$this->input->post('tel_usuario');
			$param['correo_usuario']=$this->input->post('correo_usuario');		
			$param['clave_usuario']=$this->input->post('clave_usuario');
			$param['pass_usuario']=md5($this->input->post('pass_usuario'));						
            $res=$this->Mregistro->registrar($param);

			redirect(base_url().'Cregistro/enter');

		
		  		  			             
		}

		else
		{
			 redirect(base_url(). 'Cregistro/registrar');

		}

	}


	public function login_validation()
	{

		$this->form_validation->set_rules('clave_usuario', 'Clave del usuario', 'required|exact_length[5]|numeric',
                        array(
							'required' => 'Debe ingresar su Clave',
							'exact_length' => 'La Clave debe ser de 5 digitos',
							'numeric' => 'La clave deber ser unicamente de digitos',
							

						));

		$this->form_validation->set_rules('pass_usuario', 'Contraseña del usuario','required',
                        array(
							'required' => 'Debe Ingresar Contraseña'						
							)
							);
      

		if($this->form_validation->run())
		{

				$clave_usuario=$this->input->post('clave_usuario');			
				$contraseña_usuario=md5($this->input->post('pass_usuario'));

				$res=$this->Mregistro->can_login($clave_usuario, $contraseña_usuario);		    
	
				if ($res==true) 
				{
					$row=$this->Mregistro->perfil_asesor($clave_usuario);	
			  	 	$rol_usuario=$row->rol_usuario;

					$session_data=array(
						'clave_usuario'=>$clave_usuario,
						'contraseña_usuario'=>$contraseña_usuario,
						'rol_usuario'=>$rol_usuario
						);
					$this->session->set_userdata($session_data);

					redirect(base_url().'Cregistro/enter');
				}

				else
				{
					$this->session->set_flashdata('error', $contraseña_usuario);
					redirect(base_url(). 'Cregistro/login_validation');

				}					
		}

		else
		{

			$this->index();

		}
	}


	public function enter()
	{
		$data['clave_usuario']=$this->session->userdata('clave_usuario');
		$data['password']=$this->session->userdata('contraseña_usuario');
		$data['rol_usuario']=$this->session->userdata('rol_usuario');
		

		if($data['clave_usuario']!='')
		{	

		   if ($data['clave_usuario']=='97697' && $data['rol_usuario']=='ADMINISTRADOR') 
		   {
			   	$row=$this->Mregistro->getasesor($data['clave_usuario']);	
			   	$data['usuario']=$row->nombre_usuario;
			   	$data['sucursal_usuario']=$row->sucursal_usuario;				   
			   	$data['usuarios_id_usuario']=$row->id_usuario;
				$data['correo_usuario']=$row->correo_usuario;   

				$data['lista_oficinas'] = $this->Mregistro->getoficinas();

		
				
			   	$this->load->view('Calendar/vheader', $data);
			   	$this->load->view('Calendar/vcalendar_admin_general');
			   	$this->load->view('Calendar/vfooter');

		   } 

		    else if($data['rol_usuario']=='JEFEOFICINA')
		   {

		   		$row=$this->Mregistro->get_jefes_oficina($data['clave_usuario']);
			    $data['usuario']=$row->nombre_usuario;
			   	$data['sucursal_usuario']=$row->sucursal_usuario;
			   	$data['usuarios_id_usuario']=$row->id_usuario;


				$data['lista_asesores'] = $this->Mregistro->getasesores($data['sucursal_usuario']);
				$data['lista_tableta'] = $this->Mregistro->gettableta($data['sucursal_usuario']);
				$data['lista_biometrico'] = $this->Mregistro->getbiometrico($data['sucursal_usuario']);


						
			   	$this->load->view('Calendar/vheader', $data);
			   	$this->load->view('Calendar/vcalendar_admin');
			   	$this->load->view('Calendar/vfooter');
		  
		   }
 
		   else if ($data['rol_usuario']=='ASESOR') 		 
		   {

			   	$row=$this->Mregistro->perfil_asesor($data['clave_usuario']);	
			   	$data['usuario']=$row->nombre_usuario;
				$data['correo_usuario']=$row->correo_usuario;
			   	$data['sucursal_usuario']=$row->sucursal_usuario;
			   	$data['usuarios_id_usuario']=$row->id_usuario;

				$data['lista_tableta'] = $this->Mregistro->gettableta($data['sucursal_usuario']);
				$data['lista_biometrico'] = $this->Mregistro->getbiometrico($data['sucursal_usuario']);
							


			   	$this->load->view('Calendar/vheader', $data);
			   	$this->load->view('Calendar/vcalendar');
			   	$this->load->view('Calendar/vfooter');
		   }
		   else
		   {
			   redirect(base_url(). 'Cregistro/login_validation');
		   }
		}

		else
		{

			redirect(base_url(). 'Cregistro/login_validation');

		}
	}



	function logout()
	{
		$this->session->unset_userdata('username');

		redirect(base_url(). 'Cregistro/login_validation');
	}

	public function valida_correo()
	{
		$correo_usuario=$this->input->post('correo_usuario');
		$correo=$this->Mregistro->valida_correo($correo_usuario);

		if ($correo==TRUE) 
		{
			echo '<div class="alert alert-danger mt-1" role="alert">El correo ya existe ingrese otro</div>';
			
		} else 
		{
			echo '<div class="alert alert-success mt-1" role="alert">Correo correcto</div>';
		}
		

		
	}

		public function valida_clave_asesor()
	{
		$clave_usuario=$this->input->post('clave_usuario');
		$clave=$this->Mregistro->valida_clave_asesor($clave_usuario);

		if ($clave==TRUE) 
		{
			echo '<div class="alert alert-danger mt-1" role="alert">Esta clave ya existe elije otra</div>';
			
		} else 
		{
			echo '<div class="alert alert-success mt-1" role="alert">Clave correcta</div>';
		}
		

		
	}



}



 ?>