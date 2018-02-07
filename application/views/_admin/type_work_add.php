<?
echo "<p>".$ok."</p>";
echo validation_errors();
echo form_open('admin/type_work_add');
?>



<div class='form-group row'>
    <label class='col-2 col-form-label'>Значение</label>
    <div class='col-10'>    
        <input type="text" size="40" name="title" value="" placeholder="Тип работы" class='form-control'>
    </div>
</div>

<button type="submit" class="btn btn-primary">Добавить</button>
<?
echo form_close();
?>