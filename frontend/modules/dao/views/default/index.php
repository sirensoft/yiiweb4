<?php

use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\User;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => 'kartik\grid\SerialColumn',
            'width' => '60px',
        ],
        'val',
        [
            'attribute'=>'owner',
            'width'=>'160px',
            'filter'=> ArrayHelper::map(User::find()->all(),'username','username')
        ],
        'd_update'
        
    ],
]);
