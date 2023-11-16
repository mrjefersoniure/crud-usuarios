<?php

namespace Application;

use Laminas\Router\Http\Segment;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Application\Model\Rowset;
use Application\Model;
use Application\Controller;

return [
    'router' => [
        'routes' => [
            'usuarios' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/usuarios[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\UsuariosController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'paginator' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/[page/:page]',
                            'defaults' => [
                                'page' => 1
                            ]
                        ]
                    ],
                ]
            ]
        ]
    ],
    
    'controllers' => [
        'factories' => [
            Controller\UsuariosController::class => function($sm) {
                $postService = $sm->get(Model\UsuariosTable::class);

                return new Controller\UsuariosController($postService);
            },
        ]
    ],
                    
    'service_manager' => [
        'factories' => [
            'UsuariosTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Laminas\Db\Adapter\Adapter');
                $config = $sm->get('Config');
                $baseUrl = $config['view_manager']['base_url'];
                $resultSetPrototype = new ResultSet();
                $identity = new Rowset\Usuario($baseUrl);
                $resultSetPrototype->setArrayObjectPrototype($identity);
                return new TableGateway('usuarios', $dbAdapter, null, $resultSetPrototype);
            },
            Model\UsuariosTable::class => function($sm) {
                $tableGateway = $sm->get('UsuariosTableGateway');
                $table = new Model\UsuariosTable($tableGateway);
                return $table;
            },
        ]
    ],
];