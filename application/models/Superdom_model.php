<?

class Superdom_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    protected $base = "https://api.domyland.ru/"; // куда запросы отсылать


    private function request2 ($url, $params = [], $method = "GET")
    {

        if( $curl = curl_init() ) {

            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method); // только для пост
            //curl_setopt($curl, CURLOPT_POSTFIELDS, $content); // только для пост

            $myHeader = array(
                "User-Agent: Mozilla/4.0 (compatible; SuperDom)",
                "x-appKey: superdom-web",
                "Content-type: application/x-www-form-urlencoded",
                //"x-authorization: 91362303034846593f1f1b8983cbb96f",
            );

            curl_setopt($curl, CURLOPT_HTTPHEADER, $myHeader);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
//curl_setopt($curl, CURLOPT_URL, 'https://api.domyland.ru/auth/code?phoneNumber=79031458195');


            $query = http_build_query($params, '', '&');

            curl_setopt($curl, CURLOPT_URL, $this->base . $url . '?' . $query);


            $out = json_decode(curl_exec($curl), true);

           /* if($out->status == 'error'){
                echo "errorCode - {$out->errorCode}<br>"; // отладка
                echo "errorText - {$out->errorText}<br>"; // отладка
                echo "userMessages - {$out->userMessages['0']}<br>"; // сообщение для пользователя
            }*/
            curl_close($curl);

            //var_dump($out);
            return $out;
        }

    }






    private function request($url, $params = [], $method = "GET")
    {
        $opt = [
            "http" => [
                "method" => $method,
                "header" => "User-Agent: Mozilla/4.0 (compatible; SuperDom)\r\nx-appKey: superdom-web\r\nContent-type: application/x-www-form-urlencoded\r\n"
            ]
        ];
        $context = stream_context_create($opt);
        $query = http_build_query($params, '', '&');

        // тут же надо и ошибки обрабатывать и разбирать
        return json_decode(file_get_contents($this->base . $url . '?' . $query, false, $context), true);
    }

    public function code($phone)
    {
        return $this->request("auth/code?phoneNumber={$phone}");
    }

    public function auth_code($phoneNumber, $code)
    {
        $auth = array(
            'phoneNumber' => $phoneNumber,
            'code' => $code
        );
        $request = $this->request2("auth", $auth);

        return $request;
    }

    /*
     * Запросы от авторизованных клиентов
     * Старая версия, не используется, взамен нее все на CURL переведено
     * */
    private function request_data($url, $params = [], $authorization, $method = "GET", $content = '')
    {
        $opt = [
            "http" => [
                "method" => $method,
                "header" => "User-Agent: Mozilla/4.0 (compatible; SuperDom)\r\nx-appKey: superdom-web\r\nx-authorization:{$authorization}\r\nContent-type: application/x-www-form-urlencoded\r\n"
            ]
        ];

        if ($content != ''){
            $opt["http"] += ["content" => $content];
            // var_dump($content);
        }

        $context = stream_context_create($opt);
        $query = http_build_query($params, '', '&');

        return json_decode(file_get_contents($this->base . $url . '?' . $query, false, $context), true);

    }


    private function request_data2 ($url, $params = [], $authorization, $method = "GET", $content = '')
    {
        if( $curl = curl_init() ) {

            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method); // только для пост
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content); // только для пост

            $myHeader = array(
                "User-Agent: Mozilla/4.0 (compatible; SuperDom)",
                "x-appKey: superdom-web",
                "Content-type: application/x-www-form-urlencoded",
                "x-authorization: {$authorization}",
            );

            curl_setopt($curl, CURLOPT_HTTPHEADER, $myHeader);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);

            $query = http_build_query($params, '', '&');
            curl_setopt($curl, CURLOPT_URL, $this->base . $url . '?' . $query);
            $out = json_decode(curl_exec($curl), true);

            // !!! Только для отладки !!! Увидеть коды запросов с ошибками если таковые были
            /*if($out->status == 'error'){
                 echo "errorCode - {$out->errorCode}<br>"; // отладка
                 echo "errorText - {$out->errorText}<br>"; // отладка
                 echo "userMessages - {$out->userMessages['0']}<br>"; // сообщение для пользователя
             }*/
             // конец блока для отладки
            curl_close($curl);

            //var_dump($out); //показ ответа API полностью
            return $out;
        }



    }


    public function customer()
    {
        $params = array(
            'customerId' => $_SESSION['customerId']
        );
        $request = $this->request_data2("customer", $params, $_SESSION['authorization']);

        return $request;
    }

    public function delUser($id)
    {
        $params = array(
            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId'],
            'customerId' => $id
        );
        $request = $this->request_data2("customer", $params, $_SESSION['authorization'], "DELETE");

        return $request;
    }

    public function select_places($customer, $page)
    {

        $select_places_compani = '';
        $select_places = '';
        $buildingId = '';


        // проверка была ли форма отправлена
        $this->form_validation->set_rules('placeId', 'Помещение', 'trim|required|min_length[1]|max_length[15]');

        if ($this->form_validation->run() == FALSE) {
            //echo'не прошла проверка';

            if (isset($_SESSION['placeId'])){
                $places_pre_sel = $_SESSION['placeId'];
            }
            else{
                $places_pre_sel = '';
            }

            $flag_new_places = FALSE;
        } else // успешно сохраняется
        {
            $places_pre_sel = $this->input->post('placeId');
            $flag_new_places = TRUE;
        }


        $select_places .= "<form name=\"myForm\" action=\"{$page}\" method='POST' class=\" col-md-11 text-center center-block \">
<select name='placeId' class='form-control select2' onchange=\"document.forms['myForm'].submit()\">
            <option>Выберите обьект</option>";

        foreach ($customer as $companies):

            $select_places .= "<optgroup label='{$companies['title']}'>";

            foreach ($companies['buildings'] as $buildings):

                foreach ($buildings['places'] as $places):
                    if ($places_pre_sel == $places['id']) {
                        $sel = 'selected';
                        $select_places_compani = $companies['id'];
                        $buildingId = $buildings['id'];
                    } else {
                        $sel = '';
                    }

                    $select_places .= "<option value='{$places['id']}' {$sel}>{$buildings['title']} {$places['title']}</option>";
                endforeach;

            endforeach;
            $select_places .= "</optgroup>";
        endforeach;

        $select_places .= "</select></form>";

        if ($flag_new_places === TRUE) {
            $newdata = array(
                'placeId' => $this->input->post('placeId'),
                'companyId' => $select_places_compani,
                'buildingId' => $buildingId
            );
            $this->session->set_userdata($newdata);
        }else{
            if (!isset($_SESSION['placeId'])){
                $newdata = array(
                    'placeId' => $places['id'],
                    'companyId' => $companies['id'],
                    'buildingId' => $buildings['id']
                );
                $this->session->set_userdata($newdata);
            }
        }


        return $select_places;
    }

    public function place_customers()
    {
        $params = array(
            //'customerId' => $_SESSION['customerId'],
            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId']
        );
        $request = $this->request_data2("place/customers", $params, $_SESSION['authorization']);

        return $request;
    }

    // список собитий на обьекте
    public function place_events_list ()
    {
        $params = array(
            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId']
        );
        $request = $this->request_data2("event/list", $params, $_SESSION['authorization']);

        return $request;
    }

    // список собитий на обьекте
    public function event_show ($eventId)
    {
        //GET /event?companyId=2&buildingId=3&placeId=3&eventId=1
        $params = array(
            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId'],
            'eventId' => $eventId
        );
        $request = $this->request_data2("event", $params, $_SESSION['authorization']);

        return $request;
    }
    // Возвращает общую информацию о задолженности по коммунальным услугам жку и список лет
    public function bill_summary ()
    {
        // GET /bill/summary?companyId=1&buildingId=1&placeId=1
        $params = array(
            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId']
        );
        $request = $this->request_data2("bill/summary", $params, $_SESSION['authorization']);

        return $request;
    }

    public function bill_calendar ($year)
    {
        //GET /bill/calendar?year=2015&companyId=1&buildingId=1&placeId=1
        $params = array(
            'year' => $year,
            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId']
        );
        $request = $this->request_data2("bill/calendar", $params, $_SESSION['authorization']);

        return $request;
    }
    public function bill_month ($month, $year)
    {
        //GET /bill?month=1&year=2015&companyId=2&buildingId=3&placeId=3
        $params = array(
            'month' => $month,
            'year' => $year,
            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId']
        );
        $request = $this->request_data2("bill", $params, $_SESSION['authorization']);

        //var_dump($request);

        return $request;
    }

    public function company_paymentDetails ()
    {
        //GET / company/paymentDetails?companyId=2&buildingId=3&placeId=3
        $params = array(

            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId']
        );
        $request = $this->request_data2("company/paymentDetails", $params, $_SESSION['authorization']);

        return $request;
    }

    public function company_costs ()
    {
        //GET / company/costs?companyId=2&buildingId=3&placeId=3
        $params = array(

            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId']
        );
        $request = $this->request_data2("company/costs", $params, $_SESSION['authorization']);

        return $request;
    }
    public function bill_payLink_summary ()
    {
        //GET /bill/payLink/summary?companyId=1&buildingId=1&placeId=1
        $params = array(

            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId']
        );
        $request = $this->request_data2("bill/payLink/summary", $params, $_SESSION['authorization']);

        return $request;
    }

    public function bill_payLink ($billId)
    {
        //GET /bill/payLink?companyId=1&buildingId=1&placeId=1&billId=1
        $params = array(
            'billId' => $billId,
            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId']
        );
        $request = $this->request_data2("bill/payLink/summary", $params, $_SESSION['authorization']);

        return $request;
    }

