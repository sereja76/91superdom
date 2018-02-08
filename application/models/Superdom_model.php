<?

class Superdom_model extends CI_Model {

    public function __construct()
        {
                $this->load->database();
        }
		
	protected $base = "https://api.domyland.ru/"; // куда запросы отсылать

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

    /*
     * Запросы от авторизованных клиентов
     * */
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

    public function customer () {
        $params =array(
            'customerId'   => $_SESSION['customerId']
        );
        $request = $this->request_data("customer", $params, $_SESSION['authorization']);

        return $request;
    }

    public function select_places ($customer) {
        $select_places ='';
        $select_places .="<select class='form-control select2'>
            <option>Выберите обьект</option>";


        foreach ($customer as $companies):

            $select_places .= "<optgroup label='{$companies['title']}'>";

            foreach ($companies['buildings'] as $buildings):

                //echo '  '.$buildings['title'];

                foreach ($buildings['places'] as $places):
                    //echo ' '.$places['title']."<br/>";
                    $select_places .= "<option value='{$places['id']}'>{$buildings['title']} {$places['title']}</option>";
                endforeach;

            endforeach;
            $select_places .= "</optgroup>";
        endforeach;

        $select_places .= "</select>";

        return $select_places;
    }
}