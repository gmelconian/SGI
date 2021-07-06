<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Impresora extends BaseController{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('impresora_model');
        $this->load->model('equipo_model');
        $this->load->model('Empresa_model');
        $this->isLoggedIn();         
    }
    
    function imresorasList(){
        $this->global['pageTitle'] = 'SGI : Impresoras';
        $data['equipo'] = $this->impresora_model->equipoListing();
        $this->loadViews("equipos", $this->global, $data , NULL);   
    }
    
    function creaEquiposL()
    {              
        $this->global['pageTitle'] = 'SGI : Crear Impresoras';
        $data['marca'] = $this->equipo_model->getMarcas();
        $data['modelo'] = $this->equipo_model->getModelos();
        $data['proveedor'] = $this->Empresa_model->empresaListing();
        $this->loadViews("addequipos", $this->global, $data, NULL);
    }

    function eliminarequiposL()
    {
        $this->global['pageTitle'] = 'SGI : Impresoras';      
        $codigoEquipo=$this->input->post('equipo');
        $result = $this->impresora_model->deleteEquipo($codigoEquipo);  
        if ($result > 0)
        {
            echo(json_encode(array('status'=>TRUE))); 
        }
        else 
        { 
            echo(json_encode(array('status'=>FALSE))); 
        }
    }

    function updateEquipos($codigoEquipo)
    { 
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
            $this->editarequiposL($codigoEquipo);  
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
            
            $equipoInfo[0]['numero_serie'] = $serie;
            $equipoInfo[0]['descripcion'] = $descripcion;
            $equipoInfo[0]['qr'] = $this->generaQR($serie,'IMP');
            $equipoInfo[0]['marca'] = $marca;
            $equipoInfo[0]['modelo'] = $modelo;
            $equipoInfo[0]['host'] = $host;
            $equipoInfo[0]['servicio'] = $servicio;
            $equipoInfo[0]['proveedor'] = $proveedor;
            $equipoInfo[0]['garantia'] = $garantia;
            $equipoInfo[0]['expediente'] = $expediente;
            $equipoInfo[0]['fecha'] = $fecha;
            
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

                $result = $this->impresora_model->updateEquipo($equipoInfo,$codigoEquipo, $ruta);
            }else $result = $this->impresora_model->updateEquipo($equipoInfo, $codigoEquipo);
            if($result == TRUE)
            {
                $this->session->set_flashdata('success', 'Impresora actualizada con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo actualizar la impresora');
            }
            $this->editarequiposL($codigoEquipo);
        }   
    }
    
    function editarequiposL($editequipo) 
    {
        $data['equipo'] = $this->impresora_model->equipoInfo($editequipo);
        $data['proveedor'] = $this->Empresa_model->empresaListing();
        $data['marca'] = $this->equipo_model->getMarcas();
        $data['modelo'] = $this->equipo_model->getModelos();
        $this->global['pageTitle'] = 'SGI : Editar Impresoras';
        $this->loadViews("editarequipos", $this->global, $data, NULL);
    }

    function infoEquiposL($editequipo)
    {
        $data['equipo'] = $this->impresora_model->equipoInfo($editequipo);
        $this->global['pageTitle'] = 'SGI : Información de Impresoras';
        $this->loadViews("infoEquipo", $this->global, $data, NULL);
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
    
    function guardaImpresora(){
        $equipos = $this->input->post('equipos');
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
            $equipoInfo[$key]['qr'] = $this->generaQR($value['serial'],'IMP');
            $equipoInfo[$key]['host'] = $value['host'];
            $equipoInfo[$key]['servicio'] = $value['servicio'];
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

            $result = $this->impresora_model->addEquipo($equipoInfo, $ruta);
        }else $result = $this->impresora_model->addEquipo($equipoInfo);
        if($result == TRUE)
        {   
            $this->session->set_flashdata('success', 'Impresora ingresada con éxito');
        }
        else
        {
            $this->session->set_flashdata('error', 'No se pudo ingresada la impresora');
        }
        echo json_encode($result);
    }
  }
?>