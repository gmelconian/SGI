<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function getReporte($role) { 
        $this->db->select('*');
        $this->db->from('reporte_list as R');
        $this->db->where('R.role',$role);        
        $query = $this->db->get();
        $result = $query->result();        
        return $result;      
    }
    
    function getDatosReporte($reporte,$filtro=null){
        $this->db->select('sql');
        $this->db->from('reporte_list as R');
        $this->db->where('R.id',$reporte);        
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($filtro)){
            switch ($reporte) {
                case 2:
                    $query2 = $this->db->query($result->sql.$filtro);
                    break;
                case 3:
                    $query2 = $this->db->query($result->sql.$filtro);
                    break;  
            }
            //$query2 = $this->db->query($result->sql.$filtro);
        }else
            $query2 = $this->db->query($result->sql);
        
        return $query2->result();
    }
    
    function getFiltro($reporte){
        $this->db->select('filtro');
        $this->db->from('reporte_list as R');
        $this->db->where('R.id',$reporte);        
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    
    function cantidadInsumosTipo(){
        $this->db->select('I.tipo, sum(I.cantidad_actual) as cantidad');
        $this->db->from('insumo as I');
        $this->db->where('I.tipo !=',"TELEFONO");
        $this->db->group_by("I.tipo");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;        
    }
    
    function equiposUnidad($tipo){
        switch ($tipo){
            case 'TELEFONOS':
                $query = $this->db->query('select COUNT(I.codigo) as total, O.unidad from insumo as I left join insumo_stock as SI on I.codigo = SI.codigo_insumo left join stock_ubicacion as SU on SI.codigo_stock = SU.codigo_stock left join oficina as O on SU.codigo_oficina = O.codigo where I.tipo = "TELEFONO" and O.unidad != "NULL" group by O.unidad');
                break;
            case 'IMPRESORAS':
                $query = $this->db->query('select COUNT(E.codigo) as total, O.unidad from equipo as E left join equipo_stock as ES on E.codigo = ES.codigo_equipo left join stock_ubicacion as SU on ES.codigo_stock = SU.codigo_stock left join oficina as O on SU.codigo_oficina = O.codigo where E.tipo = "IMPRESORA" and O.unidad != "NULL" group by O.unidad');
                break;
            case 'PC':
                $query = $this->db->query('select COUNT(E.codigo) as total, O.unidad from equipo as E left join equipo_stock as ES on E.codigo = ES.codigo_equipo left join stock_persona as SP on ES.codigo_stock = SP.codigo_stock left join persona_ubicacion as PU on SP.login_persona = PU.login_persona left join oficina as O on PU.codigo_oficina = O.codigo where E.tipo = "PC" and O.unidad != "NULL" group by O.unidad');
                break;
        }
        $result = $query->result();        
        return $result;
    }
    
    function insumosUsadosMes(){
        $query = $this->db->query('SELECT MONTH(fecha) as mes, tipo, COUNT(codigo_stock) as total FROM sgi.stock_equipo_asignado where fecha > DATE_SUB(now(), INTERVAL 6 MONTH) group by tipo, mes');
        $result = $query->result();        
        return $result;
    }    
    
    function getEquipo($tipo){
        $this->db->select('codigo, numero_serie, descripcion');
        $this->db->from('equipo');
        $this->db->where('tipo',$tipo);
        $this->db->where('activo',1);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}
