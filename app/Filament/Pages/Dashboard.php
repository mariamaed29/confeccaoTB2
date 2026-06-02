<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\DashboardStats;
use App\Filament\Widgets\OperationalSnapshot;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends BaseDashboard
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedHomeModern;

    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?string $title = 'Dashboard';

    public function getTitle(): string|Htmlable
    {
        return 'Painel da confeccao';
    }

    public function getSubheading(): string|Htmlable|null
    {
        return 'Acompanhe pedidos, estoque e cadastros em uma visao rapida da operacao.';
    }

    /**
     * @return array<class-string<Widget> | WidgetConfiguration>
     */
    public function getWidgets(): array
    {
        return [
            DashboardStats::class,
            OperationalSnapshot::class,
        ];
    }

    public function getColumns(): int|array
    {
        return 1;
    }
}
