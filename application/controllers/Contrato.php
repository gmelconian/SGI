<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Contrato extends BaseController{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contrato_model');
        $this->load->model('empresa_model');
        $this->isLoggedIn();   
    }
    
    public function AltaContratosL()
    {
        $this->global['pageTitle'] = 'SGI :Contratos';
        $data['proveedores'] = $this->empresa_model->empresaListing();
        $this->loadViews("altaContratos", $this->global, $data , NULL);
    }
    
    public function BajaContratosL()
    {
        $this->global['pageTitle'] = 'SGI :Contratos';
        $contrato=$this->input->post('contrato');
        //$visitas = $this->contrato_model->getContratoVisita($contrato);
        $result = $this->contrato_model->deleteContrato($contrato);  
        if ($result) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }      
    }

    public function ModificacionContratosL($contrato=null)
    {
        $this->global['pageTitle'] = 'SGI :Contratos';
        if($contrato == null)
        {
            redirect('contratoListing');
        }
        $data['contrato'] = $this->contrato_model->getContratoInfo($contrato);
        $this->loadViews("modificacionContratos", $this->global, $data , NULL);
    }

    public function infoContrato($contrato=null)
    {
        $this->global['pageTitle'] = 'SGI :Informacion de Contrato';
        if($contrato == null)
        {
            redirect('contratoListing');
        }
        $data['contrato'] = $this->contrato_model->getContratoInfo($contrato);
        $this->loadViews("infoContrato", $this->global, $data , NULL);
    }

    function contratoListing()
    {
        $data['contratoRecords'] = $this->contrato_model->contratoListing();
        $this->global['pageTitle'] = 'SGV : Listado de contratos';
        $this->loadViews("contratos", $this->global, $data, NULL);
    }

    function addContrato(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cliente','Cliente','trim|alpha_numeric|required|max_length[30]');
        $this->form_validation->set_rules('descripcion','Descripcion','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|required');
        if($this->form_validation->run() == FALSE)
            $this->AltaContratosL();
        else
        {
            $cliente = $this->input->post('cliente');
            $tipo = $this->input->post('tipo');
            $cv = $this->input->post('cv');
            $mcv = $this->input->post('mcv');
            $periodo = $this->input->post('periodo');
            $fechav = $this->input->post('fecha');
            $descripcion = $this->input->post('descripcion');
            $activo=1;
            $vendedor = $this->vendorId;
        
            //Subir PDF        
            $pdf = 'pdf';
            if (!empty($_FILES['pdf']['name'])){
                $config['upload_path'] = "./assets/dist/pdfs/";
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = "50000";
                $config['overwrite'] = "TRUE";

                if ($tipo==1){
                    $config['file_name'] = "".$cliente."_mantenimiento";
                    $ruta = "/assets/dist/pdfs/".$cliente."_mantenimiento.pdf";
                }elseif ($tipo==2) {
                    $config['file_name'] = "".$cliente."_service";
                    $ruta = "/assets/dist/pdfs/".$cliente."_service.pdf";
                }

                $this->load->library('upload', $config);
            
                if (!$this->upload->do_upload($pdf)) {
                //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }
            
                $data['uploadSuccess'] = $this->upload->data();

                $contratoInfo = array('activo'=>$activo, 'fecha_vencimiento'=> $fechav, 'descripcion'=> $descripcion,'archivo'=> $ruta, 'tipo'=> $tipo);
            }else{

                $contratoInfo = array('activo'=>$activo, 'fecha_vencimiento'=> $fechav, 'descripcion'=> $descripcion,'tipo'=> $tipo);
            }

        //$tipoE = array('tipo'=>$tipo, 'periodo'=>$periodo, 'mcv'=>$mcv, 'cv'=>$cv);
            $tipoE['tipo'] = $tipo;
            $tipoE['periodo'] = $periodo;
            $tipoE['mcv'] = $mcv;
            $tipoE['cv'] = $cv;

            $this->load->model('contrato_model');
            $result = $this->contrato_model->addContrato($contratoInfo, $tipoE, $cliente, $vendedor);

            if($result!=FALSE)
            {
                $this->session->set_flashdata('success', 'Contrato creado con éxito');
                echo json_encode($result);
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo crear el contrato');
                echo json_encode($result);
            }
    }
        }

        function editContrato($codigo)
        {
            $fechar = $this->input->post('renueva');
            $cantidad = $this->input->post('cv');
            $max = $this->input->post('mcv');
            $tipoC = $this->input->post('tipo');

            $now = date("Y-m-d");
            $newv = strtotime('+'.$fechar.' month' , strtotime($now));
            $newv = date ( 'Y-m-d' , $newv );

            $this->load->model('contrato_model');
            $result = $this->contrato_model->renewContrato($codigo,$newv,$tipoC);

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Contrato creado con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo crear el contrato');
            }

            redirect('Contratos');
        }

    }
    ?>
