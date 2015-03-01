<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'HomeController' => 'Contato\Controller\HomeController',
            'ContatosController' => 'Contato\Controller\ContatosController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'HomeController',
                        'action' => 'index',
                    ),
                ),
            ),
            'sobre' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/sobre',
                    'defaults' => array(
                        'controller' => 'HomeController',
                        'action' => 'sobre',
                    ),
                ),
            ),               
            'contatos' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/contatos[/:action][/:id]',
                    'defaults' => array(
                        'controller' => 'ContatosController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'contato/home/index' => __DIR__ . '/../view/contato/home/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);