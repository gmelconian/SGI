<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Insumo extends BaseController{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('insumo_model');
        $this->load->model('equipo_model');
        $this->load->model('empresa_model');
        $this->isLoggedIn();   
    }

    function insumosList(){
        $this->global['pageTitle'] = 'SGI : Insumos';
        $data['insumos'] = $this->insumo_model->insumosListing();
        $this->loadViews("insumos", $this->global, $data , NULL);   
    }
    
    function creaInsumo()
    {
        $this->global['pageTitle'] = 'SGI : Crear Insumos';
        $data['impresora'] = $this->equipo_model->getImpresoras();
        $data['marca'] = $this->equipo_model->getMarcas();
        $data['modelo'] = $this->equipo_model->getModelos();
        $data['proveedor'] = $this->empresa_model->empresaListing();
        $this->loadViews("addinsumos", $this->global, $data, NULL);
    }
    
    function agregarInsumo()
    { 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tipo','tipo','required');
        $this->form_validation->set_rules('copias','Numero de copias','trim|alpha_numeric_spaces|required');
        $this->form_validation->set_rules('cantidad','Cantidad','trim|alpha_numeric_spaces|required');
        $this->form_validation->set_rules('marca_select','Marca','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|required|max_length[20]');
        $this->form_validation->set_rules('modelo_select','Modelo','trim|required|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[50]');
        $this->form_validation->set_rules('descripcion','Descripcion','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('proveedor_select','Proveedor','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[20]|required');
        $this->form_validation->set_rules('garantia','garantia','trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('expediente','Expediente','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|min_length[2]|max_length[100]');
        if($this->form_validation->run() == FALSE)
        {
            $this->creaInsumo();  
        }
        else
        {
            $tipo = $this->input->post('tipo');
            $impresora = $this->input->post('impresora');
            $copias = $this->input->post('copias');
            $cantidad = $this->input->post('cantidad');
            $marca = $this->input->post('marca_select');
            $modelo = $this->input->post('modelo_select');
            $descripcion = $this->input->post('descripcion');
            $proveedor = $this->input->post('proveedor_select');
            $garantia = $this->input->post('garantia');
            $expediente = $this->input->post('expediente');
            $fecha = $this->input->post('fecha');
            
            log_message('error', $fecha);
            $insumoInfo[0]['qr'] = $this->generaQR(mt_rand(10000000,99999999),'INS');
            $insumoInfo[0]['tipo'] = $tipo;
            $insumoInfo[0]['descripcion'] = $descripcion;
            $insumoInfo[0]['copias'] = $copias;
            $insumoInfo[0]['cantidad'] = $cantidad;
            $insumoInfo[0]['marca'] = $marca;
            $insumoInfo[0]['modelo'] = $modelo;
            $insumoInfo[0]['proveedor'] = $proveedor;
            $insumoInfo[0]['garantia'] = $garantia;
            $insumoInfo[0]['expediente'] = $expediente;
            $insumoInfo[0]['fecha'] = $fecha;
            
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

                $result = $this->insumo_model->addInsumo($insumoInfo, $impresora, $ruta);
            }else $result = $this->insumo_model->addInsumo($insumoInfo,$impresora );
            
            if($result == TRUE)
            {
                $this->session->set_flashdata('success', 'Insumo creado con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo crear el insumo');
            }
            redirect('creaInsumo');
        }   
    }
    
    function infoInsumo($codigo){
        $data['insumo'] = $this->insumo_model->insumoInfo($codigo);
        $this->global['pageTitle'] = 'SGI : Información de Insumos';
        $this->loadViews("infoInsumo", $this->global, $data, NULL);
    }
    
    function editarinsumo($codigo){
        $data['insumo'] = $this->insumo_model->insumoInfo($codigo);
        $data['impresora'] = $this->equipo_model->getImpresoras();
        $data['insumo_asignado'] = $this->equipo_model->getImpresoraInsumo($codigo);
        $data['insumo_no_asignado'] = $this->equipo_model->getImpresoraNoInsumo($codigo);
        $data['marca'] = $this->equipo_model->getMarcas();
        $data['modelo'] = $this->equipo_model->getModelos();
        $data['proveedor'] = $this->empresa_model->empresaListing();
        $this->global['pageTitle'] = 'SGI : Editar información de Insumos';
        $this->loadViews("editInsumo", $this->global, $data, NULL);
    }
    
    function updateInsumo($codigo){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('tipo','tipo','required');
        $this->form_validation->set_rules('copias','Numero de copias','trim|alpha_numeric_spaces|required');
        $this->form_validation->set_rules('cantidad','Cantidad','trim|alpha_numeric_spaces|required');
        $this->form_validation->set_rules('marca_select','Marca','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|required|max_length[20]');
        $this->form_validation->set_rules('modelo_select','Modelo','trim|required|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[50]');
        $this->form_validation->set_rules('descripcion','Descripcion','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('proveedor_select','Proveedor','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚú:@]+$/]|max_length[20]|required');
        $this->form_validation->set_rules('garantia','garantia','trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('expediente','Expediente','trim|regex_match[/^[A-Za-z0-9_ \/.\-;ÁáÉéÍíÓóÚúñ:@]+$/]|min_length[2]|max_length[100]');
        if($this->form_validation->run() == FALSE)
        {
            $this->editarinsumo($codigo);  
        }
        else
        {
            $tipo = $this->input->post('tipo');
            $impresora = $this->input->post('impresora');
            $copias = $this->input->post('copias');
            $cantidad = $this->input->post('cantidad');
            $marca = $this->input->post('marca_select');
            $modelo = $this->input->post('modelo_select');
            $descripcion = $this->input->post('descripcion');
            $proveedor = $this->input->post('proveedor_select');
            $garantia = $this->input->post('garantia');
            $expediente = $this->input->post('expediente');
            $fecha = $this->input->post('fecha');
            $insumoInfo[0]['qr'] = $this->generaQR(mt_rand(10000000,99999999),'INS');
            $insumoInfo[0]['tipo'] = $tipo;
            $insumoInfo[0]['descripcion'] = $descripcion;
            $insumoInfo[0]['copias'] = $copias;
            $insumoInfo[0]['cantidad'] = $cantidad;
            $insumoInfo[0]['marca'] = $marca;
            $insumoInfo[0]['modelo'] = $modelo;
            $insumoInfo[0]['proveedor'] = $proveedor;
            $insumoInfo[0]['garantia'] = $garantia;
            $insumoInfo[0]['expediente'] = $expediente;
            $insumoInfo[0]['fecha'] = $fecha;
            
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

                $result = $this->insumo_model->updateInsumo($insumoInfo, $codigo,$impresora,$ruta);
            }else $result = $this->insumo_model->updateInsumo($insumoInfo, $codigo,$impresora);
            
            if($result == TRUE)
            {
                $this->session->set_flashdata('success', 'Insumo actualizado con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo actualizar el insumo');
            }
            $this->editarinsumo($codigo);
        }
    }
    
    function eliminareinsumo()
    {
        $this->global['pageTitle'] = 'SGI : Insumos';      
        $codigoInsumo=$this->input->post('insumo');
        $result = $this->insumo_model->deleteInsumo($codigoInsumo);  
        if ($result > 0)
        {
            echo(json_encode(array('status'=>TRUE))); 
        }
        else 
        { 
            echo(json_encode(array('status'=>FALSE))); 
        }
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
?>