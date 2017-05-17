<?php

use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title ="รายงาน ncd";
$this->params['breadcrumbs'][] = ['label'=>'หน้าหลัก plktest','url'=>['/plktest/default/index']];
$this->params['breadcrumbs'][] = $this->title;
 
$form = ActiveForm::begin([
    'method'=>'GET',
    'action'=> Url::to(['/plktest/report/anc'])
]);
echo "ระหว่างวันที่:";
//echo Html::textInput('date1');
 
        echo yii\jui\DatePicker::widget([
            'name' => 'date1',
            'value' => $date1,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ]
        ]);
        


echo "ถึง:";
//echo Html::textInput('date2');
 echo yii\jui\DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ]
        ]);

echo " ";
echo Html::submitButton('ประมวลผล',['class'=>'btn btn-danger']);

ActiveForm::end();


echo GridView::widget([
    'dataProvider'=>$dataProvider,
    'filterModel'=>$xxx
]);

