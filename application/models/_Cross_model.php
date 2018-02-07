<?

class Cross_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_cross($id = FALSE)
		{
			$query = $this->db->get_where('cross', array('refer' => $id));
			return $query->num_rows();
		}

		public function all_cross($id = FALSE)
		{
			$query = $this->db->get('cross');
			return $query->result_array();
		}
		
		public function digit_cross()
		{
			$query = $this->db->get('cross');
			return $query->num_rows();
		}

		public function user_cross($id = FALSE)
		{
			$query = $this->db->get_where('cross', array('refer' => $id));
			return $query->result_array();
		}


}