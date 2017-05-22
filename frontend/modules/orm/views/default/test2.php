<?php
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use frontend\modules\orm\models\Data;
use kartik\grid\GridView;

$query = Data::find()->joinWith('user')->where(['in','data.id',[10,11,12]]);
//$query->where();
$dataProvider = new ActiveDataProvider([
   'query'=> $query ,
    
]);
echo GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        'id',
        'val',
        'owner',
        'user.username',
        
    ]
]);
echo "<hr>";



$query = new Query;
$query->select('d.*,u.username')
    ->from('data d')->leftJoin('user u', 'u.id = d.owner')->all();
$dataProvider = new ActiveDataProvider([
   'query'=> $query ,    
]);
echo GridView::widget([
    'dataProvider'=>$dataProvider
]);
echo "<hr>";


