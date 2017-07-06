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

		$this->form_validation->set_rules('clave_usuario', 'Clave del Usuario', 'required|trim|max_length[100]|is_unique[usuarios.correo_usuario]',
                        array('required' => 'Debes ingresar el nombre',
                        	  'is_unique'=>'El correo existe elije otro'));
 
		$this->form_validation->set_rules('pass_usuario', 'Contraseña', 'required|trim',
                        array('required' => 'Debes ingresar  la contraseña'));


		if ($this->form_validation->run())
		{
			$param['id_usuario']="usr".DATE('Ymdhis');
			$param['nombre_usuario']=$this->input->post('nombre_usuario');
			$param['tel_usuario']=$this->input->post('tel_usuario');
			$param['clave_usuario']=$this->input->post('mail_usuario');
			$param['pass_usuario']=$this->input->post('pass_usuario');
			$param['sucursal_usuario']=$this->input->post('sucursal_usuario');
			$param['rol_usuario']='ASESOR';


             $res=$this->Mregistro->registrar($param);

             redirect(base_url(). 'Cregistro/login_validation');	
		}

		else
		{
			 redirect(base_url(). 'Cregistro/login_validation');

		}

	}


	public function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('clave_usuario', 'Clave del usuario', 'required|trim|min_length[2]|max_length[150]',
                        array('required' => 'Correo del Usuario Debe ser ingresado'));

		$this->form_validation->set_rules('contraseña_usuario', 'Contraseña del usuario','required|trim|min_length[2]|max_length[150]',
                        array('required' => 'Contraseña debe ser Debes ser ingresado'));
     

		if($this->form_validation->run())
		{

			$username=$this->input->post('clave_usuario');
			$password=$this->input->post('contraseña_usuario');		    

			if ($username=='ADMINISTRADOR') {
				
				if ($this->Mregistro->can_login($username, $password)) 
				{
					$session_data=array(
						'username'=>$username
						);

					$this->session->set_userdata($session_data);
					redirect(base_url().'Cregistro/enter_admin');
				}
				else
				{

					$this->session->set_flashdata('error', 'Usuario y Contraseña Invalidos');

					redirect(base_url(). 'Cregistro/login_validation');

				}
				
			} else {

				if ($this->Mregistro->can_login($username, $password)) 
				{
					$session_data=array(
						'username'=>$username
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
			
			
		}

		else
		{

			$this->index();

		}
	}



	function enter()

	{
		if($this->session->userdata('username')!= '')
		{	

			$data['session']=$this->session->userdata('username');
			$row=$this->Mregistro->getasesor($data['session']);	
			$data['usuario']=$row->nombre_usuario;
			$data['sucursal_usuario']=$row->sucursal_usuario;
			$data['usuarios_id_usuario']=$row->id_usuario;			

			/*$data['logout']='<a class= "dropdown-item" href="'.base_url().'Cregistro/logout" style="text-decoration: none;" ><i class="fa fa-sign-out" aria-hidden="true">Cerrar Sesion</a>';*/
	

			$this->load->view('Calendar/vheader', $data);

			$this->load->view('Calendar/vcalendar');

			$this->load->view('Calendar/vfooter');
		}
		else
		{

			redirect(base_url(). 'Cregistro/login_validation');

		}
	}



	function enter_admin()
	{
		if($this->session->userdata('username')!= '')
		{		
			
			$data['session']=$this->session->userdata('username');
			$row=$this->Mregistro->getasesor($data['session']);	
			$data['usuario']=$row->nombre_usuario;
			$data['sucursal_usuario']=$row->sucursal_usuario;
			$data['usuarios_id_usuario']=$row->id_usuario;		

			$this->load->view('Calendar/vheader', $data);
			$this->load->view('Calendar/vcalendar_admin');
			$this->load->view('Calendar/vfooter');
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