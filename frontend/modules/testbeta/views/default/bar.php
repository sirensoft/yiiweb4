<?php

use yii\helpers\Json;
use miloschuman\highcharts\HighchartsAsset;

HighchartsAsset::register($this)->withScripts(['modules/exporting', 'modules/drilldown']);
?>

<div id="container"></div>

<?php
$js = <<<JS
Highcharts.chart('container', {
    chart: {
        type: 'column',
        
    },
    title: {
        text: '3D chart with null values'
    },
    subtitle: {
        text: 'Notice the difference between a 0 value and a null point'
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    xAxis: {
         type: "category"
    },
    yAxis: {
        title: {
            text: null
        }
    },
    series: [
        {
        name:'A',
        data:[30]
         },
   ]
});
JS;

$this->registerJS($js);
