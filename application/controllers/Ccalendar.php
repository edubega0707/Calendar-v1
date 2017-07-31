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

	public function insert_event_asesor()
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
		$param['desc_tableta_evento']=$this->input->post('desc_tableta_evento');
		$param['desc_biometrico_evento']=$this->input->post('desc_biometrico_evento');
		$param['folio_evento']=$this->input->post('folio_evento');
		$param['usuarios_id_usuario']=$this->input->post('usuarios_id_usuario');
 
 
		$res=$this->Mcalendar->insert_event_asesor($param);

        
		$id_tableta=$this->input->post('tableta_evento');
		$id_biometrico=$this->input->post('biometrico_evento');
		$status=$this->input->post('status');
		$sucursal=$this->input->post('nombre_oficina');

		$tableta=$this->Mcalendar->modificar_status_tableta($id_tableta, $status, $sucursal);
		$biometrico=$this->Mcalendar->modificar_status_biometrico($id_biometrico, $status, $sucursal);
	
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
		$param['desc_tableta_evento']=$this->input->post('desc_tableta_evento');
		$param['desc_biometrico_evento']=$this->input->post('desc_biometrico_evento');
		$param['folio_evento']=$this->input->post('folio_evento');
		$param['usuarios_id_usuario']=$this->input->post('usuarios_id_usuario');

		$res=$this->Mcalendar->insert($param);

		$id_tableta=$this->input->post('tableta_evento');
		$id_biometrico=$this->input->post('biometrico_evento');
		$status=$this->input->post('status');
		$sucursal=$this->input->post('nombre_oficina');

		$tableta=$this->Mcalendar->modificar_status_tableta($id_tableta, $status, $sucursal);
		$biometrico=$this->Mcalendar->modificar_status_biometrico($id_biometrico, $status, $sucursal);

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
		$sucursal=$this->input->post('nombre_oficina');

		$evento=$this->Mcalendar->modificar_evento($status, $idEvento, $color);

		

		$tableta=$this->Mcalendar->modificar_status_tableta($id_tableta, $status_evento, $sucursal);
		$biometrico=$this->Mcalendar->modificar_status_biometrico($id_biometrico, $status_evento, $sucursal);
		echo $evento;
	}

	public function insert_oficina()
	{   
	
		$param_oficina['nombre_oficina']=$this->input->post('nombre_oficina');
		$param_oficina['ubicacion_oficina']=$this->input->post('ubicacion_oficina');
		$param_oficina['direccion_oficina']=$this->input->post('direccion_oficina');
		$param_oficina['telefono_oficina_uno']=$this->input->post('telefono_oficina_uno');
		$param_oficina['telefono_oficina_dos']=$this->input->post('telefono_oficina_dos');
		$param_oficina['jefe_oficina']=$this->input->post('jefe_oficina');

		$this->Mcalendar->insert_oficinas($param_oficina);
		redirect('Cregistro/enter');


	}

	public function insert_tableta()
	{
		
		$param_tableta['nombre_oficina']=$this->input->post('nombre_oficina');		
		$param_tableta['descripcion_tableta']=$this->input->post('descripcion_tableta');
		$this->Mcalendar->insert_tabletas($param_tableta);

	}

	public function consulta_tableta()
	{

		$id_tableta=$this->input->post('id_tableta');
		$descripcion_tableta=$this->Mcalendar->consulta_tableta($id_tableta);		
		echo $descripcion_tableta;
			
	}



	public function insert_biometrico()
	{
		
		$param_biometrico['nombre_oficina']=$this->input->post('nombre_oficina');
		$param_biometrico['descripcion_biometrico']=$this->input->post('descripcion_biometrico');
		
		$this->Mcalendar->insert_biometrico($param_biometrico);
	}

	public function consulta_biometrico()
	{

		$id_biometrico=$this->input->post('id_biometrico');
		$descripcion_biometrico=$this->Mcalendar->consulta_biometrico($id_biometrico);
		echo $descripcion_biometrico;
			
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
