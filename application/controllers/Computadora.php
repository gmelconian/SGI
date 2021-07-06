<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Computadora extends BaseController{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('computadora_model');
        $this->load->model('equipo_model');
        $this->load->model('Empresa_model');
        $this->isLoggedIn();   
    }
    
    function computadoras(){
        $this->global['pageTitle'] = 'SGI : Listado de Computadoras';
        $data['computadoras'] = $this->computadora_model->computadorasListing();
        $this->loadViews("computadoras", $this->global, $data, NULL);
    }
    
    function creaComputadora(){
        $this->global['pageTitle'] = 'SGI : Crear Computadoras';
        $data['marca'] = $this->equipo_model->getMarcas();
        $data['modelo'] = $this->equipo_model->getModelos();
        $data['proveedor'] = $this->Empresa_model->empresaListing();
        $this->loadViews("addComputadora", $this->global, $data, NULL);
    }
    
    function addComputadora(){        
        $equipos = $this->input->post('equipos');
        $modelo = $this->input->post('modelo');
        $marca = $this->input->post('marca');
        $proveedor = $this->input->post('proveedor');
        $factura = $this->input->post('factura');
        $fecha = $this->input->post('fecha');
        $garantia = $this->input->post('garantia');
        $expediente = $this->input->post('expediente');
        $computadoraInfo = array();
        foreach ($equipos as $key => $value) {
            $computadoraInfo[$key]['numero_serie'] = $value['serial'];
            $computadoraInfo[$key]['descripcion'] = $value['descripcion'];
            $computadoraInfo[$key]['qr'] = $this->generaQR($value['serial'],'COM');
            $computadoraInfo[$key]['host'] = $value['host'];
            $computadoraInfo[$key]['servicio'] = $value['servicio'];
            $computadoraInfo[$key]['modelo'] = $modelo;
            $computadoraInfo[$key]['marca'] = $marca;
            $computadoraInfo[$key]['proveedor'] = $proveedor;
            $computadoraInfo[$key]['fecha'] = $fecha;
            $computadoraInfo[$key]['garantia'] = $garantia;
            $computadoraInfo[$key]['expediente'] = $expediente;
        }
        if (!empty($_FILES['factura']['name'])){
            $config['upload_path'] = "./assets/dist/facturas/";
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = "50000";
            $config['overwrite'] = "TRUE";
            $config['file_name'] = "".$_FILES['factura']['name']."";
            $ruta = "/assets/dist/facturas/".$_FILES['factura']['name'];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($factura)) {
            //*** ocurrio un error
                $data['uploadError'] = $this->upload->display_errors();
                echo $this->upload->display_errors();
                return;
            }
            $data['uploadSuccess'] = $this->upload->data();
            $result = $this->computadora_model->addComputadora($computadoraInfo, $ruta);
        }else $result = $this->computadora_model->addComputadora($computadoraInfo);
        if($result == TRUE)
        {   
            $this->session->set_flashdata('success', 'Computadora ingresada con éxito');
            echo json_encode(TRUE);
        }
        else
        {
            $this->session->set_flashdata('error', 'No se pudo ingresar la computadora');
            echo json_encode(FALSE);
        }
        
        //$this->creaComputadora();
    }
    
    function editaComputadora($computadora){
        $data['computadora'] = $this->computadora_model->computadoraInfo($computadora);
        $data['proveedor'] = $this->Empresa_model->empresaListing();
        $data['marca'] = $this->equipo_model->getMarcas();
        $data['modelo'] = $this->equipo_model->getModelos();
        $this->global['pageTitle'] = 'SGI : Editar Computadora';
        $this->loadViews("editaComputadora", $this->global, $data, NULL);
    }
    
    function updateComputadora($computadora){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('serie','Numero de serie','trim|alpha_numeric_spaces|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('marca_select','Marca','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|required|max_length[20]');
        $this->form_validation->set_rules('modelo_select','Modelo','trim|required|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[50]');
        $this->form_validation->set_rules('descripcion','Descripcion','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('host','host','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[20]');
        $this->form_validation->set_rules('servicio','Servicio','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[20]');
        $this->form_validation->set_rules('proveedor_select','Proveedor','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[20]');
        $this->form_validation->set_rules('garantia','garantia','trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('expediente','Expediente','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|min_length[2]|max_length[100]');
        if($this->form_validation->run() == FALSE)
        {
            $this->editaComputadora($computadora); 
        }
        else
        {
            $serie = $this->input->post('serie');
            $marca = $this->input->post('marca_select');
            $modelo = $this->input->post('modelo_select');
            $descripcion = $this->input->post('descripcion');
            $host = $this->input->post('host');
            $servicio = $this->input->post('servicio');
            $proveedor = $this->input->post('proveedor_select');
            $garantia = $this->input->post('garantia');
            $expediente = $this->input->post('expediente');
            $fecha = $this->input->post('fecha');
            $computadoraInfo[0]['numero_serie'] = $serie;
            $computadoraInfo[0]['descripcion'] = $descripcion;
            $computadoraInfo[0]['qr'] = $this->generaQR($serie,'COM');
            $computadoraInfo[0]['marca'] = $marca;
            $computadoraInfo[0]['modelo'] = $modelo;
            $computadoraInfo[0]['host'] = $host;
            $computadoraInfo[0]['servicio'] = $servicio;
            $computadoraInfo[0]['proveedor'] = $proveedor;
            $computadoraInfo[0]['garantia'] = $garantia;
            $computadoraInfo[0]['expediente'] = $expediente;
            $computadoraInfo[0]['fecha'] = $fecha;
            $factura = 'factura';
            if (!empty($_FILES['factura']['name'])){
                $config['upload_path'] = "./assets/dist/facturas/";
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = "50000";
                $config['overwrite'] = "TRUE";
                //$config['file_name'] = "".$_FILES['factura']['name']."";
                //$ruta = "/assets/dist/facturas/".$_FILES['factura']['name'];
                $config['file_name'] = "".$serie."_computadora";
                $ruta = "/assets/dist/facturas/".$serie."_computadora.pdf";              
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload($factura)) {
                //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }
                $data['uploadSuccess'] = $this->upload->data();
                log_message('error', $ruta);
                $result = $this->computadora_model->updateComputadora($computadoraInfo,$computadora, $ruta);
            }else{
                log_message('error', "ENTRE AL ELSE");
                $result = $this->computadora_model->updateComputadora($computadoraInfo,$computadora);
            } 
            if($result == TRUE)
            {
                $this->session->set_flashdata('success', 'Computadora actualizada con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo actualizar la computadora');
            }
            $this->editaComputadora($computadora);
        }
    }
    
    function monitores(){
        $this->global['pageTitle'] = 'SGI : Listado de Monitores';
        $data['monitores'] = $this->computadora_model->monitoresListing();
        $this->loadViews("monitores", $this->global, $data, NULL);
    }   
    
    function creaMonitor(){
        $this->global['pageTitle'] = 'SGI : Crear Monitor';
        $data['marca'] = $this->equipo_model->getMarcas();
        $data['modelo'] = $this->equipo_model->getModelos();
        $data['proveedor'] = $this->Empresa_model->empresaListing();
        $this->loadViews("addmonitor", $this->global, $data, NULL);
    }
    
    function guardaMonitor(){
        $equipos = $this->input->post('equipos');
        $pulgadas = $this->input->post('pulgadas');
        $modelo = $this->input->post('modelo');
        $marca = $this->input->post('marca');
        $proveedor = $this->input->post('proveedor');
        $factura = $this->input->post('factura');
        $fecha = $this->input->post('fecha');
        $garantia = $this->input->post('garantia');
        $expediente = $this->input->post('expediente');
        
        $equipoInfo = array();
        foreach ($equipos as $key => $value) {
            $equipoInfo[$key]['numero_serie'] = $value['serial'];
            $equipoInfo[$key]['descripcion'] = $value['descripcion'];
            $equipoInfo[$key]['qr'] = $this->generaQR($value['serial'],'MON');
            $equipoInfo[$key]['pulgadas'] = $pulgadas;
            $equipoInfo[$key]['modelo'] = $modelo;
            $equipoInfo[$key]['marca'] = $marca;
            $equipoInfo[$key]['proveedor'] = $proveedor;
            $equipoInfo[$key]['fecha'] = $fecha;
            $equipoInfo[$key]['garantia'] = $garantia;
            $equipoInfo[$key]['expediente'] = $expediente;
        }
        if (!empty($_FILES['factura']['name'])){
            $config['upload_path'] = "./assets/dist/facturas/";
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = "50000";
            $config['overwrite'] = "TRUE";

            $config['file_name'] = "".$_FILES['factura']['name']."";
            $ruta = "/assets/dist/facturas/".$_FILES['factura']['name'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($factura)) {
            //*** ocurrio un error
                $data['uploadError'] = $this->upload->display_errors();
                echo $this->upload->display_errors();
                return;
            }

            $data['uploadSuccess'] = $this->upload->data();

            $result = $this->computadora_model->addMonitor($equipoInfo, $ruta);
        }else $result = $this->computadora_model->addMonitor($equipoInfo);
        if($result == TRUE)
        {   
            $this->session->set_flashdata('success', 'Monitor ingresado con éxito');
        }
        else
        {
            $this->session->set_flashdata('error', 'No se pudo ingresar el monitor');
        }
        echo json_encode($result);
    }
    
    function editarMonitor($codigo){
        $data['monitor'] = $this->computadora_model->monitorInfo($codigo);
        $data['marca'] = $this->equipo_model->getMarcas();
        $data['modelo'] = $this->equipo_model->getModelos();
        $data['proveedor'] = $this->Empresa_model->empresaListing();
        $this->global['pageTitle'] = 'SGI : Editar información del Monitor';
        $this->loadViews("editMonitor", $this->global, $data, NULL);
    }
    
    function updateMonitor($codigo){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pulgadas','Pulgadas','trim|alpha_numeric|required');
        $this->form_validation->set_rules('serie','Serie','trim|alpha_numeric|required');
        $this->form_validation->set_rules('marca_select','Marca','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|required|max_length[20]');
        $this->form_validation->set_rules('modelo_select','Modelo','trim|required|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[50]');
        $this->form_validation->set_rules('descripcion','Descripcion','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('proveedor_select','Proveedor','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[20]|required');
        $this->form_validation->set_rules('garantia','garantia','trim|alpha_numeric');
        $this->form_validation->set_rules('expediente','Expediente','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|min_length[2]|max_length[100]');
        if($this->form_validation->run() == FALSE)
        {
            $this->editarMonitor($codigo);  
        }
        else{
            $serie = $this->input->post('serie');
            $pulgadas = $this->input->post('pulgadas');
            $marca = $this->input->post('marca_select');
            $modelo = $this->input->post('modelo_select');
            $descripcion = $this->input->post('descripcion');
            $proveedor = $this->input->post('proveedor_select');
            $garantia = $this->input->post('garantia');
            $expediente = $this->input->post('expediente');
            $fecha = $this->input->post('fecha');
            $monitorInfo[0]['tipo'] = "MONITOR";
            $monitorInfo[0]['serie'] = $serie;
            $monitorInfo[0]['qr'] = $this->generaQR($serie,'MON');
            $monitorInfo[0]['descripcion'] = $descripcion;
            $monitorInfo[0]['pulgadas'] = $pulgadas;
            $monitorInfo[0]['marca'] = $marca;
            $monitorInfo[0]['modelo'] = $modelo;
            $monitorInfo[0]['proveedor'] = $proveedor;
            $monitorInfo[0]['garantia'] = $garantia;
            $monitorInfo[0]['expediente'] = $expediente;
            $monitorInfo[0]['fecha'] = $fecha;
            $factura = 'factura';
            if (!empty($_FILES['factura']['name'])){
                $config['upload_path'] = "./assets/dist/facturas/";
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = "50000";
                $config['overwrite'] = "TRUE";
                $config['file_name'] = "".$_FILES['factura']['name']."";
                $ruta = "/assets/dist/facturas/".$_FILES['factura']['name'];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload($factura)) {
                //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }
                $data['uploadSuccess'] = $this->upload->data();
                $result = $this->computadora_model->updateMonitor($monitorInfo, $codigo, $ruta);
            }else $result = $this->computadora_model->updateMonitor($monitorInfo, $codigo );
            if($result == TRUE)
            {
                $this->session->set_flashdata('success', 'Monitor creado con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo crear el monitor');
            }
            $this->editarMonitor($codigo);  
        }
    }
    
    function infoMonitor($codigo){
        $data['monitor'] = $this->computadora_model->monitorInfo($codigo);
        $this->global['pageTitle'] = 'SGI : Información del Monitor';
        $this->loadViews("infoMonitor", $this->global, $data, NULL);
    }
    
    function telefonos(){
        $this->global['pageTitle'] = 'SGI : Listado de Telefonos';
        $data['telefonos'] = $this->computadora_model->telefonosListing();
        $this->loadViews("telefonos", $this->global, $data, NULL);
    }
    
    function creaTelefono(){
        $this->global['pageTitle'] = 'SGI : Crear Telefono';
        $data['marca'] = $this->equipo_model->getMarcas();
        $data['modelo'] = $this->equipo_model->getModelos();
        $data['proveedor'] = $this->Empresa_model->empresaListing();
        $this->loadViews("addtelefono", $this->global, $data, NULL);
    }
    
    function agregarTelefono(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tipo','Tipo telefono','trim|alpha_numeric|required');
        $this->form_validation->set_rules('cantidad','Cantidad','trim|alpha_numeric|required');
        $this->form_validation->set_rules('marca_select','Marca','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|required|max_length[20]');
        $this->form_validation->set_rules('modelo_select','Modelo','trim|required|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[50]');
        $this->form_validation->set_rules('descripcion','Descripcion','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('proveedor_select','Proveedor','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[20]|required');
        $this->form_validation->set_rules('garantia','garantia','trim|alpha_numeric');
        $this->form_validation->set_rules('expediente','Expediente','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|min_length[2]|max_length[100]');
        if($this->form_validation->run() == FALSE)
        {
            $this->creaTelefono();  
        }
        else{
            $tel_tipo = $this->input->post('tipo');
            $cantidad = $this->input->post('cantidad');
            $marca = $this->input->post('marca_select');
            $modelo = $this->input->post('modelo_select');
            $descripcion = $this->input->post('descripcion');
            $proveedor = $this->input->post('proveedor_select');
            $garantia = $this->input->post('garantia');
            $expediente = $this->input->post('expediente');
            $fecha = $this->input->post('fecha');
            $telefonoInfo[0]['tipo'] = "TELEFONO";
            $telefonoInfo[0]['qr'] = $this->generaQR(mt_rand(10000000,99999999),'TEL');
            $telefonoInfo[0]['descripcion'] = $descripcion;
            $telefonoInfo[0]['tel_tipo'] = $tel_tipo;
            $telefonoInfo[0]['cantidad'] = $cantidad;
            $telefonoInfo[0]['marca'] = $marca;
            $telefonoInfo[0]['modelo'] = $modelo;
            $telefonoInfo[0]['proveedor'] = $proveedor;
            $telefonoInfo[0]['garantia'] = $garantia;
            $telefonoInfo[0]['expediente'] = $expediente;
            $telefonoInfo[0]['fecha'] = $fecha;
            $factura = 'factura';
            if (!empty($_FILES['factura']['name'])){
                $config['upload_path'] = "./assets/dist/facturas/";
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = "50000";
                $config['overwrite'] = "TRUE";
                $config['file_name'] = "".$_FILES['factura']['name']."";
                $ruta = "/assets/dist/facturas/".$_FILES['factura']['name'];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload($factura)) {
                //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }
                $data['uploadSuccess'] = $this->upload->data();
                $result = $this->computadora_model->addTelefono($telefonoInfo, $ruta);
            }else $result = $this->computadora_model->addTelefono($telefonoInfo );
            if($result == TRUE)
            {
                $this->session->set_flashdata('success', 'Telefono creado con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo crear el telefono');
            }
            redirect('creaTelefono');
        }
    }
    
    function editarTelefono($codigo){
        $data['telefono'] = $this->computadora_model->telefonoInfo($codigo);
        $data['marca'] = $this->equipo_model->getMarcas();
        $data['modelo'] = $this->equipo_model->getModelos();
        $data['proveedor'] = $this->Empresa_model->empresaListing();
        $this->global['pageTitle'] = 'SGI : Editar información del Telefono';
        $this->loadViews("editTelefono", $this->global, $data, NULL);
    }
    
    function updateTelefono($codigo){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tipo','Tipo telefono','trim|alpha_numeric|required');
        $this->form_validation->set_rules('cantidad','Cantidad','trim|alpha_numeric|required');
        $this->form_validation->set_rules('marca_select','Marca','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|required|max_length[20]');
        $this->form_validation->set_rules('modelo_select','Modelo','trim|required|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[50]');
        $this->form_validation->set_rules('descripcion','Descripcion','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('proveedor_select','Proveedor','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[20]|required');
        $this->form_validation->set_rules('garantia','garantia','trim|alpha_numeric');
        $this->form_validation->set_rules('expediente','Expediente','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|min_length[2]|max_length[100]');
        if($this->form_validation->run() == FALSE)
        {
            $this->editarTelefono($codigo);   
        }
        else{
            $tel_tipo = $this->input->post('tipo');
            $cantidad = $this->input->post('cantidad');
            $marca = $this->input->post('marca_select');
            $modelo = $this->input->post('modelo_select');
            $descripcion = $this->input->post('descripcion');
            $proveedor = $this->input->post('proveedor_select');
            $garantia = $this->input->post('garantia');
            $expediente = $this->input->post('expediente');
            $fecha = $this->input->post('fecha');
            $telefonoInfo[0]['tipo'] = "TELEFONO";
            $telefonoInfo[0]['qr'] = $this->generaQR(mt_rand(10000000,99999999),'TEL');
            $telefonoInfo[0]['descripcion'] = $descripcion;
            $telefonoInfo[0]['tel_tipo'] = $tel_tipo;
            $telefonoInfo[0]['cantidad'] = $cantidad;
            $telefonoInfo[0]['marca'] = $marca;
            $telefonoInfo[0]['modelo'] = $modelo;
            $telefonoInfo[0]['proveedor'] = $proveedor;
            $telefonoInfo[0]['garantia'] = $garantia;
            $telefonoInfo[0]['expediente'] = $expediente;
            $telefonoInfo[0]['fecha'] = $fecha;
            $factura = 'factura';
            if (!empty($_FILES['factura']['name'])){
                $config['upload_path'] = "./assets/dist/facturas/";
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = "50000";
                $config['overwrite'] = "TRUE";
                $config['file_name'] = "".$_FILES['factura']['name']."";
                $ruta = "/assets/dist/facturas/".$_FILES['factura']['name'];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload($factura)) {
                //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }
                $data['uploadSuccess'] = $this->upload->data();
                $result = $this->computadora_model->updateTelefono($telefonoInfo, $codigo, $ruta);
            }else $result = $this->computadora_model->updateTelefono($telefonoInfo, $codigo);
            if($result == TRUE)
            {
                $this->session->set_flashdata('success', 'Telefono actualizado con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo actualizar el telefono');
            }
            $this->editarTelefono($codigo); 
        }
    }
    
    function infoTelefono($codigo){
        $data['telefono'] = $this->computadora_model->telefonoInfo($codigo);
        $this->global['pageTitle'] = 'SGI : Información del Telefono';
        $this->loadViews("infoTelefono", $this->global, $data, NULL);
    }
    
    function componentes(){
        $this->global['pageTitle'] = 'SGI : Listado de Componentes';
        $data['componentes'] = $this->computadora_model->componentesListing();
        $this->loadViews("componentes", $this->global, $data, NULL);
    }
    
    function creaComponente(){
        $this->global['pageTitle'] = 'SGI : Crear Componente';
        $data['marca'] = $this->equipo_model->getMarcas();
        $data['modelo'] = $this->equipo_model->getModelos();
        $data['proveedor'] = $this->Empresa_model->empresaListing();
        $this->loadViews("addcomponente", $this->global, $data, NULL);
    }
    
    function agregarComponente(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tipo','Tipo','trim|alpha_numeric|required');
        /*$this->form_validation->set_rules('otro','Otro','trim|alpha_numeric|');
        $this->form_validation->set_rules('puerto_teclado','Puerto teclado','trim|alpha_numeric|');
        $this->form_validation->set_rules('conex','Conexion','trim|alpha_numeric|');
        $this->form_validation->set_rules('puerto_raton','Puerto raton','trim|alpha_numeric|');
        $this->form_validation->set_rules('capasidad','Capasidad','trim|alpha_numeric|');
        $this->form_validation->set_rules('tipo_disco','Tipo disco','trim|alpha_numeric|');
        $this->form_validation->set_rules('potencia','Potencia','trim|alpha_numeric|');
        $this->form_validation->set_rules('cantidad','Cantidad','trim|alpha_numeric|');*/
        $this->form_validation->set_rules('marca_select','Marca','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|required|max_length[20]');
        $this->form_validation->set_rules('modelo_select','Modelo','trim|required|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[50]');
        $this->form_validation->set_rules('proveedor_select','Proveedor','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[20]|required');
        $this->form_validation->set_rules('garantia','garantia','trim|alpha_numeric');
        $this->form_validation->set_rules('expediente','Expediente','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|min_length[2]|max_length[100]');
        if($this->form_validation->run() == FALSE)
        {
            $this->creaComponente();  
        }
        else{
            $tipo = $this->input->post('tipo');
            $otro = $this->input->post('otro');
            $puerto_teclado = $this->input->post('puerto_teclado');
            $conex = $this->input->post('conex');
            $puerto_raton = $this->input->post('puerto_raton');
            $capasidad = $this->input->post('capasidad');
            $tipo_disco = $this->input->post('tipo_disco');
            $potencia = $this->input->post('potencia');
            $cantidad = $this->input->post('cantidad');
            $marca = $this->input->post('marca_select');
            $modelo = $this->input->post('modelo_select');
            $proveedor = $this->input->post('proveedor_select');
            $garantia = $this->input->post('garantia');
            $expediente = $this->input->post('expediente');
            $fecha = $this->input->post('fecha');
            switch ($tipo) {
                case 'TECLADO':
                    $compo = 'TEC';
                    $componenteInfo[0]['puerto'] = $puerto_teclado;
                    if ($puerto_teclado == 'INALAMBRICO'){
                        $descripcion = "El teclado tiene conexion ".$puerto_teclado." por medio de ".$conex;
                        $componenteInfo[0]['conex_puerto'] = $conex;
                    }    
                    else $descripcion = "El teclado tiene conexion ".$puerto_teclado;
                    break;
                case 'RATON':
                    $compo = 'RAT';
                    $componenteInfo[0]['puerto'] = $puerto_raton;
                    if ($puerto_raton == 'INALAMBRICO'){
                        $descripcion = "El raton tiene conexion ".$puerto_raton." por medio de ".$conex;
                        $componenteInfo[0]['conex_puerto'] = $conex;
                    }    
                    else $descripcion = "El raton tiene conexion ".$puerto_raton;
                    break;
                case 'DISCO':
                    $compo = 'HDD';
                    $componenteInfo[0]['capasidad'] = $capasidad;
                    $componenteInfo[0]['tipo_disco'] = $tipo_disco;
                    $descripcion = "El disco duro es de tipo ".$tipo_disco." y tiene una capacidad de ".$capasidad."GB";
                    break;
                case 'FUENTE':
                    $compo = 'POW';
                    $componenteInfo[0]['potencia'] = $potencia;
                    $descripcion = "La fuente tiene una potencia de ".$potencia;
                    break;
                case 'OTRO':
                    $compo = 'OTRO';
                    $descripcion = $otro;
                    break;
            }
            $componenteInfo[0]['qr'] = $this->generaQR(mt_rand(10000000,99999999),$compo);
            $componenteInfo[0]['tipo'] = $tipo;
            $componenteInfo[0]['descripcion'] = $descripcion;
            $componenteInfo[0]['cantidad'] = $cantidad;
            $componenteInfo[0]['marca'] = $marca;
            $componenteInfo[0]['modelo'] = $modelo;
            $componenteInfo[0]['proveedor'] = $proveedor;
            $componenteInfo[0]['garantia'] = $garantia;
            $componenteInfo[0]['expediente'] = $expediente;
            $componenteInfo[0]['fecha'] = $fecha;
            $factura = 'factura';
            if (!empty($_FILES['factura']['name'])){
                $config['upload_path'] = "./assets/dist/facturas/";
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = "50000";
                $config['overwrite'] = "TRUE";
                $config['file_name'] = "".$_FILES['factura']['name']."";
                $ruta = "/assets/dist/facturas/".$_FILES['factura']['name'];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload($factura)) {
                //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }
                $data['uploadSuccess'] = $this->upload->data();
                $result = $this->computadora_model->addComponente($componenteInfo, $ruta);
            }else $result = $this->computadora_model->addComponente($componenteInfo );
            if($result == TRUE)
            {
                $this->session->set_flashdata('success', 'Componente creado con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo crear el componente');
            }
            redirect('creaComponente');
        }
    }
    
    function editarComponente($codigo){
        $data['componente'] = $this->computadora_model->componenteInfo($codigo);
        $data['marca'] = $this->equipo_model->getMarcas();
        $data['modelo'] = $this->equipo_model->getModelos();
        $data['proveedor'] = $this->Empresa_model->empresaListing();
        $this->global['pageTitle'] = 'SGI : Editar información del Componente';
        $this->loadViews("editComponente", $this->global, $data, NULL);
    }
    
    function updateComponente($codigo){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tipo','Tipo','trim|alpha_numeric');
        $this->form_validation->set_rules('descripcion','Descripcion','trim|alpha_numeric');
        /*$this->form_validation->set_rules('otro','Otro','trim|alpha_numeric|');
        $this->form_validation->set_rules('puerto_teclado','Puerto teclado','trim|alpha_numeric|');
        $this->form_validation->set_rules('conex','Conexion','trim|alpha_numeric|');
        $this->form_validation->set_rules('puerto_raton','Puerto raton','trim|alpha_numeric|');
        $this->form_validation->set_rules('capasidad','Capasidad','trim|alpha_numeric|');
        $this->form_validation->set_rules('tipo_disco','Tipo disco','trim|alpha_numeric|');
        $this->form_validation->set_rules('potencia','Potencia','trim|alpha_numeric|');
        $this->form_validation->set_rules('cantidad','Cantidad','trim|alpha_numeric|');*/
        $this->form_validation->set_rules('marca_select','Marca','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|required|max_length[20]');
        $this->form_validation->set_rules('modelo_select','Modelo','trim|required|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[50]');
        $this->form_validation->set_rules('proveedor_select','Proveedor','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[20]|required');
        $this->form_validation->set_rules('garantia','garantia','trim|alpha_numeric');
        $this->form_validation->set_rules('expediente','Expediente','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|min_length[2]|max_length[100]');
        if($this->form_validation->run() == FALSE)
        {
            $this->editarComponente($codigo);   
        }
        else{
            $tipo = $this->input->post('tipo');
            $otro = $this->input->post('otro');
            $puerto_teclado = $this->input->post('puerto_teclado');
            $conex = $this->input->post('conex');
            $puerto_raton = $this->input->post('puerto_raton');
            $capasidad = $this->input->post('capasidad');
            $tipo_disco = $this->input->post('tipo_disco');
            $potencia = $this->input->post('potencia');
            $cantidad = $this->input->post('cantidad');
            $marca = $this->input->post('marca_select');
            $modelo = $this->input->post('modelo_select');
            $proveedor = $this->input->post('proveedor_select');
            $garantia = $this->input->post('garantia');
            $expediente = $this->input->post('expediente');
            $fecha = $this->input->post('fecha');
            log_message('error', $tipo);
            switch ($tipo) {
                case 'TECLADO':
                    $compo = 'TEC';
                    $componenteInfo[0]['puerto'] = $puerto_teclado;
                    if ($puerto_teclado == 'INALAMBRICO'){
                        $descripcion = "El teclado tiene conexion ".$puerto_teclado." por medio de ".$conex;
                        $componenteInfo[0]['conex_puerto'] = $conex;
                    }    
                    else{ 
                        $descripcion = "El teclado tiene conexion ".$puerto_teclado;
                        $componenteInfo[0]['conex_puerto'] = $conex;
                    }
                    break;
                case 'RATON':
                    $compo = 'RAT';
                    $componenteInfo[0]['puerto'] = $puerto_raton;
                    if ($puerto_raton == 'INALAMBRICO'){
                        $descripcion = "El raton tiene conexion ".$puerto_raton." por medio de ".$conex;
                        $componenteInfo[0]['conex_puerto'] = $conex;
                    }
                    else{ 
                        $descripcion = "El raton tiene conexion ".$puerto_raton;
                        $componenteInfo[0]['conex_puerto'] = $conex;
                    }                    
                    break;
                case 'DISCO':
                    $compo = 'HDD';
                    $componenteInfo[0]['capasidad'] = $capasidad;
                    $componenteInfo[0]['tipo_disco'] = $tipo_disco;
                    $descripcion = "El disco duro es de tipo ".$tipo_disco." y tiene una capacidad de ".$capasidad."GB";
                    break;
                case 'FUENTE':
                    $compo = 'POW';
                    $componenteInfo[0]['potencia'] = $potencia;
                    $descripcion = "La fuente tiene una potencia de ".$potencia;
                    break;
                case 'OTRO':
                    $compo = 'OTRO';
                    $descripcion = $otro;
                    break;
            }
            $componenteInfo[0]['qr'] = $this->generaQR(mt_rand(10000000,99999999),$compo);
            $componenteInfo[0]['tipo'] = $tipo;
            $componenteInfo[0]['descripcion'] = $descripcion;
            $componenteInfo[0]['cantidad'] = $cantidad;
            $componenteInfo[0]['marca'] = $marca;
            $componenteInfo[0]['modelo'] = $modelo;
            $componenteInfo[0]['proveedor'] = $proveedor;
            $componenteInfo[0]['garantia'] = $garantia;
            $componenteInfo[0]['expediente'] = $expediente;
            $componenteInfo[0]['fecha'] = $fecha;
            $factura = 'factura';
            if (!empty($_FILES['factura']['name'])){
                $config['upload_path'] = "./assets/dist/facturas/";
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = "50000";
                $config['overwrite'] = "TRUE";
                $config['file_name'] = "".$_FILES['factura']['name']."";
                $ruta = "/assets/dist/facturas/".$_FILES['factura']['name'];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload($factura)) {
                //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }
                $data['uploadSuccess'] = $this->upload->data();
                $result = $this->computadora_model->updateComponente($componenteInfo, $codigo, $ruta);
            }else $result = $this->computadora_model->updateComponente($componenteInfo, $codigo);
            if($result == TRUE)
            {
                $this->session->set_flashdata('success', 'Componente actualizado con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo actualizar el componente');
            }
            $this->editarComponente($codigo);
        }
    }
    
    function infoComponente($codigo){
        $data['componente'] = $this->computadora_model->componenteInfo($codigo);
        $this->global['pageTitle'] = 'SGI : Información del Componente';
        $this->loadViews("infoComponente", $this->global, $data, NULL);
    }
    
    function generaQR($serial='error', $tipo) 
    {
        $this->load->library('ciqrcode');            
        //hacemos configuraciones
        $params['data'] = $serial;
        $params['level'] = 'H';
        $params['size'] = 4;
        //decimos el directorio a guardar el codigo qr
        $params['savename'] = "./assets/dist/img/qr/".$tipo."_".$serial.".png";
        //generamos el código qr
        $this->ciqrcode->generate($params);
        $qr = "./assets/dist/img/qr/".$tipo."_".$serial.".png";
        $mini = "min_".$tipo."_".$serial.".png";
        $this->miniatura($qr,$mini,30,30);
        return $params['savename'];
    }
    function miniatura($archivo, $local, $ancho, $alto) //parámetros 4 valores: El archivo de la imagen, el nombre del archivo en local, ancho y alto extraido de Web: CableNaranja.com
    {    
        $arrNombre = explode(".", $local);
        $nombre = $arrNombre[0];
        $extension = $arrNombre[1];
        if($extension=="jpg" || $extension=="jpeg") $nuevo = imagecreatefromjpeg($archivo);
        if($extension=="png") $nuevo = imagecreatefrompng($archivo);
        if($extension=="gif") $nuevo = imagecreatefromgif($archivo);
        $thumb = imagecreatetruecolor($ancho, $alto);
        $ancho_original = imagesx($nuevo);
        $alto_original = imagesy($nuevo);
        imagecopyresampled($thumb,$nuevo,0,0,0,0,$ancho,$alto,$ancho_original,$alto_original);
        $thumb_name = "$nombre.$extension";
        if($extension=="jpg" || $extension=="jpeg") imagejpeg($thumb, './assets/dist/img/qr/'.$thumb_name,90); // 90 es la calidad de compresión
        if($extension=="png") imagepng($thumb, './assets/dist/img/qr/'.$thumb_name);
        if($extension=="gif") imagegif($thumb, './assets/dist/img/qr/'.$thumb_name);
    }
}    