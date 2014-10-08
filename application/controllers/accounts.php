<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent :: __construct();
	}

	public function registro(){	
		$this->data->error = false;

		//Datos del formulario
		$this->data->nick  = $this->input->post('nick');
		$this->data->nombre  = $this->input->post('nombre');
		$this->data->apellido  = $this->input->post('apellido');
		$this->data->email  = $this->input->post('email');
		$this->data->reemail  = $this->input->post('reemail');
		$this->data->password  = $this->input->post('password');
		
		$this->data->dia  = $this->input->post('dia');
		$this->data->mes  = $this->input->post('mes');
		$this->data->ano  = $this->input->post('ano');

		//Comprobamos nick

		//Comprobamos nombre y apellido
		if (strlen($this->data->nombre) < 3 || strlen($this->data->nombre) > 30 || strlen($this->data->apellido) < 3 || strlen($this->data->apellido) > 30) {
		    $this->data->error = true;
			$this->data->e_type = 'NOMBRE';
		}

		//Comprobamos email
		if (!filter_var($this->data->email, FILTER_VALIDATE_EMAIL)) {
		    $this->data->error = true;
			$this->data->e_type = 'EMAIL';
		}

		//Comprobamos password
		if (strlen($this->data->password) < 5 || strlen($this->data->password) > 12) {
		    $this->data->error = true;
			$this->data->e_type = 'PASS';
		}

		//Comprobamos dia, mes y año
		$range_dia = array("options"=>array("min_range"=>0, "max_range"=>31));
		$range_mes = array("options"=>array("min_range"=>0, "max_range"=>12));
		$range_ano = array("options"=>array("min_range"=>1900, "max_range"=>2014));

		$this->data->dia = ltrim($this->data->dia, '0');
		$this->data->mes = ltrim($this->data->mes, '0');
		$this->data->ano = ltrim($this->data->ano, '0');

		if (!filter_var($this->data->dia, FILTER_VALIDATE_INT, $range_dia) 
			|| !filter_var($this->data->mes, FILTER_VALIDATE_INT, $range_mes) 
			|| !filter_var($this->data->ano, FILTER_VALIDATE_INT, $range_ano)) {
			$this->data->error = true;
			$this->data->e_type = 'EDAD';
		}
		
		if($this->data->error === false){
			//Guardamos el registro en bd
			$this->load->library("users_lib");
			$this->users_lib->registro($this->data);
			$this->load->view('registro', $this->data);
			die;
		}

		$this->load->view('registro', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */