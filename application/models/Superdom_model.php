<?

class Superdom_model extends CI_Model {

    public function __construct()
        {
                $this->load->database();
        }
		
	protected $base = "https://api.domyland.ru/";
	
	//protected $base = "http://91superdom.it-76.ru/lk/json/";



	private function request($url, $params = [], $method = "GET") {
		$opt = [
			"http" => [
				"method" => $method,
				"header" => "User-Agent: Mozilla/4.0 (compatible; SuperDom)\r\nx-appKey: superdom-web\r\nContent-type: application/x-www-form-urlencoded\r\n"
			]
		];
		$context = stream_context_create($opt);
		$query = http_build_query($params, '', '&');
		$query = '';
		//return json_decode(file_get_contents('http://it-76.ru', false, $context), true);

		//echo $this->base.$url.''.$query;

		// тут же надо и ошибки обрабатывать и разбирать
		//return json_decode(file_get_contents($this->base.$url.'?'.$query, false, $context), true);

		return json_decode(file_get_contents($this->base.$url.'?'.$query, false, $context), true);  

		
	}

	public function test() {
		return $this->request("auth/code?phoneNumber=79031458195");
		//return $this->request("sayHello");
	}

}	