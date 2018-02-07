<?
echo validation_errors();
echo form_open('admin/lesson');

echo '
<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:"textarea" });</script>

<h3>Текст для главной страницы личного кабинета - приветствие<h3>
<textarea id="txt_index" name="txt_index">'.$txt_index.'</textarea>
<h3>Текст для страницы материалы<h3> 
<textarea  id="txt_lesson" name="txt_lesson">'.$txt_lesson.'</textarea></br>';


echo form_submit('mysubmit', 'Сохранить');
echo form_close();


?>
