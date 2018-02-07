<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('other_model'));
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
				
		$this->load->helper(array('url','language', 'url_helper', 'form'));


		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

	}

	public function index()
	{
		if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		//$data['total_cross'] = $this->cross_model->digit_cross(); // по всей системе переходов
		//$data['total_invite'] = $this->invite_model->all_invite();  // по всей системе партнеров	
		
		//$data['total_cards'] = $this->card_model->total_cards(); 
		//$data['total_cards_pay'] = $this->card_model->total_cards_pay();
		//$data['total_cards_amount'] = json_decode(json_encode($this->card_model->total_cards_amount()), true);
		
		
		//$data['cards'] = $this->card_model->get_all_cards();
		
		$data['title'] = ucfirst('Панель администратора');

		$data['stat'] = $this->other_model->get_stat();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
	}

	public function users($user = FALSE) 
	{
		
		if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		if ($user === FALSE)
        {
                $data['users'] = $array = json_decode(json_encode($this->ion_auth->users()->result()), true);
				$data['title'] = ucfirst('Cписок клиентов');

				$this->load->view('templates/header_admin', $data);
				$this->load->view('admin/users', $data);
				$this->load->view('templates/footer', $data);
        }
		else {
		$data['user'] = $array = json_decode(json_encode($this->ion_auth->user($user)->row()), true);
		$data['title'] = ucfirst('Информация о клиенте');
		//$data['cross'] = $this->cross_model->user_cross($user);
		
        $this->load->view('templates/header_admin', $data);
		
		
		$this->form_validation->set_rules('first_name', 'Имя', 'trim|required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('last_name', 'Фамилия', 'trim|required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('phone', 'Телефон', 'trim|required|min_length[5]|max_length[15]');
		//$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[20]');
		//$this->form_validation->set_rules('num_yd', 'Номер кошелька', 'trim|required|min_length[5]|max_length[16]');
		$this->form_validation->set_rules('social', 'Ссылка в соцсети', 'trim|required|min_length[5]|max_length[30]');
		$this->form_validation->set_rules('dr', 'День рождения', 'trim|required|min_length[6]|max_length[16]');


		if ($this->form_validation->run() == FALSE)
                {	
					$query = $this->db->get_where('users', array('id' => $user), 1);
					$row = $query->row();
					$data['id'] = $row->id;
					$data['username'] = $row->username;
					$data['first_name'] = $row->first_name;
					$data['last_name'] = $row->last_name;
					$data['phone'] = $row->phone;
					//$data['email'] = $row->email;
					//$data['num_yd'] = $row->num_yd;
					//$data['refer'] = $row->refer;
					$data['sex'] = $row->sex;
					$data['social'] = $row->social;
					$data['dr'] = $row->dr;
					
					
					$this->load->view('admin/user', $data);
					
					$data['orders'] = $this->other_model->get_orders($data['username']);

					if(count($data['orders']) > 0){
						
						// получить список статусов
						$data['order_status'] = $this->other_model->get_order_status();	

						$this->load->view('admin/orders_user', $data);
					}
					else{
						$data['message'] = 'Заказов пока нет';
						$this->load->view('message', $data);
					}
			
				}
                else // успешно сохраняется
                {
					 $data = array(
								   'first_name' => $this->input->post('first_name'),
								   'last_name' => $this->input->post('last_name'),
								   'phone' => $this->input->post('phone'),
								   //'email' => $this->input->post('email'),					
								   //'num_yd' => $this->input->post('num_yd'),	
								   'social' => $this->input->post('social'),
								   'dr' => $this->input->post('dr'),				
								   ); 
					$this->db->where('id', $user );
					$this->db->update('users', $data);
					
					redirect('admin/users/'.$user.'', 'refresh');

                }

        $this->load->view('templates/footer', $data); }
	}

	public function autors($autor = FALSE) 
	{
		
		if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		if ($autor === FALSE)
        {
                $data['autors'] = $this->other_model->get_all_autor();
				$data['title'] = ucfirst('Список авторов');

				$this->load->view('templates/header_admin', $data);
				$this->load->view('admin/autors', $data);
				$this->load->view('templates/footer', $data);
        }
		else {
		$data['title'] = ucfirst('Автор');

		
        $this->load->view('templates/header_admin', $data);
		
		
		$this->form_validation->set_rules('first_name', 'Имя', 'trim|required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('last_name', 'Фамилия', 'trim|required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('phone', 'Телефон', 'trim|required|min_length[5]|max_length[15]');

		if ($this->form_validation->run() == FALSE)
                {
					$row = $this->other_model->autor_info($autor);
					
					$data['id'] = $row->id;
					$data['username'] = $row->username;
					$data['first_name'] = $row->first_name;
					$data['last_name'] = $row->last_name;
					$data['phone'] = $row->phone;
					
					$this->load->view('admin/autor', $data);
					
					
					$data['orders'] = $this->other_model->get_orders_autor($data['username']);
				

					if(count($data['orders']) > 0){
						
						// получить список статусов
						$data['order_status'] = $this->other_model->get_order_status();	

						$this->load->view('admin/orders_autor', $data);
					}
					else{
						$data['message'] = 'Заказов пока нет';
						$this->load->view('message', $data);
					}

                }
                else // успешно сохраняется
                {
					 $data = array(
								   'first_name' => $this->input->post('first_name'),
								   'last_name' => $this->input->post('last_name'),
								   'phone' => $this->input->post('phone'),				
								   ); 
					$this->db->where('id', $autor );
					$this->db->update('users', $data);
					
					redirect('admin/autors/'.$autor.'', 'refresh');

                }

        $this->load->view('templates/footer', $data); }
	}


	public function orders($order = FALSE) 
	{
		
		if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		if ($order === FALSE)
        {
        		$data['orders'] = $this->other_model->all_orders();
				$data['title'] = ucfirst('Список заказов');

				// получить список статусов
				$data['order_status'] = $this->other_model->get_order_status();	

				$this->load->view('templates/header_admin', $data);
				$this->load->view('admin/orders', $data);
				$this->load->view('templates/footer', $data);
        }
		else {
		$data['title'] = ucfirst('Заказ');

        $this->load->view('templates/header_admin', $data);
		
		$this->form_validation->set_rules('order_type_work', 'Тип работы', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_discipline', 'Дисциплина', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_subject', 'Тема', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_volume', 'Объем', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_requirement', 'Требования', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_deadline', 'Срок заказа', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_deadline_fix', 'Срок доработки', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_price_start', 'Цена заказа', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_price_finish', 'Итоговая цена', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_pay_1', 'Аванс 1', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_pay_2', 'Аванс 2', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_pay', 'Оплачено', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_manyback', 'Возврат денег', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_statys', 'Статус', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor', 'Выберите автора', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_deadline', 'Срок заказа', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_deadline_fix', 'Срок доработки', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_price', 'Цена автора', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_pay_1', 'Аванс автору 1', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_pay_2', 'Аванс автору 2', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_pay', 'Оплата', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_manyback', 'Возврат денег', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_note', 'Заметки', 'trim|max_length[100000]');
		$this->form_validation->set_rules('order_promo', 'Промокод', 'trim|max_length[100]');


		if ($this->form_validation->run() == FALSE)
                {	
					$row = $this->other_model->order_info($order);
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
					$data['order_deadline'] = $row->order_deadline;
					$data['order_deadline_fix'] = $row->order_deadline_fix;
					$data['order_price_start'] = $row->order_price_start;
					$data['order_price_finish'] = $row->order_price_finish;
					$data['order_pay_1'] = $row->order_pay_1;
					$data['order_pay_2'] = $row->order_pay_2;
					$data['order_pay'] = $row->order_pay;
					$data['order_manyback'] = $row->order_manyback;
					$data['order_statys'] = $row->order_statys;
					$data['order_autor'] = $row->order_autor;
					$data['order_autor_deadline'] = $row->order_autor_deadline;
					$data['order_autor_deadline_fix'] = $row->order_autor_deadline_fix;
					$data['order_autor_price'] = $row->order_autor_price;
					$data['order_autor_pay_1'] = $row->order_autor_pay_1;
					$data['order_autor_pay_2'] = $row->order_autor_pay_2;
					$data['order_autor_pay'] = $row->order_autor_pay;
					$data['order_autor_manyback'] = $row->order_autor_manyback;
					$data['order_note'] = $row->order_note;
					$data['order_promo'] = $row->order_promo;

					$this->load->view('admin/order', $data);

					// показываем все заказы по клиенты

                }
                else // успешно сохраняется
                {
					 $data = array(
								   'order_type_work' => $this->input->post('order_type_work'),
								   'order_discipline' => $this->input->post('order_discipline'),
								   'order_subject' => $this->input->post('order_subject'),
								   'order_volume' => $this->input->post('order_volume'),
								   'order_requirement' => $this->input->post('order_requirement'),
								   'order_user_identity' => $this->input->post('order_user_identity'),
								   'order_deadline' => $this->input->post('order_deadline'),
								   'order_deadline_fix' => $this->input->post('order_deadline_fix'),
								   'order_price_start' => $this->input->post('order_price_start'),
								   'order_price_finish' => $this->input->post('order_price_finish'),
								   'order_pay_1' => $this->input->post('order_pay_1'),
								   'order_pay_2' => $this->input->post('order_pay_2'),
								   'order_pay' => $this->input->post('order_pay'),
								   'order_manyback' => $this->input->post('order_manyback'),
								   'order_statys' => $this->input->post('order_statys'),
								   'order_autor' => $this->input->post('order_autor'),
								   'order_autor_deadline' => $this->input->post('order_autor_deadline'),
								   'order_autor_deadline_fix' => $this->input->post('order_autor_deadline_fix'),
								   'order_autor_price' => $this->input->post('order_autor_price'),
								   'order_autor_pay_1' => $this->input->post('order_autor_pay_1'),
								   'order_autor_pay_2' => $this->input->post('order_autor_pay_2'),
								   'order_autor_pay' => $this->input->post('order_autor_pay'),
								   'order_autor_manyback' => $this->input->post('order_autor_manyback'),
								   'order_note' => $this->input->post('order_note'),
								   'order_promo' => $this->input->post('order_promo')   				   				
								   ); 
					$this->db->where('order_id', $order );
					$this->db->update('orders', $data);

					// отсылаем уведомления send_email($to, $from, $subject, $message, $from_title)

					if ($this->input->post('order_user_identity') != ''){
						$message = "Заказ ".$order." был обновлен";

						$this->other_model->send_email($this->input->post('order_user_identity'), 'robot@'.$_SERVER['HTTP_HOST'], 'Изменения в заказе', $message, 'Сервис заочник'); // пользователю
					}
					
					if ($this->input->post('order_autor') != ''){
						$this->other_model->send_email($this->input->post('order_autor'), 'robot@'.$_SERVER['HTTP_HOST'], 'Изменения в заказе', $message, 'Сервис заочник'); ; // автору
					}


					
					redirect('admin/orders/'.$order.'', 'refresh');

                }

        $this->load->view('templates/footer', $data); }
	}

	public function print_orders($order = FALSE) 
	{
		
		if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		if ($order === FALSE)
        {
        	show_404();
        }
		else {
		$data['title'] = ucfirst('Заказ');

		
        $this->load->view('templates/header_admin', $data);

					$row = $this->other_model->order_info($order);
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
					$data['order_deadline'] = $row->order_deadline;
					$data['order_deadline_fix'] = $row->order_deadline_fix;
					$data['order_price_start'] = $row->order_price_start;
					$data['order_price_finish'] = $row->order_price_finish;
					$data['order_pay_1'] = $row->order_pay_1;
					$data['order_pay_2'] = $row->order_pay_2;
					$data['order_pay'] = $row->order_pay;
					$data['order_manyback'] = $row->order_manyback;
					$data['order_statys'] = $row->order_statys;
					$data['order_autor'] = $row->order_autor;
					$data['order_autor_deadline'] = $row->order_autor_deadline;
					$data['order_autor_deadline_fix'] = $row->order_autor_deadline_fix;
					$data['order_autor_price'] = $row->order_autor_price;
					$data['order_autor_pay_1'] = $row->order_autor_pay_1;
					$data['order_autor_pay_2'] = $row->order_autor_pay_2;
					$data['order_autor_pay'] = $row->order_autor_pay;
					$data['order_autor_manyback'] = $row->order_autor_manyback;
					$data['order_note'] = $row->order_note;

					$this->load->view('admin/order_print', $data);

					// показываем все заказы по клиенты

        $this->load->view('templates/footer', $data); 
    }
	}


public function add_order() // Добавляем пользователя
		{
					if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		$data['title'] = ucfirst('Добавление заказа');

        $this->load->view('templates/header_admin', $data);

		$this->form_validation->set_rules('order_user_identity', 'Выберите клиента', 'trim|required|min_length[1]|max_length[100]');
//		$this->form_validation->set_rules('password', 'Пароль ', 'trim|required|min_length[1]|max_length[100]');
//		$this->form_validation->set_rules('level', 'Доступ ', 'trim|required|min_length[1]|max_length[100]');

		$this->form_validation->set_rules('order_type_work', 'Тип работы', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_discipline', 'Дисциплина', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_subject', 'Тема', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_volume', 'Объем', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_requirement', 'Требования', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_deadline', 'Срок заказа', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_deadline_fix', 'Срок доработки', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_price_start', 'Цена заказа', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_price_finish', 'Итоговая цена', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_pay_1', 'Аванс 1', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_pay_2', 'Аванс 2', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_pay', 'Оплачено', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_manyback', 'Возврат денег', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_statys', 'Статус', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor', 'Выберите автора', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_deadline', 'Срок заказа', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_deadline_fix', 'Срок доработки', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_price', 'Цена автора', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_pay_1', 'Аванс автору 1', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_pay_2', 'Аванс автору 2', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_pay', 'Оплата', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_autor_manyback', 'Возврат денег', 'trim|max_length[100]');
		$this->form_validation->set_rules('order_note', 'Заметки', 'trim|max_length[100000]');

		if ($this->form_validation->run() == FALSE) // показываем форму добавления заказа
                {	
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

					$this->load->view('admin/add_order', $data);
                }
                else // успешно сохраняемся
                {
					 $data = array(
								   'order_type_work' => $this->input->post('order_type_work'),
								   'order_discipline' => $this->input->post('order_discipline'),
								   'order_subject' => $this->input->post('order_subject'),
								   'order_volume' => $this->input->post('order_volume'),
								   'order_requirement' => $this->input->post('order_requirement'),
								   'order_user_identity' => $this->input->post('order_user_identity'),
								   'order_deadline' => $this->input->post('order_deadline'),
								   'order_deadline_fix' => $this->input->post('order_deadline_fix'),
								   'order_price_start' => $this->input->post('order_price_start'),
								   'order_price_finish' => $this->input->post('order_price_finish'),
								   'order_pay_1' => $this->input->post('order_pay_1'),
								   'order_pay_2' => $this->input->post('order_pay_2'),
								   'order_pay' => $this->input->post('order_pay'),
								   'order_manyback' => $this->input->post('order_manyback'),
								   'order_statys' => $this->input->post('order_statys'),
								   'order_autor' => $this->input->post('order_autor'),
								   'order_autor_deadline' => $this->input->post('order_autor_deadline'),
								   'order_autor_deadline_fix' => $this->input->post('order_autor_deadline_fix'),
								   'order_autor_price' => $this->input->post('order_autor_price'),
								   'order_autor_pay_1' => $this->input->post('order_autor_pay_1'),
								   'order_autor_pay_2' => $this->input->post('order_autor_pay_2'),
								   'order_autor_pay' => $this->input->post('order_autor_pay'), 
								   'order_autor_manyback' => $this->input->post('order_autor_manyback'),
								   'order_note' => $this->input->post('order_note')   
								   ); 

						$this->db->insert('orders', $data);	
								
						$data['message'] = 'Заказ успешно добавлен';
						$this->load->view('message', $data);

                }

        $this->load->view('templates/footer', $data); 
		}


public function customer_add() // Добавляем пользователя
		{
					if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		$data['title'] = ucfirst('Добавление покупателя');

        

		$this->form_validation->set_rules('username', 'Логин ', 'trim|required|min_length[1]|max_length[100]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Пароль ', 'trim|required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim');
        $this->form_validation->set_rules('sex', 'Пол', 'trim');
        $this->form_validation->set_rules('social', 'Ссылка на соцсеть', 'trim');
        $this->form_validation->set_rules('dr', 'Др', 'trim');
        $this->form_validation->set_rules('phone', 'Телефон', 'trim');


		if ($this->form_validation->run() == FALSE)
                {	
					$data['message'] = '';
					$this->load->view('admin/customer_add', $data);
                }
                else // успешно сохраняется
                {
					// надо пароль добавить и дату
					 $data = array(
								   'username' => $this->input->post('username'),
								   'first_name' => $this->input->post('first_name'),
								   'last_name' => $this->input->post('last_name'),
								   'phone' => $this->input->post('phone'),
								   'sex' => $this->input->post('sex'),
								   'social' => $this->input->post('social'),
								   'dr' => $this->input->post('dr'),
								   //'create_date' => date("Y-m-d H:i:s"),  
								   'active' => 1,
								   'password' => $this->ion_auth->hash_password($this->input->post('password'), false, FALSE)
								   ); 

							$this->db->insert('users', $data);
							

							// смотрим какой id максимальный
							$this->db->select_max('id');
							$q_id_new_user = $this->db->get('users');
							$id_new_user = $q_id_new_user->row();
						
						// добавляем соотв группу						
						$data = array(
								   'user_id' => $id_new_user->id,
								   'group_id' => 0								   
								   ); 
						$this->db->insert('users_groups', $data);		
								
					$data['title'] = ucfirst('Добавление покупателя');
					$data['message'] = 'Пользователь успешно добавлен';
					$this->load->view('templates/header_admin', $data);
					$this->load->view('message', $data);
					$this->load->view('templates/footer', $data); 
                }

        
		}

public function autor_add() // Добавляем пользователя
		{
					if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		$data['title'] = ucfirst('Добавление автора');

        

		$this->form_validation->set_rules('username', 'Логин ', 'trim|required|min_length[1]|max_length[100]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Пароль ', 'trim|required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim');
        $this->form_validation->set_rules('phone', 'Телефон', 'trim');

		if ($this->form_validation->run() == FALSE)
                {	
					$data['message'] = '';
					$this->load->view('admin/autor_add', $data);
                }
                else // успешно сохраняется
                {
					// надо пароль добавить и дату
					 $data = array(
								   'username' => $this->input->post('username'),
								   'first_name' => $this->input->post('first_name'),
								   'last_name' => $this->input->post('last_name'),
								   'phone' => $this->input->post('phone'), 
								   'active' => 1,
								   'password' => $this->ion_auth->hash_password($this->input->post('password'), false, FALSE)
								   ); 

							$this->db->insert('users', $data);
							

							// смотрим какой id максимальный
							$this->db->select_max('id');
							$q_id_new_user = $this->db->get('users');
							$id_new_user = $q_id_new_user->row();
						
						// добавляем соотв группу						
						$data = array(
								   'user_id' => $id_new_user->id,
								   'group_id' => 2								   
								   ); 
						$this->db->insert('users_groups', $data);		
								
					$data['title'] = ucfirst('Добавление автора');
					$data['message'] = 'Автор успешно добавлен';
					$this->load->view('templates/header_admin', $data);
					$this->load->view('message', $data);
					$this->load->view('templates/footer', $data); 
                }

        
		}

/* Типы работ */

public function type_work_add() // Добавляем запись
		{
					if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		$data['title'] = ucfirst('Добавление типа работы');

        $this->load->view('templates/header_admin', $data);

		$this->form_validation->set_rules('title', 'Значение ', 'trim|required|min_length[1]|max_length[100]');

		if ($this->form_validation->run() == FALSE)
                {	
					$data['ok'] = '';
					$this->load->view('admin/type_work_add', $data);
                }
                else // успешно сохраняется
                {
					// надо пароль добавить и дату
					$data = array(
								   'type_work_title' => $this->input->post('title')							   
								   ); 
					$this->db->insert('type_work', $data);

					$data['ok'] = 'Тип работ успешно добавлен'; 
					
					$this->load->view('admin/type_work_add', $data);

                }

        $this->load->view('templates/footer', $data); 
		}

public function type_work_del($id = FALSE) // удаляем запись
		{
			if (!$this->ion_auth->in_group('admin'))
			{
				redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
			}
			
			if ($id === FALSE)
			{
				show_404();
			}
			else {
				$this->db->delete('type_work', array('type_work_id' => $id ));	
				
				redirect('admin/li', 'refresh');
			}
		}	

public function type_work ($id = FALSE) 
	{
		if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		if ($id === FALSE) // показываем список всех записей
        {
			show_404();
        }
		else {
		$data['title'] = ucfirst('Изменить тип работы');
        $this->load->view('templates/header_admin', $data);

		$this->form_validation->set_rules('title', 'Значение ', 'trim|min_length[1]|max_length[100]');

		if ($this->form_validation->run() == FALSE)
                {	
					$this->db->select('*');
					$this->db->from('type_work');
					$this->db->where('type_work_id', $id);
					$query = $this->db->get();
					$row = $query->row();
					
					$data['type_work_id'] = $row->type_work_id;
					$data['type_work_title'] = $row->type_work_title;
				
					$this->load->view('admin/type_work', $data);
                }
                else // успешно сохраняется
                {
					$data = array(
								   'type_work_title' => $this->input->post('title')							   
								   ); 
					$this->db->where('type_work_id', $id );
					$this->db->update('type_work', $data);

					redirect('admin/type_work/'.$id.'', 'refresh');
                }
        $this->load->view('templates/footer', $data); }
	}

/* Дисциплины */

public function discipline_add() // Добавляем запись
		{
					if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		$data['title'] = ucfirst('Добавление дисциплины');

        $this->load->view('templates/header_admin', $data);

		$this->form_validation->set_rules('title', 'Значение ', 'trim|required|min_length[1]|max_length[100]');

		if ($this->form_validation->run() == FALSE)
                {	
					$data['ok'] = '';
					$this->load->view('admin/discipline_add', $data);
                }
                else // успешно сохраняется
                {
					$data = array(
								   'discipline_title' => $this->input->post('title')							   
								   ); 
					$this->db->insert('discipline', $data);

					$data['ok'] = 'Дисциплина успешно добавлена'; 
					
					$this->load->view('admin/discipline_add', $data);
                }
        $this->load->view('templates/footer', $data); 
		}

public function discipline_del($id = FALSE) // удаляем запись
		{
			if (!$this->ion_auth->in_group('admin'))
			{
				redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
			}
			
			if ($id === FALSE)
			{
				show_404();
			}
			else {
				$this->db->delete('discipline', array('discipline_id' => $id ));	
				
				redirect('admin/li', 'refresh');
			}
		}	

public function discipline ($id = FALSE) 
	{
		if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		if ($id === FALSE) // показываем список всех записей
        {
			show_404();
        }
		else {
		$data['title'] = ucfirst('Изменить дисциплину');
        $this->load->view('templates/header_admin', $data);

		$this->form_validation->set_rules('title', 'Значение ', 'trim|min_length[1]|max_length[100]');

		if ($this->form_validation->run() == FALSE)
                {	
					$this->db->select('*');
					$this->db->from('discipline');
					$this->db->where('discipline_id', $id);
					$query = $this->db->get();
					$row = $query->row();
					
					$data['discipline_id'] = $row->discipline_id;
					$data['discipline_title'] = $row->discipline_title;
				
					$this->load->view('admin/discipline', $data);
                }
                else // успешно сохраняется
                {
					$data = array(
								   'discipline_title' => $this->input->post('title')							   
								   ); 
					$this->db->where('discipline_id', $id );
					$this->db->update('discipline', $data);

					redirect('admin/discipline/'.$id.'', 'refresh');
                }
        $this->load->view('templates/footer', $data); }
	}



/* Промокоды */

public function promo_add() // Добавляем запись
		{
					if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		$data['title'] = ucfirst('Добавление промокода');

        $this->load->view('templates/header_admin', $data);

		$this->form_validation->set_rules('promo_sum', 'Сумма ', 'trim|required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('promo_title', 'Описание ', 'trim|required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('promo_code', 'Код', 'trim|required|min_length[1]|max_length[100]');

		if ($this->form_validation->run() == FALSE)
                {	
					$data['ok'] = '';
					$this->load->view('admin/promo_add', $data);
                }
                else // успешно сохраняется
                {
					$data = array(
								   'promo_sum' => $this->input->post('promo_sum'),
								   'promo_code' => $this->input->post('promo_code'),
								   'promo_title' => $this->input->post('promo_title')							   
								   ); 
					$this->db->insert('promo', $data);

					$data['ok'] = 'Промокод успешно добавлен'; 
					
					$this->load->view('admin/promo_add', $data);
                }
        $this->load->view('templates/footer', $data); 
		}

public function promo_del($id = FALSE) // удаляем запись
		{
			if (!$this->ion_auth->in_group('admin'))
			{
				redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
			}
			
			if ($id === FALSE)
			{
				show_404();
			}
			else {
				$this->db->delete('promo', array('promo_id' => $id ));	
				
				redirect('admin/li', 'refresh');
			}
		}	

public function promo ($id = FALSE) 
	{
		if (!$this->ion_auth->in_group('admin'))
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		if ($id === FALSE) // показываем список всех записей
        {
			show_404();
        }
		else {
		$data['title'] = ucfirst('Изменить промокод');
        $this->load->view('templates/header_admin', $data);

		$this->form_validation->set_rules('promo_sum', 'Сумма ', 'trim|required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('promo_title', 'Описание ', 'trim|required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('promo_code', 'Код', 'trim|required|min_length[1]|max_length[100]');

		if ($this->form_validation->run() == FALSE)
                {	
					$this->db->select('*');
					$this->db->from('promo');
					$this->db->where('promo_id', $id);
					$query = $this->db->get();
					$row = $query->row();
					
					$data['promo_id'] = $row->promo_id;
					$data['promo_title'] = $row->promo_title;
					$data['promo_sum'] = $row->promo_sum;
					$data['promo_code'] = $row->promo_code;
				
					$this->load->view('admin/promo', $data);
                }
                else // успешно сохраняется
                {
					$data = array(
								   'promo_sum' => $this->input->post('promo_sum'),
								   'promo_code' => $this->input->post('promo_code'),
								   'promo_title' => $this->input->post('promo_title')								   
								   ); 
					$this->db->where('promo_id', $id );
					$this->db->update('promo', $data);

					redirect('admin/promo/'.$id.'', 'refresh');
                }
        $this->load->view('templates/footer', $data); }
	}


	public function li () // списки
		{
			if (!$this->ion_auth->in_group('admin'))
			{
				redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
			}
				// получить списки type work code
				$data['type_work'] = $this->other_model->get_type_work(); // все виды работ
				$data['discipline'] = $this->other_model->get_discipline();
				$data['promo'] = $this->other_model->get_promo();
				
				$data['title'] = ucfirst('Списки');
				$this->load->view('templates/header_admin', $data);
				$this->load->view('admin/li', $data);
				$this->load->view('templates/footer', $data);
		}

	public function check_promo () // проверка промокода

		{
			// проверяем используется ли он в заказах кроме этого у этого пользователя?

			// получаем сумму и описание
			//order_id='+order_id+'&order_promo='+order_promo,
			//$aRes = 'Ответ AJAX код'.rand(0,99);

			if($this->input->post('order_promo') ==''){
				$aRes = 'Введите промокод';
			}
			else{

				// инфа по промокоду
				$query4 = $this->db->get_where('promo', array('promo_code' => $this->input->post('order_promo')),1);
				if(count($query4->result_array()) < 1){ // найден или нет промокод
					$aRes = 'Промокода с таким кодом не найдено';
				}
				else{ // промокод найден
					$promo_sum = $query4->row()->promo_sum;
					$promo_title = $query4->row()->promo_title;


					if($this->input->post('order_id') =='0'){ // новый заказ
						// достаточно чтоб не было заказов в этим номером

	        			$query_p1 = $this->db->get_where('orders', array('order_promo' => $this->input->post('order_promo'), 'order_user_identity' => $this->input->post('order_user_identity')));
	        			
	        			if(count($query_p1->result_array()) > 0){
	        				$aRes = 'Промокод уже был использован';
	        			}
	        			else{
	        				$aRes = "Промокод '$promo_title' на сумму $promo_sum руб.";
	        			}

					}
					else{ // промо в существующем заказе - пишем, 
						//Есть ли этот код в других заказах уже есть - пока, дубль


						// по простому есть кодов больше чем 1 то пока

						$query_p1 = $this->db->get_where('orders', array('order_promo' => $this->input->post('order_promo'), 'order_user_identity' => $this->input->post('order_user_identity')));
	        			
	        			if(count($query_p1->result_array()) > 0){
	        				// проверяем в текущем заказе или в другом он был использован

	        				$aRes = "Промокод '$promo_title' на сумму $promo_sum руб."; // начальное значение

	        				// Если номера заказов не совпадает с текущим ответ изменится
	        				foreach ($query_p1->result_array() as $order_item): 
	        					if($order_item['order_id'] != $this->input->post('order_id')){
	        						$aRes = 'Промокод уже был использован';
	        					}
							endforeach;

	        				
	        			}
	        			else{
	        				$aRes = "Промокод '$promo_title' на сумму $promo_sum руб.";
	        			}

					}
			}
			}

			// aRes - результат 

			//$aRes = 'Ответ AJAX код'.rand(0,99);

			echo $aRes;
		}	




















	
	
	
	






}
