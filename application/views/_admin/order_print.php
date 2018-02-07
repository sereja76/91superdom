<style type="text/css" media="print">
button {display: none; }
</style>

<button onclick="window.print();">Печать</button>



<div class="form-group row">
    <label class="col-2 col-form-label">Тип работы</label>
    <div class="col-10">
<?

foreach ($type_work as $work):
    if($order_type_work == $work['type_work_id']) {echo $work['type_work_title'];}
endforeach;
echo "
    </div>
</div>
<div class='form-group row'>
    <label class='col-2 col-form-label'>Дисциплина</label>
    <div class='col-10'>";


// дисциплина

foreach ($discipline as $discipline_one):

    if($order_discipline == $discipline_one['discipline_id']) {echo $discipline_one['discipline_title'];}

endforeach;
echo "
    </div>
</div>";
?>
<div class='form-group row'>
    <label class='col-2 col-form-label'>Тема</label>
    <div class='col-10'>
        <?=$order_subject?>
    </div>
</div>


<div class='form-group row'>
    <label class='col-2 col-form-label'>Объем</label>
    <div class='col-10'>        
        <?=$order_volume?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Требования</label>
    <div class='col-10'>        
        <?=$order_requirement?>
    </div>
</div>


<div class='form-group row'>
    <label class='col-2 col-form-label'>Срок заказа</label>
    <div class='col-10'>    
        <?=$order_deadline?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Срок доработки</label>
    <div class='col-10'>    
        <?=$order_deadline_fix?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Цена заказа</label>
    <div class='col-10'>    
        <?=$order_price_start?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Итоговая цена</label>
    <div class='col-10'>    
        <?=$order_price_finish?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Аванс 1</label>
    <div class='col-10'>    
        <?=$order_pay_1?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Аванс 2</label>
    <div class='col-10'>    
        <?=$order_pay_2?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Оплачено</label>
    <div class='col-10'>    
        <?=$order_pay?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Возврат денег</label>
    <div class='col-10'>    
        <?=$order_manyback?>
    </div>
</div>


<p>Часть автора</p>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Срок заказа</label>
    <div class='col-10'>    
        <?=$order_autor_deadline?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Срок доработки</label>
    <div class='col-10'>    
        <?=$order_autor_deadline_fix?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Цена автора</label>
    <div class='col-10'>    
        <?=$order_autor_price?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Аванс автору 1</label>
    <div class='col-10'>    
        <?=$order_autor_pay_1?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Аванс автору 2</label>
    <div class='col-10'>    
        <?=$order_autor_pay_2?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Оплачено</label>
    <div class='col-10'>    
        <label class="custom-control custom-radio">
            <?=$order_autor_pay?>
        </label>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Возврат денег</label>
    <div class='col-10'>    
        <?=$order_autor_manyback?>
    </div>
</div>




<div class='form-group row'>
    <label class='col-2 col-form-label'>Статус</label>
    <div class='col-10'>
        <?
        foreach ($order_status as $status):
            if($order_statys == $status['order_status_id']) {echo $status['order_status_title'];}
        endforeach;
        ?>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Заметки</label>
    <div class='col-10'>    
        <?=$order_note?>
    </div>
</div>

