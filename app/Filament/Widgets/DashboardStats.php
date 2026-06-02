<?php

namespace App\Filament\Widgets;

use App\Models\Cliente;
use App\Models\Insumo;
use App\Models\Pedido;
use App\Models\Produto;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    protected ?string $heading = 'Resumo da operacao';

    protected ?string $description = 'Indicadores principais para acompanhar a confeccao.';

    protected int|array|null $columns = [
        'default' => 1,
        'md' => 2,
        'xl' => 4,
    ];

    /**
     * @return array<Stat>
     */
    protected function getStats(): array
    {
        $pedidos = Pedido::query()->count();
        $pedidosPendentes = Pedido::query()->where('status', 'pendente')->count();
        $clientes = Cliente::query()->count();
        $produtos = Produto::query()->count();
        $estoqueBaixo = Produto::query()->where('estoque', '<=', 5)->count()
            + Insumo::query()->where('estoque', '<=', 5)->count();
        $faturamento = (float) Pedido::query()->sum('valor_total');

        return [
            Stat::make('Pedidos', number_format($pedidos, 0, ',', '.'))
                ->description($pedidosPendentes . ' pendentes')
                ->descriptionIcon(Heroicon::OutlinedClipboardDocumentList)
                ->icon(Heroicon::OutlinedShoppingBag)
                ->color('primary')
                ->url(route('filament.admin.resources.pedidos.index')),

            Stat::make('Faturamento', 'R$ ' . number_format($faturamento, 2, ',', '.'))
                ->description('Total registrado em pedidos')
                ->descriptionIcon(Heroicon::OutlinedCurrencyDollar)
                ->icon(Heroicon::OutlinedDocumentCurrencyDollar)
                ->color('success')
                ->url(route('filament.admin.resources.pedidos.index')),

            Stat::make('Clientes', number_format($clientes, 0, ',', '.'))
                ->description('Cadastros ativos')
                ->descriptionIcon(Heroicon::OutlinedUsers)
                ->icon(Heroicon::OutlinedUsers)
                ->color('info')
                ->url(route('filament.admin.resources.clientes.index')),

            Stat::make('Estoque baixo', number_format($estoqueBaixo, 0, ',', '.'))
                ->description($produtos . ' produtos cadastrados')
                ->descriptionIcon(Heroicon::OutlinedExclamationTriangle)
                ->icon(Heroicon::OutlinedArchiveBox)
                ->color($estoqueBaixo > 0 ? 'warning' : 'success')
                ->url(route('filament.admin.resources.produtos.index')),
        ];
    }
}
