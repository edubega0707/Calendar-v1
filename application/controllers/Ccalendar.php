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
		$param['fecInicio']=$this->input->post('fecInicio');		
		$param['hora_inicio']=$this->input->post('hora_inicio');				
		$param['no_serie_tableta']=$this->input->post('no_serie_tableta');
		$param['no_serie_biometrico']=$this->input->post('no_serie_biometrico');
		$param['no_serie_modulo']=$this->input->post('no_serie_modulo');		
		$param['no_tramites_evento']=$this->input->post('no_tramites_evento');
		$param['usuarios_id_usuario']=$this->input->post('usuarios_id_usuario');
 
		$res=$this->Mcalendar->insert_event_asesor($param);

        
		$no_serie_tableta=$this->input->post('no_serie_tableta');
		$no_serie_biometrico=$this->input->post('no_serie_biometrico');
		$no_serie_modulo=$this->input->post('no_serie_modulo');
		$status=$this->input->post('status');
		$sucursal=$this->input->post('nombre_oficina');

		$tableta=$this->Mcalendar->modificar_status_tableta($no_serie_tableta, $status, $sucursal);
		$biometrico=$this->Mcalendar->modificar_status_biometrico($no_serie_biometrico, $status, $sucursal);
		$biometrico=$this->Mcalendar->modificar_status_modulo($no_serie_modulo, $status, $sucursal);

	    redirect('Cregistro/enter');
	}


	public function insert_event_admin()
	{  
	    $param['idEvento']="event".DATE('Ymdhis');
		$param['nombre_asesor']=$this->input->post('nombre_asesor');		
		$param['fecInicio']=$this->input->post('fecInicio');		
		$param['hora_inicio']=$this->input->post('hora_inicio');				
		$param['no_serie_tableta']=$this->input->post('no_serie_tableta');
		$param['no_serie_biometrico']=$this->input->post('no_serie_biometrico');
		$param['no_serie_modulo']=$this->input->post('no_serie_modulo');		
		$param['no_tramites_evento']=$this->input->post('no_tramites_evento');
		$param['usuarios_id_usuario']=$this->input->post('usuarios_id_usuario');

		$res=$this->Mcalendar->insert($param);


	   //Seccion de modificacion de  los estatus de los equipos
		$no_serie_tableta=$this->input->post('no_serie_tableta');
		$no_serie_biometrico=$this->input->post('no_serie_biometrico');
		$no_serie_modulo=$this->input->post('no_serie_modulo');
		$status=$this->input->post('status');
		$sucursal=$this->input->post('nombre_oficina');

		$tableta=$this->Mcalendar->modificar_status_tableta($no_serie_tableta, $status, $sucursal);
		$biometrico=$this->Mcalendar->modificar_status_biometrico($no_serie_biometrico, $status, $sucursal);
		$biometrico=$this->Mcalendar->modificar_status_modulo($no_serie_modulo, $status, $sucursal);

		redirect('Cregistro/enter');	
	}


	public function getEventos()
	{	
		$sucursal_usuario=$this->input->post('sucursal_usuario');
		$r= $this->Mcalendar->getEventos($sucursal_usuario);

		echo  json_encode($r);
	} 

	//Consulta de eventos para construir los historiales


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
		$notas_evento=$this->input->post('notas_evento');
		$no_serie_tableta=$this->input->post('no_serie_tableta');
		$no_serie_biometrico=$this->input->post('no_serie_biometrico');
		$no_serie_modulo=$this->input->post('no_serie_modulo');
		$status_evento=$this->input->post('status_evento');
		$sucursal=$this->input->post('nombre_oficina');
		$folio_evento=$this->input->post('folio_evento');

		$evento=$this->Mcalendar->modificar_evento($status, $idEvento, $color, $folio_evento, $notas_evento);

		
		$tableta=$this->Mcalendar->modificar_status_tableta($no_serie_tableta, $status_evento, $sucursal);
		$biometrico=$this->Mcalendar->modificar_status_biometrico($no_serie_biometrico, $status_evento, $sucursal);
		$modulo=$this->Mcalendar->modificar_status_modulo($no_serie_modulo, $status_evento, $sucursal);
		echo $evento;
	}

	public function insert_oficina()
	{   
	
		$param_oficina['nombre_oficina']=$this->input->post('nombre_oficina');
		$param_oficina['ubicacion_oficina']=$this->input->post('ubicacion_oficina');
		$param_oficina['telefono_oficina_uno']=$this->input->post('telefono_oficina_uno');
		$param_oficina['telefono_oficina_dos']=$this->input->post('telefono_oficina_dos');
	
		$this->Mcalendar->insert_oficinas($param_oficina);
		redirect('Cregistro/enter');


	}

	public function insert_tableta()
	{
		
		$param_tableta['nombre_oficina']=$this->input->post('nombre_oficina');		
		$param_tableta['no_serie_tableta']=$this->input->post('no_serie_tableta');
		$this->Mcalendar->insert_tabletas($param_tableta);
	}


	public function insert_biometrico()
	{
		
		$param_biometrico['nombre_oficina']=$this->input->post('nombre_oficina');
		$param_biometrico['numero_serie_bio']=$this->input->post('numero_serie_bio');
		
		$this->Mcalendar->insert_biometrico($param_biometrico);
	}

	public function insert_modulo()
	{
		
		$param_modulo['nombre_oficina']=$this->input->post('nombre_oficina');
		$param_modulo['numero_serie_modulo']=$this->input->post('numero_serie_modulo');
		
		$this->Mcalendar->insert_modulo($param_modulo);
	}


	// public function consulta_tableta()
	// {
	// 	$id_tableta=$this->input->post('id_tableta');
	// 	$descripcion_tableta=$this->Mcalendar->consulta_tableta($id_tableta);		
	// 	echo $descripcion_tableta;
			
	// }

	// public function consulta_biometrico()
	// {

	// 	$id_biometrico=$this->input->post('id_biometrico');
	// 	$descripcion_biometrico=$this->Mcalendar->consulta_biometrico($id_biometrico);
	// 	echo $descripcion_biometrico;
			
	// }




	



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
