<?php
return array(
    'Api\\V1\\Rest\\User\\Controller' => array(
        'description' => 'User API',
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
                'description' => 'Get a specific user',
                'response' => '{
   "username": "username"
}',
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
                'description' => 'Delete a specific user',
                'request' => '{
   "username": "username"
}',
                'response' => '{
   "username": "username"
}',
            ),
        ),
    ),
);
