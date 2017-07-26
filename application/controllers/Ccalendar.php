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
		$param['des_evento']=$this->input->post('des_evento');
		$param['fecInicio']=$this->input->post('fecInicio');
		$param['fecFin']=$this->input->post('fecFin');
		$param['hora_inicio']=$this->input->post('hora_inicio');		
		$param['hora_fin']=$this->input->post('hora_fin');
		$param['tableta_evento']=$this->input->post('tableta_evento');
		$param['biometrico_evento']=$this->input->post('biometrico_evento');
		$param['folio_evento']=$this->input->post('folio_evento');
		$param['usuarios_id_usuario']=$this->input->post('usuarios_id_usuario');

		$res=$this->Mcalendar->insert_event_asesor($param);
        
		$id_tableta=$this->input->post('tableta_evento');
		$id_biometrico=$this->input->post('biometrico_evento');
		$status=$this->input->post('status');

		$tableta=$this->Mcalendar->modificar_status_tableta($id_tableta, $status);
		$biometrico=$this->Mcalendar->modificar_status_biometrico($id_biometrico, $status);
	
	    redirect('Cregistro/enter');
	}


	public function insert_event_admin()
	{  
	    $param['idEvento']="event".DATE('Ymdhis');
		$param['nombre_asesor']=$this->input->post('nombre_asesor');
		$param['des_evento']=$this->input->post('des_evento');
		$param['fecInicio']=$this->input->post('fecInicio');
		$param['fecFin']=$this->input->post('fecFin');
		$param['hora_inicio']=$this->input->post('hora_inicio');		
		$param['hora_fin']=$this->input->post('hora_fin');
		$param['tableta_evento']=$this->input->post('tableta_evento');
		$param['biometrico_evento']=$this->input->post('biometrico_evento');
		$param['folio_evento']=$this->input->post('folio_evento');
		$param['usuarios_id_usuario']=$this->input->post('usuarios_id_usuario');

		$res=$this->Mcalendar->insert($param);

		$id_tableta=$this->input->post('tableta_evento');
		$id_biometrico=$this->input->post('biometrico_evento');
		$status=$this->input->post('status');

		$tableta=$this->Mcalendar->modificar_status_tableta($id_tableta, $status);
		$biometrico=$this->Mcalendar->modificar_status_biometrico($id_biometrico, $status);

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
		$id_tableta=$this->input->post('tableta_evento');
		$id_biometrico=$this->input->post('biometrico_evento');
		$status_evento=$this->input->post('status_evento');

		$evento=$this->Mcalendar->modificar_evento($status, $idEvento, $color);


		$tableta=$this->Mcalendar->modificar_status_tableta($id_tableta, $status_evento);
		$biometrico=$this->Mcalendar->modificar_status_biometrico($id_biometrico, $status_evento);
		echo $evento;
	}

	public function insert_oficina()
	{   
	
		$param_oficina['nombre_oficina']=$this->input->post('nombre_oficina');
		$param_oficina['ubicacion_oficina']=$this->input->post('ubicacion_oficina');
		$param_oficina['direccion_oficina']=$this->input->post('direccion_oficina');
		$param_oficina['telefono_oficina']=$this->input->post('telefono_oficina');
		$param_oficina['jefe_oficina']=$this->input->post('jefe_oficina');

		$this->Mcalendar->insert_oficinas($param_oficina);

	}

	public function insert_tableta()
	{
		$param_tableta['marca_tableta']=$this->input->post('marca_tableta');
		$param_tableta['color_tableta']=$this->input->post('color_tableta');
		$param_tableta['descripcion_tableta']=$this->input->post('descripcion_tableta');
		$this->Mcalendar->insert_tabletas($param_tableta);

	}
	public function insert_biometrico()
	{
		$param_biometrico['marca_biometrico']=$this->input->post('marca_biometrico');
		$param_biometrico['color_biometrico']=$this->input->post('color_biometrico');
		$param_biometrico['descripcion_biometrico']=$this->input->post('descripcion_biometrico');
		
		$this->Mcalendar->insert_biometrico($param_biometrico);
	}



	public function eventos_rechazados()
	{
		$nombre_asesor=$this->input->post('nombre_asesor');
		$evento_rechazado= $this->Mcalendar->eventos_rechazados($nombre_asesor);
		
		if ($evento_rechazado==TRUE) 
		{
			echo "ESTE ASESOR  YA TIENE ASIGNADO  UNA TABLETA ";
		} 
		else 
		{
			echo "ASESOR DISPONIBLE";
		}
		
	}


}



 ?>
