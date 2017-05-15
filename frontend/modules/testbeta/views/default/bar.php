<?php

use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use miloschuman\highcharts\HighchartsAsset;

HighchartsAsset::register($this)->withScripts(['modules/exporting', 'modules/drilldown']);

$data = [
    ['name'=>'อำเภอ A','data'=>[100]],
    ['name'=>'อำเภอ B','data'=>[90]],
];
$b = [['name'=>'อำเภอ C','data'=>[45]]];

$data=ArrayHelper::merge($data,$b);
$data[]=['name'=>'อำเภอ D','data'=>[90]];

$json = Json::encode($data);
echo ($json);
?>

<div id="container"></div>

<?php
$js = <<<JS
Highcharts.chart('container', {
    chart: {
        type: 'column',        
    },
    title: {
        text: 'chart'
    },
    subtitle: {
        text: ''
    },
    
     xAxis: {
        categories: ['จำนวน'],
        
    },
    yAxis: {
        title: {
            text: null
        }
    },
    /*series: [{
        name: 'อำเภอ A',
        data: [107]
    }, {
        name: 'อำเภอ B',
        data: [133]
    }, {
        name: 'อำเภอ C',
        data: [1052]
    }]*/
    series:$json
});
JS;

$this->registerJS($js);
