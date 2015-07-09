<?php
return array(
    'User\\V1\\Rest\\User\\Controller' => array(
        'description' => 'User api',
        'collection' => array(
            'description' => 'List of users',
            'GET' => array(
                'description' => 'Get a list of users',
                'response' => '{
   "username": "username"
}',
            ),
            'POST' => array(
                'description' => 'Create a new user',
                'request' => '{
   "username": "username"
}',
                'response' => '{
   "username": "username"
}',
            ),
        ),
        'entity' => array(
            'description' => 'A single user',
            'GET' => array(
                'response' => '{
   "username": "username"
}',
                'description' => 'Get a specific user',
            ),
            'PUT' => array(
                'request' => '{
   "username": "username"
}',
                'response' => '{
   "username": "username"
}',
                'description' => 'Update a specific user',
            ),
            'DELETE' => array(
                'request' => '{
   "username": "username"
}',
                'response' => '',
                'description' => 'Delete a specific user',
            ),
        ),
    ),
);
