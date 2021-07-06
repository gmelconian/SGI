<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Impresora_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Equipo_model');
    }
    
    function addEquipo($equipoInfo,$factura='')
    {
        $this->db->trans_start();
            foreach ($equipoInfo as  $value) {
                $equipo = array('numero_serie'=>$value['numero_serie'], 'descripcion'=>$value['descripcion'], 'qr'=>$value['qr'], 'host'=>$value['host'], 'servicio'=>$value['servicio']);
                $this->db->insert('equipo', $equipo);
                $idEquipo=$this->db->insert_id();
                $query1="&".$this->db->last_query();
                
                $query2='';
                $existe = $this->Equipo_model->existeMarcaModelo($value['marca'], $value['modelo'], "IMPRESORA");
                if($existe==FALSE){
                    $marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo'],'origen'=>"IMPRESORA");
                    $this->db->insert('marca_modelo', $marca_modelo);
                    $query2="&".$this->db->last_query();
                }
                
                $equipo_marca_modelo = array('codigo_equipo'=>$idEquipo, 'codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo']);
                $this->db->insert('equipo_marca_modelo', $equipo_marca_modelo);
                $query3="&".$this->db->last_query();
                
                //log_message('error', $factura);
                if($factura!=''){
                    log_message('error', "con factura");
                    $equipo_proveedor = array('codigo_equipo'=>$idEquipo, 'codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'],'archivo_factura'=>$factura );
                    $this->db->insert('equipo_proveedor', $equipo_proveedor);
                    $query4="&".$this->db->last_query();
                }
                else{
                    log_message('error', "sin factura");
                    $equipo_proveedor = array('codigo_equipo'=>$idEquipo, 'codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'] );
                    $this->db->insert('equipo_proveedor', $equipo_proveedor);
                    $query4="&".$this->db->last_query();
                }
                $stock = array('accion'=>'INGRESO');
                $this->db->insert('stock', $stock);
                $idStock=$this->db->insert_id();
                $query5=$this->db->last_query();
                
                $equipo_stock = array('codigo_stock'=>$idStock,'codigo_equipo'=>$idEquipo);
                $this->db->insert('equipo_stock', $equipo_stock);
                $query6=$this->db->last_query();
            }
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE)
        {
            $datosAuditoria=explode("&", $query1);
            foreach ($datosAuditoria as $key ) {
              if (!empty($key)) 
               $this->User_model->auditoriaInsert(1,"equipo",$key);
            }
            if($query2!=''){
                $datosAuditoria2=explode("&", $query2);
                foreach ($datosAuditoria2 as $keyyy ) {
                  if (!empty($keyyy)) 
                   $this->User_model->auditoriaInsert(1,"marca_modelo",$keyyy);
                }
            }
            $datosAuditoria3=explode("&", $query3);
            foreach ($datosAuditoria3 as $keyyyy ) {
              if (!empty($keyyyy)) 
               $this->User_model->auditoriaInsert(1,"equipo_marca_modelo",$keyyyy);
            }
            
            $datosAuditoria4=explode("&", $query4);
            foreach ($datosAuditoria4 as $keyy ) {
              if (!empty($keyy)) 
               $this->User_model->auditoriaInsert(1,"equipo_proveedor",$keyyyy);
            }
            if($query5!='') $this->User_model->auditoriaInsert(1,"Stock",$query5);
            if($query6!='') $this->User_model->auditoriaInsert(1,"equipo_stock",$query6);
            return TRUE;
        }
        else return FALSE;
    }
 
    function equipoListing()
    {
        $this->db->select('E.codigo, numero_serie, E.estado, MA.descripcion as marca, MO.descripcion as modelo, E.descripcion, E.qr, host,CONCAT(P.nombre_fantacia,"-",P.razon_social) as proveedor');
        $this->db->from('equipo as E');
        $this->db->join('equipo_marca_modelo as EMM', 'E.codigo = EMM.codigo_equipo','left');
        $this->db->join('marca as MA', 'EMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'EMM.codigo_modelo = MO.codigo','left');
        $this->db->join('equipo_proveedor as EP', 'E.codigo = EP.codigo_equipo','left');
        $this->db->join('proveedor as P', 'P.codigo = EP.codigo_proveedor','left');
        $this->db->where('E.tipo', 'IMPRESORA');
        $this->db->where('E.activo', 1);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
     
    function deleteEquipo($codigoEquipo)
    {
        $activo = array('activo'=>0 );
        $this->db->where('codigo', $codigoEquipo);
        $this->db->update('equipo', $activo);
        $return = $this->db->affected_rows();
        $this->User_model->auditoriaInsert(4,"equipo",$this->db->last_query());
        return $return;
    }

    function equipoInfo($editequipo)
    {
        $this->db->select('E.codigo, numero_serie, MA.codigo as marca, MO.codigo as modelo, E.descripcion, E.qr, host, servicio, P.codigo as codigo_proveedor,P.nombre_fantacia as proveedor, EP.fecha, EP.garantia, EP.expediente, EP.archivo_factura');
        $this->db->from('equipo as E');
        $this->db->join('equipo_marca_modelo as EMM', 'E.codigo = EMM.codigo_equipo','left');
        $this->db->join('marca as MA', 'EMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'EMM.codigo_modelo = MO.codigo','left');
        $this->db->join('equipo_proveedor as EP', 'E.codigo = EP.codigo_equipo','left');
        $this->db->join('proveedor as P', 'P.codigo = EP.codigo_proveedor','left');
        $this->db->where('E.activo', 1);
        $this->db->where('E.codigo', $editequipo);
        $query = $this->db->get();
        return $query->row();
    }

    function updateEquipo($equipoInfo,$codigoEquipo, $factura=''){
        $this->db->trans_start();
            foreach ($equipoInfo as  $value) {
                $equipo = array('numero_serie'=>$value['numero_serie'], 'descripcion'=>$value['descripcion'], 'qr'=>$value['qr'], 'host'=>$value['host'], 'servicio'=>$value['servicio']);
                $this->db->where('codigo', $codigoEquipo);
                $this->db->update('equipo', $equipo);
                $query1="&".$this->db->last_query();
                
                $query2='';
                $existe = $this->Equipo_model->existeMarcaModelo($value['marca'], $value['modelo'], "IMPRESORA");
                if($existe==FALSE){
                    $marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo'],'origen'=>"IMPRESORA");
                    $this->db->insert('marca_modelo', $marca_modelo);
                    $query2="&".$this->db->last_query();
                }
                                
                $equipo_marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo']);
                $this->db->where('codigo_equipo', $codigoEquipo);
                $this->db->update('equipo_marca_modelo', $equipo_marca_modelo);
                $query3="&".$this->db->last_query();
                
                if($factura!=''){
                    $equipo_proveedor = array('codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'],'archivo_factura'=>$factura );
                    $this->db->where('codigo_equipo', $codigoEquipo);
                    $this->db->update('equipo_proveedor', $equipo_proveedor);
                    $query4="&".$this->db->last_query();
                }
                else{
                    $equipo_proveedor = array('codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'] );
                    $this->db->where('codigo_equipo', $codigoEquipo);
                    $this->db->update('equipo_proveedor', $equipo_proveedor);
                    $query4="&".$this->db->last_query();
                }                                
            }
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE)
        {
            $datosAuditoria=explode("&", $query1);
            foreach ($datosAuditoria as $key ) {
              if (!empty($key)) 
               $this->User_model->auditoriaInsert(2,"equipo",$key);
            }
            
            if($query2!=''){
                $datosAuditoria2=explode("&", $query2);
                foreach ($datosAuditoria2 as $keyyy ) {
                  if (!empty($keyyy)) 
                   $this->User_model->auditoriaInsert(2,"marca_modelo",$keyyy);
                }
            }
            
            $datosAuditoria3=explode("&", $query3);
            foreach ($datosAuditoria3 as $keyyyy ) {
              if (!empty($keyyyy)) 
               $this->User_model->auditoriaInsert(2,"equipo_marca_modelo",$keyyyy);
            }
            
            $datosAuditoria4=explode("&", $query4);
            foreach ($datosAuditoria4 as $keyy ) {
              if (!empty($keyy)) 
               $this->User_model->auditoriaInsert(2,"equipo_proveedor",$keyyyy);
            }
            return TRUE;
        }
        else return FALSE;
    }
}
