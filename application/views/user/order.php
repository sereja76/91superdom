<?

echo "<h3>Общая часть</h3>";
// вид работы
?>
<div class="form-group row textonly">
    <label class="col-2 col-form-label">Тип работы</label>
    <div class="col-4">
<?

foreach ($type_work as $work):
	if($order_type_work == $work['type_work_id']) {echo $work['type_work_title'];}
endforeach;
echo "
    </div>

    <label class='col-2 col-form-label'>Дисциплина</label>
    <div class='col-4'>";


// дисциплина

foreach ($discipline as $discipline_one):

    if($order_discipline == $discipline_one['discipline_id']) {echo $discipline_one['discipline_title'];}

endforeach;
echo "
    </div>";
?>

    <label class='col-2 col-form-label'>Тема</label>
    <div class='col-4'>
		<?=$order_subject?>
	</div>

    <label class='col-2 col-form-label'>Объем</label>
    <div class='col-4'>		
		<?=$order_volume?>
	</div>

    <label class='col-2 col-form-label'>Требования</label>
    <div class='col-4'>		
		<?=$order_requirement?>
	</div>

    <label class='col-2 col-form-label'>Срок заказа</label>
    <div class='col-4'>	
		<?=$order_deadline?>
	</div>

    <label class='col-2 col-form-label'>Срок доработки</label>
    <div class='col-4'>	
		<?=$order_deadline_fix?>
	</div>

    <label class='col-2 col-form-label'>Цена заказа</label>
    <div class='col-4'>	
		<?=$order_price_start?>
	</div>

    <label class='col-2 col-form-label'>Итоговая цена</label>
    <div class='col-4'>	
		<?=$order_price_finish?>
	</div>

    <label class='col-2 col-form-label'>Аванс 1</label>
    <div class='col-4'>	
		<?=$order_pay_1?>
	</div>

    <label class='col-2 col-form-label'>Аванс 2</label>
    <div class='col-4'>	
		<?=$order_pay_2?>
	</div>

    <label class='col-2 col-form-label'>Оплачено</label>
    <div class='col-4'>	
 		<?=$order_pay?>
    </div>

    <label class='col-2 col-form-label'>Возврат денег</label>
    <div class='col-4'>	
		<?=$order_manyback?>
	</div>

    <label class='col-2 col-form-label'>Статус</label>
    <div class='col-4'>
<?

foreach ($order_status as $status):

    if($order_statys == $status['order_status_id']) {echo $status['order_status_title'];}

endforeach;
?>

    </div>
</div>
