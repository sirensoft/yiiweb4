<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=data_yii;port=3309',
            'username' => 'root',
            'password' => '1234',
            'charset' => 'utf8',
        ],
        
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => TRUE,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'you@gmail.com',
                'password' => '',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
    ],
];
