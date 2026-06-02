<?php

namespace App\Filament\Widgets;

use App\Models\Insumo;
use App\Models\Pedido;
use App\Models\Produto;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Collection;

class OperationalSnapshot extends Widget
{
    protected string $view = 'filament.widgets.operational-snapshot';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [
            'recentOrders' => Pedido::query()
                ->with('cliente')
                ->latest()
                ->limit(5)
                ->get(),
            'lowProducts' => Produto::query()
                ->where('estoque', '<=', 5)
                ->orderBy('estoque')
                ->limit(4)
                ->get(),
            'lowSupplies' => Insumo::query()
                ->where('estoque', '<=', 5)
                ->orderBy('estoque')
                ->limit(4)
                ->get(),
            'statusSummary' => $this->getStatusSummary(),
        ];
    }

    /**
     * @return array<string, int>
     */
    private function getStatusSummary(): array
    {
        return Pedido::query()
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->map(fn ($total): int => (int) $total)
            ->all();
    }
}
