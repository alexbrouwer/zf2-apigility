<?php
return array(
    'service_manager' => array(
        'invokables' => array(
            'Core\\Hydrator\\Filter\\AlwaysFilter' => 'Core\\Hydrator\\Filter\\AlwaysFilter',
        ),
        'abstract_factories' => array(
            'Core\\Service\\HydratorFilterFactory',
        ),
    ),
);