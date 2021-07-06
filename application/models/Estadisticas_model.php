<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Estadisticas_model extends CI_Model
{
	function visitasPorMes() 
	{
		$this->db->select('monthname(fecha) as nombreFecha, count(*) as numero');
		$this->db->from('usuario_visita');

		$this->db->where('fecha !=',"");
		$this->db->group_by('month(fecha)');
		$this->db->limit(12);
		$query = $this->db->get();
        $result = $query->result();        
        return $result;   
	}

	function usuariosPorMes() 
	{
		$this->db->select('monthname(fecha) as nombreFecha, count(*) as numero');
		$this->db->from('usuario');
		$this->db->where('activo', 1);
		$this->db->where('fecha !=',"");
		$this->db->group_by('month(fecha)');
		$this->db->limit(12);
		$query = $this->db->get();
        $result = $query->result();        
        return $result;   
	}

	function cantidadEstadoVisita() 
	{
		$this->db->select('estado,count(*) as cantidad');
		$this->db->from('visita');
		$this->db->group_by('estado');
	    $query = $this->db->get();
        $result = $query->result();        
        return $result;   
	}

	function cantidadEquiposMes() 
	{
		$this->db->select('monthname(fecha) as nombreFecha, count(*) as numero');
		$this->db->from('cliente_equipo as ce');
		$this->db->join('equipo as e', 'e.codigo = ce.codigo_equipo','left');  
		$this->db->where('activo', 1);
		$this->db->group_by('month(fecha)');
		$this->db->limit(12);
		$query = $this->db->get();
        $result = $query->result();        
        return $result;
	}

}
