<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Autor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('other_model'));
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
				
		$this->load->helper(array('url','language', 'url_helper', 'form'));


		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

	}

	
	// if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
	// разделение на админ это или простой пользователь
	
	// redirect if needed, otherwise display the user list
	public function index()
	{
		if (!$this->ion_auth->logged_in() or !$this->ion_auth->in_group('autor') )
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}

		redirect('autor/orders', 'refresh');

	}

	public function orders($order = FALSE) 
	{
		if (!$this->ion_auth->logged_in() or !$this->ion_auth->in_group('autor') )
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		if ($order === FALSE)
        	{
				$data['orders'] = $this->other_model->get_orders_autor($this->session->userdata('identity') );
				
				
				$data['title'] = ucfirst('Заказы');
				
		        $this->load->view('templates/header_au', $data);

		        if(count($data['orders']) > 0){
		        	
		        	// получить список статусов
					$data['order_status'] = $this->other_model->get_order_status();	

		        	$this->load->view('autor/orders', $data);
		        }
		        else{
		        	$data['message'] = 'Заказов пока нет';
					$this->load->view('message', $data);
		        }

		        $this->load->view('templates/footer', $data);
        	}
			else {
					$row = $this->other_model->order_info($order);
					
					if($row->order_autor != $this->session->userdata('identity')){
						show_404();
					}
					else{
						// получить список клиентов					
						$data['all_customers'] = $this->other_model->get_all_customers();
						// получить список статусов
						$data['order_status'] = $this->other_model->get_order_status();					
						// получить список статусов
						$data['type_work'] = $this->other_model->get_type_work();
						// получить список статусов
						$data['discipline'] = $this->other_model->get_discipline();
						// получить список авторов
						$data['all_autors'] = $this->other_model->get_all_autor();

						$data['order_id'] = $order;
						$data['order_type_work'] = $row->order_type_work;
						$data['order_discipline'] = $row->order_discipline;
						$data['order_subject'] = $row->order_subject;
						$data['order_volume'] = $row->order_volume;
						$data['order_requirement'] = $row->order_requirement;
						$data['order_user_identity'] = $row->order_user_identity;
						$data['order_deadline'] = $row->order_autor_deadline;
						$data['order_deadline_fix'] = $row->order_autor_deadline_fix;
						$data['order_price_start'] = $row->order_autor_price;
						//$data['order_price_finish'] = $row->order_price_finish;
						$data['order_pay_1'] = $row->order_autor_pay_1;
						$data['order_pay_2'] = $row->order_autor_pay_2;
						$data['order_pay'] = $row->order_autor_pay;
						$data['order_manyback'] = $row->order_autor_manyback;
						$data['order_statys'] = $row->order_statys;

						$data['title'] = ucfirst('Заказ');
						$this->load->view('templates/header_au', $data);
						$this->load->view('autor/order', $data);	
						$this->load->view('templates/footer', $data);
					}	
			}

	}


	public function data()
	{
		if (!$this->ion_auth->logged_in() or !$this->ion_auth->in_group('autor') )
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}

		$data['title'] = ucfirst('Личные данные');
        $this->load->view('templates/header_au', $data);
		
		$this->form_validation->set_rules('first_name', 'Имя', 'trim|required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('last_name', 'Фамилия', 'trim|required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('phone', 'Телефон', 'trim|required|min_length[5]|max_length[15]');
		//$this->form_validation->set_rules('social', 'Ссылка в соцсети', 'trim|required|min_length[5]|max_length[30]');
		//$this->form_validation->set_rules('dr', 'День рождения', 'trim|required|min_length[6]|max_length[16]');

		if ($this->form_validation->run() == FALSE)
                {	
					$query = $this->db->get_where('users', array('username' => $this->session->userdata('identity')), 1);
					$row = $query->row();
					$data['username'] = $row->username;
					$data['first_name'] = $row->first_name;
					$data['last_name'] = $row->last_name;
					$data['phone'] = $row->phone;

					$this->load->view('autor/data', $data);

                }
                else // успешно сохраняется
                {
					 $data = array(
								   'first_name' => $this->input->post('first_name'),
								   'last_name' => $this->input->post('last_name'),
								   'phone' => $this->input->post('phone'),			
								   ); 
					$this->db->where('username', $this->session->userdata('identity') );
					$this->db->update('users', $data);
					
					redirect('autor/data', 'refresh');

                }

        $this->load->view('templates/footer', $data);
	}
	


	
}
