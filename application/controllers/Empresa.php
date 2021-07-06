<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Empresa extends BaseController{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Empresa_model');
        $this->load->model('equipo_model');
        $this->load->model('user_model');
        $this->isLoggedIn();   
    }
    
    public function empresaL()
    {
        $this->global['pageTitle'] = 'SGI :Provedores';
        $this->loadViews("addEmpresa", $this->global, NULL , NULL);
    }
    
    function addNewEmpresa()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname','Nombre','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('razon_social','Razon social','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('rut','Rut','required|numeric|max_length[20]');
        $this->form_validation->set_rules('contacto','Contacto','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]|is_unique[usuario.email]');
        $this->form_validation->set_rules('telefono','Telefono','trim|alpha_numeric|required|max_length[15]|min_length[8]');
        if($this->form_validation->run() == FALSE)
        {
            $this->empresaL();
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $apellido = ucwords(strtolower($this->security->xss_clean($this->input->post('razon_social'))));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $telefono = $this->security->xss_clean($this->input->post('telefono'));
            $rut = $this->security->xss_clean($this->input->post('rut'));
            $contacto = $this->security->xss_clean($this->input->post('contacto'));
            
            $empresasInfo = array('rut' => $rut , 'nombre_fantacia' => $name, 'razon_social' => $apellido, 'email' => $email, 'telefono' => $telefono, 'contacto' => $contacto);

            $result = $this->Empresa_model->addEmpresa($empresasInfo);
            if($result > 0)
            {
                $mensaje="Hola ".$name.", su usuario ah sido creado con exito,Usuario: ".$login;
                $envio=$this->user_model->enviar_mail_nuevo_usuario($email,$mensaje);
                $this->session->set_flashdata('success', 'Empresa creada con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'Lo sentimos, no se pudo crear la empresa');
            }

            redirect('addEmpresa');
        }
    }

    public function empresasL()
    {        
        $data['userRecords'] = $this->Empresa_model->empresaListing();
        $this->global['pageTitle'] = 'SGI : Listado de Proveedores';
        $this->loadViews("empresa", $this->global, $data, NULL);
    }

    function infoEmpresa($userId = NULL)
    {
        if($userId == null)
        {
            redirect('empresas');
        }
        $data['userInfo']=$this->Empresa_model->getEmpresaInfo($userId);
        $this->global['pageTitle'] = 'SGI : Información del proveedor';
        $this->loadViews("infoEmpresa", $this->global, $data, NULL);
    }

    function editEmpresa($userId = NULL)
    {
        if($userId == null)
        {
            redirect('empresas');
        }
        $data['userInfo']=$this->Empresa_model->getEmpresaInfo($userId);
        $this->global['pageTitle'] = 'SGI : Editar Proveedor';
        $this->loadViews("editEmpresa", $this->global, $data, NULL);
    }

    function updateEmpresa($codigo)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname','Nombre','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('razon_social','Razon social','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('rut','Rut','required|numeric|max_length[20]');
        $this->form_validation->set_rules('contacto','Contacto','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]|is_unique[usuario.email]');
        $this->form_validation->set_rules('telefono','Telefono','trim|alpha_numeric|required|max_length[15]|min_length[8]');

        if($this->form_validation->run() == FALSE)
        {
            $this->editEmpresa($codigo);
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $apellido = ucwords(strtolower($this->security->xss_clean($this->input->post('razon_social'))));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $telefono = $this->security->xss_clean($this->input->post('telefono'));
            $rut = $this->security->xss_clean($this->input->post('rut'));
            $contacto = $this->security->xss_clean($this->input->post('contacto'));
            
            $empresasInfo = array('rut' => $rut , 'nombre_fantacia' => $name, 'razon_social' => $apellido, 'email' => $email, 'telefono' => $telefono, 'contacto' => $contacto);

            $result = $this->Empresa_model->editEmpresa($empresasInfo,$codigo);
            if($result == true)
            {
                $this->session->set_flashdata('success', 'Empresa modificada con éxito' );
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo modificar la empresa');
            }
            $this->editEmpresa($codigo);
        }
    }

    public function deleteEmpresa()
    {
        $codigo = $this->input->post('userId');
        $this->global['pageTitle'] = 'SGI :Proveedores';
        if($codigo == null)
        {
            redirect('empresas');
        }
        $userInfo = array('activo'=>0 );
        $result = $this->Empresa_model->deleteEmpresa($codigo, $userInfo);
        
        if ($result) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }
}
?>
