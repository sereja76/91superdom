<?

class Other_model extends CI_Model {

    public function __construct()
        {
                $this->load->database();
        }
		


	public function all_orders() // показ всех зказов для админа
		{
            $this->db->order_by('order_id', 'DESC');
			$query = $this->db->get('orders');
            return $query->result_array();
        
		}
	public function get_orders($identity) // показ всех зказов для пользователя
		{
            $this->db->order_by('order_id', 'DESC');
			$query = $this->db->get_where('orders', array('order_user_identity' => $identity));
            return $query->result_array();
		}

	public function get_orders_autor($identity) // показ всех зказов для автора
		{
            $this->db->order_by('order_id', 'DESC');
			$query = $this->db->get_where('orders', array('order_autor' => $identity));
            return $query->result_array();
		}

	public function get_all_customers() // показ всех зказов для пользователя
		{
			// поля from (владелец воронки)
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('users_groups', 'users_groups.user_id = users.id');
		    $this->db->where('users_groups.group_id', '0');
			$query = $this->db->get();
            return $query->result_array();
		}

	public function get_all_autor() // показ всех зказов для пользователя
		{
			// поля from (владелец воронки)
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('users_groups', 'users_groups.user_id = users.id');
		    $this->db->where('users_groups.group_id', '2');
			$query = $this->db->get();
            return $query->result_array();
		}

	public function order_info($order_id) // информация по одному заказу
		{
			$query = $this->db->get_where('orders', array('order_id' => $order_id), 1);
            return $query->row();
		}

	public function autor_info($id) // информация по одному автору
		{
			$query = $this->db->get_where('users', array('id' => $id), 1);
            return $query->row();
		}

	public function get_order_status() // показ всех зказов для пользователя
		{
            $query = $this->db->get('order_status');
            return $query->result_array();
		}
	public function get_type_work() // показ всех типов работ
		{
            $query = $this->db->get('type_work');
            return $query->result_array();
		}

	public function get_discipline() // показ всех дисциплин
		{
            $query = $this->db->get('discipline');
            return $query->result_array();
		}

	public function get_promo() // показ всех дисциплин
		{
            $query = $this->db->get('promo');
            return $query->result_array();
		}

	public function get_stat() // считаем статистику
		{
        	$query_s1 = $this->db->get_where('orders', array('order_statys' => 1));
        	$stat['s1'] = count($query_s1->result_array());
        	
        	$query_s2 = $this->db->get_where('orders', array('order_statys' => 2));
        	$stat['s2'] = count($query_s2->result_array());
        	
        	$query_s3 = $this->db->get_where('orders', array('order_statys' => 3));
        	$stat['s3'] = count($query_s3->result_array());
        	
        	$query_s4 = $this->db->get_where('orders', array('order_statys' => 4));
        	$stat['s4'] = count($query_s4->result_array());
        	
        	$query_s5 = $this->db->get_where('orders', array('order_statys' => 5));
        	$stat['s5'] = count($query_s5->result_array());
        	
        	$query_s6 = $this->db->get_where('orders', array('order_statys' => 6));
        	$stat['s6'] = count($query_s6->result_array());
        	
        	$query_s7 = $this->db->get_where('orders', array('order_statys' => 7));
        	$stat['s7'] = count($query_s7->result_array());
        	
        	$query_s8 = $this->db->get_where('orders', array('order_statys' => 8));
        	$stat['s8'] = count($query_s8->result_array());
        	
        	$query_s9 = $this->db->get_where('orders', array('order_statys' => 9));
        	$stat['s9'] = count($query_s9->result_array());
        	
        	$query_s10 = $this->db->get_where('orders', array('order_statys' => 10));
        	$stat['s10'] = count($query_s10->result_array());

			$query_s11 = $this->db->get_where('orders', array('order_statys' => 11));
        	$stat['s11'] = count($query_s11->result_array());
			
        	$query_sall = $this->db->get('orders');
        	$stat['sall'] = count($query_sall->result_array());
            // 10 статусов

            //Сумма +
        	$this->db->select_sum('order_price_finish');
			$query = $this->db->get('orders');
			//Сумма -
			$this->db->select_sum('order_autor_price');
			$query2 = $this->db->get('orders');

			$stat['sprofit'] = $query->row()->order_price_finish - $query2->row()->order_autor_price;

            //Сумма возвраты авторам
        	$this->db->select_sum('order_autor_manyback');
			$query3 = $this->db->get('orders');
			//Сумма  возвраты клиентам
			$this->db->select_sum('order_manyback');
			$query4 = $this->db->get('orders');

			$stat['smanyback'] = $query3->row()->order_autor_manyback + $query4->row()->order_manyback;

            return $stat;
		}

public function send_email($to, $from, $subject, $message, $from_title)
	{
	
	require_once "class.phpmailer.php";
		
	// Используем класс PHPMailer
	$mail = new PHPMailer();
	$mail->IsMail();

	// Добавляем адрес получателя
	$mail->AddAddress($to); // кому
	$mail->Subject = $subject; // Тема
	$mail->MsgHTML($message); // сообщение
	$mail->AddReplyTo($from, $from_title); // ??
	$mail->SetFrom('robot@'.$_SERVER['HTTP_HOST'], $from_title);
	$mail->Send();

	return;
	}

		
}

