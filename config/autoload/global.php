<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'service_manager' => [
        'factories' => [
            'Laminas\Db\Adapter\Adapter' => 'Laminas\Db\Adapter\AdapterServiceFactory',
            'Laminas\Db\TableGateway\TableGateway' => 'Laminas\Db\TableGateway\TableGatewayServiceFactory',

        ]
        ], 'db' => [
            'driver' => 'Pdo',
            'dsn'    => 'mysql:dbname=admin;host=localhost;charset=utf8',
        ],
        'main' => [ // this is the database I wanna to use for some RecordExist validator!!!
            'driver' => 'Pdo',
            'dsn'    => 'mysql:dbname=main;host=localhost;charset=utf8',
        ],
        'msdb' => [
            'platform' => 'SqlServer',
            'dirver' => 'Pdo',
            'dsn'    => 'dblib:host=sds2something.com;dbname=somedbname_db;',
            'charset' => 'UTF-8',
            'pdotype' => 'dblib',
        ]
        
    ];
