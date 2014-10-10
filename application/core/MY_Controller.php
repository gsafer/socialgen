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
    }

    public function goHome(){
    	header("location: " . base_url());
    	die;    	
    }

}