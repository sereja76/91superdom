<?

class Invite_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_invite($card = FALSE)
		{
			$query = $this->db->get_where('users', array('refer' => $card));
			return $query->num_rows();
		}

		public function all_invite($card = FALSE)
		{
			$query = $this->db->get('users');
			return $query->num_rows();
		}



}