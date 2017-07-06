<?php 

 
 class Mcalendar extends CI_Model

 {	

 	public function getEventos($sucursal_usuario)  

 	{

 		$this->db->select ('idEvento id, nombre_asesor title, des_evento, concat(fecInicio,"T",hora_inicio) as start, concat(fecFin,"T",hora_fin) as end, evento_color backgroundColor, status', 'sucursal_usuario');
        $this->db->where('sucursal_usuario', $sucursal_usuario);
 		$this->db->from('eventos');

 		return $this->db->get()->result();

 	}

    public function insert($param)

    {

        $campos = array(

            'idEvento'=>$param['idEvento'],       

            'nombre_asesor'=>$param['nombre_asesor'],

            //'sucursal_usuario'=>$param['sucursal_usuario'],

            'des_evento'=>$param['des_evento'],

            'fecInicio'=>$param['fecInicio'],

            'fecFin'=>$param['fecFin'],

            'hora_inicio'=>$param['hora_inicio'].':00',

            'hora_fin'=>$param['hora_fin'].':00',

            'evento_color'=>'#E85B48',  

            'status'=>'PENDIENTE',

            'usuarios_id_usuario'=>$param['usuarios_id_usuario']; 


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





  



/*

 	public function updEvento($param){

        $campos =array(

        	'idEvento'=> $param['id'],

        	'fecInicio'=>$param['fecini'],

        	'fecFin'=>$param['fecfin']

        );

        

        $this->db_>where('idEvento', $param['id']);

        $this->db->update('eventos', $campos);



        if ($this->db->affected_rows()==1) {

        	return 1;

 

        }

        else{

        	return 0;

        }

 	}



 	public function deleteEvento($id){

 		$this->db->where('idEvento', $id);

 		return $this->db->delete('eventos');





 	}

*/



 } 



 ?>