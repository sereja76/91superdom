<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('superdom_model'));
        //$this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'session'));
        $this->load->helper(array('url', 'language', 'url_helper', 'form', 'cookie'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

    }


    public function index()
    {
        if (!isset($_SESSION['phoneNumber'])) {
            redirect('lk/login', 'refresh');
        } else {
            $data['title'] = ucfirst('Личный кабинет');

            $data['customer'] = $this->superdom_model->customer();
            $data['select_places'] = $this->superdom_model->select_places($data['customer']['companies'], 'lk/index');

            $this->load->view('templates/header', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function servis()
    {
        if (!isset($_SESSION['phoneNumber'])) {
            redirect('lk/login', 'refresh');
        } else {
            $data['title'] = ucfirst('Сервис');

            $data['customer'] = $this->superdom_model->customer();
            $data['select_places'] = $this->superdom_model->select_places($data['customer']['companies'], 'lk/servis');

            $this->load->view('templates/header', $data);
            $this->load->view('user/servis', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function profile()
    {
        if (!isset($_SESSION['phoneNumber'])) {
            redirect('lk/login', 'refresh');
        } else {
            $data['title'] = ucfirst('Профиль');

            $data['customer'] = $this->superdom_model->customer();
            $data['select_places'] = $this->superdom_model->select_places($data['customer']['companies'], 'lk/profile');

            if(!isset($_SESSION['placeId']) or !isset($_SESSION['companyId']) or !isset($_SESSION['buildingId']) or !isset($_SESSION['customerId'])){ // здание не выбрано, выбирай
                $data['message'] = '<h3>Выберите обьект</h3>'.$data['select_places'];

                $data['sel_or_not'] = 'show_choce';
                $this->load->view('templates/header', $data);
                $this->load->view('message', $data);
            }
            else{
                $data['place_customers'] = $this->superdom_model->place_customers();
                $data['place_events_list'] = $this->superdom_model->place_events_list();

                $this->load->view('templates/header', $data);
                $this->load->view('user/profile', $data);
            }
            $this->load->view('templates/footer', $data);
        }
    }

    public function add_customer()
    {
        if (!isset($_SESSION['phoneNumber'])) {
            redirect('lk/login', 'refresh');
        } else {
            $data['title'] = ucfirst('Добавить пользователя');

            //$data['customer'] = $this->superdom_model->customer();
            //$data['select_places'] = $this->superdom_model->select_places($data['customer']['companies'], 'lk/profile');

            if(!isset($_SESSION['placeId']) or !isset($_SESSION['companyId']) or !isset($_SESSION['buildingId']) or !isset($_SESSION['customerId'])){ // здание не выбрано, выбирай
                $data['message'] = '<h3>Выберите обьект</h3>'.$data['select_places'];

                $data['sel_or_not'] = 'show_choce';
                $this->load->view('templates/header', $data);
                $this->load->view('message', $data);
            }
            else {

                $this->form_validation->set_rules('phoneNumber', 'Телефон', 'trim|required|min_length[1]|max_length[15]');
                $this->form_validation->set_rules('firstName', 'Имя', 'trim|required|min_length[2]|max_length[15]');
                $this->form_validation->set_rules('lastName', 'Фамилия', 'trim|required|min_length[2]|max_length[25]');

                if ($this->form_validation->run() == FALSE) {
                    //echo'не прошла проверка';
                    $data['sel_or_not'] = 'show_choce';
                    $this->load->view('templates/header', $data);
                    $this->load->view('user/add_customer', $data);
                    $this->load->view('templates/footer', $data);
                } else // успешно сохраняется
                {
                    //echo'проверка прошла';
                    $data['add_customer'] = $this->superdom_model->add_customer($this->input->post('phoneNumber'), $this->input->post('firstName'), $this->input->post('lastName'));
                    // проверка добавления

                    var_dump($data['add_customer']);

                    $data['sel_or_not'] = 'show_choce';
                    $this->load->view('templates/header', $data);
                    $data['message'] = ('Пользователь успешно добавлен');
                    $this->load->view('message', $data);

                    $this->load->view('user/add_customer', $data);
                }
            }
            $this->load->view('templates/footer', $data);
        }
    }

    public function event($eventId = FALSE)
    {
        if (!isset($_SESSION['phoneNumber'])) {
            redirect('lk/login', 'refresh');
        } else {
            if ($eventId === FALSE) {
                show_404();
            } else {
                $data['title'] = ucfirst('Информация об активности');

                $data['customer'] = $this->superdom_model->customer();
                $data['select_places'] = $this->superdom_model->select_places($data['customer']['companies'], 'lk/event/' . $eventId);
                $data['event_show'] = $this->superdom_model->event_show($eventId);

                $this->load->view('templates/header', $data);
                $this->load->view('user/event_show', $data);
                $this->load->view('templates/footer', $data);
            }
        }
    }

    public function bills()
    {
        if (!isset($_SESSION['phoneNumber'])) {
            redirect('lk/login', 'refresh');
        } else {
            $data['title'] = ucfirst('Счета');

            $data['customer'] = $this->superdom_model->customer();
            $data['select_places'] = $this->superdom_model->select_places($data['customer']['companies'], 'lk/bills');

            if(!isset($_SESSION['placeId']) or !isset($_SESSION['companyId']) or !isset($_SESSION['buildingId']) or !isset($_SESSION['customerId'])){ // здание не выбрано, выбирай
                $data['message'] = '<h3>Выберите обьект</h3>'.$data['select_places'];

                $data['sel_or_not'] = 'show_choce';
                $this->load->view('templates/header', $data);
                $this->load->view('message', $data);
            }
            else{ // логика для счетов
                //$data['place_customers'] = $this->superdom_model->place_customers();
                //$data['place_events_list'] = $this->superdom_model->place_events_list();

                $data['bill_summary'] = $this->superdom_model->bill_summary();
                $data['company_costs'] = $this->superdom_model->company_costs();
                $data['company_paymentDetails'] = $this->superdom_model->company_paymentDetails();


                $this->load->view('templates/header', $data);
                $this->load->view('user/bills', $data);
            }
            $this->load->view('templates/footer', $data);
        }
    }



    public function bill_month($month = FALSE, $year = FALSE)
    {
        if (!isset($_SESSION['phoneNumber'])) {
            redirect('lk/login', 'refresh');
        } else {
            if ($month === FALSE or $year === FALSE ) {
                show_404();
            } else {
                $data['title'] = ucfirst('Информация о счете');

                $data['customer'] = $this->superdom_model->customer();
                $data['select_places'] = $this->superdom_model->select_places($data['customer']['companies'], 'lk/bill_month/' . $month.'/'.$year);

                $data['bill_month'] = $this->superdom_model->bill_month($month, $year);

                $this->load->view('templates/header', $data);
                $this->load->view('user/bill_month', $data);
                $this->load->view('templates/footer', $data);
            }
        }
    }

/*    public function company_paymentDetails()
    {
        if (!isset($_SESSION['phoneNumber'])) {
            redirect('lk/login', 'refresh');
        } else {

                $data['title'] = ucfirst('Реквизиты УК');

                $data['customer'] = $this->superdom_model->customer();
                $data['select_places'] = $this->superdom_model->select_places($data['customer']['companies'], 'lk/company_paymentDetails');

                $data['company_paymentDetails'] = $this->superdom_model->company_paymentDetails();

                $this->load->view('templates/header', $data);
                $this->load->view('user/company_paymentDetails', $data);
                $this->load->view('templates/footer', $data);

        }
    }*/

 /*   public function company_costs()
    {
        if (!isset($_SESSION['phoneNumber'])) {
            redirect('lk/login', 'refresh');
        } else {

            $data['title'] = ucfirst('Тарифы');

            $data['customer'] = $this->superdom_model->customer();
            $data['select_places'] = $this->superdom_model->select_places($data['customer']['companies'], 'lk/company_costs');

            $data['company_costs'] = $this->superdom_model->company_costs();

            $this->load->view('templates/header', $data);
            $this->load->view('user/company_costs', $data);
            $this->load->view('templates/footer', $data);

        }
    }*/

    public function bill_payLink_summary()
    {
        if (!isset($_SESSION['phoneNumber'])) {
            redirect('lk/login', 'refresh');
        } else {

            $data['title'] = ucfirst('Тарифы');

            $data['customer'] = $this->superdom_model->customer();
            $data['select_places'] = $this->superdom_model->select_places($data['customer']['companies'], 'lk/bill_payLink_summary');

            $data['bill_payLink_summary'] = $this->superdom_model->bill_payLink_summary();

            $this->load->view('templates/header', $data);
            $this->load->view('user/bill_payLink_summary', $data);
            $this->load->view('templates/footer', $data);

        }
    }

    public function bill_payLink($id)
    {
        if (!isset($_SESSION['phoneNumber'])) {
            redirect('lk/login', 'refresh');
        } else {

            $data['title'] = ucfirst('Тарифы');

            $data['customer'] = $this->superdom_model->customer();
            $data['select_places'] = $this->superdom_model->select_places($data['customer']['companies'], 'lk/bill_payLink'.$id);

            $data['bill_payLink'] = $this->superdom_model->bill_payLink($id);

            $this->load->view('templates/header', $data);
            $this->load->view('user/bill_payLink', $data);
            $this->load->view('templates/footer', $data);

        }
    }

    public function metric_list()
    {
        if (!isset($_SESSION['phoneNumber'])) {
            redirect('lk/login', 'refresh');
        } else {

            $data['title'] = ucfirst('Показания счетчиков');
            $data['sel_or_not'] = 'show_choce';

            //$data['customer'] = $this->superdom_model->customer();
            //$data['select_places'] = $this->superdom_model->select_places($data['customer']['companies'], 'lk/metric_list');
            //$this->load->view('templates/header', $data);


            // валидация
            $this->form_validation->set_rules('send', 'Отправка', 'trim|required|min_length[2]|max_length[25]');

            // данные не отправлялись, показываем форму
            if ($this->form_validation->run() == FALSE) {

                $this->load->view('templates/header', $data);
                $data['metric_list'] = $this->superdom_model->metric_list();
                $this->load->view('user/metric_list', $data);
                $this->load->view('templates/footer', $data);


            }else{ // данные прошли валидацию
                if($this->input->post('send') == 'yes'){ // данные были отправлены, сохраняем
                    //обрабатываем запрос

                   /* echo "<pre>";
                    print_r($_POST);
                    echo "</pre>";*/

                    //$pre_json = array();
                    //$pre_json['metrics']=array();
                    // разбираем группы
                    foreach ($this->input->post('metrics') as $metrics_id => $item) {
                        //echo $metrics_id.'разбираем группы';

                        // разбираем счетчики
                        //$fields = array();
                        foreach ($item as $key => $fields) {
                            //echo $key.'разбираем счетчики';
                            
                            /*echo "<pre>";
                            var_dump($fields);
                            echo "<pre>";*/

                            // разбираем поля одного счетчика
                            $for_fields = array();
                            foreach ($fields as $key2 => $pole) {

                                $for_fields[] = array(
                                    'id' =>   $pole['id'],
                                    'value' =>   $pole['value']
                                );
                                //echo $key2.'ра    збираем поля одного счетчика';

                                /*echo "<pre>";
                               var_dump($for_fields);
                                echo "<pre>";*/

                            }
                           /* echo "<pre>";
                                //var_dump($for_fields);
                                echo "<pre>";*/
                            //$for_metrics[] = array('id' => $key, 'fields' => $for_fields);
                            $pre_json['metrics'][]  = array('id' => $key, 'fields' => $for_fields);
                        }
                        //$fields = $for_fields;
                        //add_metric
                        // при необходимости все группы отправит
                        echo json_encode($pre_json);
                        //echo $metrics_id;
                        $add_metric = $this->superdom_model->add_metric($metrics_id, json_encode($pre_json));
                        
                        /*echo "<pre>";
                        var_dump($add_metric);
                        echo "<pre>";*/
                    }

                    // показываем результат работы

                    $this->load->view('templates/header', $data);

                    if($add_metric['status'] == 'ok'){
                        $data['message'] = ucfirst('Показания успешно добавлены');

                    }else{
                        $data['message'] = ucfirst('Ошибка обработки, попробуйте еще раз позже');
                    }
                    $this->load->view('message', $data);
                    $this->load->view('templates/footer', $data);
                    //$pre_json['metrics']=array('id' => $metrics_id, 'fields' => $for_fields);
                    //echo json_encode($pre_json);

                }
                else{
                    // echo ошибка
                    $data['message'] = ucfirst('Ошибка обработки, попробуйте еще раз позже');
                    $this->load->view('message', $data);
                }
            }

            //

        }
    }


    public function login()
    {
        $data['title'] = ucfirst('Личный кабинет');

        $this->form_validation->set_rules('phone', 'Телефон', 'trim|required|min_length[5]|max_length[15]');

        if ($this->form_validation->run() == FALSE) {
            //echo 'не прошла проверка';
            $this->load->view('user/login', $data);
        } else // успешно сохраняется
        {
            //echo 'проверка прошла';
            $data['code'] = $this->superdom_model->code($this->input->post('phone'));
            $data['phone'] = $this->input->post('phone');
            $this->load->view('user/auth', $data);
        }
    }

    public function auth()
    {
        $data['title'] = ucfirst('Личный кабинет');

        $this->form_validation->set_rules('code', 'Код', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('phone', 'Телефон', 'trim|required|min_length[5]|max_length[15]');

        if ($this->form_validation->run() == FALSE) {
            //echo'не прошла проверка';
            $this->load->view('user/auth', $data);
        } else // успешно сохраняется
        {
//            echo'проверка прошла';

            $data['show'] = $this->superdom_model->auth_code($this->input->post('phone'), $this->input->post('code'));

            redirect('lk/servis', 'refresh');

        }
    }

    public function logout()
    {
        delete_cookie('auth');

        unset(
            $_SESSION['phoneNumber'],
            $_SESSION['code'],
            $_SESSION['authorization'],
            $_SESSION['customerId'],
            $_SESSION['customerName'],
            $_SESSION['customerImage'],
            $_SESSION['placeId'],
            $_SESSION['companyId'],
            $_SESSION['buildingId']
        );

        redirect('lk/index', 'refresh');
    }

    public function test(){

       echo '<pre>';
       print_r($_SESSION);
       echo '</pre>';

        if( $curl = curl_init() ) {
           /* $content = '{"phoneNumber":"'.$phoneNumber.'", "firstName":"'.$firstName.'", "lastName":"'.$lastName.'", "middleName":"Иванович"}';*/
            $content = '{"phoneNumber":"79108245791", "firstName":"СергейТ", "lastName":"ТестовскиТ", "middleName":"Иванович"}';
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST"); // только для пост
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content); // только для пост

            $myHeader = array(
                "User-Agent: Mozilla/4.0 (compatible; SuperDom)",
                "x-appKey: superdom-web",
                "Content-type: application/x-www-form-urlencoded",
                "x-authorization: de362d6ac43e945d04f45a6605a653bf",
            );

            curl_setopt($curl, CURLOPT_HTTPHEADER, $myHeader);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
            //curl_setopt($curl, CURLOPT_URL, 'https://api.domyland.ru/auth/code?phoneNumber=79031458195');

            curl_setopt($curl, CURLOPT_URL, 'https://api.domyland.ru/customer?companyId=2&buildingId=8&placeId=100');


            $out = json_decode(curl_exec($curl));

            if($out->status == 'error'){
                echo "errorCode - {$out->errorCode}<br>"; // отладка
                echo "errorText - {$out->errorText}<br>"; // отладка
                echo "userMessages - {$out->userMessages['0']}<br>"; // сообщение для пользователя
            }
            curl_close($curl);

            var_dump($out);
        }
    }

    public function photo(){

        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';

        if( $curl = curl_init() ) {
            /* $content = '{"phoneNumber":"'.$phoneNumber.'", "firstName":"'.$firstName.'", "lastName":"'.$lastName.'", "middleName":"Иванович"}';*/
            //$content = '{"phoneNumber":"79108245791", "firstName":"СергейТ", "lastName":"ТестовскиТ", "middleName":"Иванович"}';
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT"); // только для пост
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content); // только для пост

            $myHeader = array(
                "User-Agent: Mozilla/4.0 (compatible; SuperDom)",
                "x-appKey: superdom-web",
                "Content-type: application/x-www-form-urlencoded",
                "x-authorization: e4b3c7f2ff3bad808be0d007247139ec",
            );

            curl_setopt($curl, CURLOPT_HTTPHEADER, $myHeader);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
            //curl_setopt($curl, CURLOPT_URL, 'https://api.domyland.ru/auth/code?phoneNumber=79031458195');

            curl_setopt($curl, CURLOPT_URL, 'https://api.domyland.ru/customer?companyId=2&buildingId=8&placeId=100');


            $out = json_decode(curl_exec($curl));

            if($out->status == 'error'){
                echo "errorCode - {$out->errorCode}<br>"; // отладка
                echo "errorText - {$out->errorText}<br>"; // отладка
                echo "userMessages - {$out->userMessages['0']}<br>"; // сообщение для пользователя
            }
            curl_close($curl);

            var_dump($out);
        }
    }


}


/*
 * Отправка json
public function test(){

       echo '<pre>';
       print_r($_SESSION);
       echo '</pre>';

        if( $curl = curl_init() ) {
           //                                       $content = '{"phoneNumber":"'.$phoneNumber.'", "firstName":"'.$firstName.'", "lastName":"'.$lastName.'", "middleName":"Иванович"}';
$content = '{"phoneNumber":"79108245791", "firstName":"СергейТ", "lastName":"ТестовскиТ", "middleName":"Иванович"}';
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST"); // только для пост
curl_setopt($curl, CURLOPT_POSTFIELDS, $content); // только для пост

$myHeader = array(
    "User-Agent: Mozilla/4.0 (compatible; SuperDom)",
    "x-appKey: superdom-web",
    "Content-type: application/x-www-form-urlencoded",
    "x-authorization: de362d6ac43e945d04f45a6605a653bf",
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $myHeader);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
//curl_setopt($curl, CURLOPT_URL, 'https://api.domyland.ru/auth/code?phoneNumber=79031458195');

curl_setopt($curl, CURLOPT_URL, 'https://api.domyland.ru/customer?companyId=2&buildingId=8&placeId=100');


$out = json_decode(curl_exec($curl));

if($out->status == 'error'){
    echo "errorCode - {$out->errorCode}<br>"; // отладка
    echo "errorText - {$out->errorText}<br>"; // отладка
    echo "userMessages - {$out->userMessages['0']}<br>"; // сообщение для пользователя
}
curl_close($curl);

var_dump($out);
}
}*/

