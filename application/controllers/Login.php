<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->isLoggedIn();
    }

    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
            redirect('/dashboard');
        }
    }

    public function loginMe()
    {
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[50]');
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $result  = $this->login_model->loginMe($email, $password);
            if(!empty($result))
            {
                $lastLogin = $this->login_model->lastLoginInfo($result->login);
                $sessionArray = array('userId'=>$result->login,                    
                    'role'=>$result->tipo,
                    'name'=>$result->nombre,
                    'ruta'=>$result->foto,
                    'isLoggedIn' => TRUE,
                    'email' => $result->email
                );
                $this->session->set_userdata($sessionArray);
                unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);
                $loginInfo = array("userId"=>$result->login, "sessionData" => json_encode($sessionArray), "machineIp"=>$_SERVER['REMOTE_ADDR'], "userAgent"=>getBrowserAgent(), "agentString"=>$this->agent->agent_string(), "platform"=>$this->agent->platform());
                $this->login_model->lastLogin($loginInfo);
                redirect('/dashboard');         
            }
            else
            {
                $this->session->set_flashdata('error', 'Login o contraseña incorrecta');
                $this->index();
            }
        }
    }

    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('forgotPassword');
        }
        else
        {
            redirect('/dashboard');
        }
    }

    function resetPasswordUser()
    {
        $status = '';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login_email','Email','trim|required|valid_email');
        if($this->form_validation->run() == FALSE)
        {
            $this->forgotPassword();
        }
        else 
        {
            $email = strtolower($this->security->xss_clean($this->input->post('login_email')));
            if($this->login_model->checkEmailExist($email))
            {
                $provisoria= substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

                $pas = array('password'=>getHashedPassword($provisoria));
                $result=$this->login_model->cp($email,$pas);

                $this->load->library('email');
                $this->load->config('email');
                $this->email->from('informativa@mvotma.gub.uy', 'SGI');
                $this->email->to($email);
                $this->email->subject("Cambio de contraseña - SGI");
                $this->email->message("Su nueva contraseña de acceso a SGI es: ".$provisoria);       
             
                if($result > 0 && $this->email->send()){
                    $status = "send";
                    setFlashData($status, "Se envio la contraseña a la casilla de correo ".$email);
                } else {
                    $status = "notsend";
                    setFlashData($status, "No se pudo cambiar la contraseña.");
                }
            }
            else
            {
                $status = 'unable'; 
                setFlashData($status, "El correo no esta registrado.");
            }
            redirect('/forgotPassword');
        }
    }

    function resetPasswordConfirmUser($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);

        // Check activation id in database
        $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);

        $data['email'] = $email;
        $data['activation_code'] = $activation_id;

        if ($is_correct == 1)
        {
            $this->load->view('newPassword', $data);
        }
        else
        {
            redirect('/login');
        }
    }


    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = strtolower($this->input->post("email"));
        $activation_id = $this->input->post("activation_code");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            // Check activation id in database
            $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);
            if($is_correct == 1)
            {                
                $this->login_model->createPasswordUser($email, $password);
                $status = 'success';
                $message = 'Contraseña cambiado correctamente';
            }
            else
            {
                $status = 'error';
                $message = 'No fue posible cambiar la contraseña';
            }
            setFlashData($status, $message);
            redirect("/login");
        }
    }
}
?>