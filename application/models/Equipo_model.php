<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Equipo_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }
    
    function printQR($codigo)
    {
        $this->db->select('numero_serie, qr');
        $this->db->from('equipo as E');
        $this->db->where('E.activo', 1);
        $this->db->where('E.codigo', $codigo);
        $query = $this->db->get();
        return $query->row();       
    }

    function existeEquipo($serie)
    {
        $this->db->select('codigo');
        $this->db->from('equipo');
        $this->db->where('activo', 1);
        $this->db->where('numero_serie', $serie);
        $query = $this->db->get();
        if(!empty($query)){
            return $query->row();
        }
        else {return 0;}
    }

    function addMarca($marca)
    {
        $this->db->insert('marca', $marca);
        $codigo=$this->db->insert_id();
        if ($this->db->affected_rows() > 0)
        {
            $this->User_model->auditoriaInsert(1,"marca",$this->db->last_query());
            return $codigo;
        }
        else
        {
          return FALSE;
        }
    }    
    
    function addModelo($modelo)
    {
        $this->db->insert('modelo', $modelo);
        $codigo=$this->db->insert_id();
        if ($this->db->affected_rows() > 0)
        {
            $this->User_model->auditoriaInsert(1,"modelo",$this->db->last_query());
            return $codigo;
        }
        else
        {
          return FALSE;
        }
    }
    
    function getMarcas(){
        $this->db->select('*');
        $this->db->from('marca');
        $this->db->order_by('descripcion', 'DES');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function getModelos(){
        $this->db->select('*');
        $this->db->from('modelo');
        $this->db->order_by('descripcion', 'DES');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
        
    function existeMarcaModelo($marca,$modelo, $tipo){
        $this->db->select('*');
        $this->db->from('marca_modelo');
        $this->db->where('codigo_marca', $marca);
        $this->db->where('codigo_modelo', $modelo);
        $this->db->where('origen', $tipo);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return TRUE;
        }else return FALSE;
    }
    
    function existeInsumoImpresora($insumo,$impresora){
        $this->db->select('*');
        $this->db->from('equipo_insumo');
        $this->db->where('codigo_equipo', $impresora);
        $this->db->where('codigo_insumo', $insumo);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return TRUE;
        }else return FALSE;
    }
    
    function getImpresoras(){
        $this->db->select('EMM.codigo_equipo, CONCAT(MA.descripcion,"-", MO.descripcion) as impresora');
        $this->db->from('equipo_marca_modelo as EMM');
        $this->db->join('marca as MA', 'EMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'EMM.codigo_modelo = MO.codigo','left');
        $this->db->join('marca_modelo as MM', 'EMM.codigo_modelo = MM.codigo_modelo and EMM.codigo_marca = MM.codigo_marca','left');
        $this->db->where('MM.origen', "IMPRESORA");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function getImpresoraInsumo($insumo){
        $this->db->select('EI.codigo_equipo, EI.codigo_insumo, CONCAT(MA.descripcion,"-", MO.descripcion) as descripcion');
        $this->db->from('equipo_insumo as EI');
        $this->db->join('equipo_marca_modelo as EMM', 'EMM.codigo_equipo = EI.codigo_equipo','left');
        $this->db->join('marca as MA', 'EMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'EMM.codigo_modelo = MO.codigo','left');
        //$this->db->join('marca_modelo as MM', 'EMM.codigo_modelo = MM.codigo_modelo and EMM.codigo_marca = MM.codigo_marca','left');
        $this->db->where('EI.codigo_insumo', $insumo);
        $query = $this->db->get();
        $result = $query->result();    
        return $result;
    }
    
    function getImpresoraNoInsumo($insumo){
        $this->db->select('E.codigo as codigo_equipo, CONCAT(MA.descripcion,"-", MO.descripcion) as descripcion');
        $this->db->from('equipo as E');
        $this->db->join('equipo_insumo as EI', 'E.codigo = EI.codigo_equipo','left');
        $this->db->join('equipo_marca_modelo as EMM', 'EMM.codigo_equipo = EI.codigo_equipo','left');
        $this->db->join('marca as MA', 'EMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'EMM.codigo_modelo = MO.codigo','left');
        $this->db->where('EI.codigo_insumo !=', $insumo);
        $query = $this->db->get();
        $result = $query->result();    
        return $result;
    }
    
    function MarcaModelo($marca, $tipo){ 
        $this->db->select('MO.codigo, MO.descripcion');
        $this->db->from('modelo as MO');
        $this->db->join('marca_modelo as MM', 'MM.codigo_modelo = MO.codigo','left');
        $this->db->join('marca as MA', 'MM.codigo_marca = MA.codigo','left');
        $this->db->where('MA.codigo', $marca);
        $this->db->where('MM.origen', $tipo);
        $this->db->order_by('MO.descripcion', 'DES');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function cambiarEstado($codigo, $estado){
        $this->db->trans_start();
            $equipo = array('estado'=>$estado);
            $this->db->where('codigo', $codigo);
            $this->db->update('equipo', $equipo);
            $query=$this->db->last_query();                
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE)
        { 
            $this->User_model->auditoriaInsert(2,"equipo",$query);
            return TRUE;
        }    
        else return FALSE;
    }
    
    function validaSerial($serial)
    {
        $this->db->select('*');
        $this->db->from('equipo');
        $this->db->where('numero_serie', $serial);
        $query = $this->db->get();
        if ($query->num_rows()>0)
            return FALSE;
        else return TRUE;        
    } 
}
