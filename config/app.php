<?php

return [
    'base_url'        => __DIR__ . '/../',

    'view_path'       => __DIR__ . '/../resources/views',
    'error_view_path' => __DIR__ . '/../errors',

    
    'app_name'  => $_ENV['APP_NAME'],
    'app_debug' => $_ENV['APP_DEBUG'],
    'app_key'   => $_ENV['APP_KEY'],
    'app_url'   => $_ENV['APP_URL'],
    'database'     => [
        'port'     => $_ENV['DB_PORT'],
        'host'     => $_ENV['DB_HOST'],
        'name'     => $_ENV['DB_NAME'],
        'user'     => $_ENV['USER_NAME'],
        'password' => $_ENV['PASSWORD']
    ],
];
