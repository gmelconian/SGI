<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Computadora_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Equipo_model');
    }
    
    function computadorasListing(){
        $this->db->select('E.codigo, estado, numero_serie, MA.descripcion as marca, MO.descripcion as modelo, E.descripcion, E.qr, host,CONCAT(P.nombre_fantacia,"-",P.razon_social) as proveedor');
        $this->db->from('equipo as E');
        $this->db->join('equipo_marca_modelo as EMM', 'E.codigo = EMM.codigo_equipo','left');
        $this->db->join('marca as MA', 'EMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'EMM.codigo_modelo = MO.codigo','left');
        $this->db->join('equipo_proveedor as EP', 'E.codigo = EP.codigo_equipo','left');
        $this->db->join('proveedor as P', 'P.codigo = EP.codigo_proveedor','left');
        $this->db->where('E.tipo', "PC");
        $this->db->where('E.activo', 1);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function addComputadora($computadoraInfo,$factura='')
    {
        $this->db->trans_start();
            foreach ($computadoraInfo as  $value) {
                $equipo = array('numero_serie'=>$value['numero_serie'], 'descripcion'=>$value['descripcion'], 'qr'=>$value['qr'], 'host'=>$value['host'], 'servicio'=>$value['servicio'], 'tipo'=>'PC');
                $this->db->insert('equipo', $equipo);
                $idEquipo=$this->db->insert_id();
                $query1="&".$this->db->last_query();
                
                $query2='';
                $existe = $this->Equipo_model->existeMarcaModelo($value['marca'], $value['modelo'], "PC");
                if($existe==FALSE){
                    $marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo'],'origen'=>"PC");
                    $this->db->insert('marca_modelo', $marca_modelo);
                    $query2="&".$this->db->last_query();
                }
                $equipo_marca_modelo = array('codigo_equipo'=>$idEquipo, 'codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo']);
                $this->db->insert('equipo_marca_modelo', $equipo_marca_modelo);
                $query3="&".$this->db->last_query();
                if($factura!=''){
                    $equipo_proveedor = array('codigo_equipo'=>$idEquipo, 'codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'],'archivo_factura'=>$factura );
                    $this->db->insert('equipo_proveedor', $equipo_proveedor);
                    $query4="&".$this->db->last_query();
                }
                else{
                    $equipo_proveedor = array('codigo_equipo'=>$idEquipo, 'codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'] );
                    $this->db->insert('equipo_proveedor', $equipo_proveedor);
                    $query4="&".$this->db->last_query();
                }
                $stock = array('accion'=>'INGRESO');
                $this->db->insert('stock', $stock);
                $idStock=$this->db->insert_id();
                $query5=$this->db->last_query();
                
                $insumo_stock = array('codigo_stock'=>$idStock,'codigo_equipo'=>$idEquipo);
                $this->db->insert('equipo_stock', $insumo_stock);
                $query6=$this->db->last_query();
            }
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE)
        {
            $datosAuditoria=explode("&", $query1);
            foreach ($datosAuditoria as $key ) {
              if (!empty($key)) 
               $this->User_model->auditoriaInsert(1,"Equipo",$key);
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
    
    function updateComputadora($computadoraInfo,$codigoComputadora, $factura=''){
        $this->db->trans_start();
            foreach ($computadoraInfo as  $value) {
                $equipo = array('numero_serie'=>$value['numero_serie'], 'descripcion'=>$value['descripcion'], 'qr'=>$value['qr'], 'host'=>$value['host'], 'servicio'=>$value['servicio'], 'tipo'=>'PC');
                $this->db->where('codigo', $codigoComputadora);
                $this->db->update('equipo', $equipo);
                $query1="&".$this->db->last_query();
                
                $query2='';
                $existe = $this->Equipo_model->existeMarcaModelo($value['marca'], $value['modelo'], "PC");
                if($existe==FALSE){
                    $marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo'],'origen'=>"PC");
                    $this->db->insert('marca_modelo', $marca_modelo);
                    $query2="&".$this->db->last_query();
                }
                                
                $equipo_marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo']);
                $this->db->where('codigo_equipo', $codigoComputadora);
                $this->db->update('equipo_marca_modelo', $equipo_marca_modelo);
                $query3="&".$this->db->last_query();
                
                if($factura!=''){
                    $equipo_proveedor = array('codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'],'archivo_factura'=>$factura );
                    $this->db->where('codigo_equipo', $codigoComputadora);
                    $this->db->update('equipo_proveedor', $equipo_proveedor);
                    $query4="&".$this->db->last_query();
                }
                else{
                    $equipo_proveedor = array('codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'] );
                    $this->db->where('codigo_equipo', $codigoComputadora);
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
               $this->User_model->auditoriaInsert(2,"Equipo",$key);
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
    
    function computadoraInfo($editequipo)
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
    
    function monitoresListing()
    {
        $this->db->select('E.codigo, E.estado, numero_serie, MA.descripcion as marca, MO.descripcion as modelo, E.descripcion, E.qr, pulgadas,CONCAT(P.nombre_fantacia,"-",P.razon_social) as proveedor');
        $this->db->from('equipo as E');
        $this->db->join('equipo_marca_modelo as EMM', 'E.codigo = EMM.codigo_equipo','left');
        $this->db->join('marca as MA', 'EMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'EMM.codigo_modelo = MO.codigo','left');
        $this->db->join('equipo_proveedor as EP', 'E.codigo = EP.codigo_equipo','left');
        $this->db->join('proveedor as P', 'P.codigo = EP.codigo_proveedor','left');
        $this->db->where('E.tipo', "MONITOR");
        $this->db->where('E.activo', 1);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function addMonitor($equipoInfo,$factura='')
    {
        $this->db->trans_start();
            foreach ($equipoInfo as  $value) {
                $equipo = array('numero_serie'=>$value['numero_serie'], 'descripcion'=>$value['descripcion'], 'qr'=>$value['qr'], 'pulgadas'=>$value['pulgadas'],'tipo'=>'MONITOR');
                $this->db->insert('equipo', $equipo);
                $idEquipo=$this->db->insert_id();
                $query1="&".$this->db->last_query();
                
                $query2='';
                $existe = $this->Equipo_model->existeMarcaModelo($value['marca'], $value['modelo'], "MONITOR");
                if($existe==FALSE){
                    $marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo'],'origen'=>"MONITOR");
                    $this->db->insert('marca_modelo', $marca_modelo);
                    $query2="&".$this->db->last_query();
                }
                
                $equipo_marca_modelo = array('codigo_equipo'=>$idEquipo, 'codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo']);
                $this->db->insert('equipo_marca_modelo', $equipo_marca_modelo);
                $query3="&".$this->db->last_query();
                
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
    
    function monitorInfo($codigo){
        $this->db->select('E.codigo, numero_serie, MA.codigo as marca, MO.codigo as modelo, E.descripcion, E.qr, pulgadas, P.codigo as codigo_proveedor,P.nombre_fantacia as proveedor, EP.fecha, EP.garantia, EP.expediente, EP.archivo_factura');
        $this->db->from('equipo as E');
        $this->db->join('equipo_marca_modelo as EMM', 'E.codigo = EMM.codigo_equipo','left');
        $this->db->join('marca as MA', 'EMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'EMM.codigo_modelo = MO.codigo','left');
        $this->db->join('equipo_proveedor as EP', 'E.codigo = EP.codigo_equipo','left');
        $this->db->join('proveedor as P', 'P.codigo = EP.codigo_proveedor','left');
        $this->db->where('E.activo', 1);
        $this->db->where('E.codigo', $codigo);
        $query = $this->db->get();
        return $query->row();
    }
    
    function updateMonitor($monitorInfo, $codigo, $factura=''){
        $this->db->trans_start();
            foreach ($monitorInfo as  $value) {
                $equipo = array('numero_serie'=>$value['serie'], 'descripcion'=>$value['descripcion'], 'qr'=>$value['qr'], 'pulgadas'=>$value['pulgadas'], 'tipo'=>'MONITOR');
                $this->db->where('codigo', $codigo);
                $this->db->update('equipo', $equipo);
                $query1="&".$this->db->last_query();
                
                $query2='';
                $existe = $this->Equipo_model->existeMarcaModelo($value['marca'], $value['modelo'], "MONITOR");
                if($existe==FALSE){
                    $marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo'],'origen'=>"MONITOR");
                    $this->db->insert('marca_modelo', $marca_modelo);
                    $query2="&".$this->db->last_query();
                }
                                
                $equipo_marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo']);
                $this->db->where('codigo_equipo', $codigo);
                $this->db->update('equipo_marca_modelo', $equipo_marca_modelo);
                $query3="&".$this->db->last_query();
                
                if($factura!=''){
                    $equipo_proveedor = array('codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'],'archivo_factura'=>$factura );
                    $this->db->where('codigo_equipo', $codigo);
                    $this->db->update('equipo_proveedor', $equipo_proveedor);
                    $query4="&".$this->db->last_query();
                }
                else{
                    $equipo_proveedor = array('codigo_proveedor'=>$value['proveedor'],'fecha'=>$value['fecha'],'garantia'=>$value['garantia'],'expediente'=>$value['expediente'] );
                    $this->db->where('codigo_equipo', $codigo);
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
               $this->User_model->auditoriaInsert(2,"Equipo",$key);
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
    
    function telefonosListing()
    {
        $this->db->select('I.codigo, MA.descripcion as marca, MO.descripcion as modelo, I.descripcion, I.qr, I.tel_tipo');
        $this->db->from('insumo as I');
        $this->db->join('insumo_marca_modelo as IMM', 'I.codigo = IMM.codigo_insumo','left');
        $this->db->join('marca as MA', 'IMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'IMM.codigo_modelo = MO.codigo','left');
        $this->db->where('I.tipo', 'TELEFONO');
        $this->db->where('I.activo', 1);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function addTelefono($telefonoInfo, $factura=''){
        $this->db->trans_start();
            foreach ($telefonoInfo as  $value) {
                $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'tel_tipo'=>$value['tel_tipo'], 'cantidad'=>$value['cantidad'], 'cantidad_actual'=>$value['cantidad'], 'qr'=>$value['qr']);
                $this->db->insert('insumo', $insumo);
                $idInsumo=$this->db->insert_id();
                $query1="&".$this->db->last_query();
                
                $query2='';
                $existe = $this->Equipo_model->existeMarcaModelo($value['marca'], $value['modelo'], "TELEFONO");
                if($existe==FALSE){
                    $marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo'],'origen'=>"TELEFONO");
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
                $stock = array('accion'=>'INGRESO');
                $this->db->insert('stock', $stock);
                $idStock=$this->db->insert_id();
                $query5=$this->db->last_query();
                
                $insumo_stock = array('codigo_stock'=>$idStock,'codigo_insumo'=>$idInsumo);
                $this->db->insert('insumo_stock', $insumo_stock);
                $query6=$this->db->last_query();
            }
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE)
        {
            $datosAuditoria=explode("&", $query1);
            foreach ($datosAuditoria as $key ) {
              if (!empty($key)) 
               $this->User_model->auditoriaInsert(1,"Insumo",$key);
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
            if($query5!='') $this->User_model->auditoriaInsert(1,"Stock",$query5);
            if($query6!='') $this->User_model->auditoriaInsert(1,"insumo_stock",$query6);
            return TRUE;
        }
        else return FALSE;
    }
    
    function telefonoInfo($codigo){
        $this->db->select('I.codigo, I.tipo, I.qr, I.tel_tipo, MA.descripcion as marca, MO.descripcion as modelo, I.descripcion, I.cantidad, P.codigo as codigo_proveedor,P.nombre_fantacia as proveedor, IP.fecha, IP.garantia, IP.expediente, IP.archivo_factura');
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
    
    function updateTelefono($telefonoInfo, $codigo, $factura=''){
        $this->db->trans_start();
            foreach ($telefonoInfo as  $value) {
                $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'tel_tipo'=>$value['tel_tipo'], 'cantidad'=>$value['cantidad'], 'qr'=>$value['qr']);
                $this->db->where('codigo', $codigo);
                $this->db->update('insumo', $insumo);
                $query1="&".$this->db->last_query();
                
                $query2='';
                $existe = $this->Equipo_model->existeMarcaModelo($value['marca'], $value['modelo'], "TELEFONO");
                if($existe==FALSE){
                    $marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo'],'origen'=>"TELEFONO");
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
            }
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE)
        {
            $datosAuditoria=explode("&", $query1);
            foreach ($datosAuditoria as $key ) {
              if (!empty($key)) 
               $this->User_model->auditoriaInsert(2,"Insumo",$key);
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
            return TRUE;
        }
        else return FALSE;
    }
    
    function componentesListing()
    {
        $this->db->select('I.codigo, MA.descripcion as marca, MO.descripcion as modelo, I.descripcion, I.qr, I.tipo');
        $this->db->from('insumo as I');
        $this->db->join('insumo_marca_modelo as IMM', 'I.codigo = IMM.codigo_insumo','left');
        $this->db->join('marca as MA', 'IMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'IMM.codigo_modelo = MO.codigo','left');
        $names = array('TECLADO', 'RATON', 'DISCO', 'FUENTE', 'OTRO');
        $this->db->where_in('I.tipo', $names);
        $this->db->where('I.activo', 1);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function addComponente($componenteInfo, $factura=''){
        $this->db->trans_start();
            foreach ($componenteInfo as  $value) {
                switch ($value['tipo']) {
                    case 'TECLADO':
                        $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'cantidad'=>$value['cantidad'], 'cantidad_actual'=>$value['cantidad'], 'qr'=>$value['qr'], 'puerto'=>$value['puerto'], 'conex_puerto'=>$value['conex_puerto']);
                        break;
                    case 'RATON':
                        $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'cantidad'=>$value['cantidad'], 'cantidad_actual'=>$value['cantidad'], 'qr'=>$value['qr'], 'puerto'=>$value['puerto'], 'conex_puerto'=>$value['conex_puerto']);
                        break;
                    case 'DISCO':
                        $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'cantidad'=>$value['cantidad'], 'cantidad_actual'=>$value['cantidad'], 'qr'=>$value['qr'], 'capasidad'=>$value['capasidad'], 'tipo_disco'=>$value['tipo_disco']);
                        break;
                    case 'FUENTE':
                        $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'cantidad'=>$value['cantidad'], 'cantidad_actual'=>$value['cantidad'], 'qr'=>$value['qr'], 'potencia'=>$value['potencia']);
                        break;
                    case 'OTRO':
                        $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'cantidad'=>$value['cantidad'], 'cantidad_actual'=>$value['cantidad'], 'qr'=>$value['qr']);
                        break;
                }
                $this->db->insert('insumo', $insumo);
                $idInsumo=$this->db->insert_id();
                $query1="&".$this->db->last_query();
                
                $query2='';
                $existe = $this->Equipo_model->existeMarcaModelo($value['marca'], $value['modelo'], "COMPONENTE");
                if($existe==FALSE){
                    $marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo'],'origen'=>"COMPONENTE");
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
                $stock = array('accion'=>'INGRESO');
                $this->db->insert('stock', $stock);
                $idStock=$this->db->insert_id();
                $query5=$this->db->last_query();
                
                $insumo_stock = array('codigo_stock'=>$idStock,'codigo_insumo'=>$idInsumo);
                $this->db->insert('insumo_stock', $insumo_stock);
                $query6=$this->db->last_query();
            }
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE)
        {
            $datosAuditoria=explode("&", $query1);
            foreach ($datosAuditoria as $key ) {
              if (!empty($key)) 
               $this->User_model->auditoriaInsert(1,"Insumo",$key);
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
            if($query5!='') $this->User_model->auditoriaInsert(1,"Stock",$query5);
            if($query6!='') $this->User_model->auditoriaInsert(1,"insumo_stock",$query6);
            return TRUE;
        }
        else return FALSE;
    }
    
    function componenteInfo($codigo){
        $this->db->select('I.codigo, I.tipo, I.qr, I.puerto, I.conex_puerto, I.capasidad, I.tipo_disco, I.potencia, MA.descripcion as marca, MO.descripcion as modelo, I.descripcion, I.cantidad, P.codigo as codigo_proveedor,P.nombre_fantacia as proveedor, IP.fecha, IP.garantia, IP.expediente, IP.archivo_factura');
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
    
    function updateComponente($componenteInfo, $codigo, $factura=''){
        $this->db->trans_start();
            foreach ($componenteInfo as  $value) {
                switch ($value['tipo']) {
                    case 'TECLADO':
                        $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'cantidad'=>$value['cantidad'], 'cantidad_actual'=>$value['cantidad'], 'qr'=>$value['qr'], 'puerto'=>$value['puerto'], 'conex_puerto'=>$value['conex_puerto']);
                        break;
                    case 'RATON':
                        $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'cantidad'=>$value['cantidad'], 'cantidad_actual'=>$value['cantidad'], 'qr'=>$value['qr'], 'puerto'=>$value['puerto'], 'conex_puerto'=>$value['conex_puerto']);
                        break;
                    case 'DISCO':
                        $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'cantidad'=>$value['cantidad'], 'cantidad_actual'=>$value['cantidad'], 'qr'=>$value['qr'], 'capasidad'=>$value['capasidad'], 'tipo_disco'=>$value['tipo_disco']);
                        break;
                    case 'FUENTE':
                        $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'cantidad'=>$value['cantidad'], 'cantidad_actual'=>$value['cantidad'], 'qr'=>$value['qr'], 'potencia'=>$value['potencia']);
                        break;
                    case 'OTRO':
                        $insumo = array('tipo'=>$value['tipo'], 'descripcion'=>$value['descripcion'], 'cantidad'=>$value['cantidad'], 'cantidad_actual'=>$value['cantidad'], 'qr'=>$value['qr']);
                        break;
                }
                $this->db->where('codigo', $codigo);
                $this->db->update('insumo', $insumo);
                $query1="&".$this->db->last_query();
                
                $query2='';
                $existe = $this->Equipo_model->existeMarcaModelo($value['marca'], $value['modelo'], "COMPONENTE");
                if($existe==FALSE){
                    $marca_modelo = array('codigo_marca'=>$value['marca'],'codigo_modelo'=>$value['modelo'],'origen'=>"COMPONENTE");
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
            }
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE)
        {
            $datosAuditoria=explode("&", $query1);
            foreach ($datosAuditoria as $key ) {
              if (!empty($key)) 
               $this->User_model->auditoriaInsert(2,"Insumo",$key);
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
            return TRUE;
        }
        else return FALSE;
    }
}    