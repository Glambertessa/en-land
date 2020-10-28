<?php

return [
    'app_name' => 'English for IT',
    'adminLeftMenu' => [
    ],
    'component_manager' => [
        'repType' => '\\core\\component_manager\\lib\\CurlRep',
        'url' => 'https://rep.craft-group.xyz',
        'modulePath' => '/workspace/modules/',
        'themePath' => '/workspace/modules/themes/themes/',
    ],
    'codegen' => 'on',
    'modules_manager' => 'on'
];

/* Пример настройки локальной базы
return [
    'db' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db_name' => 'cg',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ]
];
*/