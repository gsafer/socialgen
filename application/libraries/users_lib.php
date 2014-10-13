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

	public function checkEmail($email){
		$this->CI->load->model('users_model');
		$ckeck_email = (bool) $this->CI->users_model->getUserByEmail($email);
		
		if($ckeck_email === true){
			return false;
		} else {
			return true;
		}
	}

	public function checkNick($nick){
		$this->CI->load->model('users_model');
		$ckeck_nick = (bool) $this->CI->users_model->getUserByNick($nick);
		
		if($ckeck_nick === true){
			return false;
		} else {
			return true;
		}
	}

	public function recoveryPassSender($email){
		$this->CI->load->model("users_model");
		$usuario = $this->CI->users_model->getUserByEmail($email, true);

		if($usuario){
			$token = md5(rand() . $usuario->nick . $usuario->password . time()); 
			$this->CI->users_model->saveToken($token, $usuario->id);

			$this->data->mensaje = "Puedes recuperar tu contraseña, a través del siguiente enlace <a href='". base_url() . "accounts/recoveryPass/" . $token . "'>reestablecer contraseña</a>";
			$this->CI->load->library('email');
		    $this->CI->email->clear();
		    $this->CI->email->to($email);
		    $this->CI->email->from('no-reply@socialgen.com');
		    $this->CI->email->subject('Restablecer contraseña');
		    $this->CI->email->message($this->data->mensaje);
		    $this->CI->email->send();

		    return true;
		} else {
			return false;
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