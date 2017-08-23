<?php

use miloschuman\highcharts\HighchartsAsset;

HighchartsAsset::register($this)->withScripts([
    'highcharts-more',
    'modules/solid-gauge'
]);
/*
$this->registerJsFile('@web/js/cockpit.js', [
    'depends' => [\yii\web\JqueryAsset::className()]
]);*/
?>

<div id="container"></div>
<div id="pie"></div>
<div class="row">
    <div id="cockpit1" class="col-md-6"></div>
    <div id="cockpit2" class="col-md-6"></div>
</div>

<?php
$json = [];
foreach ($raw as $value) {
    $json[] = [
        'name' => $value['amphur'],
        'data' => [
            $value['m01'] * 1,
            $value['m02'] * 1,
            $value['m03'] * 1,
            $value['m04'] * 1,
            $value['m05'] * 1,
            $value['m06'] * 1,
            $value['m07'] * 1,
            $value['m08'] * 1,
            $value['m09'] * 1,
            $value['m10'] * 1,
            $value['m11'] * 1,
            $value['m12'] * 1,
        ]
    ];
}
$json = json_encode($json);
$byear = 2560;
?>

<?php
$js = <<<JS
Highcharts.chart('container', {
    credits:false,
    title: {
        text: 'กราฟแสดงแนวโน้มการใช้ยา ATB'
    },

    subtitle: {
        text: 'จากฐานข้อมูล 43 แฟ้ม $byear'
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
        
// pie        
Highcharts.chart('pie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares January, 2015 to May, 2015'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'ชาย',
            y: 4000,
            color:'green'
        }, {
            name: 'หญิง',
            y: 3987
        }]
    }]
});
 
        
JS;

$this->registerJs($js);

