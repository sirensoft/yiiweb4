<?php
use frontend\modules\pcc\models\Person;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/*
$model = new Person();

$data =[    
    'prename'=>'นาง',
    'name'=>'abc',
    'lname'=>'ใจดี'
];
$model->attributes = $data;
$model->save(); 
*/

$model = Person::find();

$dataProvider = new ActiveDataProvider([
    'query'=>$model
]);
echo GridView::widget([
    'dataProvider'=>$dataProvider
]);




