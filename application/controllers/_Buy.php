<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		
		$this->lang->load('auth');
	}

	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh'); // если не авторизован то иди на главную
		}
		
		if ($this->ion_auth->in_group('admin'))
		{
			redirect('admin/index', 'refresh');
		}
	

		$data['title'] = ucfirst('Личный кабинет');
        $this->load->view('templates/header', $data);
        $this->load->view('user/lk', $data);
        $this->load->view('templates/footer', $data);
	}
	
	public function buy_tariff ($type_card = NULL, $part_continue = NULL)
	{
		
		if ($this->ion_auth->in_group('admin'))
		{
			redirect('admin/index', 'refresh');
		}

		 if ($type_card != 'one' and $type_card != 'two' and $type_card != 'three')
        {
                show_404();
        }
		else {
				set_cookie("need_card", $type_card, 259200);
				set_cookie("part_continue", $part_continue, 259200);
				
				$data['title'] = ucfirst('Покупка тарифа ').$type_card;
				$this->load->view('templates/header', $data);
				
				// авторизован или нет - показать этот блок
				
					if (!$this->ion_auth->logged_in())
						{ // не авторизован
								
						// Блок войти или зарегистрироваться
						$this->load->view('user/enter_or_registration');
						
						}
						else {
							if ($type_card == 'one') 	{$data['amount'] = 1000;}
							if ($type_card == 'two') 	{$data['amount'] = 2552;}
							if ($type_card == 'three') 	{$data['amount'] = 25511;}
							$data['user'] = $this->session->userdata('identity');
							
							//продажа, тк уже авторизован
							//$this->session->unset_userdata('need_card'); //удаляем сессию о покупке, она больше не нужна
							
							delete_cookie('need_card');
							delete_cookie('part_continue');
							
							//добавить в базу информацию о покупке
							//id дата сумма пользователь
							
							$add_card = array(
							'amount' => $data['amount'],
							'statys' => 0,
							'type' => $type_card,
							'refer' => $this->session->userdata('refer'),
							'user' => $this->session->userdata('identity')
							);

							$this->db->insert('card', $add_card);
							
							$this->load->view('user/pay_form', $data);
							
						}

				$this->load->view('templates/footer', $data);		
		}
		
		
		// если не авторизован то показывается форма авторизации или предложения зарегаться, в обработчик авторизации добавить условие - если есть сессия что хочет купить - то посылаем на страницу оплаты, аналогично и с регистрацией.
		
		// так же эта страница будет и обрабатывать запросы на покупку из личного кабинета, а тут просто - сумма и кнопки оплаты - банально форма оплаты, тут же сразу пишем в базу наш заказ
		
	}
	
public function payment()
	{
		
		$secret = 'vN1C36MX1zhUuk3gEtslG9kD'; // секрет, который мы получили в первом шаге от яндекс.
		// получение данных.
		$r = array(
		
			'notification_type' => $this->input->post('notification_type'), // p2p-incoming / card-incoming - с кошелька / с карты
			'operation_id'      => $this->input->post('operation_id'),      // Идентификатор операции в истории счета получателя.
			'amount'            => $this->input->post('amount'),            // Сумма, которая зачислена на счет получателя.
			'withdraw_amount'   => $this->input->post('withdraw_amount'),   // Сумма, которая списана со счета отправителя.
			'currency'          => $this->input->post('intval'),            // Код валюты — всегда 643 (рубль РФ согласно ISO 4217).
			'datetime'          => $this->input->post('datetime'),          // Дата и время совершения перевода.
			'sender'            => $this->input->post('sender'),            // Для переводов из кошелька — номер счета отправителя. Для переводов с произвольной карты — параметр содержит пустую строку.
			'codepro'           => $this->input->post('codepro'),           // Для переводов из кошелька — перевод защищен кодом протекции. Для переводов с произвольной карты — всегда false.
			'label'             => $this->input->post('label'),             // Метка платежа. Если ее нет, параметр содержит пустую строку.
			'sha1_hash'         => $this->input->post('sha1_hash')         // SHA-1 hash параметров уведомления.
		);

		// проверка хеш
		if (sha1($r['notification_type'].'&'.
				 $r['operation_id'].'&'.
				 $r['amount'].'&'.
				 $r['currency'].'&'.
				 $r['datetime'].'&'.
				 $r['sender'].'&'.
				 $r['codepro'].'&'.
				 $secret.'&'.
				 $r['label']) != $r['sha1_hash']) {
			exit('Верификация не пройдена. SHA1_HASH не совпадает.'); // останавливаем скрипт. у вас тут может быть свой код.
		}

		// обработаем данные. нас интересует основной параметр label и withdraw_amount для получения денег без комиссии для пользователя.
		// либо если вы хотите обременить пользователя комиссией - amount, но при этом надо учесть, что яндекс на странице платежа будет писать "без комиссии".
		$r['amount']          = floatval($r['amount']);
		$r['withdraw_amount'] = floatval($r['withdraw_amount']);
		$r['label']           = intval($r['label']); // здесь я у себя передаю id юзера, который пополняет счет на моем сайте. поэтому обрабатываю его intval

		// дальше ваш код для обновления баланса пользователя / для вставки полученного платежа в историю платежей, например:
		//db_query('INSERT INTO payments (user_id, amount) VALUES('.$r['label'].', ',$r['amount']')'); // ваш запрос в базу
		
		$data = array(
        'statys' => 1
			);

			$this->db->where('amount', $r['withdraw_amount']);
			$this->db->where('user', $r['label']);
			$this->db->where('statys', 0);
			$this->db->order_by('id', 'DESC');
			$this->db->limit(0, 1);
			$this->db->update('card', $data);
	}
	
	
	
	



}