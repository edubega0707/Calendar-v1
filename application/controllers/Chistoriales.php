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
	public function historial_eventos_oficina()
	{
       $sucursal_historial=$this->input->post('sucursal_historial');
    
       $eventos_oficinas=$this->Mhistoriales->get_eventos_oficina($sucursal_historial);

		 	echo " 
			<table class='table table-responsive table-hover'>
				<thead class='thead-inverse'>
					<tr>
						<th>ID EVENTO</th>
						<th>MOMBRE DE ASESOR</th>
						<th>NO TRAMITES</th>
						<th>FECHA DE SOLICITUD</th>
					
						<th>TRAMITES</th>								
					</tr>
				</thead>
				<tbody>";
					 foreach ($eventos_oficinas as $eventos): 
                                echo "<tr>
											<th>".$eventos['idEvento']."</th>
											<th>".$eventos['nombre_asesor']."</th>
											<th>".$eventos['no_tramites_evento']."</th>
											<th>".$eventos['fecInicio']."</th>
											<th>".$eventos['folio_evento']."</th>                                       
                                    </tr> ";                                                           
            		 endforeach;
		echo "</tbody>
			 </table>";
	
	
	}


public function historial_eventos_nombre()
	{
    
        
        $nombre_asesor=$this->input->post('nombre_asesor');

         $eventos_oficinas=$this->Mhistoriales->get_eventos_nombre($nombre_asesor);

		 	echo " 
			<table class='table table-responsive table-hover'>
				<thead class='thead-inverse'>
					<tr>
						<th>ID EVENTO</th>
						<th>MOMBRE DE ASESOR</th>
						<th>DESCRIPCION DEL EVENTO</th>
						<th>FECHA DE INICIO</th>
						<th>FECHA DE FIN</th>
						<th>TRAMITES</th>								
					</tr>
				</thead>
				<tbody>";
					 foreach ($eventos_oficinas as $eventos): 
                                echo "<tr>
											<th>".$eventos['idEvento']."</th>
											<th>".$eventos['nombre_asesor']."</th>
											<th>".$eventos['des_evento']."</th>
											<th>".$eventos['fecInicio']."</th>
											<th>".$eventos['fecFin']."</th>
											<th>".$eventos['folio_evento']."</th>                                       
                                    </tr> ";                                                           
            		 endforeach;
		echo "</tbody>
			 </table>";
	}




    public function historial_usuarios_oficina()
	{
		$sucursal_historial=$this->input->post('sucursal_historial');
        

        $eventos_usuarios=$this->Mhistoriales->get_usuarios_oficina($sucursal_historial);

		 	echo " 
			<div class='col-md-10 offset-md-1 '>
			<table class='table table-responsive table-hover'>
				<thead class='thead-inverse'>
					<tr>
						<th>ID USUARIO</th>
						<th>MOMBRE DE USUARIO</th>
						<th>TELEFONO</th>
						<th>CORREO</th>							
					</tr>
				</thead>
				<tbody>";
					 foreach ($eventos_usuarios as $eventos): 
                                echo "<tr>
											<th>".$eventos['id_usuario']."</th>
											<th>".$eventos['nombre_usuario']."</th>
											<th>".$eventos['tel_usuario']."</th>
											<th>".$eventos['correo_usuario']."</th>                                      
                                    </tr> ";                                                           
            		 endforeach;
		echo "</tbody>
			 </table>
			  </div>";
			 			

	}

	public function historial_usuarios_nombre()
	{
        $nombre_asesor=$this->input->post('nombre_asesor');
       

        $eventos_usuarios=$this->Mhistoriales->get_usuarios_nombre($nombre_asesor);

		 	echo " 
			<div class='col-md-10 offset-md-1 '>
			<table class='table table-responsive table-hover'>
				<thead class='thead-inverse'>
					<tr>
						<th>ID USUARIO</th>
						<th>MOMBRE DE USUARIO</th>
						<th>TELEFONO</th>
						<th>CORREO</th>							
					</tr>
				</thead>
				<tbody>";
					 foreach ($eventos_usuarios as $eventos): 
                                echo "<tr>
											<th>".$eventos['id_usuario']."</th>
											<th>".$eventos['nombre_usuario']."</th>
											<th>".$eventos['tel_usuario']."</th>
											<th>".$eventos['correo_usuario']."</th>                                      
                                    </tr> ";                                                           
            		 endforeach;
		echo "</tbody>
			 </table>
			  </div>";
			 

			

	}

	
 



}
 ?>