
 
<?php 

 
class Mregistro extends CI_Model
{  

	public function registrar($param)
        {
                $campos = array(

                		'id_usuario'=>$param['id_usuario'], 

                        'nombre_usuario'=>$param['nombre_usuario'],      

                        'tel_usuario'=>$param['tel_usuario'],

                        'clave_usuario'=>$param['clave_usuario'],

                        'pass_usuario'=>$param['pass_usuario'],

                        'sucursal_usuario'=>$param['sucursal_usuario'],  

                        'rol_usuario'=>$param['rol_usuario']                                            

                );

                return   $this->db->insert('usuarios', $campos); 

        }      

	public function can_login($correo_usuario, $contraseña_usuario)

	{
		$this->db->where('clave_usuario', $correo_usuario);
		$this->db->where('pass_usuario',   $contraseña_usuario);
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

	public function getasesor($sesion)
	{
		$this->db->where('clave_usuario',  $sesion);
		$query=$this->db->get('usuarios');

		foreach ($query->result() as $row ) 
		{
			return $row;
		}
	}


	public function getasesores($sucursal)
	{
		$this->db->where('sucursal_usuario',  $sucursal);
		$this->db->where('rol_usuario', 'ASESOR');
		$query=$this->db->get('usuarios');
         return $query->result_array();
	}


	public function gettableta()
	{
		
		$this->db->where('status_tableta', 'DISPONIBLE');
		$query=$this->db->get('Tableta');
         return $query->result_array();
	}

	public function getbiometrico()
	{
		$this->db->where('status_biometrico', 'DISPONIBLE');
		$query=$this->db->get('biometrico');
        return $query->result_array();

	}

	public function getoficinas()
	{
		$query=$this->db->get('Oficinas');
        return $query->result_array();
	}
	
}



 ?>