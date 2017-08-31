
 
<?php  

 
class Mregistro extends CI_Model
{  

	public function registrar($param)
	{
			$campos = array(

					'id_usuario'=>$param['id_usuario'],  

					'nombre_usuario'=>$param['nombre_usuario'],      

					'tel_usuario'=>$param['tel_usuario'],

					'correo_usuario'=>$param['correo_usuario'],

					'clave_usuario'=>$param['clave_usuario'],

					'pass_usuario'=>$param['pass_usuario'],

					'sucursal_usuario'=>$param['sucursal_usuario'],  

					'rol_usuario'=>$param['rol_usuario']                                            

			);

			return   $this->db->insert('usuarios', $campos); 

	}      

	public function can_login($clave_usuario, $contraseña_usuario)
	{
		$this->db->where('clave_usuario', $clave_usuario);
		$this->db->where('pass_usuario',  $contraseña_usuario);
		$query=$this->db->get('usuarios');

		if ($query->num_rows()==1) 
		{

			return true;

		}
		else
		{
			return false;
		}
	}

	public function getasesor($clave_usuario)
	{
		$this->db->where('clave_usuario',  $clave_usuario);
		$this->db->where('rol_usuario',  'ADMINISTRADOR');
		$query=$this->db->get('usuarios');

		foreach ($query->result() as $row ) 
		{
			return $row;
		}
	}

	public function getoficinas()
	{
		$query=$this->db->get('Oficinas');
        return $query->result_array();
	}

	public function get_jefes_oficina($clave_usuario)
	{
		$this->db->where('clave_usuario',  $clave_usuario);
		$this->db->where('rol_usuario',  'JEFEOFICINA');
		$query=$this->db->get('usuarios');

		foreach ($query->result() as $row ) 
		{
			return $row;
		}
	}

	public function correo_oficina($nombre_oficina)
	{
		$this->db->where('sucursal_usuario', $nombre_oficina);
		$this->db->where('rol_usuario',  'JEFEOFICINA');
		$query=$this->db->get('usuarios');

		foreach ($query->result() as $row ) 
		{
			return $row->correo_usuario;
		}

	}

	public function getasesores($sucursal)
	{
		$this->db->where('sucursal_usuario',  $sucursal);
		$this->db->where('rol_usuario', 'ASESOR');
		$query=$this->db->get('usuarios');
        return $query->result_array();
	}

	public function gettableta($sucursal)
	{	
		$this->db->where('nombre_oficina', $sucursal);
		$query=$this->db->get('Tableta');
         return $query->result_array();
	}

	public function getbiometrico($sucursal)
	{
	
		$this->db->where('nombre_oficina', $sucursal);
		$query=$this->db->get('biometrico');
        return $query->result_array();

	}
	
	public function getmodulo($sucursal)
	{
		$this->db->where('nombre_oficina', $sucursal);
		$query=$this->db->get('modulos');
        return $query->result_array();

	}

	public function perfil_asesor($clave_usuario)
	{
		$this->db->where('clave_usuario', $clave_usuario);
		$query=$this->db->get('usuarios');
		foreach ($query->result() as $row ) 
		{
			return $row;
		}
        
	}

	public function valida_correo($correo_usuario)
	{
		$this->db->where('correo_usuario', $correo_usuario);
		$query=$this->db->get('usuarios');

		if ($query->num_rows()>=1) 
		{

			return true;

		}
		else
		{
			return false;
		}
	}

	public function valida_clave_asesor($clave_usuario)
	{
		$this->db->where('clave_usuario', $clave_usuario);
		$query=$this->db->get('usuarios');

		if ($query->num_rows()>=1) 
		{

			return true;

		}
		else
		{
			return false;
		}
	}

	
}



 ?>