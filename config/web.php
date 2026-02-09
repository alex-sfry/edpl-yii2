<?php

$params = require __DIR__ . '/params.php';
$components = require __DIR__ . '/components.php';

$config = [
    'id' => 'edpa',
    'name' => 'EDPA',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'app\modules\user\ModuleBootstrap',
        'app\modules\edsm\ModuleBootstrap',
        'app\components\AppBootstrap'
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => $components,
    'params' => $params,
    'modules' => [
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
        'edsm' => [
            'class' => 'app\modules\edsm\Module',
        ]
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'customCrud' => '@app/templates/crud/default',
                ]
            ]
        ],
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
