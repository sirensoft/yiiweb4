<?php

use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\HighchartsAsset;
HighchartsAsset::register($this)->withScripts(['modules/exporting', 'modules/drilldown']);

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



$data = [
    //['name' => 'เครื่องพิมพ์', 'data' => [1]],
    //['name' => 'จอ', 'data' => [5]]
];
//echo $raw[0]['name']; 
//echo $raw[0]['total'];

foreach ($raw as $value) {
    $data[]= [
        'name' => $value['name'], 
        'data' => [$value['total']*1],
        
     ];
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
?>
<hr>
<div id='container'></div>
<?php
$data = json_encode($data);
//echo $data;

$js = <<<JS
$(function(){

 
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'รายการซ่อม'
    },
    subtitle: {
        text: 'ปี 2560'
    },
    xAxis: {
        categories: ['ประเภท'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวน',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: 'เครื่อง'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: $data
});
        
        
});
        
JS;
$this->registerJs($js);


