<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Stock_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }
    
    function stockListing($codigo='')
    {
        $this->db->select('I.codigo, SUM(I.cantidad_actual) as cantidad, I.copias, I.tel_tipo, I.tipo, MA.descripcion as marca, MO.descripcion as modelo, I.descripcion, P.nombre_fantacia as proveedor, IP.fecha, IP.garantia, IP.expediente, IP.archivo_factura');
        $this->db->from('insumo as I');
        $this->db->join('insumo_marca_modelo as IMM', 'I.codigo = IMM.codigo_insumo','left');
        $this->db->join('marca as MA', 'IMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'IMM.codigo_modelo = MO.codigo','left');
        $this->db->join('insumo_proveedor as IP', 'I.codigo = IP.codigo_insumo','left');
        $this->db->join('proveedor as P', 'P.codigo = IP.codigo_proveedor','left');
        $this->db->where('I.activo', 1);
        $this->db->where('I.cantidad_actual >', 0);
        $this->db->group_by(array("I.tipo","MA.descripcion", "MO.descripcion"));
        if ($codigo!=''){ 
            $this->db->where('I.codigo',$codigo);
            $query = $this->db->get();
            $result = $query->row();
            
        }
        else {
            $query = $this->db->get();
            $result = $query->result();
        }      
        return $result;
    }
    
    function stockListingEquipo($codigo='', $estado='NUEVA'){
        $this->db->select('E.codigo, numero_serie, E.tipo, E.servicio, E.pulgadas, MA.descripcion as marca, MO.descripcion as modelo, E.descripcion, E.qr, host,CONCAT(P.nombre_fantacia,"-",P.razon_social) as proveedor, EP.fecha, EP.garantia, EP.expediente, EP.archivo_factura');
        $this->db->from('equipo as E');
        $this->db->join('equipo_marca_modelo as EMM', 'E.codigo = EMM.codigo_equipo','left');
        $this->db->join('marca as MA', 'EMM.codigo_marca = MA.codigo','left');
        $this->db->join('modelo as MO', 'EMM.codigo_modelo = MO.codigo','left');
        $this->db->join('equipo_proveedor as EP', 'E.codigo = EP.codigo_equipo','left');
        $this->db->join('proveedor as P', 'P.codigo = EP.codigo_proveedor','left');
        $this->db->where('E.activo', 1);
        if ($estado!='NUEVA'){ 
            $this->db->where_in('E.estado',$estado);
        }
        else {
            $this->db->where('E.estado',$estado);
        }        
        if ($codigo!=''){ 
            $this->db->where('E.codigo',$codigo);
            $query = $this->db->get();
            $result = $query->row();            
        }
        else {
            $query = $this->db->get();
            $result = $query->result();
        }
        return $result;
    }
    
    function getcantidad($codigo){
        $this->db->select('I.cantidad_actual');
        $this->db->from('insumo as I');
        $this->db->where('I.activo', 1);
        $this->db->where('I.codigo', $codigo);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    function bajaStock($codigo, $cantidad=''){
        $this->db->trans_start();
            if($cantidad==''){
                $equipo = array('estado'=>"ASIGNADO");
                $this->db->where('codigo', $codigo);
                $this->db->update('equipo', $equipo);
                $query1= $this->db->last_query();
                                
                $this->db->select('codigo_stock');
                $this->db->from('equipo_stock');
                $this->db->where('codigo_equipo', $codigo);
                $query = $this->db->get();
                $stock = $query->row();         
                
                $estado = array('accion'=>"ASIGNACION");
                $this->db->where('codigo', $stock);
                $this->db->update('stock', $estado);
                $query2= $this->db->last_query();
            }
            else {
                $insumo = array('cantidad'=>$cantidad);
                $this->db->where('codigo', $codigo);
                $this->db->update('insumo', $insumo);
                $query1= $this->db->last_query();
                                
                $this->db->select('codigo_stock');
                $this->db->from('insumo_stock');
                $this->db->where('codigo_insumo', $codigo);
                $query = $this->db->get();
                $stock = $query->row();         
                
                $estado = array('accion'=>"ASIGNACION");
                $this->db->where('codigo', $stock);
                $this->db->update('stock', $estado);
                $query2= $this->db->last_query();
            }
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE)
        {
            if($cantidad!='') $this->User_model->auditoriaInsert(2,"Equipo",$query1);
            else $this->User_model->auditoriaInsert(2,"Insumo",$query1);
            $this->User_model->auditoriaInsert(2,"Stock",$query2);
            return TRUE;
        }
        else return FALSE;
    }
    
    function personaListing(){
        $query = $this->db->get('persona');
        $result = $query->result();        
        return $result;
    }
    
    function asignarPersona($asignarInfo){
        $this->db->trans_start();
            foreach ($asignarInfo as  $value) {
                $this->db->select('S.codigo');
                $this->db->from('stock as S');
                $this->db->join('equipo_stock as ES', 'S.codigo = ES.codigo_stock','left');
                $this->db->join('equipo as E', 'ES.codigo_equipo = E.codigo','left');
                $this->db->where('E.activo', 1);
                $this->db->where('E.codigo',$value['codigo_equipo'] );
                $query = $this->db->get();
                $codigo_stock = $query->row();
                
                $asignar = array('login_persona'=>$value['codigo_persona'], 'codigo_stock'=>$codigo_stock->codigo);
                $this->db->insert('stock_persona', $asignar);
                $query1="&".$this->db->last_query();
                
                $estado = array('accion'=>"ASIGNACION");
                $this->db->where('codigo', $codigo_stock->codigo);
                $this->db->update('stock', $estado);
                $query2= $this->db->last_query();
                
                $equipo = array('estado'=>"ASIGNADO");
                $this->db->where('codigo', $value['codigo_equipo']);
                $this->db->update('equipo', $equipo);
                $query3= $this->db->last_query();
            }    
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE)
        {
            $this->User_model->auditoriaInsert(1,"stock_persona",$query1);
            $this->User_model->auditoriaInsert(2,"Stock",$query2);
            $this->User_model->auditoriaInsert(2,"Equipo",$query3);
            return TRUE;
        }
        else return FALSE;
    }
    
    function asignarOficina($asignarInfo){
        $this->db->trans_start();
            $query2="";
            $query3="";
            $query4="";
            foreach ($asignarInfo as  $value) {
                $this->db->select('codigo_edificio');
                $this->db->from('oficina ');
                $this->db->where('activo', 1);
                $this->db->where('codigo',$value['codigo_oficina'] );
                $query0 = $this->db->get();
                $codigo_edificio = $query0->row();
                    
                if($value['tipo']=="IMPRESORA"){
                    $this->db->select('S.codigo');
                    $this->db->from('stock as S');
                    $this->db->join('equipo_stock as ES', 'S.codigo = ES.codigo_stock','left');
                    $this->db->join('equipo as E', 'ES.codigo_equipo = E.codigo','left');
                    $this->db->where('E.activo', 1);
                    $this->db->where('E.codigo',$value['codigo_insumo'] );
                    $query = $this->db->get();
                    $codigo_stock = $query->row();
                    
                    $asignar = array('codigo_oficina'=>$value['codigo_oficina'],'codigo_edificio'=>$codigo_edificio->codigo_edificio, 'codigo_stock'=>$codigo_stock->codigo);
                    $this->db->insert('stock_ubicacion', $asignar);
                    $query1="&".$this->db->last_query();

                    $estado = array('accion'=>"ASIGNACION");
                    $this->db->where('codigo', $codigo_stock->codigo);
                    $this->db->update('stock', $estado);
                    $query2= $this->db->last_query();

                    $equipo = array('estado'=>"ASIGNADO");
                    $this->db->where('codigo', $value['codigo_insumo']);
                    $this->db->update('equipo', $equipo);
                    $query3= $this->db->last_query();
                    
                }elseif ($value['tipo']=="TELEFONO") {
                    $this->db->select('S.codigo');
                    $this->db->from('stock as S');
                    $this->db->join('insumo_stock as IS', 'S.codigo = IS.codigo_stock','left');
                    $this->db->join('insumo as I', 'IS.codigo_insumo = I.codigo','left');
                    $this->db->where('I.activo', 1);
                    $this->db->where('I.codigo',$value['codigo_insumo'] );
                    $query = $this->db->get();
                    $codigo_stock = $query->row();
                    
                    $asignar = array('codigo_oficina'=>$value['codigo_oficina'],'codigo_edificio'=>$codigo_edificio->codigo_edificio, 'codigo_stock'=>$codigo_stock->codigo);
                    $this->db->insert('stock_ubicacion', $asignar);
                    $query1="&".$this->db->last_query();
                    
                    $this->db->set('cantidad_actual', 'cantidad_actual-1', FALSE);
                    $this->db->where('codigo', $value['codigo_insumo']);
                    $this->db->update('insumo');
                    $query4= $this->db->last_query();
                }
            }    
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE)
        {
            $this->User_model->auditoriaInsert(1,"stock_ubicacion",$query1);
            if($query2!="" && $query3!=""){
                $this->User_model->auditoriaInsert(2,"Stock",$query2);
                $this->User_model->auditoriaInsert(2,"Equipo",$query3);
            }
            if($query4!=""){
                $this->User_model->auditoriaInsert(2,"Insumo",$query4);
            }    
            return TRUE;
        }
        else return FALSE;
    }
    
    function asignarEquipo($asignarInfo){
        $this->db->trans_start();
            $query2="";
            $query3="";
            $query4="";
            foreach ($asignarInfo as  $value) {
                if($value['tipo']=="tonner" || $value['tipo']=="kit_mantenimiento" || $value['tipo']=="fotoconductor"||$value['tipo']=="TECLADO" || $value['tipo']=="RATON" || $value['tipo']=="FUENTE" || $value['tipo']=="DISCO" || $value['tipo']=="OTRO" ){
                    $this->db->select('S.codigo');
                    $this->db->from('stock as S');
                    $this->db->join('insumo_stock as IS', 'S.codigo = IS.codigo_stock','left');
                    $this->db->join('insumo as I', 'IS.codigo_insumo = I.codigo','left');
                    $this->db->where('I.activo', 1);
                    $this->db->where('I.codigo',$value['codigo_insumo'] );
                    $query = $this->db->get();
                    $codigo_stock = $query->row();
                    
                    $asignar = array('codigo_stock'=>$codigo_stock->codigo, 'codigo_equipo'=>$value['codigo_equipo'],'tipo'=>$value['tipo']);
                    $this->db->insert('stock_equipo_asignado', $asignar);
                    $query1=$this->db->last_query();
                    
                    $this->db->set('cantidad_actual', 'cantidad_actual-1', FALSE);
                    $this->db->where('codigo', $value['codigo_insumo']);
                    $this->db->update('insumo');
                    $query4= $this->db->last_query();
                    
                }elseif($value['tipo']=="MONITOR"){
                    $this->db->select('S.codigo');
                    $this->db->from('stock as S');
                    $this->db->join('equipo_stock as ES', 'S.codigo = ES.codigo_stock','left');
                    $this->db->join('equipo as E', 'ES.codigo_equipo = E.codigo','left');
                    $this->db->where('E.activo', 1);
                    $this->db->where('E.codigo',$value['codigo_insumo'] );
                    $query = $this->db->get();
                    $codigo_stock = $query->row();

                    $asignar = array('codigo_stock'=>$codigo_stock->codigo, 'codigo_equipo'=>$value['codigo_equipo'],'tipo'=>$value['tipo']);
                    $this->db->insert('stock_equipo_asignado', $asignar);
                    $query1=$this->db->last_query();
                    
                    //if ($value['tipo']=="MONITOR"){
                    $estado = array('accion'=>"ASIGNACION");
                    $this->db->where('codigo', $codigo_stock->codigo);
                    $this->db->update('stock', $estado);
                    $query2= $this->db->last_query();

                    $equipo = array('estado'=>"ASIGNADO");
                    $this->db->where('codigo', $value['codigo_insumo']);
                    $this->db->update('equipo', $equipo);
                    $query3= $this->db->last_query();

                    $this->db->set('cantidad_actual', 'cantidad_actual-1', FALSE);
                    $this->db->where('codigo', $value['codigo_insumo']);
                    $this->db->update('insumo');
                    $query4= $this->db->last_query();
                    //}    
                }    
            }    
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE)
        {
            $this->User_model->auditoriaInsert(1,"stock_equipo_asignado",$query1);
            if($query2!="" && $query3!=""){
                $this->User_model->auditoriaInsert(2,"Stock",$query2);
                $this->User_model->auditoriaInsert(2,"Equipo",$query3);
            }
            if($query4!=""){
                $this->User_model->auditoriaInsert(2,"Insumo",$query4);
            }    
            return TRUE;
        }
        else return FALSE;
    }
    
    function getEquiposAsignados($codigo){
        $this->db->select('E.codigo,E.numero_serie, E.estado, SEA.tipo');
        $this->db->from('equipo as E');
        $this->db->join('stock_equipo_asignado as SEA', 'E.codigo = SEA.codigo_equipo' ,'left');
        $this->db->where('SEA.codigo_equipo',$codigo);
        $this->db->where('E.activo', 1);
        $query1 = $this->db->get();
        $result = $query1->result(); 
        if ($query1->num_rows() > 0)
        {
            return $result;
        }
        else return 0;
    }
    
    function cambiarEstado($codigo, $estado){
        $this->db->set('estado', "'".$estado."'", FALSE);
        $this->db->where('codigo', $codigo);
        $this->db->update('equipo');
        $query1= $this->db->last_query();
        $filas= $this->db->affected_rows();
        if ($filas > 0)
        {
            $this->User_model->auditoriaInsert(2,"Equipo",$query1);
            return $filas;
        }
        else return 0;
    }
}