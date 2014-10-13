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

	public function recoveryPass(){
		$this->data->email  = $this->input->post('email');
		$this->load->library("users_lib");

		$this->data->verifyed = false;
		if($this->input->post()){
			if($this->users_lib->recoveryPassSender($this->data->email)){
				$this->data->verifyed = true;
				$this->load->view('recoverypass', $this->data);
			} else {
				$this->data->error = true;
				$this->data->e_type = 'RECOVERY';
				$this->load->view('recoverypass', $this->data);
			}
		} else {
			$this->load->view('recoverypass', $this->data);
		}
	}

	public function logout(){
		$this->data->login = $this->session->all_userdata();
		if(isset($this->data->login['logged_in']) && $this->data->login['logged_in'] === true){
			$this->session->sess_destroy();
			$this->goHome();
		} else {
			show_404();
		}
	}

	public function login(){
		$this->data->error = false;

		$this->data->nick  = $this->input->post('nick');
		$this->data->password  = $this->input->post('password');

		$this->load->library("users_lib");
		
		if($this->users_lib->login($this->data)){
			$this->goHome();	
		} else {
			$this->data->error = true;
			$this->data->e_type = 'LOGIN';
			$this->load->view('login', $this->data);
		}
	}

	public function registro(){	
		$this->data->error = false;

		if($this->input->post()){
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

			//Comprobamos dia, mes y año
			$range_dia = array("options"=>array("min_range"=>0, "max_range"=>31));
			$range_mes = array("options"=>array("min_range"=>0, "max_range"=>12));
			$range_ano = array("options"=>array("min_range"=>1900, "max_range"=>2014));

			$this->data->dia = ltrim($this->data->dia, '0');
			$this->data->mes = ltrim($this->data->mes, '0');
			$this->data->ano = ltrim($this->data->ano, '0');

			$edad = $this->data->dia  . "-" . $this->data->mes . "-" . $this->data->ano;
			$this->data->edad = date('Y-m-d', strtotime($edad));

			if (!filter_var($this->data->dia, FILTER_VALIDATE_INT, $range_dia) 
				|| !filter_var($this->data->mes, FILTER_VALIDATE_INT, $range_mes) 
				|| !filter_var($this->data->ano, FILTER_VALIDATE_INT, $range_ano)) {
				$this->data->error = true;
				$this->data->e_type = 'EDAD';
			}

			//Comprobamos password
			if (strlen($this->data->password) < 5 || strlen($this->data->password) > 12) {
			    $this->data->error = true;
				$this->data->e_type = 'PASS';
			}

			//Comprobamos nombre y apellido
			if (strlen($this->data->nombre) < 3 || strlen($this->data->nombre) > 30 || strlen($this->data->apellido) < 3 || strlen($this->data->apellido) > 30) {
			    $this->data->error = true;
				$this->data->e_type = 'NOMBRE';
			}

			$this->load->library('users_lib');
			$check_email = $this->users_lib->checkEmail($this->data->email);
			if(!$check_email) {
				$this->data->error = true;
				$this->data->e_type = 'EMAILCHECK';
			}

			//Comprobamos email
			if (!filter_var($this->data->email, FILTER_VALIDATE_EMAIL) || $this->data->email !== $this->data->reemail) {
			    $this->data->error = true;
				$this->data->e_type = 'EMAIL';
			}

			$this->load->library('users_lib');
			$check_nick = $this->users_lib->checkNick($this->data->nick);
			if(!$check_nick) {
				$this->data->error = true;
				$this->data->e_type = 'NICKCHECK';
			}

			//Comprobamos nick
			if(strlen($this->data->nick) < 3 || strlen($this->data->nick) > 10){
				$this->data->error = true;
				$this->data->e_type = 'NICK';
			}
				
			if($this->data->error === false){
				//Guardamos el registro en bd
				$this->load->library("users_lib");
				$this->users_lib->registro($this->data);
				$this->load->view('login', $this->data);
			} else {
				$this->load->view('registro', $this->data);
			}	
		} else {
			$this->load->view('registro', $this->data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */