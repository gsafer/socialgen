<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Tools de ayuda
 */
class Tools_lib {

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

}