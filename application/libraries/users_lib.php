<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Gestionamos los usuarios
 */
class Users_lib {

	private $CI;

	/**
	 * Constructor
	 */
	public function __construct(){
		//Guardamos instancia CI
		if(!$this->CI){
			$this->CI =& get_instance();
		}
	}

	public function login($usuario){
		$this->CI->load->model("users_model");
		$usuario->password = sha1(md5($usuario->password));
		$usuario_test = (bool) $this->CI->users_model->getUserLogin($usuario);

		if($usuario_test == true){
			$usuario_data = $this->CI->users_model->getUserLogin($usuario, true);
			$newdata = array(
                   'nick'  => $usuario_data->nick,
                   'email'     => $usuario_data->email,
                   'logged_in' => TRUE
               );

			$this->CI->session->set_userdata($newdata);
			return true;
		} else {
			return false;
		}
	}

	public function registro($usuario){
		$this->CI->load->model("users_model");
		$usuario->password = sha1(md5($usuario->password));
		$this->CI->users_model->insertNewUser($usuario);

		return true;
	}

}	