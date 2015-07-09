<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'doctrine_user' => array(
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
                'cache' => 'array',
                'extension' => '.dcm.xml',
                'paths' => array(
                    0 => __DIR__ . '/doctrine/mapping',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'User\\Business' => 'doctrine_user',
                ),
            ),
        ),
    ),
    'router' => array(
        'routes' => array(
            'user.rest.doctrine.user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/user[/:user_id]',
                    'defaults' => array(
                        'controller' => 'User\\V1\\Rest\\User\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'user.rest.doctrine.user',
        ),
    ),
    'zf-rest' => array(
        'User\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'User\\V1\\Rest\\User\\UserResource',
            'route_name' => 'user.rest.doctrine.user',
            'route_identifier_name' => 'user_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'user',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PUT',
                2 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(
                0 => 'sort',
            ),
            'page_size' => 25,
            'page_size_param' => 'limit',
            'entity_class' => 'User\\Business\\User',
            'collection_class' => 'User\\V1\\Rest\\User\\UserCollection',
            'service_name' => 'User',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'User\\V1\\Rest\\User\\Controller' => 'HalJson',
        ),
        'accept-whitelist' => array(
            'User\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.user.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content-type-whitelist' => array(
            'User\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Business\\User' => array(
                'route_identifier_name' => 'user_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'user.rest.doctrine.user',
                'hydrator' => 'User\\V1\\Rest\\User\\UserHydrator',
            ),
            'User\\V1\\Rest\\User\\UserCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'user.rest.doctrine.user',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'doctrine-connected' => array(
            'User\\V1\\Rest\\User\\UserResource' => array(
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'User\\V1\\Rest\\User\\UserHydrator',
            ),
        ),
    ),
    'doctrine-hydrator' => array(
        'User\\V1\\Rest\\User\\UserHydrator' => array(
            'entity_class' => 'User\\Business\\User',
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => array(),
            'use_generated_hydrator' => true,
            'filters' => array(
                'User\\V1\\Rest\\User\\Filter' => array(
                    'filter' => 'User\\V1\\Rest\\User\\Filter',
                ),
            ),
        ),
    ),
    'zf-content-validation' => array(
        'User\\V1\\Rest\\User\\Controller' => array(
            'input_filter' => 'User\\V1\\Rest\\User\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'User\\V1\\Rest\\User\\Validator' => array(
            0 => array(
                'name' => 'username',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\I18n\\Validator\\Alnum',
                        'options' => array(
                            'allowwhitespace' => false,
                        ),
                    ),
                ),
                'description' => 'username',
            ),
        ),
    ),
    'hydrator-filters' => array(
        'User\\V1\\Rest\\User\\Filter' => array(
            'password' => array(
                0 => array(
                    'filter' => 'Core\\Hydrator\\Filter\\AlwaysFilter',
                ),
            ),
        ),
    ),
);
