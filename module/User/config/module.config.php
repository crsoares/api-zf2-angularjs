<?php
/*
 * Crysthiano A. Soares
 * Modulo Restful em desenvolvimento 
 */

namespace User;

return array(
    'router' => array(
        'routes' => array(
            'user-auth' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/auth',
                    'defaults' => array(
                        'controller' => 'User\Controller\Auth',
                        'action'     => 'index'
                    )
                )
            )
        )
    ),
    
    'controllers' => array(
        'invokables' => array(
            'User\Controller\Auth' => 'User\Controller\AuthController'
        )
    ),
    
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy'
        )
    ),
    
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
);