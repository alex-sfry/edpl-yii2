<?php

return [
    // 'converter' => [
    //     'class' => 'yii\web\AssetConverter',
    //     'commands' => [],
    // ],
    'appendTimestamp' => true,
    // 'linkAssets' => true,
    // 'forceCopy' => YII_DEBUG,
    'bundles' => [
        'yii\web\JqueryAsset' => [
            'sourcePath' => '@npm/jquery/dist',
            'js' => ['jquery.min.js']
        ],
        'yii\bootstrap5\BootstrapAsset' => [
            'basePath' => '@webroot',
            'baseUrl' => '@web',
            'css' => ['src/css/bootstrap.css'],
        ],
        'yii\bootstrap5\BootstrapPluginAsset' => [
            'sourcePath' => '@npm/bootstrap/dist',
            'js' => [/* 'js/bootstrap.bundle.min.js' */],
            'jsOptions' => []
        ],
    ]
];
