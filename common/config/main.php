<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'report' => [
            'class' => 'frontend\modules\report\Report',
        ],
        'map' => [
            'class' => 'frontend\modules\map\Map',
        ],
    ]
];
