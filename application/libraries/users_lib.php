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

		//Inicializamos modelos
		//$this->CI->load->model("users_model");
	}

	public function registro($usuario){
		var_dump($usuario);
		die;
	}

}