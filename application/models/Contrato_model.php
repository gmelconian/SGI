<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Contrato_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');      
    }

    function contratoListing()
    {
        $this->db->select('C.codigo, C.descripcion, C.fecha_vencimiento,P.nombre_fantacia, C.archivo');
        $this->db->from('contrato as C');
        $this->db->join('contrato_proveedor as CP', 'CP.codigo_contrato = C.codigo','left');
        $this->db->join('proveedor as P', 'P.codigo = CP.codigo_proveedor','left');
        $this->db->where('C.activo', 1);
        $this->db->order_by('C.codigo', 'ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function getContratoInfo($codigo)
    {
        $this->db->select('codigo, descripcion, VC.fecha_creacion, fecha_vencimiento,P.nombre_fantacia, C.archivo');
        $this->db->from('contrato as C');
        $this->db->join('contrato_proveedor as CP', 'CP.codigo_contrato = C.codigo','left');
        $this->db->join('proveedor as P', 'P.codigo = CP.codigo_proveedor','left');
        $this->db->where('C.activo', 1);
        $this->db->where('C.codigo', $codigo);
        $query = $this->db->get();      
        return $query->row();
    }
            
    function addContrato($contratoInfo,$tipoE, $cliente, $vendedor) {
        $this->db->trans_start();
            $this->db->insert('contrato', $contratoInfo);
            $idContrato=$this->db->insert_id();
            $query1= null;
            $query2= null;
            $query3= null;
            $query4= null;

            if($tipoE['tipo'] == 1) {
                $tipocontrato = array('codigo_contrato'=>$idContrato,'periodicidad'=>$tipoE['periodo']);
                $this->db->insert('mantenimiento', $tipocontrato);
                $query1= $this->db->last_query();

            }elseif ($tipoE['tipo'] == 2) {
                $tipocontrato = array('codigo_contrato'=>$idContrato,'total'=>$tipoE['cv'],'max_mensual'=>$tipoE['mcv'],'restante_total'=>$tipoE['cv'],'restante_mensual'=>$tipoE['mcv']);
                $this->db->insert('service', $tipocontrato);
                $query2= $this->db->last_query();
            }

            $fecha = date("Y-m-d");
            $contratoVendedor = array('codigo_contrato'=>$idContrato, 'login_vendedor'=>$vendedor,'fecha_creacion'=>$fecha);
            $this->db->insert('vendedor_contrato', $contratoVendedor);
            $query3= $this->db->last_query();

            $contratoCliente = array('codigo_contrato'=>$idContrato, 'login_cliente'=>$cliente);
            $this->db->insert('contrato_cliente', $contratoCliente);
            $query4= $this->db->last_query();
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE)
        {
            if ($query1 != null) {
               $this->User_model->auditoriaInsert(1,"mantenimiento",$query1);
            };
            if ($query2 != null) {
               $this->User_model->auditoriaInsert(1,"service",$query2);
            };
            $this->User_model->auditoriaInsert(1,"vendedor_contrato",$query3);
            $this->User_model->auditoriaInsert(1,"contrato_cliente",$query4);
            return $idContrato;
        }
        else {
            return FALSE;
        }
    }
    
    function deleteContrato($codigo) 
    {   
        $this->db->trans_start();
            $activo = array('activo'=>0 );
            $this->db->where('codigo', $codigo);
            $this->db->update('contrato', $activo);
            $query = $this->db->last_query();
        $this->db->trans_complete();
        if ($this->db->trans_status() == TRUE)
        {
            $this->User_model->auditoriaInsert(4,"contrato",$query);
            return TRUE;
        }    
        else {
            return FALSE;
        }
    }
    
    function renewContrato($codigo,$newv,$tipoC)
    {
        $newc = array('fecha_creacion'=> date('Y-m-d'));
        $vence = array('fecha_vencimiento'=>$newv);
        $query2=null;
        $this->db->trans_start();
            $this->db->where('codigo', $codigo);
            $this->db->update('contrato', $vence);
            $query1= $this->db->last_query();

            $this->db->where('codigo_contrato', $codigo);    
            $this->db->update('vendedor_contrato', $newc);
            $query2= $this->db->last_query();

            
            if ($tipoC==2) {
                $service = array('restante_total'=>$cantidad,'restante_mensual'=>$max);
                $this->db->where('codigo_contrato', $codigo);    
                $this->db->update('service', $service);
                $query3= $this->db->last_query();
            }
            
            $insert_id = $this->db->affected_rows();
        $this->db->trans_complete();
       $this->User_model->auditoriaInsert(2,"contrato",$query1);
       $this->User_model->auditoriaInsert(2,"vendedor_contrato",$query2);
        if ($query3 != null) 
        {
           $this->User_model->auditoriaInsert(2,"service",$query3);
        };
        return $insert_id;
    }
}
