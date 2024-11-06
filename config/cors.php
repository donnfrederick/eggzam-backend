<?php

return [

    'paths' => ['*'], // Adjust this to match your API routes

    'allowed_methods' => ['*'], // Allows all HTTP methods

    'allowed_origins' => ['http://localhost:5173'], // Your Vue app URL

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Allows all headers

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // Set to true if you want to allow cookies
];
