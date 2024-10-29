<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */
    'paths' => ['api/*'],  // Define os endpoints que permitirão CORS, nesse caso, todos os endpoints da API.
    'allowed_methods' => ['*'],  // Permite todos os métodos (GET, POST, etc).
    'allowed_origins' => ['http://62.72.24.154:8081'],  // Permite o frontend React como origem.
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],  // Permite todos os headers.
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,

];
