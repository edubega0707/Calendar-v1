<?php 

 class Mcalendar extends CI_Model
 {	
 	public function getEventos($sucursal_usuario)  
 	{
 		$this->db->select ('idEvento id, nombre_asesor title, concat(fecInicio,"T",hora_inicio) as start, concat(fecFin,"T",hora_fin) as end, evento_color backgroundColor, status, sucursal_usuario');
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
            'fecInicio'=>$param['fecInicio'],
            'fecFin'=>$param['fecFin'],
            'hora_inicio'=>$param['hora_inicio'].':00',
            'hora_fin'=>$param['hora_inicio'].':00',
            'no_serie_tableta'=>$param['no_serie_tableta'],
            'no_serie_biometrico'=>$param['no_serie_biometrico'],
            'no_serie_modulo'=>$param['no_serie_modulo'],
            'no_tramites_evento'=>$param['no_tramites_evento'],
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
            'fecInicio'=>$param['fecInicio'],
            'fecFin'=>$param['fecFin'],
            'hora_inicio'=>$param['hora_inicio'].':00',
            'hora_fin'=>$param['hora_inicio'].':00',
            'no_serie_tableta'=>$param['no_serie_tableta'],
            'no_serie_biometrico'=>$param['no_serie_biometrico'],
            'no_serie_modulo'=>$param['no_serie_modulo'],
            'no_tramites_evento'=>$param['no_tramites_evento'],
            'evento_color'=>'#A5F2E7',  
            'status'=>'ACEPTADO',
            'usuarios_id_usuario'=>$param['usuarios_id_usuario'] 
            );

        return   $this->db->insert('eventos', $campos); 
    }      



    public function consulta_evento($id)
    {            
        $consulta= $this->db->get_where('eventos', array('idEvento'=>$id));
        return $consulta->result();
    }



    public function modificar_evento($status, $idEvento, $color, $folio_evento, $notas_evento)
    {
        $this->db->set('status', $status);
        $this->db->set('evento_color',$color);
        $this->db->set('folio_evento',$folio_evento);
        $this->db->set('notas_evento',$notas_evento);
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
            'telefono_oficina_uno'=>$param_oficina['telefono_oficina_uno'],
            'telefono_oficina_dos'=>$param_oficina['telefono_oficina_dos'],
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
            'no_serie'=>$param_tableta['no_serie_tableta'],
            'status_tableta'=>'DISPONIBLE'
            );

         return   $this->db->insert('Tableta', $campos); 
    } 



    // Modelo para insertar registros en los biometricos
     public function insert_biometrico($param_biometrico)
    {
        $campos = array(
            'id_biometrico'=>'biome'.DATE('his'),
            'nombre_oficina'=>$param_biometrico['nombre_oficina'],
            'no_serie'=>$param_biometrico['numero_serie_bio'],
            'status_biometrico'=>'DISPONIBLE'

            );

        return   $this->db->insert('biometrico', $campos);  
    }


    public function insert_modulo($param_modulo)
    {
        $campos = array(
            'id_modulo'=>'mod'.DATE('his'),
            'nombre_oficina'=>$param_modulo['nombre_oficina'],
            'no_serie'=>$param_modulo['numero_serie_modulo'],
            'status_modulo'=>'DISPONIBLE'

            );

        return   $this->db->insert('modulos', $campos);  
    }


//     public function consulta_tableta($id_tableta)
// 	{
//         $this->db->where('id_tableta', $id_tableta);
// 		$query=$this->db->get('Tableta');
// 		foreach ($query->result() as $row ) 
// 		{
// 			return $row->descripcion_tableta;
// 		}
	
// 	}



//   public function consulta_biometrico($id_biometrico)
// 	{
//         $this->db->where('id_biometrico', $id_biometrico);
// 		$query=$this->db->get('biometrico');
// 		foreach ($query->result() as $row ) 
// 		{
// 			return $row->descripcion_biometrico;
// 		}

	
//     }
    
//     public function consulta_modulo($id_modulo)
// 	{
//         $this->db->where('id_biometrico', $id_biometrico);
// 		$query=$this->db->get('biometrico');
// 		foreach ($query->result() as $row ) 
// 		{
// 			return $row->descripcion_biometrico;
// 		}
// 	}
    public function modificar_status_tableta($no_serie_tableta, $status, $sucursal)
    {
        $this->db->set('status_tableta', $status);
        $this->db->where('no_serie', $no_serie_tableta);
        $this->db->where('nombre_oficina', $sucursal);
        $evento= $this->db->update('Tableta');
        return $evento;
    } 

       public function modificar_status_biometrico($no_serie_biometrico,$status,$sucursal)
    {
        $this->db->set('status_biometrico', $status);
        $this->db->where('no_serie', $no_serie_biometrico);
        $this->db->where('nombre_oficina', $sucursal);
        $evento= $this->db->update('biometrico');
        return $evento;
    }

    public function modificar_status_modulo($no_serie_modulo,$status,$sucursal)
    {
        $this->db->set('status_modulo', $status);
        $this->db->where('no_serie', $no_serie_modulo);
        $this->db->where('nombre_oficina', $sucursal);
        $evento= $this->db->update('modulos');
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


    public function folio_evento($idEvento, $folio_evento)
    {
        $this->db->set('folio_evento', $folio_evento);
        $this->db->where('idEvento', $idEvento);
        $evento= $this->db->update('eventos');
        return $evento;
    }


  
         
           


 } 



 ?>