<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Equipo extends BaseController{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('equipo_model');
        $this->isLoggedIn();   
    }
    
    public function printQR($codigo=NULL)
    {
        $data['qr'] = $this->equipo_model->printQR($codigo);
        $this->global['pageTitle'] = 'SGI : Imprimir QR';
        $this->loadViews("printqr", $this->global, $data, NULL);
    }
    
    public function lectorQR()
    {
        $this->global['pageTitle'] = 'SGI : Leer QR';
        $this->loadViews("lectorqr", $this->global, NULL, NULL);       
    }

    function addModelo(){
        $modelo = array('descripcion'=>$this->input->post('modelo_descripcion'));
        $result = $this->equipo_model->addModelo($modelo);
        if ($result != FALSE)
        {
            echo(json_encode($result)); 
        }
        else 
        { 
            echo(json_encode(FALSE)); 
        }
    }
    
    function addMarca(){
        $marca = array('descripcion'=>$this->input->post('marca_descripcion'));
        $result = $this->equipo_model->addMarca($marca);
        if ($result != FALSE)
        {
            echo(json_encode($result)); 
        }
        else 
        { 
            echo(json_encode(FALSE)); 
        }
    }

    function getModelos()
    {   
        $modelos = $this->equipo_model->getModelos();
        if(count($modelos)>0){
            $modelos_select = '';
            $modelos_select.= "<option value='0'>Seleccione el modelo</option>";
            foreach ($modelos as $modelo)
            {
                $modelos_select.= "<option value=".$modelo->codigo.">".$modelo->descripcion."</option>";
            }
            echo json_encode($modelos_select);
        }
    }
    
    function getModeloMarca()
    {   
        $marca=$this->input->post('codigo_marca');
        $tipo=$this->input->post('tipo');
        $modelo = $this->equipo_model->MarcaModelo($marca, $tipo);
        if(count($modelo)>0){
            $modelos = '';
            $modelos.= "<option value='0'>Seleccione el modelo</option>";
            foreach ($modelo as $mo)
            {
                $modelos.= "<option value=".$mo->codigo.">".$mo->descripcion."</option>";
            }
        }
        else{
            $modelos = $this->getModelos();
        }
        echo json_encode($modelos);
    }
    
    function CHestadoEquipo($codigo,$tipo){
        $data['equipo'] = $codigo;
        $data['tipo'] = $tipo;
        $this->global['pageTitle'] = 'SGI : Cambiar estado de equipo';
        $this->loadViews("cambioEstado", $this->global, $data, NULL);
    }
    
    function cambiarEstado($codigo,$tipo)
    {   
        $estado=$this->input->post('estado');
        $result = $this->equipo_model->cambiarEstado($codigo,$estado);
        if($result == TRUE)
            $this->session->set_flashdata('success', 'Se cambio el estado con éxito');
        else
            $this->session->set_flashdata('error', 'No se pudo cambiar el estado');
        $this->CHestadoEquipo($codigo,$tipo);           
    }
    
    function validaSerial(){
        $serial = $this->input->post('serial');
        $result = $this->equipo_model->validaSerial($serial);
        if ($result != FALSE)
        {
            echo(json_encode($result)); 
        }
        else 
        { 
            $this->validaSerial();
        }
    }
  }
?>