<?

class Superdom_model extends CI_Model {

    public function __construct()
        {
                $this->load->database();
        }
		
	protected $base = "https://api.domyland.ru/";

	private function request($url, $params = [], $method = "GET") {
		$opt = [
			"http" => [
				"method" => $method,
				"header" => "User-Agent: Mozilla/4.0 (compatible; SuperDom)\r\nx-appKey: superdom-web\r\nContent-type: application/x-www-form-urlencoded\r\n"
			]
		];
		$context = stream_context_create($opt);
		$query = http_build_query($params, '', '&');

		// тут же надо и ошибки обрабатывать и разбирать
		return json_decode(file_get_contents($this->base.$url.'?'.$query, false, $context), true);
	}

	public function code($phone) {
		return $this->request("auth/code?phoneNumber={$phone}");

	}

    public function auth_code ($phoneNumber, $code) {

        $auth =array(
            'phoneNumber'   => $phoneNumber,
            'code'  => $code
        );
        $request = $this->request("auth", $auth);


        $newdata = array(
            'phoneNumber'  => $phoneNumber,
            //'code'     => $code,
            'authorization'=> $request['authorization'],
            'customerId'=> $request['customerId'],
            'customerName'=> $request['customerName'],
            'customerImage'=> $request['customerImage']
        );

        $this->session->set_userdata($newdata);

        return $request;
    }

    private function request_data($url, $params = [], $authorization, $method = "GET") {
        $opt = [
            "http" => [
                "method" => $method,
                "header" => "User-Agent: Mozilla/4.0 (compatible; SuperDom)\r\nx-appKey: superdom-web\r\nx-authorization:{$authorization}\r\nContent-type: application/x-www-form-urlencoded\r\n"
            ]
        ];
        $context = stream_context_create($opt);
        $query = http_build_query($params, '', '&');

        // тут же надо и ошибки обрабатывать и разбирать
        return json_decode(file_get_contents($this->base.$url.'?'.$query, false, $context), true);
    }
}	