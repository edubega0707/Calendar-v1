
 
<?php 



/**

* 

*/

class Mregistro extends CI_Model

{



	public function registrar($param)

        {

                $campos = array(



                		'id_usuario'=>$param['id_usuario'], 

                        'nombre_usuario'=>$param['nombre_usuario'],      

                        'tel_usuario'=>$param['tel_usuario'],

                        'correo_usuario'=>$param['correo_usuario'],

                        'pass_usuario'=>$param['pass_usuario']                                         

                );



                return   $this->db->insert('usuarios', $campos); 

        }      



	public function can_login($correo_usuario, $contraseña_usuario)

	{
		$this->db->where('correo_usuario', $correo_usuario);
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
		$this->db->where('correo_usuario',  $sesion);
		$query=$this->db->get('usuarios');

		foreach ($query->result() as $row ) 
		{
			return $row->nombre_usuario;
		}
	}
}



 ?>