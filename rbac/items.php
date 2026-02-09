<?php

return [
    'manageAll' => [
        'type' => 2,
        'description' => 'Manage all',
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'manageAll',
        ],
    ],
];
