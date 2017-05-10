<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yiiweb4;port=3309',
            'username' => 'root',
            'password' => '1234',
            'charset' => 'utf8',
        ],
        'db_hdc' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.168.1.6;dbname=dhdc;port=3306',
            'username' => 'sa',
            'password' => 'sa',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => FALSE,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'cccc@gmail.com',
                'password' => '',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
    ],
];
