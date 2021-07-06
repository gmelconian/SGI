<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Reporte extends BaseController{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Reporte_model');
        $this->isLoggedIn();   
    }
    
    function reporte()
    {
        $this->global['pageTitle'] = 'SGV :Reportes';
        $data['reportes']=  $this->Reporte_model->getReporte($this->role);
        $this->loadViews("reportes", $this->global, $data , NULL);
    }

    function getFiltroReporte(){
        $reporte = $this->input->post('reporte');
        $filtro = $this->Reporte_model->getFiltro($reporte);
        echo json_encode($filtro);
    }
    
    function getComboReporte(){
        $reporte = $this->input->post('reporte');
        switch ($reporte) {
            case 2:
                $combo = $this->Reporte_model->getEquipo("IMPRESORA");
                $equipo_select = '<option disabled selected value="">Seleccione una Impresora</option>';
                $equipo_select.= '<option value="0">Todas las Impresora</option>';
                foreach ($combo as $tec)
                {
                    $equipo_select.= "<option value=".$tec->codigo.">".$tec->numero_serie."</option>";
                }
                break;
            case 3:
                $combo = $this->Reporte_model->getEquipo("PC");
                $equipo_select = '<option disabled selected value="">Seleccione un PC</option>';
                $equipo_select.= '<option value="0">Todos los PC</option>';
                foreach ($combo as $tec)
                {
                    $equipo_select.= "<option value=".$tec->codigo.">".$tec->descripcion."</option>";
                }
                break;               
        }
        echo json_encode($equipo_select);
    }

    function getDatosReporte(){
        $reporte = $this->input->post('reporte');
        switch ($reporte) {
            case 1:
                $datos = $this->Reporte_model->getDatosReporte($reporte);
                break;
            case 2:
                $codigo = $this->input->post('codigo');
                if($codigo==0)
                    $datos = $this->Reporte_model->getDatosReporte($reporte);
                else{
                    $filtro=" AND E.codigo=".$codigo ;
                    $datos = $this->Reporte_model->getDatosReporte($reporte, $filtro);
                }
                break;
            case 3:
                $codigo = $this->input->post('codigo');
                if($codigo==0)
                    $datos = $this->Reporte_model->getDatosReporte($reporte);
                else{
                    $filtro=" AND E2.codigo=".$codigo ;
                    $datos = $this->Reporte_model->getDatosReporte($reporte, $filtro);
                }
                break;  
        }
        echo json_encode($datos);
    }
}
?>
