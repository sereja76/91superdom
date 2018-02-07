<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
		public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language', 'cookie'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}
	
	public function index()
	{
		$data['pr'] = get_cookie('pr');
		$data['part_continue'] = ucfirst('1'); 
		$this->load->view('welcome_message', $data);
	}
/*	
	public function affilate($user = NULL)
	{
		if (isset($user)) {
			set_cookie("pr", $user, 2592000);
			$ip = $_SERVER['REMOTE_ADDR'];
			$data = array(
					'refer' => $user,
					'ip' => $ip
			);
			$this->db->insert('cross', $data);
			redirect('http://card-dev.it-76.ru/', 'refresh');
		}
		

		$this->load->view('welcome_message', $data);


	} // конец блока
*/		
}
