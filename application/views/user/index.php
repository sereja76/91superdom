<p>Главная страница личного кабинета</p>



<pre>

<select class="form-control select2">
    <option>Выберите обьект</option>
<?

foreach ($customer['companies'] as $companies):

    echo "<optgroup label='{$companies['title']}'>";

    foreach ($companies['buildings'] as $buildings):

        //echo '  '.$buildings['title'];

        foreach ($buildings['places'] as $places):
            //echo ' '.$places['title']."<br/>";
            echo "<option value='{$places['id']}'>{$buildings['title']} {$places['title']}</option>";
        endforeach;

    endforeach;
    echo "</optgroup>";
endforeach;

echo "</select>";

print_r($customer['companies']);




print_r($_SESSION); ?>
<? print_r($customer); ?>
    </pre>






