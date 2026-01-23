<?php

return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    // 'suffix' => '/',
    'rules' => [
        // '<controller/<action:\w+>' => '<controller>/<action>',
        // '<controller:gear>/<action>/<slug:[\w\-]+>' => '<controller>/<action>',
        // '<controller>/<action>' => '<controller>/<action>',

        'systems/view/<id:\d+>' => 'system/view',
        'systems/delete/<id:\d+>' => 'system/delete',
        'systems/update/<id:\d+>' => 'system/update',
        'systems/create' => 'system/create',
        'systems/search' => 'system/search',
        'systems' => 'system/index',

        '' => 'site/index'
    ],

];
