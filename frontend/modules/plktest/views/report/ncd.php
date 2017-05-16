<?php
use kartik\grid\GridView;

echo GridView::widget([
    'dataProvider'=>$dataProvider,
    'panel'=>[
        'before'=>'ข้อมูลผู้ป่วยโรคเรื้อรัง'
    ]
]);
