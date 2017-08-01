<?php  
 
class Cregistro extends CI_controller
{
 
	function __construct()
	{

		parent::__construct(); 
		
		$this->load->model('Mregistro');
		$this->load->helper(array('form', 'url'));
	
	} 

	public function index() 
	{   
		$this->load->view('Registro/Registro');	
	}

	public function registrar()
	{ 
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nombre_usuario', 'Nombre de Usuario', 'required|trim',
                        array('required' => 'Debes ingresar el nombre'));

		$this->form_validation->set_rules('tel_usuario', 'Telefono del Usuario', 'required|trim|max_length[10]',
                        array('required' => 'Debes ingresar el telefono'));

		$this->form_validation->set_rules('clave_usuario', 'Clave del Usuario', 'required|trim|max_length[100]|is_unique[usuarios.clave_usuario]',
                        array('required' => 'Debes ingresar el nombre',
                        	  'is_unique'=>'El correo existe elije otro'));
 
		$this->form_validation->set_rules('pass_usuario', 'Contraseña', 'required|trim',
                        array('required' => 'Debes ingresar  la contraseña'));

		$this->form_validation->set_rules('sucursal_usuario', 'Sucursal del usuario', 'required|trim',
                        array('required' => 'Debes ingresar  la contraseña'));

		$this->form_validation->set_rules('rol_usuario', 'Rol del Usuario', 'required|trim',
                        array('required' => 'Debes ingresar  la contraseña'));


		if ($this->form_validation->run())
		{
			$param['id_usuario']="usr".DATE('Ymdhis');
			$param['nombre_usuario']=$this->input->post('nombre_usuario');
			$param['rol_usuario']=$this->input->post('rol_usuario');
			$param['sucursal_usuario']=$this->input->post('sucursal_usuario');
			$param['tel_usuario']=$this->input->post('tel_usuario');
			$param['correo_usuario']=$this->input->post('correo_usuario');		
			$param['clave_usuario']=$this->input->post('clave_usuario');
			$param['pass_usuario']=$this->input->post('pass_usuario');
			
 			
             $res=$this->Mregistro->registrar($param);			             
		}

		else
		{
			 redirect(base_url(). 'Cregistro/enter');

		}

	}


	public function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('clave_usuario', 'Clave del usuario', 'required|trim|min_length[2]|max_length[30]',
                        array('required' => 'Debe ingresar su Clave'));

		$this->form_validation->set_rules('contraseña_usuario', 'Contraseña del usuario','required|trim|min_length[2]|max_length[20]',
                        array('required' => 'Debe Ingresar Contraseña'));
      

		if($this->form_validation->run())
		{

				$username=$this->input->post('clave_usuario');			
				$password=$this->input->post('contraseña_usuario');		    
	
				if ($this->Mregistro->can_login($username, $password)) 
				{
					$row=$this->Mregistro->perfil_asesor($username);	
			  	 	$rol_usuario=$row->rol_usuario;

					$session_data=array(
						'username'=>$username,
						'clave'=>$password,
						'rol_usuario'=>$rol_usuario
						);

					$this->session->set_userdata($session_data);


					redirect(base_url().'Cregistro/enter');
				}

				else
				{

					$this->session->set_flashdata('error', 'Usuario y Contraseña Invalidos');

					redirect(base_url(). 'Cregistro/login_validation');

				}					
		}

		else
		{

			$this->index();

		}
	}


	function enter()
	{
		$data['session']=$this->session->userdata('username');
		$data['password']=$this->session->userdata('clave');
		$data['rol_usuario']=$this->session->userdata('rol_usuario');

		if($data['session']!='')
		{	

		   if ($data['session']=='ADMINISTRADOR' && $data['rol_usuario']=='ADMINISTRADOR' && ($data['password']=='ADMINISTRADOR' || $data['password']=='administrador' ) ) 
		   {
			   	$row=$this->Mregistro->getasesor($data['session']);	
			   	$data['usuario']=$row->nombre_usuario;
			   	$data['sucursal_usuario']=$row->sucursal_usuario;				   
			   	$data['usuarios_id_usuario']=$row->id_usuario;

				$data['lista_oficinas'] = $this->Mregistro->getoficinas();	

				//$data['lista_eventos'] = $this->Mcalendar->getEventos($data['sucursal_usuario']);						

			   	$this->load->view('Calendar/vheader', $data);
			   	$this->load->view('Calendar/vcalendar_admin_general');
			   	$this->load->view('Calendar/vfooter');

		   } 

		   //else if($data['session']=='ADMINPACHUCA' || $data['session']=='ADMINPUEBLA' || $data['session']=='ADMINPACHUCAII' || $data['session']=='ADMINSATELITE' || $data['session']=='ADMINSANLUIS' || $data['session']=='ADMINCDAZTECA' || $data['session']=='ADMINPUEBLA' || $data['session']=='ADMINCANCUN' )
		    else if($data['rol_usuario']=='JEFEOFICINA')
		   {

		   		$row=$this->Mregistro->get_jefes_oficina($data['session']);
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

			   	$row=$this->Mregistro->perfil_asesor($data['session']);	
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



}



 ?>