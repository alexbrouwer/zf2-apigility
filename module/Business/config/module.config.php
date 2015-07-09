<?php
return array(
    'doctrine' => array(
        'driver' => array(
            // defines an annotation driver with two paths, and names it `business_annotated`
            'business_annotated' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'cache' => 'array',
                'extension' => '.dcm.xml',
                'paths' => array(__DIR__ . '/doctrine/mapping')
            ),

            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => array(
                'drivers' => array(
                    // register `business_annotated` for any entity under namespace `Business`
                    'Business' => 'business_annotated'
                )
            )
        )
    )
);