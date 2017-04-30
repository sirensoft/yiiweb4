<?php
use kartik\grid\GridView;

$this->params['breadcrumbs'][] = ['label'=>'รายงาน','url'=>['/report/default/index']];
$this->params['breadcrumbs'][] = 'รายงาน-1';


echo GridView::widget([
    'dataProvider'=>$dataProvider
]);

