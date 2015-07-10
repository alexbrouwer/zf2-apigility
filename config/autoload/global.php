<?php
return array(
    'router' => array(
        'routes' => array(
            'oauth' => array(
                'options' => array(
                    'spec' => '%oauth%',
                    'regex' => '(?P<oauth>(/api/oauth))',
                ),
                'type' => 'regex',
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authentication' => array(
            'adapters' => array(
                'api' => array(
                    'adapter' => 'ZF\\MvcAuth\\Authentication\\OAuth2Adapter',
                    'storage' => array(
                        'storage' => 'ZF\\OAuth2\\Doctrine\\Adapter\\DoctrineAdapter',
                        'route' => '/api/oauth',
                    ),
                ),
            ),
            'map' => array(
                'User\\V1' => 'api',
            ),
        ),
    ),
);
