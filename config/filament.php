<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Panel
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the panels in this configuration file
    | should be used as the default panel.
    |
    */

    'default' => env('FILAMENT_DEFAULT_PANEL', 'admin'),

    /*
    |--------------------------------------------------------------------------
    | Panels
    |--------------------------------------------------------------------------
    |
    | This is the list of panels that Filament will load.
    |
    */

    'panels' => [
        [
            'id' => 'admin',
            'path' => 'admin',
            'discoverResources' => true,
            'discoverPages' => true,
            'discoverWidgets' => true,
            'middleware' => ['web', 'auth'],
            'authMiddleware' => ['auth'],
            'resources' => [
                'pages' => [
                    \Filament\Pages\Dashboard::class,
                ],
            ],
            'widgets' => [
                \Filament\Widgets\AccountWidget::class,
                \Filament\Widgets\FilamentInfoWidget::class,
            ],
        ],
    ],

];
