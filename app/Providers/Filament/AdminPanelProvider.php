<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use App\Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Filament\Support\Enums\Width;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Atelie TB')
            ->brandLogo(asset('imagens/logo_confeccao.png'))
            ->brandLogoHeight('2rem')
            ->maxContentWidth(Width::Full)
            ->theme(asset('css/filament/admin/theme.css'))
            ->colors([
                'primary' => [
                    50 => 'oklch(0.965 0.015 65.0)',
                    100 => 'oklch(0.920 0.035 65.0)',
                    200 => 'oklch(0.840 0.060 65.0)',
                    300 => 'oklch(0.750 0.090 60.0)',
                    400 => 'oklch(0.640 0.110 55.0)',
                    500 => 'oklch(0.530 0.120 50.0)',
                    600 => 'oklch(0.430 0.110 48.0)',
                    700 => 'oklch(0.340 0.095 46.0)',
                    800 => 'oklch(0.260 0.075 45.0)',
                    900 => 'oklch(0.190 0.055 45.0)',
                    950 => 'oklch(0.130 0.035 45.0)',
                ],
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
