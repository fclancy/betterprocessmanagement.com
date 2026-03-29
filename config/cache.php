<?php

return [

    'default' => env('CACHE_DRIVER', 'file'),

    'stores' => [

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lottery' => env('CACHE_LOTTERY', '2|1'),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'cache',
            'prefix' => env('REDIS_CACHE_PREFIX', 'laravel_cache'),
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'cache',
            'connection' => env('DB_CONNECTION', 'mysql'),
            'lock_connection' => env('DB_CONNECTION', 'mysql'),
            'lock_table' => 'cache_locks',
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    'prefix' => env('CACHE_PREFIX', 'laravel_cache'),

    'lottery' => env('CACHE_LOTTERY', '2|1'),

];
