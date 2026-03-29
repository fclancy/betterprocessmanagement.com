<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->discoverResources(true)
            ->discoverPages(true)
            ->discoverWidgets(true)
            ->middleware(['web', 'auth'])
            ->authMiddleware(['auth'])
            ->resources([
                'pages' => [
                    \Filament\Pages\Dashboard::class,
                ],
            ])
            ->widgets([
                \Filament\Widgets\AccountWidget::class,
                \Filament\Widgets\FilamentInfoWidget::class,
            ]);
    }
}

