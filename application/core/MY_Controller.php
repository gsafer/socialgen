<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class donde heredan todos los controladores
 */
class MY_Controller extends CI_Controller {

    protected $data_cookie;

    /**
     * Constructor
     */
    public function __construct($alias = null) {
        parent :: __construct();

        $this->load->library('MY_gettext');
        
        //Configuración de cookie
        $this->data_cookie = new stdClass();
        $this->data_cookie->name = 'socialgen_login';
        $this->data_cookie->path = "/";
        $this->data_cookie->secure = false;
        $dominio_per = explode('/',base_url());
        $this->data_cookie->domain = $dominio_per[2];
        $this->data_cookie->expire = 0;

        //Control de errores
        $this->data->e_type = "NONE";
        $this->data->error = false;

        //Configuramos la pagina por defecto
        $this->data->section = 'users';
        $this->data->page = 'home';
    }

    public function goHome(){
    	header("location: " . base_url());
    	die;    	
    }

    public function setSessionsLogin($usuario_data = null){

        if($this->session->userdata('nick')){
            $usuario_data->nick = $this->session->userdata('nick');
            $usuario_data->email = $this->session->userdata('email');
            $usuario_data->id = $this->session->userdata('id');
        }       

        if($usuario_data){
            $newdata = array(
                       'nick'  => $usuario_data->nick,
                       'email'     => $usuario_data->email,
                       'id'     => $usuario_data->id,
                       'logged_in' => TRUE
                   );

            //Generamos la sesión de login
            $this->session->set_userdata($newdata);

            $cookie_data = serialize($newdata);

            //Generamos las cookies de sesión necesarias para la navegación
            setcookie($this->data_cookie->name, $cookie_data, $this->data_cookie->expire, $this->data_cookie->path);

            return true;
        } else {
            return false;
        }
    }

    public function checkLogin(){
        if (isset($_COOKIE[$this->data_cookie->name])) {
            $this->setSessionsLogin();
            return true;
        } else {
            return false;
        }
    }
     
}