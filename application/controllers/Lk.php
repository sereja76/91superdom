<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('superdom_model'));
		//$this->load->database();
		$this->load->library(array('ion_auth','form_validation','session'));
		$this->load->helper(array('url','language', 'url_helper', 'form','cookie'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

	}


	public function index()
	{
		if (!isset($_SESSION['phoneNumber']))
		{
            redirect('lk/login', 'refresh');
		}
        else{
            $data['title'] = ucfirst('Личный кабинет');

            $data['message'] = 'Тест страница';



            $data['customer'] = $this->superdom_model->customer();

            $data['select_places'] = $this->superdom_model->select_places($data['customer']['companies']);


            $this->load->view('templates/header', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer', $data);
         }



	}

    public function login()
    {
        $data['title'] = ucfirst('Личный кабинет');

        $this->form_validation->set_rules('phone', 'Телефон', 'trim|required|min_length[5]|max_length[15]');

        if ($this->form_validation->run() == FALSE)
        {
            echo'не прошла проверка';
            $this->load->view('user/login', $data);
        }
        else // успешно сохраняется
        {
            echo'проверка прошла';

            $data['code'] = $this->superdom_model->code($this->input->post('phone'));
            $data['phone'] = $this->input->post('phone');
            $this->load->view('user/auth', $data);


        }
    }
    public function auth()
    {
        $data['title'] = ucfirst('Личный кабинет');

        $this->form_validation->set_rules('code', 'Код', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('phone', 'Телефон', 'trim|required|min_length[5]|max_length[15]');

        if ($this->form_validation->run() == FALSE)
        {
            //echo'не прошла проверка';
            $this->load->view('user/auth', $data);
        }
        else // успешно сохраняется
        {
            //echo'проверка прошла';

            $data['show'] = $this->superdom_model->auth_code($this->input->post('phone'), $this->input->post('code'));

            redirect('lk/index', 'refresh');

        }
    }


    public function logout ()
    {
        delete_cookie('auth');

        unset(
            $_SESSION['phoneNumber'],
            $_SESSION['code'],
            $_SESSION['authorization'],
            $_SESSION['customerId'],
            $_SESSION['customerName'],
            $_SESSION['customerImage']
        );

        redirect('lk/index', 'refresh');
    }
}
