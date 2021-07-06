<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Auditoria extends BaseController{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();   
    }
        
    public function auditoria()
    {
       $this->load->model('user_model');
       $data['Auditoria'] = $this->user_model->vistaAuditoriaAccion();
       $data['vAuditoria'] = $this->user_model->vistaAuditoriaLogeo();
       $this->global['pageTitle'] = 'SGV : Auditoria';
       $this->loadViews("auditoria", $this->global, $data, NULL);
    }

  }



?>
