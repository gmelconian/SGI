<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class User extends BaseController
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('Reporte_model');
        $this->isLoggedIn();   
    }

    public function index() 
    {   
        $this->global['pageTitle'] = 'SGI : Inicio';
        $cantidadInsumosTipo = $this->Reporte_model->cantidadInsumosTipo();
        foreach ($cantidadInsumosTipo as $value){ 
            if ($value->tipo=="DISCO")
                $data['insumoDISCO']= $value->cantidad;
            if ($value->tipo=="RATON")
                $data['insumoRATON']= $value->cantidad;
            if ($value->tipo=="FUENTE")
                $data['insumoFUENTE']= $value->cantidad;
            if ($value->tipo=="TECLADO")
                $data['insumoTECLADO']= $value->cantidad;
            if ($value->tipo=="OTRO")
                $data['insumoOTRO']= $value->cantidad;
        }
        $equiposUnidad = $this->Reporte_model->equiposUnidad("PC");
        $impresorasUnidad = $this->Reporte_model->equiposUnidad("IMPRESORAS");
        $telefonosUnidad = $this->Reporte_model->equiposUnidad("TELEFONOS");
        
        $DGS=FALSE;
        $DINAVI=FALSE;      
        $DINOT=FALSE;
        $DINAMA=FALSE;
        $DINAGUA=FALSE;
                
        foreach ($equiposUnidad as $value){ 
            switch ($value->unidad){
                case'1':
                    if($value->total > 0)
                        $data['pcDGS']= $value->total;
                    else $data['pcDGS']= 0;
                    $DGS=TRUE;
                    break;
                case'2':
                    if($value->total > 0)
                        $data['pcDINAVI']= $value->total;
                    else $data['pcDINAVI']= 0;
                    $DINAVI=TRUE;
                    break;
                case'3':
                    if($value->total > 0)
                        $data['pcDINOT']= $value->total;
                    else $data['pcDINOT']= 0;
                    $DINOT=TRUE;
                    break;
                case'4':
                    if($value->total > 0)
                        $data['pcDINAMA']= $value->total;
                    else $data['pcDINAMA']= 0;
                    $DINAMA=TRUE;
                    break;
                case'5':
                    if($value->total > 0)
                        $data['pcDINAGUA']= $value->total;
                    else $data['pcDINAGUA']= 0;
                    $DINAGUA=TRUE;
                    break;    
            }
        }
        if($DGS==FALSE)
            $data['pcDGS']= 0;
        if($DINAVI==FALSE)
            $data['pcDINAVI']= 0;
        if($DINOT==FALSE)
            $data['pcDINOT']= 0;
        if($DINAMA==FALSE)
            $data['pcDINAMA']= 0;
        if($DINAGUA==FALSE)
            $data['pcDINAGUA']= 0;
        
        $DGS=FALSE;
        $DINAVI=FALSE;      
        $DINOT=FALSE;
        $DINAMA=FALSE;
        $DINAGUA=FALSE;
        foreach ($impresorasUnidad as $value){ 
            switch ($value->unidad){
                case'1':
                    if($value->total > 0)
                        $data['impresorasDGS']= $value->total;
                    else $data['impresorasDGS']= 0;
                    $DGS=TRUE;
                    break;
                case'2':
                    if($value->total > 0)
                        $data['impresorasDINAVI']= $value->total;
                    else $data['impresorasDINAVI']= 0;
                    $DINAVI=TRUE;
                    break;
                case'3':
                    if($value->total > 0)
                        $data['impresorasDINOT']= $value->total;
                    else $data['impresorasDINOT']= 0;
                    $DINOT=TRUE;
                    break;
                case'4':
                    if($value->total > 0)
                        $data['impresorasDINAMA']= $value->total;
                    else $data['impresorasDINAMA']= 0;
                    $DINAMA=TRUE;
                    break;
                case'5':
                    if($value->total > 0)
                        $data['impresorasDINAGUA']= $value->total;
                    else $data['impresorasDINAGUA']= 0;
                    $DINAGUA=TRUE;
                    break;    
            }
        }
        if($DGS==FALSE)
            $data['impresorasDGS']= 0;
        if($DINAVI==FALSE)
            $data['impresorasDINAVI']= 0;
        if($DINOT==FALSE)
            $data['impresorasDINOT']= 0;
        if($DINAMA==FALSE)
            $data['impresorasDINAMA']= 0;
        if($DINAGUA==FALSE)
            $data['impresorasDINAGUA']= 0;
        
        $DGS=FALSE;
        $DINAVI=FALSE;      
        $DINOT=FALSE;
        $DINAMA=FALSE;
        $DINAGUA=FALSE;
        foreach ($telefonosUnidad as $value){ 
            switch ($value->unidad){
                case'1':
                    if($value->total > 0)
                        $data['telefonosDGS']= $value->total;
                    else $data['telefonosDGS']= 0;
                    $DGS=TRUE;
                    break;
                case'2':
                    if($value->total > 0)
                        $data['telefonosDINAVI']= $value->total;
                    else $data['telefonosDINAVI']= 0;
                    $DINAVI=TRUE;
                    break;
                case'3':
                    if($value->total > 0)
                        $data['telefonosDINOT']= $value->total;
                    else $data['telefonosDINOT']= 0;
                    $DINOT=TRUE;
                    break;
                case'4':
                    if($value->total > 0)
                        $data['telefonosDINAMA']= $value->total;
                    else $data['telefonosDINAMA']= 0;
                    $DINAMA=TRUE;
                    break;
                case'5':
                    if($value->total > 0)
                        $data['telefonosDINAGUA']= $value->total;
                    else $data['telefonosDINAGUA']= 0;
                    $DINAGUA=TRUE;
                    break;    
            }
        }
        if($DGS==FALSE)
            $data['telefonosDGS']= 0;
        if($DINAVI==FALSE)
            $data['telefonosDINAVI']= 0;
        if($DINOT==FALSE)
            $data['telefonosDINOT']= 0;
        if($DINAMA==FALSE)
            $data['telefonosDINAMA']= 0;
        if($DINAGUA==FALSE)
            $data['telefonosDINAGUA']= 0;
        
        $insumosMes = $this->Reporte_model->insumosUsadosMes();
        $disco_1=FALSE; $disco_2=FALSE; $disco_3=FALSE; $disco_4=FALSE; $disco_5=FALSE; $disco_6=FALSE; $disco_7=FALSE; $disco_8=FALSE; $disco_9=FALSE; $disco_10=FALSE; $disco_11=FALSE; $disco_12=FALSE;
        $fuente_1=FALSE; $fuente_2=FALSE; $fuente_3=FALSE; $fuente_4=FALSE; $fuente_5=FALSE; $fuente_6=FALSE; $fuente_7=FALSE; $fuente_8=FALSE; $fuente_9=FALSE; $fuente_10=FALSE; $fuente_11=FALSE; $fuente_12=FALSE;
        $otro_1=FALSE; $otro_2=FALSE; $otro_3=FALSE; $otro_4=FALSE; $otro_5=FALSE; $otro_6=FALSE; $otro_7=FALSE; $otro_8=FALSE; $otro_9=FALSE; $otro_10=FALSE; $otro_11=FALSE; $otro_12=FALSE;
        $teclado_1=FALSE; $teclado_2=FALSE; $teclado_3=FALSE; $teclado_4=FALSE; $teclado_5=FALSE; $teclado_6=FALSE; $teclado_7=FALSE; $teclado_8=FALSE; $teclado_9=FALSE; $teclado_10=FALSE; $teclado_11=FALSE; $teclado_12=FALSE;
        $raton_1=FALSE; $raton_2=FALSE; $raton_3=FALSE; $raton_4=FALSE; $raton_5=FALSE; $raton_6=FALSE; $raton_7=FALSE; $raton_8=FALSE; $raton_9=FALSE; $raton_10=FALSE; $raton_11=FALSE; $raton_12=FALSE;
        $tonner_1=FALSE; $tonner_2=FALSE; $tonner_3=FALSE; $tonner_4=FALSE; $tonner_5=FALSE; $tonner_6=FALSE; $tonner_7=FALSE; $tonner_8=FALSE; $tonner_9=FALSE; $tonner_10=FALSE; $tonner_11=FALSE; $tonner_12=FALSE;
        $fotoconductor_1=FALSE; $fotoconductor_2=FALSE; $fotoconductor_3=FALSE; $fotoconductor_4=FALSE; $fotoconductor_5=FALSE; $fotoconductor_6=FALSE; $fotoconductor_7=FALSE; $fotoconductor_8=FALSE; $fotoconductor_9=FALSE; $fotoconductor_10=FALSE; $fotoconductor_11=FALSE; $fotoconductor_12=FALSE;
        $kit_1=FALSE; $kit_2=FALSE; $kit_3=FALSE; $kit_4=FALSE; $kit_5=FALSE; $kit_6=FALSE; $kit_7=FALSE; $kit_8=FALSE; $kit_9=FALSE; $kit_10=FALSE; $kit_11=FALSE; $kit_12=FALSE;
        foreach ($insumosMes as $value){   
            switch ($value->mes){
                case'1':
                    switch ($value->tipo){
                        case 'DISCO':
                            if($value->total > 0)
                                $data['disco_1']= $value->total;
                            else $data['disco_1']= 0;
                            $disco_1=TRUE;
                            break;
                        case 'FUENTE':
                            if($value->total > 0)
                                $data['fuente_1']= $value->total;
                            else $data['fuente_1']= 0;
                            $fuente_1=TRUE;
                            break;
                        case 'OTRO':
                            if($value->total > 0)
                                $data['otro_1']= $value->total;
                            else $data['otro_1']= 0;
                            $otro_1=TRUE;
                            break;
                        case 'RATON':
                            if($value->total > 0)
                                $data['raton_1']= $value->total;
                            else $data['raton_1']= 0;
                            $raton_1=TRUE;
                            break;
                        case 'TECLADO':
                            if($value->total > 0)
                                $data['teclado_1']= $value->total;
                            else $data['teclado_1']= 0;
                            $teclado_1=TRUE;
                            break;
                        case 'tonner':
                            if($value->total > 0)
                                $data['tonner_1']= $value->total;
                            else $data['tonner_1']= 0;
                            $tonner_1=TRUE;
                            break;
                        case 'fotoconductor':
                            if($value->total > 0)
                                $data['fotoconductor_1']= $value->total;
                            else $data['fotoconductor_1']= 0;
                            $fotoconductor_1=TRUE;
                            break;
                        case 'kit_mantenimiento':
                            if($value->total > 0)
                                $data['kit_1']= $value->total;
                            else $data['kit_1']= 0;
                            $kit_1=TRUE;
                            break;
                    }
                    break;
                case'2':
                    switch ($value->tipo){
                        case 'DISCO':
                            if($value->total > 0)
                                $data['disco_2']= $value->total;
                            else $data['disco_2']= 0;
                            $disco_2=TRUE;
                            break;
                        case 'FUENTE':
                            if($value->total > 0)
                                $data['fuente_2']= $value->total;
                            else $data['fuente_2']= 0;
                            $fuente_2=TRUE;
                            break;
                        case 'OTRO':
                            if($value->total > 0)
                                $data['otro_2']= $value->total;
                            else $data['otro_2']= 0;
                            $otro_2=TRUE;
                            break;
                        case 'RATON':
                            if($value->total > 0)
                                $data['raton_2']= $value->total;
                            else $data['raton_2']= 0;
                            $raton_2=TRUE;
                            break;
                        case 'TECLADO':
                            if($value->total > 0)
                                $data['teclado_2']= $value->total;
                            else $data['teclado_2']= 0;
                            $teclado_2=TRUE;
                            break;
                        case 'tonner':
                            if($value->total > 0)
                                $data['tonner_2']= $value->total;
                            else $data['tonner_2']= 0;
                            $tonner_2=TRUE;
                            break;
                        case 'fotoconductor':
                            if($value->total > 0)
                                $data['fotoconductor_2']= $value->total;
                            else $data['fotoconductor_2']= 0;
                            $fotoconductor_2=TRUE;
                            break;
                        case 'kit_mantenimiento':
                            if($value->total > 0)
                                $data['kit_2']= $value->total;
                            else $data['kit_2']= 0;
                            $kit_2=TRUE;
                            break;
                    }
                    break;
                case'3':
                    switch ($value->tipo){
                        case 'DISCO':
                            if($value->total > 0)
                                $data['disco_3']= $value->total;
                            else $data['disco_3']= 0;
                            $disco_3=TRUE;
                            break;
                        case 'FUENTE':
                            if($value->total > 0)
                                $data['fuente_3']= $value->total;
                            else $data['fuente_3']= 0;
                            $fuente_3=TRUE;
                            break;
                        case 'OTRO':
                            if($value->total > 0)
                                $data['otro_3']= $value->total;
                            else $data['otro_3']= 0;
                            $otro_3=TRUE;
                            break;
                        case 'RATON':
                            if($value->total > 0)
                                $data['raton_3']= $value->total;
                            else $data['raton_3']= 0;
                            $raton_3=TRUE;
                            break;
                        case 'TECLADO':
                            if($value->total > 0)
                                $data['teclado_3']= $value->total;
                            else $data['teclado_3']= 0;
                            $teclado_3=TRUE;
                            break;
                        case 'tonner':
                            if($value->total > 0)
                                $data['tonner_3']= $value->total;
                            else $data['tonner_3']= 0;
                            $tonner_3=TRUE;
                            break;
                        case 'fotoconductor':
                            if($value->total > 0)
                                $data['fotoconductor_3']= $value->total;
                            else $data['fotoconductor_3']= 0;
                            $fotoconductor_3=TRUE;
                            break;
                        case 'kit_mantenimiento':
                            if($value->total > 0)
                                $data['kit_3']= $value->total;
                            else $data['kit_3']= 0;
                            $kit_3=TRUE;
                            break;
                    }
                    break;
                case'4':
                    switch ($value->tipo){
                        case 'DISCO':
                            if($value->total > 0)
                                $data['disco_4']= $value->total;
                            else $data['disco_4']= 0;
                            $disco_4=TRUE;
                            break;
                        case 'FUENTE':
                            if($value->total > 0)
                                $data['fuente_4']= $value->total;
                            else $data['fuente_4']= 0;
                            $fuente_4=TRUE;
                            break;
                        case 'OTRO':
                            if($value->total > 0)
                                $data['otro_4']= $value->total;
                            else $data['otro_4']= 0;
                            $otro_4=TRUE;
                            break;
                        case 'RATON':
                            if($value->total > 0)
                                $data['raton_4']= $value->total;
                            else $data['raton_4']= 0;
                            $raton_4=TRUE;
                            break;
                        case 'TECLADO':
                            if($value->total > 0)
                                $data['teclado_4']= $value->total;
                            else $data['teclado_4']= 0;
                            $teclado_4=TRUE;
                            break;
                        case 'tonner':
                            if($value->total > 0)
                                $data['tonner_4']= $value->total;
                            else $data['tonner_4']= 0;
                            $tonner_4=TRUE;
                            break;
                        case 'fotoconductor':
                            if($value->total > 0)
                                $data['fotoconductor_4']= $value->total;
                            else $data['fotoconductor_4']= 0;
                            $fotoconductor_4=TRUE;
                            break;
                        case 'kit_mantenimiento':
                            if($value->total > 0)
                                $data['kit_4']= $value->total;
                            else $data['kit_4']= 0;
                            $kit_4=TRUE;
                            break;
                    }
                    break;
                case'5':
                    switch ($value->tipo){
                        case 'DISCO':
                            if($value->total > 0)
                                $data['disco_5']= $value->total;
                            else $data['disco_5']= 0;
                            $disco_5=TRUE;
                            break;
                        case 'FUENTE':
                            if($value->total > 0)
                                $data['fuente_5']= $value->total;
                            else $data['fuente_5']= 0;
                            $fuente_5=TRUE;
                            break;
                        case 'OTRO':
                            if($value->total > 0)
                                $data['otro_5']= $value->total;
                            else $data['otro_5']= 0;
                            $otro_5=TRUE;
                            break;
                        case 'RATON':
                            if($value->total > 0)
                                $data['raton_5']= $value->total;
                            else $data['raton_5']= 0;
                            $raton_5=TRUE;
                            break;
                        case 'TECLADO':
                            if($value->total > 0)
                                $data['teclado_5']= $value->total;
                            else $data['teclado_5']= 0;
                            $teclado_5=TRUE;
                            break;
                        case 'tonner':
                            if($value->total > 0)
                                $data['tonner_5']= $value->total;
                            else $data['tonner_5']= 0;
                            $tonner_5=TRUE;
                            break;
                        case 'fotoconductor':
                            if($value->total > 0)
                                $data['fotoconductor_5']= $value->total;
                            else $data['fotoconductor_5']= 0;
                            $fotoconductor_5=TRUE;
                            break;
                        case 'kit_mantenimiento':
                            if($value->total > 0)
                                $data['kit_5']= $value->total;
                            else $data['kit_5']= 0;
                            $kit_5=TRUE;
                            break;
                    }
                    break; 
                case'6':
                    switch ($value->tipo){
                        case 'DISCO':
                            if($value->total > 0)
                                $data['disco_6']= $value->total;
                            else $data['disco_6']= 0;
                            $disco_6=TRUE;
                            break;
                        case 'FUENTE':
                            if($value->total > 0)
                                $data['fuente_6']= $value->total;
                            else $data['fuente_6']= 0;
                            $fuente_6=TRUE;
                            break;
                        case 'OTRO':
                            if($value->total > 0)
                                $data['otro_6']= $value->total;
                            else $data['otro_6']= 0;
                            $otro_6=TRUE;
                            break;
                        case 'RATON':
                            if($value->total > 0)
                                $data['raton_6']= $value->total;
                            else $data['raton_6']= 0;
                            $raton_6=TRUE;
                            break;
                        case 'TECLADO':
                            if($value->total > 0)
                                $data['teclado_6']= $value->total;
                            else $data['teclado_6']= 0;
                            $teclado_6=TRUE;
                            break;
                        case 'tonner':
                            if($value->total > 0)
                                $data['tonner_6']= $value->total;
                            else $data['tonner_6']= 0;
                            $tonner_6=TRUE;
                            break;
                        case 'fotoconductor':
                            if($value->total > 0)
                                $data['fotoconductor_6']= $value->total;
                            else $data['fotoconductor_6']= 0;
                            $fotoconductor_6=TRUE;
                            break;
                        case 'kit_mantenimiento':
                            if($value->total > 0)
                                $data['kit_6']= $value->total;
                            else $data['kit_6']= 0;
                            $kit_6=TRUE;
                            break;
                    }
                    break;
                case'7':
                    switch ($value->tipo){
                        case 'DISCO':
                            if($value->total > 0)
                                $data['disco_7']= $value->total;
                            else $data['disco_7']= 0;
                            $disco_7=TRUE;
                            break;
                        case 'FUENTE':
                            if($value->total > 0)
                                $data['fuente_7']= $value->total;
                            else $data['fuente_7']= 0;
                            $fuente_7=TRUE;
                            break;
                        case 'OTRO':
                            if($value->total > 0)
                                $data['otro_7']= $value->total;
                            else $data['otro_7']= 0;
                            $otro_7=TRUE;
                            break;
                        case 'RATON':
                            if($value->total > 0)
                                $data['raton_7']= $value->total;
                            else $data['raton_7']= 0;
                            $raton_7=TRUE;
                            break;
                        case 'TECLADO':
                            if($value->total > 0)
                                $data['teclado_7']= $value->total;
                            else $data['teclado_7']= 0;
                            $teclado_7=TRUE;
                            break;
                        case 'tonner':
                            if($value->total > 0)
                                $data['tonner_7']= $value->total;
                            else $data['tonner_7']= 0;
                            $tonner_7=TRUE;
                            break;
                        case 'fotoconductor':
                            if($value->total > 0)
                                $data['fotoconductor_7']= $value->total;
                            else $data['fotoconductor_7']= 0;
                            $fotoconductor_7=TRUE;
                            break;
                        case 'kit_mantenimiento':
                            if($value->total > 0)
                                $data['kit_7']= $value->total;
                            else $data['kit_7']= 0;
                            $kit_7=TRUE;
                            break;
                    }
                    break;
                case'8':
                    switch ($value->tipo){
                        case 'DISCO':
                            if($value->total > 0)
                                $data['disco_8']= $value->total;
                            else $data['disco_8']= 0;
                            $disco_8=TRUE;
                            break;
                        case 'FUENTE':
                            if($value->total > 0)
                                $data['fuente_8']= $value->total;
                            else $data['fuente_8']= 0;
                            $fuente_8=TRUE;
                            break;
                        case 'OTRO':
                            if($value->total > 0)
                                $data['otro_8']= $value->total;
                            else $data['otro_8']= 0;
                            $otro_8=TRUE;
                            break;
                        case 'RATON':
                            if($value->total > 0)
                                $data['raton_8']= $value->total;
                            else $data['raton_8']= 0;
                            $raton_8=TRUE;
                            break;
                        case 'TECLADO':
                            if($value->total > 0)
                                $data['teclado_8']= $value->total;
                            else $data['teclado_8']= 0;
                            $teclado_8=TRUE;
                            break;
                        case 'tonner':
                            if($value->total > 0)
                                $data['tonner_8']= $value->total;
                            else $data['tonner_8']= 0;
                            $tonner_8=TRUE;
                            break;
                        case 'fotoconductor':
                            if($value->total > 0)
                                $data['fotoconductor_8']= $value->total;
                            else $data['fotoconductor_8']= 0;
                            $fotoconductor_8=TRUE;
                            break;
                        case 'kit_mantenimiento':
                            if($value->total > 0)
                                $data['kit_8']= $value->total;
                            else $data['kit_8']= 0;
                            $kit_8=TRUE;
                            break;
                    }
                    break;
                case'9':
                    switch ($value->tipo){
                        case 'DISCO':
                            if($value->total > 0)
                                $data['disco_9']= $value->total;
                            else $data['disco_9']= 0;
                            $disco_9=TRUE;
                            break;
                        case 'FUENTE':
                            if($value->total > 0)
                                $data['fuente_9']= $value->total;
                            else $data['fuente_9']= 0;
                            $fuente_9=TRUE;
                            break;
                        case 'OTRO':
                            if($value->total > 0)
                                $data['otro_9']= $value->total;
                            else $data['otro_9']= 0;
                            $otro_9=TRUE;
                            break;
                        case 'RATON':
                            if($value->total > 0)
                                $data['raton_9']= $value->total;
                            else $data['raton_9']= 0;
                            $raton_9=TRUE;
                            break;
                        case 'TECLADO':
                            if($value->total > 0)
                                $data['teclado_9']= $value->total;
                            else $data['teclado_9']= 0;
                            $teclado_9=TRUE;
                            break;
                        case 'tonner':
                            if($value->total > 0)
                                $data['tonner_9']= $value->total;
                            else $data['tonner_9']= 0;
                            $tonner_9=TRUE;
                            break;
                        case 'fotoconductor':
                            if($value->total > 0)
                                $data['fotoconductor_9']= $value->total;
                            else $data['fotoconductor_9']= 0;
                            $fotoconductor_9=TRUE;
                            break;
                        case 'kit_mantenimiento':
                            if($value->total > 0)
                                $data['kit_9']= $value->total;
                            else $data['kit_9']= 0;
                            $kit_9=TRUE;
                            break;
                    }
                    break;
                case'10':
                    switch ($value->tipo){
                        case 'DISCO':
                            if($value->total > 0)
                                $data['disco_10']= $value->total;
                            else $data['disco_10']= 0;
                            $disco_10=TRUE;
                            break;
                        case 'FUENTE':
                            if($value->total > 0)
                                $data['fuente_10']= $value->total;
                            else $data['fuente_10']= 0;
                            $fuente_10=TRUE;
                            break;
                        case 'OTRO':
                            if($value->total > 0)
                                $data['otro_10']= $value->total;
                            else $data['otro_10']= 0;
                            $otro_10=TRUE;
                            break;
                        case 'RATON':
                            if($value->total > 0)
                                $data['raton_10']= $value->total;
                            else $data['raton_10']= 0;
                            $raton_10=TRUE;
                            break;
                        case 'TECLADO':
                            if($value->total > 0)
                                $data['teclado_10']= $value->total;
                            else $data['teclado_10']= 0;
                            $teclado_10=TRUE;
                            break;
                        case 'tonner':
                            if($value->total > 0)
                                $data['tonner_10']= $value->total;
                            else $data['tonner_10']= 0;
                            $tonner_10=TRUE;
                            break;
                        case 'fotoconductor':
                            if($value->total > 0)
                                $data['fotoconductor_10']= $value->total;
                            else $data['fotoconductor_10']= 0;
                            $fotoconductor_10=TRUE;
                            break;
                        case 'kit_mantenimiento':
                            if($value->total > 0)
                                $data['kit_10']= $value->total;
                            else $data['kit_10']= 0;
                            $kit_10=TRUE;
                            break;
                    }
                    break;
                case'11':
                    switch ($value->tipo){
                        case 'DISCO':
                            if($value->total > 0)
                                $data['disco_11']= $value->total;
                            else $data['disco_11']= 0;
                            $disco_11=TRUE;
                            break;
                        case 'FUENTE':
                            if($value->total > 0)
                                $data['fuente_11']= $value->total;
                            else $data['fuente_11']= 0;
                            $fuente_11=TRUE;
                            break;
                        case 'OTRO':
                            if($value->total > 0)
                                $data['otro_11']= $value->total;
                            else $data['otro_11']= 0;
                            $otro_11=TRUE;
                            break;
                        case 'RATON':
                            if($value->total > 0)
                                $data['raton_11']= $value->total;
                            else $data['raton_11']= 0;
                            $raton_11=TRUE;
                            break;
                        case 'TECLADO':
                            if($value->total > 0)
                                $data['teclado_11']= $value->total;
                            else $data['teclado_11']= 0;
                            $teclado_11=TRUE;
                            break;
                        case 'tonner':
                            if($value->total > 0)
                                $data['tonner_11']= $value->total;
                            else $data['tonner_11']= 0;
                            $tonner_11=TRUE;
                            break;
                        case 'fotoconductor':
                            if($value->total > 0)
                                $data['fotoconductor_11']= $value->total;
                            else $data['fotoconductor_11']= 0;
                            $fotoconductor_11=TRUE;
                            break;
                        case 'kit_mantenimiento':
                            if($value->total > 0)
                                $data['kit_11']= $value->total;
                            else $data['kit_11']= 0;
                            $kit_11=TRUE;
                            break;
                    }
                    break;
                case'12':
                    switch ($value->tipo){
                        case 'DISCO':
                            if($value->total > 0)
                                $data['disco_12']= $value->total;
                            else $data['disco_12']= 0;
                            $disco_12=TRUE;
                            break;
                        case 'FUENTE':
                            if($value->total > 0)
                                $data['fuente_12']= $value->total;
                            else $data['fuente_12']= 0;
                            $fuente_12=TRUE;
                            break;
                        case 'OTRO':
                            if($value->total > 0)
                                $data['otro_12']= $value->total;
                            else $data['otro_12']= 0;
                            $otro_12=TRUE;
                            break;
                        case 'RATON':
                            if($value->total > 0)
                                $data['raton_12']= $value->total;
                            else $data['raton_12']= 0;
                            $raton_12=TRUE;
                            break;
                        case 'TECLADO':
                            if($value->total > 0)
                                $data['teclado_12']= $value->total;
                            else $data['teclado_12']= 0;
                            $teclado_12=TRUE;
                            break;
                        case 'tonner':
                            if($value->total > 0)
                                $data['tonner_12']= $value->total;
                            else $data['tonner_12']= 0;
                            $tonner_12=TRUE;
                            break;
                        case 'fotoconductor':
                            if($value->total > 0)
                                $data['fotoconductor_12']= $value->total;
                            else $data['fotoconductor_12']= 0;
                            $fotoconductor_12=TRUE;
                            break;
                        case 'kit_mantenimiento':
                            if($value->total > 0)
                                $data['kit_12']= $value->total;
                            else $data['kit_12']= 0;
                            $kit_12=TRUE;
                            break;
                    }
                    break;
            }
        }   
        if($disco_1==FALSE) $data['disco_1']= 0;
        if($fuente_1==FALSE) $data['fuente_1']= 0;
        if($otro_1==FALSE) $data['otro_1']= 0;
        if($raton_1==FALSE) $data['raton_1']= 0;
        if($teclado_1==FALSE) $data['teclado_1']= 0;
        if($tonner_1==FALSE) $data['tonner_1']= 0;
        if($fotoconductor_1==FALSE) $data['fotoconductor_1']= 0;
        if($kit_1==FALSE) $data['kit_1']= 0;
        if($disco_2==FALSE) $data['disco_2']= 0;
        if($fuente_2==FALSE) $data['fuente_2']= 0;
        if($otro_2==FALSE) $data['otro_2']= 0;
        if($raton_2==FALSE) $data['raton_2']= 0;
        if($teclado_2==FALSE) $data['teclado_2']= 0;
        if($tonner_2==FALSE) $data['tonner_2']= 0;
        if($fotoconductor_2==FALSE) $data['fotoconductor_2']= 0;
        if($kit_2==FALSE) $data['kit_2']= 0;
        if($disco_3==FALSE) $data['disco_3']= 0;
        if($fuente_3==FALSE) $data['fuente_3']= 0;
        if($otro_3==FALSE) $data['otro_3']= 0;
        if($raton_3==FALSE) $data['raton_3']= 0;
        if($teclado_3==FALSE) $data['teclado_3']= 0;
        if($tonner_3==FALSE) $data['tonner_3']= 0;
        if($fotoconductor_3==FALSE) $data['fotoconductor_3']= 0;
        if($kit_3==FALSE) $data['kit_3']= 0;
        if($disco_4==FALSE) $data['disco_4']= 0;
        if($fuente_4==FALSE) $data['fuente_4']= 0;
        if($otro_4==FALSE) $data['otro_4']= 0;
        if($raton_4==FALSE) $data['raton_4']= 0;
        if($teclado_4==FALSE) $data['teclado_4']= 0;
        if($tonner_4==FALSE) $data['tonner_4']= 0;
        if($fotoconductor_4==FALSE) $data['fotoconductor_4']= 0;
        if($kit_4==FALSE) $data['kit_4']= 0;
        if($disco_5==FALSE) $data['disco_5']= 0;
        if($fuente_5==FALSE) $data['fuente_5']= 0;
        if($otro_5==FALSE) $data['otro_5']= 0;
        if($raton_5==FALSE) $data['raton_5']= 0;
        if($teclado_5==FALSE) $data['teclado_5']= 0;
        if($tonner_5==FALSE) $data['tonner_5']= 0;
        if($fotoconductor_5==FALSE) $data['fotoconductor_5']= 0;
        if($kit_5==FALSE) $data['kit_5']= 0;
        if($disco_6==FALSE) $data['disco_6']= 0;
        if($fuente_6==FALSE) $data['fuente_6']= 0;
        if($otro_6==FALSE) $data['otro_6']= 0;
        if($raton_6==FALSE) $data['raton_6']= 0;
        if($teclado_6==FALSE) $data['teclado_6']= 0;
        if($tonner_6==FALSE) $data['tonner_6']= 0;
        if($fotoconductor_6==FALSE) $data['fotoconductor_6']= 0;
        if($kit_6==FALSE) $data['kit_6']= 0;
        if($disco_7==FALSE) $data['disco_7']= 0;
        if($fuente_7==FALSE) $data['fuente_7']= 0;
        if($otro_7==FALSE) $data['otro_7']= 0;
        if($raton_7==FALSE) $data['raton_7']= 0;
        if($teclado_7==FALSE) $data['teclado_7']= 0;
        if($tonner_7==FALSE) $data['tonner_7']= 0;
        if($fotoconductor_7==FALSE) $data['fotoconductor_7']= 0;
        if($kit_7==FALSE) $data['kit_7']= 0;
        if($disco_8==FALSE) $data['disco_8']= 0;
        if($fuente_8==FALSE) $data['fuente_8']= 0;
        if($otro_8==FALSE) $data['otro_8']= 0;
        if($raton_8==FALSE) $data['raton_8']= 0;
        if($teclado_8==FALSE) $data['teclado_8']= 0;
        if($tonner_8==FALSE) $data['tonner_8']= 0;
        if($fotoconductor_8==FALSE) $data['fotoconductor_8']= 0;
        if($kit_8==FALSE) $data['kit_8']= 0;
        if($disco_9==FALSE) $data['disco_9']= 0;
        if($fuente_9==FALSE) $data['fuente_9']= 0;
        if($otro_9==FALSE) $data['otro_9']= 0;
        if($raton_9==FALSE) $data['raton_9']= 0;
        if($teclado_9==FALSE) $data['teclado_9']= 0;
        if($tonner_9==FALSE) $data['tonner_9']= 0;
        if($fotoconductor_9==FALSE) $data['fotoconductor_9']= 0;
        if($kit_9==FALSE) $data['kit_9']= 0;
        if($disco_10==FALSE) $data['disco_10']= 0;
        if($fuente_10==FALSE) $data['fuente_10']= 0;
        if($otro_10==FALSE) $data['otro_10']= 0;
        if($raton_10==FALSE) $data['raton_10']= 0;
        if($teclado_10==FALSE) $data['teclado_10']= 0;
        if($tonner_10==FALSE) $data['tonner_10']= 0;
        if($fotoconductor_10==FALSE) $data['fotoconductor_10']= 0;
        if($kit_10==FALSE) $data['kit_10']= 0;
        if($disco_11==FALSE) $data['disco_11']= 0;
        if($fuente_11==FALSE) $data['fuente_11']= 0;
        if($otro_11==FALSE) $data['otro_11']= 0;
        if($raton_11==FALSE) $data['raton_11']= 0;
        if($teclado_11==FALSE) $data['teclado_11']= 0;
        if($tonner_11==FALSE) $data['tonner_11']= 0;
        if($fotoconductor_11==FALSE) $data['fotoconductor_11']= 0;
        if($kit_11==FALSE) $data['kit_11']= 0;
        if($disco_12==FALSE) $data['disco_12']= 0;
        if($fuente_12==FALSE) $data['fuente_12']= 0;
        if($otro_12==FALSE) $data['otro_12']= 0;
        if($raton_12==FALSE) $data['raton_12']= 0;
        if($teclado_12==FALSE) $data['teclado_12']= 0;
        if($tonner_12==FALSE) $data['tonner_12']= 0;
        if($fotoconductor_12==FALSE) $data['fotoconductor_12']= 0;
        if($kit_12==FALSE) $data['kit_12']= 0;
        
        $this->loadViews("dashboard", $this->global, $data , NULL);        
    }

    function accessDeny()
    {   
        $this->global['pageTitle'] = 'SGI : Acceso denegado';
        $this->loadViews("access", $this->global, NULL, NULL);  
    }

    function userListing()
    {
        $data['userRecords'] = $this->user_model->userListing();
        $data['personaRecords'] = $this->user_model->personaListing();
        $this->global['pageTitle'] = 'SGI : Listado de usuarios';
        $this->loadViews("users", $this->global, $data, NULL);
    }

    function addNew()
    { 
        $data['roles'] = $this->user_model->getUserRoles();
        $this->global['pageTitle'] = 'SGI : Agregar usuario nuevo';
        $this->loadViews("addNew", $this->global, $data, NULL);       
    }

    function checkEmailExists()
    {
        $email = $this->input->post("email");
        $result = $this->user_model->checkEmailExists($email,$this->vendorId);
        if(empty($result->email)){ 
            echo("true"); 
        }
        else {
           echo("false"); 
       }
   }

    function addNewUser()
    {
        $this->load->library('form_validation');  
        $this->form_validation->set_rules('fname','Nombre','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('apellido','Apellido','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('password','Password','trim|alpha_numeric|required|alpha_numeric|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]|is_unique[usuario.email]');
        $this->form_validation->set_rules('login','login','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]|required|max_length[30]|is_unique[usuario.login]');
        $this->form_validation->set_rules('mobile','Telefono Interno','trim|alpha_numeric|required|max_length[15]|min_length[4]');
        $this->form_validation->set_rules('role','Rol','trim|alpha|required');
        
        /*if($this->form_validation->run() == FALSE)
        {
            $this->addNew();
        }
        else
        {*/
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $apellido = ucwords(strtolower($this->security->xss_clean($this->input->post('apellido'))));
            $login = ucwords(strtolower($this->security->xss_clean($this->input->post('login'))));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $password = $this->input->post('password');
            $roleId = $this->input->post('role');
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            
            if($roleId=="Persona"){
                $userInfo = array('email'=>$email, 'nombre'=> $name,'telefono'=>$mobile, 'login'=>$login);    
                $result = $this->user_model->addNewPersona($userInfo);
            }else{
                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'tipo'=>$roleId, 'nombres'=> $name,'apellidos'=> $apellido,'interno'=>$mobile, 'login'=>$login,'activo'=>1);    
                $result = $this->user_model->addNewUser($userInfo);
            }           
            
            if($result > 0)
            {   
                $mensaje="Hola ".$name.", su usuario ah sido creado con éxito, Usuario: ".$login;
                $envio=$this->user_model->enviar_mail_nuevo_usuario($email,$mensaje);   
                $this->session->set_flashdata('success', 'Usuario creado con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo crear el usuario');
            }
            redirect('addNew');
        //}
    }
    
    function infoUsuario($userId = NULL)
    {
        if($userId == null)
        {
            redirect('userListing');
        }
        $data['userInfo'] = $this->user_model->getUserInfo($userId);
        $this->global['pageTitle'] = 'SGI : Información de usuario';
        $this->loadViews("infoUsuario", $this->global, $data, NULL);
    }
    
    function infoPersona($userId = NULL)
    {
        if($userId == null)
        {
            redirect('userListing');
        }
        $data['userInfo'] = $this->user_model->getPersonaInfo($userId);
        $this->global['pageTitle'] = 'SGI : Información de la persona';
        $this->loadViews("infoPersona", $this->global, $data, NULL);
    }
    
    function editOld($userId = NULL)
    {
        if($userId == null)
        {
            redirect('userListing');
        }
        $data['userInfo'] = $this->user_model->getUserInfo($userId);
        $this->global['pageTitle'] = 'SGI : Editar usuario';
        $this->loadViews("editOld", $this->global, $data, NULL);
    }
    
    function editPersona($userId = NULL)
    {
        if($userId == null)
        {
            redirect('userListing');
        }
        $data['userInfo'] = $this->user_model->getPersonaInfo($userId);
        $this->global['pageTitle'] = 'SGI : Editar Persona';
        $this->loadViews("editPersona", $this->global, $data, NULL);
    }

    function editUser()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname','Nombre','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]ces|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('apellido','Apellido','trim|regex_match[/^[A-Za-z 0-9 ÁáÉéÍíÓóÚú\.\-:@]+$/]ces|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('login','Login','trim|alpha_numeric|required|max_length[30]');
        $this->form_validation->set_rules('mobile','Telefono','trim|alpha_numeric|required|max_length[15]|min_length[4]');
        $this->form_validation->set_rules('role','Rol','trim|alpha|required|in_list[Administrador,Cliente,Supervisor,Teléfonista,Auditor,Vendedor]');
 
        /*if($this->form_validation->run() == FALSE)
        {
            $this->editOld($login);                
        }
        else
        {*/
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $apellido = ucwords(strtolower($this->security->xss_clean($this->input->post('apellido'))));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $roleId = $this->input->post('role');
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $login = $this->input->post('login');
            
            if($roleId=="Persona"){
                $userInfo = array('email'=>$email, 'nombre'=> $name,'telefono'=>$mobile);    
                $result = $this->user_model->editPersona($userInfo, $login);
            }else{            
                $userInfo = array('email'=>$email, 'tipo'=>$roleId, 'nombres'=>$name,'interno'=>$mobile, 'login'=>$login,'apellidos'=>$apellido);
                $result = $this->user_model->editUser($userInfo, $login);
            }
            if($result == true)
            {
                $this->session->set_flashdata('success', 'Usuario modificado con éxito' );
            }
            else
            {
                $this->session->set_flashdata('error', 'No se pudo modificar el usuario');
            }
            if($roleId!="Persona")
                $this->editOld($login); 
            else $this->editPersona($login);
        //}     
    }

    function deleteUser()
    {
        $userId = $this->input->post('userId');
        $userInfo = array('activo'=>0 );
        $result = $this->user_model->deleteUser($userId, $userInfo);
        if ($result) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }

    function profile($active = "details")
    {
        $data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
        $data["active"] = $active;
        $this->global['pageTitle'] = $active == "details" ? 'SGI : Mi perfil' : 'SGI : Cambiar contraseña';
        $this->loadViews("profile", $this->global, $data, NULL);
    }

    function profileUpdate($active = "details")
    {
        $this->load->helper('string');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname','Nombres','trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile','Telefono','required|min_length[4]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');    
        $this->form_validation->set_rules('apellido','Apellidos','trim|required|max_length[128]');

        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $apellido = ucwords(strtolower($this->security->xss_clean($this->input->post('apellido'))));
            $mi_archivo = 'mi_archivo';
            $nombre=$this->vendorId;
            $notificacion= $this->input->post('notifica');
            if($notificacion==''){
                $notificacion=0;
            }
            else{
                $notificacion=1;
            }

            if (!empty($_FILES['mi_archivo']['name'])){
                $config['upload_path'] = "./assets/dist/img/perfil/";
                $nombreSinPunto = rand (10 ,10000000).date("Y-m-d");
                $config['file_name'] = $nombreSinPunto;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = "50000";
                $config['max_width'] = "2000";
                $config['max_height'] = "2000";
                $config['overwrite'] = "TRUE";
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload($mi_archivo)) {
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }
                $img_1  = $this->upload->data();
                $sessionArray = array( 
                    'ruta'=>$img_1['file_name']
                );
                $this->session->set_userdata($sessionArray);
                $userInfo = array('foto'=>$img_1['file_name'],'nombres'=>$name,'apellidos'=>$apellido, 'email'=>$email, 'interno'=>$mobile, 'login'=>$this->vendorId,'notificacion'=>$notificacion);
            }else{
                $userInfo = array('nombres'=>$name,'apellidos'=>$apellido, 'email'=>$email, 'interno'=>$mobile, 'login'=>$this->vendorId,'notificacion'=>$notificacion);
            }
            $result = $this->user_model->editUserProfile($userInfo, $this->vendorId);
            if($result == true)
            {
                $mensaje="Hola ".$name.", su perfil se ah actualizado con éxito!!!";
                $envio=$this->user_model->enviar_mail_nuevo_usuario($email,$mensaje); 
                $this->session->set_userdata('name', $name." ".$apellido);
                $this->session->set_flashdata('success', 'Perfil actualizado con éxito');
            }
            else
            {
                $this->session->set_flashdata('error', 'La actualización del perfil falló');
            }

            redirect('profile/'.$active);
        }
    }

    function changePassword($active = "changepass")
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('inputOldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        echo 'console.log('. json_encode( $this->vendorId) .')';

        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $oldPassword = $this->input->post('inputOldPassword');
            $newPassword = $this->input->post('newPassword');

            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);

            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Su contraseña vieja es incorrecta');
                redirect('profile/'.$active);
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'login'=>$this->vendorId);

                $result = $this->user_model->changePassword($this->vendorId, $usersData);

                if($result > 0) { $this->session->set_flashdata('success', 'Operación exitosa'); }
                else { $this->session->set_flashdata('error', 'Operación no exitosa'); }

                redirect('profile/'.$active);
            }
        }
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'SGI : 404 - Página no encontrada';

        $this->loadViews("404", $this->global, NULL, NULL);
    }

    function emailExists($email)
    {
        $userId = $this->vendorId;
        $return = false;

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ $return = true; }
        else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }
}
?>