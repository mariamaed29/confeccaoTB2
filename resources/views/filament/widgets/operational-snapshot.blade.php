<x-filament-widgets::widget>
    <div class="tb-dashboard-grid">
        <section class="tb-dashboard-hero">
            <div>
                <p class="tb-dashboard-kicker">Atelie TB</p>
                <h2>Controle de producao, pedidos e estoque em um so lugar.</h2>
                <p>
                    Use este painel como ponto de partida para acompanhar pendencias, revisar entradas recentes e agir rapido quando um item estiver acabando.
                </p>
            </div>

            <div class="tb-dashboard-actions">
                <a href="{{ route('filament.admin.resources.pedidos.create') }}">Novo pedido</a>
                <a href="{{ route('filament.admin.resources.produtos.create') }}">Novo produto</a>
                <a href="{{ route('filament.admin.resources.insumos.index') }}">Ver insumos</a>
            </div>
        </section>

        <section class="tb-dashboard-panel tb-dashboard-orders">
            <div class="tb-dashboard-panel-header">
                <div>
                    <p class="tb-dashboard-kicker">Pedidos</p>
                    <h3>Movimento recente</h3>
                </div>
                <a href="{{ route('filament.admin.resources.pedidos.index') }}">Ver todos</a>
            </div>

            <div class="tb-dashboard-list">
                @forelse ($recentOrders as $pedido)
                    <a class="tb-dashboard-list-item" href="{{ route('filament.admin.resources.pedidos.view', ['record' => $pedido]) }}">
                        <span>
                            <strong>#{{ $pedido->id }} - {{ $pedido->cliente?->nome ?? 'Cliente nao informado' }}</strong>
                            <small>{{ $pedido->created_at?->format('d/m/Y H:i') }} · {{ ucfirst($pedido->status ?? 'sem status') }}</small>
                        </span>
                        <b>R$ {{ number_format((float) $pedido->valor_total, 2, ',', '.') }}</b>
                    </a>
                @empty
                    <div class="tb-dashboard-empty">Nenhum pedido cadastrado ainda.</div>
                @endforelse
            </div>
        </section>

        <section class="tb-dashboard-panel">
            <div class="tb-dashboard-panel-header">
                <div>
                    <p class="tb-dashboard-kicker">Status</p>
                    <h3>Pedidos por etapa</h3>
                </div>
            </div>

            <div class="tb-dashboard-status">
                @forelse ($statusSummary as $status => $total)
                    <div>
                        <span>{{ ucfirst($status) }}</span>
                        <strong>{{ $total }}</strong>
                    </div>
                @empty
                    <div class="tb-dashboard-empty">Sem pedidos para resumir.</div>
                @endforelse
            </div>
        </section>

        <section class="tb-dashboard-panel">
            <div class="tb-dashboard-panel-header">
                <div>
                    <p class="tb-dashboard-kicker">Alertas</p>
                    <h3>Estoque baixo</h3>
                </div>
                <a href="{{ route('filament.admin.resources.produtos.index') }}">Produtos</a>
            </div>

            <div class="tb-dashboard-list tb-dashboard-compact">
                @forelse ($lowProducts as $produto)
                    <a class="tb-dashboard-list-item" href="{{ route('filament.admin.resources.produtos.edit', ['record' => $produto]) }}">
                        <span>
                            <strong>{{ $produto->nome }}</strong>
                            <small>{{ $produto->referencia ?? 'Sem referencia' }}</small>
                        </span>
                        <b>{{ $produto->estoque }}</b>
                    </a>
                @empty
                    <div class="tb-dashboard-empty">Produtos com estoque saudavel.</div>
                @endforelse
            </div>
        </section>

        <section class="tb-dashboard-panel">
            <div class="tb-dashboard-panel-header">
                <div>
                    <p class="tb-dashboard-kicker">Materia-prima</p>
                    <h3>Insumos em atencao</h3>
                </div>
                <a href="{{ route('filament.admin.resources.insumos.index') }}">Insumos</a>
            </div>

            <div class="tb-dashboard-list tb-dashboard-compact">
                @forelse ($lowSupplies as $insumo)
                    <a class="tb-dashboard-list-item" href="{{ route('filament.admin.resources.insumos.edit', ['record' => $insumo]) }}">
                        <span>
                            <strong>{{ $insumo->nome }}</strong>
                            <small>{{ $insumo->unidade_medida }}</small>
                        </span>
                        <b>{{ number_format((float) $insumo->estoque, 2, ',', '.') }}</b>
                    </a>
                @empty
                    <div class="tb-dashboard-empty">Insumos com estoque saudavel.</div>
                @endforelse
            </div>
        </section>
    </div>
</x-filament-widgets::widget>
