<?php

use kartik\grid\GridView;

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
            'width'=>'160px'
        ]
    ],
]);
