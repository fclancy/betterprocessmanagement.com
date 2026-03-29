<?php

namespace App\Providers\Filament;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class AdminPanelProvider extends ServiceProvider
{
    public function register(): void
    {
        Filament::panel([
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
        ]);
    }
}
