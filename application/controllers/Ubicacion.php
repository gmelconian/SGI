<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Ubicacion extends BaseController{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ubicacion_model');
        $this->isLoggedIn();   
    }
    
    function getEdificios()
    {
        $this->global['pageTitle'] = 'SGI :Edificios';
        $data['edificios'] = $this->ubicacion_model->edificioListing();
        $this->loadViews("edificio", $this->global, $data , NULL);
    }
    
    function getOficinas()
    {
        $this->global['pageTitle'] = 'SGI :Oficinas';
        $data['oficinas'] = $this->ubicacion_model->oficinasListing();
        $this->loadViews("oficina", $this->global, $data , NULL);
    }
    
    function altaEdificios()
    {
        $this->global['pageTitle'] = 'SGI :Edificios';
        $this->loadViews("addedificio", $this->global, NULL , NULL); 
    }
    
    function altaOficina()
    {
        $this->global['pageTitle'] = 'SGI :Oficinas';
        $data['edificios'] = $this->ubicacion_model->edificioListing();
        $this->loadViews("addoficinas", $this->global, $data , NULL); 
    }
    
    function addNewEdificio(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname','Nombre','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        //$this->form_validation->set_rules('departamento','Departamento','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|');
        $this->form_validation->set_rules('ciudad','Ciudad','required');
        $this->form_validation->set_rules('calle','Calle','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        //$this->form_validation->set_rules('numero','Numero','trim||max_length[128]');
        //$this->form_validation->set_rules('latitud','Latitud','trim|alpha_numeric||max_length[15]|min_length[8]');
        //$this->form_validation->set_rules('longitud','Longitud','trim|alpha_numeric||max_length[15]|min_length[8]');
        //$this->form_validation->set_rules('referencia','Referencia','trim|');
        if($this->form_validation->run() == FALSE)
        {
            $this->altaEdificios();
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $departamento = ucwords(strtolower($this->security->xss_clean($this->input->post('departamento'))));
            $ciudad = strtolower($this->security->xss_clean($this->input->post('ciudad')));
            $calle = $this->security->xss_clean($this->input->post('calle'));
            $numero = $this->security->xss_clean($this->input->post('numero'));
            $latitud = $this->security->xss_clean($this->input->post('latitud'));
            $longitud = $this->security->xss_clean($this->input->post('longitud'));
            $referencia = $this->security->xss_clean($this->input->post('referencia'));
            $edificio = array('nombre' => $name , 'departamento' => $departamento, 'ciudad' => $ciudad, 'calle' => $calle, 'numero' => $numero, 'latitud' => $latitud, 'longitud' => $longitud, 'referencia' => $referencia);
            $result = $this->ubicacion_model->addEedificio($edificio);
            if($result > 0)
            {
                //$mensaje="Hola ".$name.", su usuario ah sido creado con exito,Usuario: ".$login;
                //$envio=$this->user_model->enviar_mail_nuevo_usuario($email,$mensaje);
                $this->session->set_flashdata('success', 'Edificio creado con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'Lo sentimos, no se pudo crear el edificio');
            }
            redirect('edificio');
        }    
    }
    
    function addNewOficina(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname','Nombre','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('edificio','Edificio','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required');
        $this->form_validation->set_rules('unidad','Unidad','required|numeric|max_length[20]');
        //$this->form_validation->set_rules('piso','Piso','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|');
        //$this->form_validation->set_rules('telefono','Telefono','trim|required|');
        $this->form_validation->set_rules('correo','correo','trim|required|valid_email');
        $this->form_validation->set_rules('responsable','Responsable','trim|alpha_numeric|required');
        $this->form_validation->set_rules('referencia','Referencia','trim|alpha_numeric|');
        if($this->form_validation->run() == FALSE)
        {
            $this->altaOficina();
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $edificio = ucwords(strtolower($this->security->xss_clean($this->input->post('edificio'))));
            $unidad = strtolower($this->security->xss_clean($this->input->post('unidad')));
            $piso = $this->security->xss_clean($this->input->post('piso'));
            $telefono = $this->security->xss_clean($this->input->post('telefono'));
            $correo = $this->security->xss_clean($this->input->post('correo'));
            $responsable = $this->security->xss_clean($this->input->post('responsable'));
            $referencia = $this->security->xss_clean($this->input->post('referencia'));
            $oficina = array('nombre' => $name , 'codigo_edificio' => $edificio, 'unidad' => $unidad, 'piso' => $piso, 'telefono' => $telefono, 'correo' => $correo, 'responsable' => $responsable, 'referencia' => $referencia);
            $result = $this->ubicacion_model->addOficina($oficina);
            if($result > 0)
            {
                //$mensaje="Hola ".$name.", su usuario ah sido creado con exito,Usuario: ".$login;
                //$envio=$this->user_model->enviar_mail_nuevo_usuario($email,$mensaje);
                $this->session->set_flashdata('success', 'Oficina creada con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'Lo sentimos, no se pudo crear la oficina');
            }
            redirect('oficina');
        }
    }
    
    function infoOficina($oficina){
        $this->global['pageTitle'] = 'SGI :Informacion de la Oficina';
        if($oficina == null)
        {
            redirect('oficina');
        }
        $data['oficina'] = $this->ubicacion_model->getOficinaInfo($oficina);
        $this->loadViews("infoOficina", $this->global, $data , NULL);
    }
    
    function infoEdificio($edificio){
        $this->global['pageTitle'] = 'SGI :Informacion del Edificio';
        if($edificio == null)
        {
            redirect('edificio');
        }
        $data['edificio'] = $this->ubicacion_model->getEdificioInfo($edificio);
        $this->loadViews("infoEdificio", $this->global, $data , NULL);
    }
    
    function editOficina($oficina){
        $this->global['pageTitle'] = 'SGI :Actualización de la Oficina';
        if($oficina == null)
        {
            redirect('oficina');
        }
        $data['oficina'] = $this->ubicacion_model->getOficinaInfo($oficina);
        $data['edificio'] = $this->ubicacion_model->edificioListing();
        $this->loadViews("editOficina", $this->global, $data , NULL);
    }
    
    function editEdificio($edificio){
        $this->global['pageTitle'] = 'SGI :Actualización del Edificio';
        if($edificio == null)
        {
            redirect('edificio');
        }
        $data['edificio'] = $this->ubicacion_model->getEdificioInfo($edificio);
        $this->loadViews("editEdificio", $this->global, $data , NULL);
    }
            
    function updateOficina($codigo){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname','Nombre','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('edificio','Edificio','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required');
        $this->form_validation->set_rules('unidad','Unidad','required|numeric|max_length[20]');
        //$this->form_validation->set_rules('piso','Piso','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|');
        //$this->form_validation->set_rules('telefono','Telefono','trim|required|');
        $this->form_validation->set_rules('correo','correo','trim|required|valid_email');
        $this->form_validation->set_rules('responsable','Responsable','trim|required');
        //$this->form_validation->set_rules('referencia','Referencia','trim|');
        if($this->form_validation->run() == FALSE)
        {
            $this->editOficina($codigo);
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $edificio = ucwords(strtolower($this->security->xss_clean($this->input->post('edificio'))));
            $unidad = strtolower($this->security->xss_clean($this->input->post('unidad')));
            $piso = $this->security->xss_clean($this->input->post('piso'));
            $telefono = $this->security->xss_clean($this->input->post('telefono'));
            $correo = $this->security->xss_clean($this->input->post('correo'));
            $responsable = $this->security->xss_clean($this->input->post('responsable'));
            $referencia = $this->security->xss_clean($this->input->post('referencia'));
            $oficina = array('nombre' => $name , 'codigo_edificio' => $edificio, 'unidad' => $unidad, 'piso' => $piso, 'telefono' => $telefono, 'correo' => $correo, 'responsable' => $responsable, 'referencia' => $referencia);
            $result = $this->ubicacion_model->updateOficina($codigo,$oficina);
            if($result == true)
            {
                $this->session->set_flashdata('success', 'Oficina modificada con éxito' );
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo modificar la oficina');
            }
            $this->editOficina($codigo);
        }
    }
    
    function updateEdificio($codigo){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname','Nombre','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        //$this->form_validation->set_rules('departamento','Departamento','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|');
        $this->form_validation->set_rules('ciudad','Ciudad','required');
        $this->form_validation->set_rules('calle','Calle','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        //$this->form_validation->set_rules('numero','Numero','trim||max_length[128]');
        //$this->form_validation->set_rules('latitud','Latitud','trim|alpha_numeric||max_length[15]|min_length[8]');
        //$this->form_validation->set_rules('longitud','Longitud','trim|alpha_numeric||max_length[15]|min_length[8]');
        //$this->form_validation->set_rules('referencia','Referencia','trim|');
        if($this->form_validation->run() == FALSE)
        {
            $this->editEdificio($codigo);
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $departamento = ucwords(strtolower($this->security->xss_clean($this->input->post('departamento'))));
            $ciudad = strtolower($this->security->xss_clean($this->input->post('ciudad')));
            $calle = $this->security->xss_clean($this->input->post('calle'));
            $numero = $this->security->xss_clean($this->input->post('numero'));
            $latitud = $this->security->xss_clean($this->input->post('latitud'));
            $longitud = $this->security->xss_clean($this->input->post('longitud'));
            $referencia = $this->security->xss_clean($this->input->post('referencia'));
            $edificio = array('nombre' => $name , 'departamento' => $departamento, 'ciudad' => $ciudad, 'calle' => $calle, 'numero' => $numero, 'latitud' => $latitud, 'longitud' => $longitud, 'referencia' => $referencia);
            $result = $this->ubicacion_model->updateEdificio($codigo,$edificio);
            if($result == true)
            {
                $this->session->set_flashdata('success', 'Edificio modificado con éxito' );
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo modificar el edificio');
            }
            $this->editEdificio($codigo);
        }
    }
    
    function deleteOficina(){
        $codigo = $this->input->post('codigo_oficina');
        $oficina = array('activo'=>0 );
        $result = $this->ubicacion_model->deleteOficina($codigo, $oficina);
        if ($result) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }
    
    function deleteEdificio(){
        $codigo = $this->input->post('codigo_edificio');
        $edificio = array('activo'=>0 );
        $result = $this->ubicacion_model->deleteEdificio($codigo, $edificio);
        if ($result) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }
    
    function asignaOficina($login){
        $this->global['pageTitle'] = 'SGI :Asignar Oficina';
        $data['oficina'] = $this->ubicacion_model->oficinasListing();
        $data['login'] = $login;
        $this->loadViews("asignaOficina", $this->global, $data , NULL);
    }
    
    function personaUbicacion(){
        $oficina = $this->input->post('oficina');
        $login = $this->input->post('login');
        $edificio = $this->ubicacion_model->getOficinaInfo($oficina);
        $ubicacion = array('codigo_edificio' => $edificio->edificio_codigo , 'codigo_oficina' => $oficina);
        $persona = array('login_persona'=> $login, 'codigo_edificio' => $edificio->edificio_codigo , 'codigo_oficina' => $oficina);
        $existeUbicacion = $this->ubicacion_model->existeUbicacion($oficina, $edificio->edificio_codigo);
        $existePersonaUbicacion = $this->ubicacion_model->existePersonaUbicacion($login,$oficina, $edificio->edificio_codigo);
        if($existeUbicacion == TRUE && $existePersonaUbicacion == TRUE){
            $result = true;
            $this->session->set_flashdata('success', 'La persona ya esta asignada a la oficina' );            
        }elseif ($existeUbicacion == TRUE && $existePersonaUbicacion == FALSE) {
            $result = $this->ubicacion_model->personaUbicacion($persona);
        }elseif($existePersonaUbicacion == TRUE && $existeUbicacion == FALSE) $result = $this->ubicacion_model->personaUbicacion($persona="NULL", $ubicacion);                
        if($result == true)
        {
            $this->session->set_flashdata('success', 'Persona asignada con éxito' );
        }
        else
        {
            $this->session->set_flashdata('error', 'No se pudo asignar la persona');
        }
        $this->asignaOficina($login);
    }
}
?>