/*    public function check_answer ($answer)
    {


        return $answer;
    }*/

    public function metric_list ()
    {
        // GET /metric/list?companyId=2&buildingId=3&placeId=3
        $params = array(
            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId']
        );
        $request = $this->request_data2("metric/list", $params, $_SESSION['authorization']);

        return $request;
    }

    public function add_customer ($phoneNumber, $firstName, $lastName)
    {
        // POST /customer?companyId=1&buildingId=1&placeId=1

        $content = '{"phoneNumber":"'.$phoneNumber.'", "firstName":"'.$firstName.'", "lastName":"'.$lastName.'", "middleName":"Иванович"}';

        $params = array(
            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId']
        );
        $request = $this->request_data2("customer", $params, $_SESSION['authorization'],"POST", $content);

        return $request;
    }


    public function add_customer_ajax ($phoneNumber, $firstName, $lastName, $companyId, $buildingId, $placeId, $authorization)
    {
        // POST /customer?companyId=1&buildingId=1&placeId=1

        $content = '{"phoneNumber":"'.$phoneNumber.'", "firstName":"'.$firstName.'", "lastName":"'.$lastName.'", "middleName":"Иванович"}';

        $params = array(
            'companyId' => $companyId,
            'buildingId' => $buildingId,
            'placeId' => $placeId
        );
        $request = $this->request_data2("customer", $params, $authorization,"POST", $content);

        return $request;
    }

    public function add_metric ($metricGroupId, $content)
    {
        // POST /metric?companyId=2&buildingId=3&placeId=3&metricGroupId=1

        //$content = '{"phoneNumber":"'.$phoneNumber.'", "firstName":"'.$firstName.'", "lastName":"'.$lastName.'", "middleName":"Иванович"}';

        $params = array(
            'companyId' => $_SESSION['companyId'],
            'buildingId' => $_SESSION['buildingId'],
            'placeId' => $_SESSION['placeId'],
            'metricGroupId' => $metricGroupId
        );
        $request = $this->request_data2("metric", $params, $_SESSION['authorization'],"POST", $content);

        return $request;
    }

/*
 *

echo $result;

// обработка ошибок
// как - у нас статус ok or error
// если ок, отдаем массив
// если error то выводим ошибку и далее ни чего не делаем.

// нужна модель которая будет разбирать ответы


*/

}