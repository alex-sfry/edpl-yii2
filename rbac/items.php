<?php

return [
    'create' => [
        'type' => 2,
        'description' => 'Create',
    ],
    'update' => [
        'type' => 2,
        'description' => 'Update',
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'update',
            'create',
        ],
    ],
];
