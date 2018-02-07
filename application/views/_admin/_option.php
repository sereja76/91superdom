<?
echo validation_errors();
echo form_open('admin/options');

?>

Email для уведомлений:<br/>
<input type="text" size="40" name="email" value="<?=$email?>"><br/>
Минимальная сумма для выплаты, руб.:<br/>
<input type="text" size="40" name="min" value="<?=$min?>"><br/><br/>


<?
echo form_submit('mysubmit', 'Обновить');
echo form_close();

?>