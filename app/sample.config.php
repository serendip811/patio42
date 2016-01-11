<?php
return [
    'database' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => '',
        'username' => '',
        'password' => '',
    ],
    'router' => [
        'middleware' => ['session@Middleware', 'responsiblize@Middleware']
    ],
    'session' => [
        'name' => 'Session',
        'path' => dirname(__DIR__) . '/sessions',
    ],
];
