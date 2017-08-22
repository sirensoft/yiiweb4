<?php

use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'รายงาน 1';
$this->params['breadcrumbs'][] = ['label'=>'รวมรายงาน','url'=>['index']];
$this->params['breadcrumbs'][] = 'รายงาน 1';
?>
<?=$sql?>
<?php
$form = ActiveForm::begin([
    'method'=>'get',
    'action'=>Url::to(['report1'])
]);
?>
เกิดระหว่าง:<?=Html::textInput('date1')?> 
ถึง:<?=Html::textInput('date2')?>
<?=Html::submitButton('ตกลง')?>
<?php
ActiveForm::end();
?>

<?php
echo GridView::widget([
    'formatter' => [
        'class' => 'yii\i18n\Formatter',
        'nullDisplay' => '-'
    ],
    'dataProvider' => $dataProvider,
    'panel' => ['before' => 'รายการ', 'heading' => 'ข้อมูลประชากร']
]);

