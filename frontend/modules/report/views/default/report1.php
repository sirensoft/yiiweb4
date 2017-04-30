<?php

use kartik\grid\GridView;

$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['/report/default/index']];
$this->params['breadcrumbs'][] = 'รายงาน-1';


echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name:text:ประเภทอุปกรณ์',
        'total:integer:จำนวน'
    ]
]);

use miloschuman\highcharts\Highcharts;

$data = [
    //['name' => 'เครื่องพิมพ์', 'data' => [1]],
    //['name' => 'จอ', 'data' => [5]]
];
//echo $raw[0]['name']; 
//echo $raw[0]['total'];

foreach ($raw as $value) {
    $data[]= ['name' => $value['name'], 'data' => [$value['total']*1]];
}




echo Highcharts::widget([
    'options' => [
        'chart' => ['type' => 'column'],
        'title' => ['text' => 'รายการอุปกรณ์'],
        'xAxis' => [
            'categories' => ['อุปกรณ์']
        ],
        'yAxis' => [
            'title' => ['text' => 'จำนวน']
        ],
        'series' => $data
    ]
]);

