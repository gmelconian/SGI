<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Insumo_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Equipo_model');
    }
    
    function insumosListing()
    {
        $this->db->select('I.codigo, I.qr, I.tipo, I.copias, MA.descripcion as marca, MO.descripcion as modelo, I.descripcion, I.cantidad, I.cantidad_actual');
        $this->db->from('insumo as I');
        $this->db->join('insumo_marca_modelo as IMM', 'I.codigo = IMM.codigo_insumo','left');
        $this->db->join('marca as MA', 'IMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'IMM.codigo_modelo = MO.codigo','left');
        $names = array('tonner', 'fotoconductor', 'kit_mantenimiento');
        $this->db->where_in('I.tipo', $names);
        $this->db->where('I.activo', 1);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function addInsumo($insumoInfo, $impresora, $factura=''){
        $this->db->trans_start();
            foreach ($insumoInfo as  $value) {
                $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'copias'=>$value['copias'], 'cantidad'=>$value['cantidad'], 'cantidad_actual'=>$value['cantidad'], 'qr'=>$value['qr']);
                $this->db->insert('insumo', $insumo);
                $idInsumo=$this->db->insert_id();
                $query1="&".$this->db->last_query();
                
                $query2='';
                $existe = $this->Equipo_model->existeMarcaModelo($value['marca'], $value['modelo'], "INSUMO");
                if($existe==FALSE){
                    $marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo'],'origen'=>"INSUMO");
                    $this->db->insert('marca_modelo', $marca_modelo);
                    $query2="&".$this->db->last_query();
                }
                
                $insumo_marca_modelo = array('codigo_insumo'=>$idInsumo, 'codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo']);
                $this->db->insert('insumo_marca_modelo', $insumo_marca_modelo);
                $query3="&".$this->db->last_query();
                
                if($factura!=''){
                    $insumo_proveedor = array('codigo_insumo'=>$idInsumo, 'codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'],'archivo_factura'=>$factura );
                    $this->db->insert('insumo_proveedor', $insumo_proveedor);
                    $query4="&".$this->db->last_query();
                }
                else{
                    $insumo_proveedor = array('codigo_insumo'=>$idInsumo, 'codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'] );
                    $this->db->insert('insumo_proveedor', $insumo_proveedor);
                    $query4="&".$this->db->last_query();
                }
                
                $query5='';
                foreach($impresora as $clave => $val)
                {
                    $existe2=$this->Equipo_model->existeInsumoImpresora($idInsumo,$val);
                    if($existe2==FALSE){
                        $equipo_insumo = array('codigo_equipo'=>$val,'codigo_insumo'=>$idInsumo);
                        $this->db->insert('equipo_insumo', $equipo_insumo);
                        $query5="&".$this->db->last_query();    
                    }                    
                }
                $stock = array('accion'=>'INGRESO');
                $this->db->insert('stock', $stock);
                $idStock=$this->db->insert_id();
                $query6=$this->db->last_query();
                
                $insumo_stock = array('codigo_stock'=>$idStock,'codigo_insumo'=>$idInsumo);
                $this->db->insert('insumo_stock', $insumo_stock);
                $query7=$this->db->last_query();
                
            }
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE)
        {
            $datosAuditoria=explode("&", $query1);
            foreach ($datosAuditoria as $key ) {
              if (!empty($key)) 
               $this->User_model->auditoriaInsert(1,"insumo",$key);
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
               $this->User_model->auditoriaInsert(1,"insumo_marca_modelo",$keyyyy);
            }
            
            $datosAuditoria4=explode("&", $query4);
            foreach ($datosAuditoria4 as $keyy ) {
              if (!empty($keyy)) 
               $this->User_model->auditoriaInsert(1,"insumo_proveedor",$keyyyy);
            }
            
            if($query5!=''){
                $datosAuditoria5=explode("&", $query5);
                foreach ($datosAuditoria5 as $ke ) {
                  if (!empty($keyyy)) 
                   $this->User_model->auditoriaInsert(1,"equipo_insumo",$ke);
                }
            }
            if($query6!='') $this->User_model->auditoriaInsert(1,"Stock",$query6);
            if($query7!='') $this->User_model->auditoriaInsert(1,"insumo_stock",$query7);    
            return TRUE;
        }
        else return FALSE;
    }
    
    function insumoInfo($codigo){
        $this->db->select('I.codigo, I.tipo, I.qr, I.copias, MA.codigo as codigo_marca, MA.descripcion as marca, MO.codigo as codigo_modelo, MO.descripcion as modelo, I.descripcion, I.cantidad, P.codigo as codigo_proveedor,P.nombre_fantacia as proveedor, IP.fecha, IP.garantia, IP.expediente, IP.archivo_factura');
        $this->db->from('insumo as I');
        $this->db->join('insumo_marca_modelo as IMM', 'I.codigo = IMM.codigo_insumo','left');
        $this->db->join('marca as MA', 'IMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'IMM.codigo_modelo = MO.codigo','left');
        $this->db->join('insumo_proveedor as IP', 'I.codigo = IP.codigo_insumo','left');
        $this->db->join('proveedor as P', 'P.codigo = IP.codigo_proveedor','left');
        $this->db->where('I.codigo', $codigo);
        $this->db->where('I.activo', 1);
        $query = $this->db->get();
        return $query->row();
    }
    
    function updateInsumo($insumoInfo, $codigo,$impresora, $factura=''){
        $this->db->trans_start();
            foreach ($insumoInfo as  $value) {
                $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'copias'=>$value['copias'], 'cantidad'=>$value['cantidad'], 'qr'=>$value['qr']);
                $this->db->where('codigo', $codigo);
                $this->db->update('insumo', $insumo);
                $query1="&".$this->db->last_query();
                
                $query2='';
                $existe = $this->Equipo_model->existeMarcaModelo($value['marca'], $value['modelo'], "INSUMO");
                if($existe==FALSE){
                    $marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo'],'origen'=>"INSUMO");
                    $this->db->insert('marca_modelo', $marca_modelo);
                    $query2="&".$this->db->last_query();
                }
                                
                $insumo_marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo']);
                $this->db->where('codigo_insumo', $codigo);
                $this->db->update('insumo_marca_modelo', $insumo_marca_modelo);
                $query3="&".$this->db->last_query();
                
                if($factura!=''){
                    $insumo_proveedor = array('codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'],'archivo_factura'=>$factura );
                    $this->db->where('codigo_insumo', $codigo);
                    $this->db->update('insumo_proveedor', $insumo_proveedor);
                    $query4="&".$this->db->last_query();
                }
                else{
                    $insumo_proveedor = array('codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'] );
                    $this->db->where('codigo_insumo', $codigo);
                    $this->db->update('insumo_proveedor', $insumo_proveedor);
                    $query4="&".$this->db->last_query();
                }
                
                $query5='';
                if(!empty($impresora)){
                    foreach($impresora as $clave => $val)
                    {
                        $existe2=$this->Equipo_model->existeInsumoImpresora($codigo,$val);
                        if($existe2==FALSE){
                            /*$this->db->where('codigo_insumo', $codigo);
                            $this->db->delete('equipo_insumo');
                            $this->User_model->auditoriaInsert(3,"equipo_insumo",$this->db->last_query());
                            */
                            $equipo_insumo = array('codigo_equipo'=>$val,'codigo_insumo'=>$codigo);
                            $this->db->insert('equipo_insumo', $equipo_insumo);
                            $query5="&".$this->db->last_query();    
                        }
                    }
                }
                else {
                    $this->db->where('codigo_insumo', $codigo);
                    $this->db->delete('equipo_insumo');
                    $this->User_model->auditoriaInsert(3,"equipo_insumo",$this->db->last_query());
                }
                    
            }
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE)
        {
            $datosAuditoria=explode("&", $query1);
            foreach ($datosAuditoria as $key ) {
              if (!empty($key)) 
               $this->User_model->auditoriaInsert(2,"insumo",$key);
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
               $this->User_model->auditoriaInsert(2,"insumo_marca_modelo",$keyyyy);
            }
            
            $datosAuditoria4=explode("&", $query4);
            foreach ($datosAuditoria4 as $keyy ) {
              if (!empty($keyy)) 
               $this->User_model->auditoriaInsert(2,"insumo_proveedor",$keyyyy);
            }
            
            if($query5!=''){
                $datosAuditoria5=explode("&", $query5);
                foreach ($datosAuditoria5 as $ke ) {
                  if (!empty($keyyy)) 
                   $this->User_model->auditoriaInsert(2,"equipo_insumo",$ke);
                }
            }
            return TRUE;
        }
        else return FALSE;
    }
    
    function deleteInsumo($codigoInsumo){
        $activo = array('activo'=>0 );
        $this->db->where('codigo', $codigoInsumo);
        $this->db->update('insumo', $activo);
        $return = $this->db->affected_rows();
        $this->User_model->auditoriaInsert(4,"insumo",$this->db->last_query());
        return $return;
    }
}
