<?php 

 class Mcalendar extends CI_Model
 {	
 	public function getEventos($sucursal_usuario)  
 	{
 		$this->db->select ('idEvento id, nombre_asesor title, des_evento, concat(fecInicio,"T",hora_inicio) as start, concat(fecFin,"T",hora_fin) as end, evento_color backgroundColor, status, sucursal_usuario');
        $this->db->from('eventos');
        $this->db->join('usuarios', 'eventos.usuarios_id_usuario=usuarios.id_usuario', 'inner');
        $this->db->where('sucursal_usuario', $sucursal_usuario);
 		
 		return $this->db->get()->result();
 	}
 
    public function insert($param)
    {
        $campos = array( 
            'idEvento'=>$param['idEvento'],       
            'nombre_asesor'=>$param['nombre_asesor'],
            'des_evento'=>$param['des_evento'],
            'fecInicio'=>$param['fecInicio'],
            'fecFin'=>$param['fecFin'],
            'hora_inicio'=>$param['hora_inicio'].':00',
            'hora_fin'=>$param['hora_fin'].':00',
            'tableta_evento'=>$param['tableta_evento'],
            'biometrico_evento'=>$param['biometrico_evento'],
            'folio_evento'=>$param['folio_evento'],
            'evento_color'=>'#A5F2E7',  
            'status'=>'ACEPTADO',
            'usuarios_id_usuario'=>$param['usuarios_id_usuario'] 

            );

        return   $this->db->insert('eventos', $campos); 

    } 

    public function insert_event_asesor($param)
    {
        $campos = array( 
            'idEvento'=>$param['idEvento'],       
            'nombre_asesor'=>$param['nombre_asesor'],
            'des_evento'=>$param['des_evento'],
            'fecInicio'=>$param['fecInicio'],
            'fecFin'=>$param['fecFin'],
            'hora_inicio'=>$param['hora_inicio'].':00',
            'hora_fin'=>$param['hora_fin'].':00',
            'tableta_evento'=>$param['tableta_evento'],
            'biometrico_evento'=>$param['biometrico_evento'],
            'folio_evento'=>$param['folio_evento'],
            'evento_color'=>'#E85B48',  
            'status'=>'PENDIENTE',
            'usuarios_id_usuario'=>$param['usuarios_id_usuario'] 

            );

        return   $this->db->insert('eventos', $campos); 

    }      

    public function consulta_evento($id)
    {            
        $consulta= $this->db->get_where('eventos', array('idEvento'=>$id));
        return $consulta->result();
    }

    public function modificar_evento($status, $idEvento, $color)
    {
        $this->db->set('status', $status);
        $this->db->set('evento_color',$color);
        $this->db->where('idEvento', $idEvento);
        $evento= $this->db->update('eventos');
        return $evento;
    }




// Modelo para insertar registros en las oficinas
     public function insert_oficinas($param_oficina)
    {
        $campos = array(
            'id_oficina'=>'ofi'.DATE('Ymdhis'),
            'nombre_oficina'=>$param_oficina['nombre_oficina'],       
            'ubicacion_oficina'=>$param_oficina['ubicacion_oficina'],
            'direccion_oficina'=>$param_oficina['direccion_oficina'],
            'telefono_oficina_uno'=>$param_oficina['telefono_oficina_uno'],
            'telefono_oficina_dos'=>$param_oficina['telefono_oficina_dos'],
            'jefe_oficina'=>$param_oficina['jefe_oficina'],
            'fecha_registro_oficina'=>DATE('Ymd')
            );

             return   $this->db->insert('Oficinas', $campos); 
    }
 


    // Modelo para insertar registros en las tabletas
     public function insert_tabletas($param_tableta)
    {
        $campos = array(
            'id_tableta'=>'tablet'.DATE('his'),
            'nombre_oficina'=>$param_tableta['nombre_oficina'],          
            'descripcion_tableta'=>$param_tableta['descripcion_tableta'],
            'status_tableta'=>'DISPONIBLE'
            );

         return   $this->db->insert('Tableta', $campos); 
    } 


    public function consulta_tableta($id_tableta)
	{
        $this->db->where('id_tableta', $id_tableta);
		$query=$this->db->get('Tableta');
		foreach ($query->result() as $row ) 
		{
			return $row;
		}

	
	}
      

    // Modelo para insertar registros en los biometricos
     public function insert_biometrico($param_biometrico)
    {
        $campos = array(
            'id_biometrico'=>'biome'.DATE('his'),
            'nombre_oficina'=>$param_biometrico['nombre_oficina'],
            'descripcion_biometrico'=>$param_biometrico['descripcion_biometrico'],
            'status_biometrico'=>'DISPONIBLE'

            );

        return   $this->db->insert('biometrico', $campos);  
    }


  public function consulta_biometrico($id_biometrico)
	{
        $this->db->where('id_biometrico', $id_biometrico);
		$query=$this->db->get('biometrico');
		foreach ($query->result() as $row ) 
		{
			return $row;
		}

	
	}


    public function modificar_status_tableta($id_tableta,$status,$sucursal)
    {
        $this->db->set('status_tableta', $status);
        $this->db->where('id_tableta', $id_tableta);
        $this->db->where('nombre_oficina', $sucursal);
        $evento= $this->db->update('Tableta');
        return $evento;
    } 

       public function modificar_status_biometrico($id_biometrico,$status,$sucursal)
    {
        $this->db->set('status_biometrico', $status);
        $this->db->where('id_biometrico', $id_biometrico);
        $this->db->where('nombre_oficina', $sucursal);
        $evento= $this->db->update('biometrico');
        return $evento;
    }
 
	public function eventos_rechazados($nombre_asesor)
	{
     
     	$this->db->where('nombre_asesor', $nombre_asesor);
		$query=$this->db->get('eventos');
      

        if ( $query->num_rows()>1) {
            return TRUE;
        } else {
            return FALSE;
        }
        
		
	}            
           


 } 



 ?>