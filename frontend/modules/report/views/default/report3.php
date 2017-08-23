<?php

use miloschuman\highcharts\HighchartsAsset;

HighchartsAsset::register($this)->withScripts([
    'highcharts-more',
    'modules/solid-gauge'
]);
?>

<div id="container"></div>

<?php
$json = [];
foreach ($raw as $value) {
    $json[] = [
        'name' => $value['amphur'],
        'data' => [
            $value['m01']*1,
            $value['m02']*1,
            $value['m03']*1,
            $value['m04']*1,
            $value['m05']*1,
            $value['m06']*1,
            $value['m07']*1,
            $value['m08']*1,
            $value['m09']*1,
            $value['m10']*1,
            $value['m11']*1,
            $value['m12']*1,
        ]
    ];
}
$json = json_encode($json);
?>

<?php
$js = <<<JS
Highcharts.chart('container', {

    title: {
        text: 'กราฟแสดงแนวโน้มการใช้ยา ATB'
    },

    subtitle: {
        text: 'จากฐานข้อมูล 43 แฟ้ม'
    },
     xAxis: {
        categories: ['มค.', 'กพ.', 'มีค.', 'เมย.', 'พค.', 'มิย.', 'กค.', 'สค.', 'กย.', 'ตค.', 'พย.', 'ธค.']
    },
   

    yAxis: {
        title: {
            text: 'ร้อยละ'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        
    },

    series: $json

});
               
        
        
        
JS;

$this->registerJs($js);

