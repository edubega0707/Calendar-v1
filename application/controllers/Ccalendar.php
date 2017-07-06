<?php 
   
class Ccalendar extends CI_controller 
{ 
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mcalendar');
	}

	public function index()
	{
		$this->load->view('Calendar/vheader');
		$this->load->view('Calendar/vcalendar');
		$this->load->view('Calendar/vfooter');
	}

	public function insert_event()
	{   

		$param['idEvento']="event".DATE('Ymdhis');
		$param['nombre_asesor']=$this->input->post('nombre_asesor');
		//$param['sucursal_usuario']=$this->input->post('sucursal_usuario');
		$param['des_evento']=$this->input->post('desc_evento');
		$param['fecInicio']=$this->input->post('fecha_inicio');
		$param['fecFin']=$this->input->post('fecha_fin');
		$param['hora_inicio']=$this->input->post('select_hora_inicio');		
		$param['hora_fin']=$this->input->post('select_hora_fin');
		$param['usuarios_id_usuario']=$this->input->post('usuarios_id_usuario');



		$res=$this->Mcalendar->insert($param);


	    redirect('Cregistro/enter');
	}


	public function insert_event_admin()
	{  
		$param['idEvento']="event".DATE('Ymdhis');
		$param['nombre_asesor']=$this->input->post('nombre_asesor');
		//$param['sucursal_usuario']=$this->input->post('sucursal_usuario');
		$param['des_evento']=$this->input->post('desc_evento');
		$param['fecInicio']=$this->input->post('fecha_inicio');
		$param['fecFin']=$this->input->post('fecha_fin');
		$param['hora_inicio']=$this->input->post('select_hora_inicio');		
		$param['hora_fin']=$this->input->post('select_hora_fin');
		$param['usuarios_id_usuario']=$this->input->post('usuarios_id_usuario');


		$res=$this->Mcalendar->insert($param);


		redirect('Cregistro/enter');	
	}


	public function getEventos()
	{	
		$sucursal_usuario=$this->input->post('sucursal_usuario');
		$r= $this->Mcalendar->getEventos($sucursal_usuario);

		echo  json_encode($r);
	}

	public function mostrar_evento()
	{

		$idEvento=$this->input->post('id');
		$resultado=$this->Mcalendar->consulta_evento($idEvento);
		echo json_encode($resultado);
	}

	public function modificar_evento()
	{

		$status=$this->input->post('status');
		$idEvento=$this->input->post('id');
		$color=$this->input->post('color');

		$evento=$this->Mcalendar->modificar_evento($status, $idEvento, $color);
		echo $evento;
	}

}



	// public function updEvento(){

	// 	       $param['id']= $this->input->post('id');

 	//         $param['fecini']= $this->input->post('fecini');

	//         $param['fecfin']= $this->input->post('fecfin');



 	//         $r=$this->Mcalendar->updEvento($param);

 	//         echo $r;



	// }



	// public function deleteEvento(){

	// 	$id=$this->input->post('id');

	// 	$r=$this->Mcalendar->deleteEvento($id);

	// 	echo  $r;



	// }



 ?>
