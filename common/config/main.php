<?php
return [
    
    'language' => 'ru-RU', // <- здесь!
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=eco24_1',
            'username' => 'eco24',
            'password' => 'put_your_password_here',
            'charset' => 'utf8',
        ],
    ],
		
];
