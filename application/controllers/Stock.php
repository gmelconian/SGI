<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Stock extends BaseController{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('stock_model');
        $this->load->model('computadora_model');
        $this->load->model('impresora_model');
        $this->load->model('ubicacion_model');
        $this->isLoggedIn();   
    }
    
    function stock(){
        $this->global['pageTitle'] = 'SGI : Stock';
        $data['insumos'] = $this->stock_model->stockListing();
        $estado = array('NUEVA', 'DISPONIBLE');
        $data['equipo'] = $this->stock_model->stockListingEquipo($codigo='',$estado);
        $this->loadViews("stock", $this->global, $data , NULL);
    }
    
    function asignarStockEquipo($codigo, $tipo_equipamiento){
        $this->global['pageTitle'] = 'SGI : Asignacion Equipamiento.';
        $data['equipo'] = $this->stock_model->stockListingEquipo($codigo);
        $data['tipo'] = $tipo_equipamiento;
        $data['oficina'] = $this->ubicacion_model->oficinasListing();
        $estado = array("NUEVA","ASIGNADO","DISPONIBLE","GARANTIA","SERVICE","ELIMINADO");
        $data['lista_equipo'] = $this->stock_model->stockListingEquipo($codigo='',$estado);
        $data['persona'] = $this->stock_model->personaListing();
        $this->loadViews("asignarStockEquipo", $this->global, $data , NULL);
    }
    
    function asignarStockInsumo($codigo, $tipo_equipamiento){
        $this->global['pageTitle'] = 'SGI : Asignacion Equipamiento.';        
        $data['insumos'] = $this->stock_model->stockListing($codigo);
        $data['tipo'] = $tipo_equipamiento;
        $data['oficina'] = $this->ubicacion_model->oficinasListing();
        $estado = array("NUEVA","ASIGNADO","DISPONIBLE","GARANTIA","SERVICE","ELIMINADO");
        $data['lista_equipo'] = $this->stock_model->stockListingEquipo($codigo='',$estado);
        switch ($tipo_equipamiento) {
            case 'TECLADO':
            case 'RATON':
            case 'DISCO':
            case 'FUENTE': 
            case 'OTRO':
                $data['modal']="COMPONENTE";
                break;    
            case 'TELEFONO':
                $data['modal']="TELEFONO";
                break;
            case 'tonner':
            case 'kit_mantenimiento':  
            case 'fotoconductor':
                $data['modal']="INSUMO";
                break;
        }
        $this->loadViews("asignarStockInsumo", $this->global, $data , NULL);
    }
    
    function bajaStock($codigo, $tipo_equipamiento){
        switch ($tipo_equipamiento) {
            case 'TECLADO'||'RATON'||'DISCO'||'FUENTE'||'OTRO'||'TELEFONO'||'tonner'||'kit_mantenimiento'||'fotoconductor':
                $actual = $this->stock_model->getcantidad($codigo);
                $cantidad = --$actual;
                $result = $this->stock_model->bajaStock($codigo, $cantidad);
                break;    
            case 'IMPRESORA'||'PC'||'MONITOR':
                $result = $this->stock_model->bajaStock($codigo);
                break;
        }
        if($result == TRUE) $this->session->set_flashdata('success', 'Asignacion éxitosa');
        else $this->session->set_flashdata('error', 'No se pudo asignar el componente');
        redirect('stock');
    }
    
    function asignarOficina(){
        $codigo_insumo = $this->input->post('codigo_insumo');
        $codigo_oficina = $this->input->post('codigo_oficina');
        $tipo = $this->input->post('tipo');
        $asignarInfo[0]['tipo'] = $tipo;
        $asignarInfo[0]['codigo_insumo'] = $codigo_insumo;
        $asignarInfo[0]['codigo_oficina'] = $codigo_oficina;
        $result = $this->stock_model->asignarOficina($asignarInfo);
        if($result == TRUE)
        {   
            $this->session->set_flashdata('success', 'Asignacion realizada con éxito');
        }
        else
        {
            $this->session->set_flashdata('error', 'No se pudo realizar la asignacion');
        }
        echo json_encode($result);
    }
    
    function asignarPersona(){
        $codigo_equipo = $this->input->post('codigo_insumo');
        $codigo_persona = $this->input->post('codigo_persona');
        $tipo = $this->input->post('tipo');
        $asignarInfo[0]['tipo'] = $tipo;
        $asignarInfo[0]['codigo_equipo'] = $codigo_equipo;
        $asignarInfo[0]['codigo_persona'] = $codigo_persona;
        $result = $this->stock_model->asignarPersona($asignarInfo);
        if($result == TRUE)
        {   
            $this->session->set_flashdata('success', 'Asignacion realizada con éxito');
        }
        else
        {
            $this->session->set_flashdata('error', 'No se pudo realizar la asignacion');
        }
        echo json_encode($result);
    }
    
    function asignarEquipo(){
        $codigo_equipo = $this->input->post('codigo_equipo');
        $codigo_insumo = $this->input->post('codigo_insumo');
        $tipo = $this->input->post('tipo');
        $asignarInfo[0]['tipo'] = $tipo;
        $asignarInfo[0]['codigo_equipo'] = $codigo_equipo;
        $asignarInfo[0]['codigo_insumo'] = $codigo_insumo;
        $result = $this->stock_model->asignarEquipo($asignarInfo);
        if($result == TRUE)
        {   
            $this->session->set_flashdata('success', 'Asignacion realizada con éxito');
        }
        else
        {
            $this->session->set_flashdata('error', 'No se pudo realizar la asignacion');
        }
        echo json_encode($result);
    }
    
    function insumosAsiganados(){
        $codigo = $this->input->post('codigo_equipo');
        $carga = $this->stock_model->getEquiposAsignados($codigo);
        if(!empty($carga)){
            foreach ($carga as $key => $value) {
                $data['equipos_load'][$key]['codigo'] = $value->codigo;
                $data['equipos_load'][$key]['numero_serie'] = $value->numero_serie;
                $data['equipos_load'][$key]['tipo'] = $value->tipo;
                $data['equipos_load'][$key]['estado'] = $value->estado;
            }
        }else $data['equipos_load']= "vacio";
        echo json_encode($data);
    }
    
    function cambiarEstado(){
        $codigo_equipo = $this->input->post('codigo_equipo');
        $estado = $this->input->post('estado');
        $result = $this->stock_model->cambiarEstado($codigo_equipo, $estado);
        if($result == TRUE)
        {   
            $this->session->set_flashdata('success', 'Se cambio el estado con éxito');
        }
        else
        {
            $this->session->set_flashdata('error', 'No se pudo realizar el cambio de estado');
        }
        echo json_encode($result);
    }
}    