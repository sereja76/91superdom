
<p> запрос  к симулятору тестового API и его ответ </p>
<?
$tt = $this->superdom_model->test();

echo "<pre>";
print_r($tt);


//echo json_decode($tt);
echo "</pre>";

if ($tt['statusCode'] == 200){
	echo "<p>Разбираем ответ, ['statusCode'] == 200 - запрос к API корректный</p>";
}

?>


test

