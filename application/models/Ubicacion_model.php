<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Ubicacion_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');      
    }

    function edificioListing()
    {
        $this->db->select('*');
        $this->db->from('edificio');
        $this->db->where('activo', 1);
        $this->db->order_by('codigo', 'ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function oficinasListing()
    {
        $this->db->select('O.codigo,O.nombre,O.unidad,O.piso,E.nombre as edificio, O.telefono, O.codigo_edificio');
        $this->db->from('oficina as O');
        $this->db->join('edificio as E', 'E.codigo = O.codigo_edificio','left');
        $this->db->where('O.activo', 1);
        $this->db->order_by('codigo', 'ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function addEedificio($edificio){
        $this->db->insert('edificio', $edificio);
        $this->User_model->auditoriaInsert(1,"Edificio",$this->db->last_query());
        $insert_id = $this->db->affected_rows();
        return $insert_id;
    }
    
    function addOficina($oficina){
        $this->db->insert('oficina', $oficina);;
        $this->User_model->auditoriaInsert(1,"Oficina",$this->db->last_query());
        $insert_id = $this->db->affected_rows();
        return $insert_id;
    }
    
    function getOficinaInfo($oficina){
        $this->db->select('O.codigo,O.nombre,O.unidad,O.piso,O.responsable,O.referencia,O.correo,E.nombre as edificio_nombre,E.codigo as edificio_codigo, O.telefono');
        $this->db->from('oficina as O');
        $this->db->join('edificio as E', 'E.codigo = O.codigo_edificio','left');
        $this->db->where('O.activo', 1);
        $this->db->where('O.codigo', $oficina);
        $query = $this->db->get();
        return $query->row();     
    }
    
    function getEdificioInfo($edificio){
        $this->db->select('*');
        $this->db->from('edificio');
        $this->db->where('activo', 1);
        $this->db->where('codigo', $edificio);
        $query = $this->db->get();
        return $query->row();;     
    }
    
    function updateOficina($codigo,$oficina){
        $this->db->trans_start();
            $this->db->where('codigo', $codigo);
            $this->db->update('oficina', $oficina);
            $query1=$this->db->last_query();
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE){
            $this->User_model->auditoriaInsert(2,"Oficina",$query1);
            return TRUE;
        }
        else
        { 
            return FALSE;
        }
    }
    
    function updateEdificio($codigo,$edificio){
        $this->db->trans_start();
            $this->db->where('codigo', $codigo);
            $this->db->update('edificio', $edificio);
            $query1=$this->db->last_query();
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE){
            $this->User_model->auditoriaInsert(2,"Edificio",$query1);
            return TRUE;
        }
        else
        { 
            return FALSE;
        }
    }
    
    function deleteOficina($codigo, $oficina){
        $this->db->trans_start();
            $this->db->where('codigo', $codigo);
            $this->db->update('oficina', $oficina);
            $query1= $this->db->last_query();
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE){
            $this->User_model->auditoriaInsert(4,"Oficina",$query1);
            return TRUE;
        }
        else return FALSE;
    }
    
    function deleteEdificio($codigo, $edificio){
        $this->db->trans_start();
            $this->db->where('codigo', $codigo);
            $this->db->update('edificio', $edificio);
            $query1= $this->db->last_query();
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE){
            $this->User_model->auditoriaInsert(4,"Edificio",$query1);
            return TRUE;
        }
        else return FALSE;
    }
    
    function personaUbicacion($persona, $ubicacion="NULL"){
        $this->db->trans_start();
            $query1='';
            $query2='';
            if ($ubicacion!="NULL"){
                $this->db->insert('ubicacion', $ubicacion);
                $query1= $this->db->last_query();
            }
            if ($persona!="NULL"){
                $this->db->insert('persona_ubicacion', $persona);
                $query2= $this->db->last_query();
            }    
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE){
            if($query1!='') $this->User_model->auditoriaInsert(1,"Ubicacion",$query1);
            if($query2!='') $this->User_model->auditoriaInsert(1,"Persona-Ubicacion",$query2);
            return TRUE;
        }
        else return FALSE;
    }
    
    function existeUbicacion($oficina, $edificio){
        $this->db->select('*');
        $this->db->from('ubicacion');
        $this->db->where('codigo_edificio', $edificio);
        $this->db->where('codigo_oficina', $oficina);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return TRUE;
        }
        else return FALSE;
    }
    
    function existePersonaUbicacion($login,$oficina, $edificio){
        $this->db->select('*');
        $this->db->from('persona_ubicacion');
        $this->db->where('login_persona', $login);
        $this->db->where('codigo_edificio', $edificio);
        $this->db->where('codigo_oficina', $oficina);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0){
            return TRUE;
        }
        else return FALSE;
    }
}
