<?php
return[
    'laminas-cli' => [
        'commands' => [
            'mvc:controller' => \Divix\Laminas\Cli\Command\ControllerCommand::class,
            'mvc:rowset' => \Divix\Laminas\Cli\Command\RowsetCommand::class,
            'mvc:model' => \Divix\Laminas\Cli\Command\ModelCommand::class,
            'mvc:form' => \Divix\Laminas\Cli\Command\FormCommand::class,
            'mvc:view' => \Divix\Laminas\Cli\Command\ViewCommand::class,
            'mvc:crud' => \Divix\Laminas\Cli\Command\CrudCommand::class,
            'mvc:crud_controller' => \Divix\Laminas\Cli\Command\CrudControllerCommand::class,
            'mvc:crud_view' => \Divix\Laminas\Cli\Command\CrudViewCommand::class,
            'mvc:crud_config' => \Divix\Laminas\Cli\Command\CrudConfigCommand::class,
            'mvc:login_registration' => \Divix\Laminas\Cli\Command\LoginRegistrationCommand::class,
            'mvc:admin' => \Divix\Laminas\Cli\Command\AdminPanelCommand::class,
            'mvc:navigation' => \Divix\Laminas\Cli\Command\NavigationCommand::class,
            'mvc:sitemap' => \Divix\Laminas\Cli\Command\SitemapCommand::class,
            'mvc:mariadb_database_connect' => \Divix\Laminas\Cli\Command\MariaDbCommand::class
        ],
    ],
];