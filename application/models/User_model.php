<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User_model extends CI_Model
{    
    function userListing()
    {
        $this->db->select('U.login, U.email, CONCAT(U.nombres," ",U.apellidos) as nombre, U.interno AS telefono, U.tipo');
        $this->db->from('usuario as U');
        $this->db->where('U.activo', 1);
        $this->db->order_by('U.login', 'DESC');
        $query = $this->db->get();        
        $result = $query->result();        
        return $result;
    }
    
    function personaListing()
    {
        $this->db->select('*');
        $this->db->from('persona');
        $query = $this->db->get();        
        $result = $query->result();        
        return $result;
    }

    function getUserRoles()
    {
        $this->db->select('tipo');
        $this->db->from('usuario');
        $query = $this->db->get();
        return $query->result();
    }

    function vistaAuditoriaAccion()
    {
         $this->db->select('*');
         $this->db->from('auditoria');
         $this->db->order_by('fecha','DESC'); 
         $query = $this->db->get();

         return $query->result();
    }
    
    function vistaAuditoriaLogeo()
    {
        $this->db->select('*');
        $this->db->from('tbl_last_login');
        $this->db->order_by('createdDtm','DESC'); 
        $query = $this->db->get();
        return $query->result();
    }

    function checkEmailExists($email, $userId)
    {
       $this->db->select("email");
       $this->db->from("usuario");
       $this->db->where("email", $email);   
       $this->db->where("activo", 1);
       $this->db->where("login !=", $userId);
       $query = $this->db->get();
       return $query->row();
    }

    function addNewUser($userInfo)
    {
        $this->db->insert('usuario', $userInfo);;
        $this->auditoriaInsert(1,"usuario-".$tipo,$this->db->last_query());
        $insert_id = $this->db->affected_rows();
        return $insert_id;
    }
    
    function addNewPersona($userInfo)
    {
        $this->db->insert('persona', $userInfo);
        $this->auditoriaInsert(1,"Persona",$this->db->last_query());
        $insert_id = $this->db->affected_rows();
        return $insert_id;
    }

    function getUserInfo($userId)
    {
        $this->db->select('U.login, CONCAT(U.nombres,U.apellidos) AS nombre, U.email,U.nombres,U.apellidos,U.interno as telefono, U.tipo');
        $this->db->from('usuario as U');
        $this->db->where('U.activo', 1);
        $this->db->where('U.login', $userId);
        $query = $this->db->get();
        return $query->row();
    }

    function getPersonaInfo($userId)
    {
        $this->db->select('*');
        $this->db->from('persona');
        $this->db->where('login', $userId);
        $query = $this->db->get();
        return $query->row();
    }
    
    function editUser($userInfo, $userId)
    {
        $this->db->trans_start();

        $this->db->where('login', $userId);
        $this->db->update('usuario', $userInfo);
        $query1= $this->db->last_query();

        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE){
            $this->auditoriaInsert(2,"usuario",$query1);
            return TRUE;
        }
        else return FALSE;
    }
    
    function editPersona($userInfo, $userId)
    {
        $this->db->trans_start();

        $this->db->where('login', $userId);
        $this->db->update('persona', $userInfo);
        $query1= $this->db->last_query();

        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE){
            $this->auditoriaInsert(2,"Persona",$query1);
            return TRUE;
        }
        else return FALSE;
    }

    function editUserProfile($userInfo, $userId)
    {
        $this->db->where('login', $userId);
        $this->db->update('usuario', $userInfo);
        $this->auditoriaInsert(2,"usuario",$this->db->last_query());
        return TRUE;
    }

    function deleteUser($userId, $userInfo)
    {
        $this->db->trans_start();
            $this->db->where('login', $userId);
            $this->db->update('usuario', $userInfo);
            $query1= $this->db->last_query();
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE){
            $this->auditoriaInsert(4,"usuario",$query1);
            return TRUE;
        }
        else return FALSE;
    }

    function changePassword($userId, $userInfo)
    {
        $this->db->where('login', $userId);
        $this->db->where('activo', 1);
        $this->db->update('usuario', $userInfo);
        $return = $this->db->affected_rows();
        $this->auditoriaInsert(2,"usuario",$this->db->last_query());
        return $return;
    }
    
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('login, password');
        $this->db->where('login', $userId);        
        $this->db->where('activo', 1);
        $query = $this->db->get('usuario');

        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    function getUserInfoWithRole($userId)
    {
        $this->db->select('U.login, U.email, CONCAT(U.nombres," ",U.apellidos) as nombre,nombres,apellidos, U.interno as telefono, U.tipo,U.foto, U.notificacion');
        $this->db->from('usuario as U');
        $this->db->where('U.login', $userId);
        $this->db->where('U.activo', 1);
        $query = $this->db->get();

        if ($foto=null) 
            echo '/assets/dist/img/perfil/subir.jpg';
        else
            echo ($foto);

        return $query->row();
    }
    
    public function auditoriaInsert($accion,$tabla,$query)
    {  
        switch ($accion) {
            case 1:
            $es="Insert";
            break;
            case 2:
            $es="Update";
            break;
            case 3:
            $es="Delete";
            break;
            case 4:
            $es="Delete Logico";
            break;
        }

        $CI = get_instance();
        $CI->load->library('session');
        $usuario=$CI->session->userdata('userId');
        if ($usuario==''){
            $usuario='Anonimo';
        }
        $now = date("Y-m-d H:y:s");
        $auditoriaInfo = array('usuario'=>$usuario,'accion'=>$es,'tabla'=>$tabla,'fecha'=>$now,'query'=>$query); 
        $this->db->insert('auditoria', $auditoriaInfo);

        return TRUE;
    }

    public function enviar_mail($login, $mensaje)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('login', $login);
        $query = $this->db->get();

        $habilitado=$query->row();

        if ($habilitado->notificacion==1 && filter_var($habilitado->notificacion, FILTER_VALIDATE_EMAIL)) {

            $this->load->library('email');
            $this->load->config('email');
            /*LA CONFIGURACION DE EL ENVIO DE MAIL ESTA EN EL ARCHIVO email.php EN LA CARPETA CONFIG*/
            $this->email->from('informatica@mvotma.gub.uy', 'SGI');
            $this->email->to($habilitado->email);
            $this->email->subject('SGI - Notificacion');
            $this->email->message($mensaje);       
            $this->email->send();
        }
        return true;
    }

    public function enviar_mail_nuevo_usuario($email, $mensaje)
    {
        $this->load->library('email');
        $this->load->config('email');
        /*LA CONFIGURACION DE EL ENVIO DE MAIL ESTA EN EL ARCHIVO email.php EN LA CARPETA CONFIG*/
        $this->email->from('informatica@mvotma.gub.uy', 'SGI');
        $this->email->to($email);
        $this->email->subject('SGI - Notificacion');
        $this->email->message($mensaje);       
        $this->email->send();
        return true;
    }
}