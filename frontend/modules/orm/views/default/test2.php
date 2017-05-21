<?php

use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use frontend\modules\orm\models\Data;
use kartik\grid\GridView;

$query = Data::find()->where(['in','id',[10,11,12]]);
//$query->where();
$dataProvider = new ActiveDataProvider([
   'query'=> $query 
]);
echo GridView::widget([
    'dataProvider'=>$dataProvider
]);

$query = Data::find()->where(['in','id',[10,11,12]])->all();
//$query->where();
$dataProvider = new ArrayDataProvider([
   'allModels'=> $query 
]);
echo GridView::widget([
    'dataProvider'=>$dataProvider
]);

