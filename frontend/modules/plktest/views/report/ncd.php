<?php
use kartik\grid\GridView;

$this->title ="รายงาน ncd";
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label'=>'หน้าหลัก plktest','url'=>'/plktest/default/index'];

echo GridView::widget([
    'dataProvider'=>$dataProvider,
    'panel'=>[
        'before'=>'ข้อมูลผู้ป่วยโรคเรื้อรัง'
    ]
]);
