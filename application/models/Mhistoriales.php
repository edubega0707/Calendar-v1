
 
<?php  

 
class Mhistoriales extends CI_Model
{  


	public function getasesores($sucursal)
	{
		$this->db->where('sucursal_usuario',  $sucursal);
		$this->db->where('rol_usuario', 'ASESOR');
		$query=$this->db->get('usuarios');
        return $query->result_array();
	}



	public function getoficinas()
	{
		$query=$this->db->get('Oficinas');
        return $query->result_array();
	}



	  public function get_eventos_oficina($sucursal_usuario)
    {            
        $this->db->select ('idEvento, nombre_asesor, des_evento, fecInicio, fecFin');
        $this->db->from('eventos');
        $this->db->join('usuarios', 'eventos.usuarios_id_usuario=usuarios.id_usuario', 'inner');
        $this->db->where('sucursal_usuario', $sucursal_usuario);
 		$query=$this->db->get();
		return $query->result_array();

    }




    public function get_eventos_asesor($nombre_asesor)
    {            
        $this->db->select ('idEvento, nombre_asesor, des_evento, fecInicio, fecFin');
        $this->db->from('eventos');
        $this->db->join('usuarios', 'eventos.usuarios_id_usuario=usuarios.id_usuario', 'inner');
        $this->db->where('nombre_asesor', $nombre_asesor);
 		$query=$this->db->get();
		return $query->result_array();
    }




    public function get_eventos_fecha($id)
    {            
        $this->db->select ('idEvento, nombre_asesor, des_evento, fecInicio, fecFin');
        $this->db->from('eventos');
        $this->db->join('usuarios', 'eventos.usuarios_id_usuario=usuarios.id_usuario', 'inner');
        $this->db->where('sucursal_usuario', $sucursal_usuario);
 		return $this->db->get()->result();
    }
	
}

 ?>