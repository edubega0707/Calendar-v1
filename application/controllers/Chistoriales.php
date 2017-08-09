<?php 

/**
* Controlador de historiales
*/
class Chistoriales extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mhistoriales');
		$this->load->helper(array('form', 'url'));
	}
	public function historial_eventos()
	{
    
        $sucursal_historial=$this->input->post('sucursal_historial');
        $nombre_usuario=$this->input->post('sucursal_historial');
        $fecha_inicio=$this->input->post('sucursal_historial');
        $fecha_fecha_fin=$this->input->post('sucursal_historial');

       
         $this->Mregistro->get_eventos_oficina($sucursal_historial);

			
	}


    public function historial_usuarios()
	{
		$sucursal_historial=$this->input->post('sucursal_historial');
        $nombre_usuario=$this->input->post('sucursal_historial');
        $fecha_inicio=$this->input->post('sucursal_historial');
        $fecha_fecha_fin=$this->input->post('sucursal_historial');

       
         $this->Mregistro->get_eventos_oficina($sucursal_historial);

			

	}


	public function enviar_correo_dos()
	{
			 $sucursal_historial=$this->input->post('sucursal_historial');
        $nombre_usuario=$this->input->post('sucursal_historial');
        $fecha_inicio=$this->input->post('sucursal_historial');
        $fecha_fecha_fin=$this->input->post('sucursal_historial');

       
         $this->Mregistro->get_eventos_oficina($sucursal_historial);
		
	
	}


}
 ?>