<?php
return array(
    'router' => array(
        'routes' => array(
            'api.rest.doctrine.user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user[/:user_id]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\User\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'api.rest.doctrine.user',
        ),
    ),
    'zf-rest' => array(
        'Api\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\User\\UserResource',
            'route_name' => 'api.rest.doctrine.user',
            'route_identifier_name' => 'user_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'user',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'DELETE',
                2 => 'PUT',
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
            'entity_class' => 'Business\\User',
            'collection_class' => 'Api\\V1\\Rest\\User\\UserCollection',
            'service_name' => 'User',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Api\\V1\\Rest\\User\\Controller' => 'HalJson',
        ),
        'accept-whitelist' => array(
            'Api\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content-type-whitelist' => array(
            'Api\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/json',
            ),
        ),
        'accept_whitelist' => array(
            'Api\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/json',
                1 => 'application/*+json',
            ),
        ),
        'content_type_whitelist' => array(
            'Api\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Business\\User' => array(
                'route_identifier_name' => 'user_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.user',
                'hydrator' => 'Api\\V1\\Rest\\User\\UserHydrator',
            ),
            'Api\\V1\\Rest\\User\\UserCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.user',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'doctrine-connected' => array(
            'Api\\V1\\Rest\\User\\UserResource' => array(
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Api\\V1\\Rest\\User\\UserHydrator',
            ),
        ),
    ),
    'doctrine-hydrator' => array(
        'Api\\V1\\Rest\\User\\UserHydrator' => array(
            'entity_class' => 'Business\\User',
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => array(),
            'filters' => array(
                'Api\\V1\\Rest\\User\\Filter' => array(
                    'filter' => 'Api\\V1\\Rest\\User\\Filter',
                ),
            ),
            'use_generated_hydrator' => true,
        ),
    ),
    'zf-content-validation' => array(
        'Api\\V1\\Rest\\User\\Controller' => array(
            'input_filter' => 'Api\\V1\\Rest\\User\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Api\\V1\\Rest\\User\\Validator' => array(
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
                        'options' => array(),
                    ),
                ),
                'description' => 'username',
            ),
        ),
    ),
    'hydrator-filters' => array(
        'Api\\V1\\Rest\\User\\Filter' => array(
            'password' => array(
                0 => array(
                    'filter' => 'Core\\Hydrator\\Filter\\AlwaysFilter',
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(),
    ),
);
