<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'Denis\' Cutlery',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl' => '/backend2',
    'aliases' => [
       
    ],
    'components' => [
    
        'assetManager' => [
            'baseUrl' => '/backend2/frontend/web/assets',            
        ],
    
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '/backend2',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
            'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
         
            //'baseUrl' => '',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                 //'/' => 'site/login',
                 // '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
        
    ],
    'modules' => [
        'nsign' => [
            'class' => 'app\modules\nsign\Module',
        ],
    ],
    'params' => $params,
];
