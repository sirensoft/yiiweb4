<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'modules' => [
        'rbac' => [
            'class' => 'johnitvn\rbacplus\Module',
            'userModelClassName' => null,
            'userModelIdField' => 'id',
            'userModelLoginField' => 'username',
            'userModelLoginFieldLabel' => null,
            'userModelExtraDataColumls' => null,
            'beforeCreateController' => null,
            'beforeAction' => null
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        
        'data' => [
            'class' => 'frontend\modules\data\Data',
        ],
        'orm' => [
            'class' => 'frontend\modules\orm\Orm',
        ],
    ]
];
