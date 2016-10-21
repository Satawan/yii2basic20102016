<?php

use yii\helpers\Html;

?>
<h1>รายงาน  </h>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr class="info">
            <th>ลำดับ</th>
            <th>รหัสประเภท</th>
            <th>ประเภทคอม</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($data as $i => $item) {

            echo '<tr>';
            echo '<td>'.($i+1).'</td>';
            echo '<td>'.$item['com_type_id'].'</td>';
            echo '<td>'.$item['com_type_name'].'</td>';
            echo '<td>'.Html::a('<span class="glyphicon glyphicon-list-alt"></span>', ['/report_com_detail/index','id'=>$item['com_type_id']]).'</td>';
            echo '</tr>';
        }
        
      
        ?>

    </tbody>
</table>






<!--//echo 'ทดสอบ This is myPdf';-->
<!--//echo '<hr>';-->
<!--//print_r($data);-->

