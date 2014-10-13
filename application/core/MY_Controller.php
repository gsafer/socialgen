<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class donde heredan todos los controladores
 */
class MY_Controller extends CI_Controller {

    /**
     * Constructor
     */
    public function __construct($alias = null) {
        parent :: __construct();

        //Control de errores
        $this->data->e_type = "NONE";
        $this->data->error = false;
        $this->checkLogin();
    }

    public function goHome(){
    	header("location: " . base_url());
    	die;    	
    }

    public function checkLogin(){
        $cookie = $this->cookie->get_cookie('socialgen_login');

        if(!$cookie){
            $this->cookie->set_cookie('socialgen_login', true);
            die("si");
        } else {
            die("no");
        }
    }
     
}