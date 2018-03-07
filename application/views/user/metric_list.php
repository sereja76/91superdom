<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 13.02.2018
 * Time: 13:20
 */

/*echo "<pre>";
//var_dump($metric_list);
echo "</pre>";*/
echo validation_errors();

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

// разбираем

/*$json = json_encode($_POST);
echo $json;*/
?>




<?php
/*echo "<pre>";
print_r($metric_list["metricGroups"]);
echo "</pre>";*/

// Проверка можно ли вносить показани по данной группе?

$tab_link = '';
$tab_content = '';
$num_fl = 0;
foreach ($metric_list["metricGroups"] as $key =>$metricGroups):



    if ($key == 0){$active = 'active';}
    else {$active = '';}
    $tab_link .= '<li class="nav-item"><a href="#pr'.$key.'" data-toggle="tab" class="nav-link '.$active.'">'.$metricGroups["title"].'</a></li>';


    $tab_content .='<div class="tab-pane '.$active.'" id="pr'.$key.'">
                    <form action="lk/metric_list" method="post" >
                    <input type="hidden" name="send" value="yes">
                    <div class="row">';

    if($metricGroups["allowed"] === TRUE){

        // $metricGroups["id"] - id группы, в форму вставить
        $grId = $metricGroups["id"];

        foreach ($metricGroups["metrics"] as $metrics):

            $tab_content .='<input type="hidden" name ="metrics['.$grId.']['.$metrics['id'].']" value="'.$metrics['id'].'" size="6">'; // metrics{id}

            $tab_content .=    '<div class="col-xl-4 col-md-4">
                    <div class="card-box">
                    <div class="text-center">
                    
                        <h5><img src="'.$metrics["image"].'" height="30px"> '.$metrics["title"].'</h5>
                        <p></p>
                        
                        <table>
                        <tr>
                            <th>Прошлые значения:</th>
                            <th>Текущие значения:</th>
                            <th></th>
                        </tr>';

            foreach ($metrics["fields"] as $fields):
                //
                        // подсчет минимального значения в вводимых показаниях
                        if($fields['previousValue']== '-' or $fields['previousValue'] == 0){
                            $min_field = 0.001;
                        }
                        else{
                            $min_field = $fields['previousValue'];
                        }

                $tab_content .= '
                    <tr>
                        <td>'.$fields['previousValue'].'</td>
                        <td>
                        <input type="hidden" 
                        name ="metrics['.$grId.']['.$metrics['id'].']['.$num_fl.'][id]" 
                        value="'.$fields['id'].'" size="6">
                        
                        
                        
                        <input type="number" 
                        name ="metrics['.$grId.']['.$metrics['id'].']['.$num_fl.'][value]" 
                        value="" size="6" required min="'.$min_field.'" step="0.001"></td>
                        <td>'.$fields['title'].'</td>
                    </tr>';

            $num_fl++;

            endforeach;

            $tab_content .= "</table>";
            $tab_content .= '</div></div></div>';

        endforeach;
    }
    else{
        $tab_content .=  '<p>'.$metricGroups["placeholder"].'</p>';
    }
    $tab_content .= '</div>
                     <div class="col-xl-12"><input type="submit" class="btn btn-primary" value="Сохранить показания" /></div>
</form></div>';

endforeach;

?>


<div class="col-xl-12">

            <div id="rootwizard" class="pull-in">
                <ul class="nav nav-tabs nav-justified navtab-wizard bg-muted">
                    <?=$tab_link ?>
                </ul>
                <div class="tab-content col-xl-12 col-md-12">

                    <?=$tab_content?>



                </div>
            </div>
</div>




