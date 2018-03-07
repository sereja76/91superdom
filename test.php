<?

        // $url = 'https://api.domyland.ru/customer?companyId=2&buildingId=8&placeId=100';
        // $params = array(
        //     'phoneNumber' => '79991234455',
        //     'firstName' => 'Тест',
        //     'lastName' => 'Тестовски',
        //     'middleName' => 'Иванович'
        // );

        // var_dump(file_get_contents($url, false, stream_context_create(array(
        //     'http' => array(
        //         'method'  => 'POST',
        //         "header" => "User-Agent: Mozilla/4.0 (compatible; SuperDom)\r\nx-appKey: superdom-web\r\nx-authorization:a77dc41c9db2c72fd71b42213d00a91e\r\nContent-type: application/x-www-form-urlencoded\r\n",
        //         //'content' => 'phoneNumber=79991234455&firstName=Тест&lastName=Тестовски&middleName=Иванович'//http_build_query($params) 
        //     )))));


//list($boundary, $content) = getContent($postData, $files);
	// формируем правильный запрос
	// $content  = 'POST /customer?companyId=2&buildingId=8&placeId=100  HTTP/1.1' . "\n"
	// 			. 'Host: https://api.domyland.ru\n'
	// 			. 'User-Agent: Mozilla/4.0 (compatible; SuperDom)\r\n
	// 				x-appKey: superdom-web\r\n
	// 				x-authorization:a77dc41c9db2c72fd71b42213d00a91e\r\n
	// 				Content-type: application/x-www-form-urlencoded\r\n'
	// 			//. 'Content-Type: multipart/form-data; boundary=' . $boundary . "\n"
	// 			//. 'Content-Length: ' . strlen($content) . "\n"
	// 			.'Content: phoneNumber=79991234455&firstName=Тест&lastName=Тестовски&middleName=Иванович' . "\n"
	// 			. 'Connection: close' 
	// 			. "\n\n";
	// // ошибка подключения
	// $errno = 0;
	// $errstr = '';
	// // ответ
	// $responce = '';
	// // подключаемся
	// if(!($socket = fsockopen('https://api.domyland.ru/customer?companyId=2&buildingId=8&placeId=100', 80, $errno, $errstr, 15))) {
	// 	die('FAIL!');
	// }
	// // отправляем данные
	// fwrite($socket, $content);
	// // получаем ответ
	// while (!feof($socket)) {
	// 	$responce .= fgets($socket, 128);
	// }
	// // закрываем соединение
	// fclose($socket);
	
	// var_export($responce);


$url = 'https://api.domyland.ru/customer?companyId=2&buildingId=8&placeId=100';
//параметры которые необходимо передать
$params = array(
     'phoneNumber' => '79991234455',
             'firstName' => 'Тест',
             'lastName' => 'Тестовски',
             'middleName' => 'Иванович'
);
$result = file_get_contents($url, false, stream_context_create(array(
    'http' => array(
        'method'  => 'POST',
        "header" => "User-Agent: Mozilla/4.0 (compatible; SuperDom)\r\nx-appKey: superdom-web\r\nx-authorization:a77dc41c9db2c72fd71b42213d00a91e\r\nContent-type: application/x-www-form-urlencoded\r\n",
        'content' => http_build_query($params)
    )
)));