<?php
use kartik\grid\GridView;

$this->params['breadcrumbs'][] = ['label'=>'รายงาน','url'=>['/report/default/index']];
$this->params['breadcrumbs'][] = 'รายงาน-1';


echo GridView::widget([
    'dataProvider'=>$dataProvider
]);

use miloschuman\highcharts\Highcharts;

echo Highcharts::widget([
   'options' => [
      'chart'=>['type'=>'column'],
      'title' => ['text' => 'Fruit Consumption'],
      'xAxis' => [
         'categories' => ['Apples', 'Bananas', 'Oranges']
      ],
      'yAxis' => [
         'title' => ['text' => 'Fruit eaten']
      ],
      'series' => [
         ['name' => 'Jane', 'data' => [1]],
         ['name' => 'John', 'data' => [5]]
      ]
   ]
]);

