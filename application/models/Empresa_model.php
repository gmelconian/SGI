<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Empresa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    function empresaListing()
    {
        $this->db->select('*');
        $this->db->from('proveedor');
        $this->db->where('activo', 1);
        $this->db->order_by('codigo', 'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function addEmpresa($empresaInfo)
    {
        $this->db->insert('proveedor', $empresaInfo);;
        $this->User_model->auditoriaInsert(1,"Proveedor",$this->db->last_query());
        $insert_id = $this->db->affected_rows();
        return $insert_id;
    }
    
    function deleteEmpresa($codigo, $userInfo='') 
    {   
        $this->db->trans_start();
            $this->db->where('codigo', $codigo);
            $this->db->update('proveedor', $userInfo);
            $query1= $this->db->last_query();
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === TRUE){
            $this->User_model->auditoriaInsert(4,"proveedor",$query1);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function getEmpresaInfo($codigo)
    {
        $this->db->select('*');
        $this->db->from('proveedor');
        $this->db->where('codigo', $codigo);
        $query = $this->db->get();
        return $query->row();
    }

    function editEmpresa($empresaInfo,$codigo)
    {
        $this->db->trans_start();
            $this->db->where('codigo', $codigo);
            $this->db->update('proveedor', $empresaInfo);
            $query1=$this->db->last_query();
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === TRUE){
            $this->User_model->auditoriaInsert(2,"proveedor",$query1);
            return TRUE;
        }
        else
        { 
            return FALSE;
        }
    }   
}
