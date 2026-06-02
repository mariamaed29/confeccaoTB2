<?php

namespace App\Filament\Resources\Pedidos\Pages;

use App\Filament\Resources\Pedidos\PedidoResource;
use App\Mail\PedidoConfirmadoMail;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class CreatePedido extends CreateRecord
{
    protected static string $resource = PedidoResource::class;

    protected function afterCreate(): void
    {
        $pedido = $this->record->load(['cliente', 'itens.produto']);
        $cliente = $pedido->cliente;

        if (! $cliente || ! filter_var($cliente->email, FILTER_VALIDATE_EMAIL)) {
            Log::warning('Pedido criado sem envio de e-mail: cliente sem e-mail valido.', [
                'pedido_id' => $pedido->id,
                'cliente_id' => $pedido->cliente_id,
                'email' => $cliente?->email,
            ]);

            return;
        }

        try {
            Mail::to($cliente->email)->send(new PedidoConfirmadoMail($pedido));
        } catch (Throwable $exception) {
            Log::error('Falha ao enviar e-mail de confirmacao do pedido.', [
                'pedido_id' => $pedido->id,
                'cliente_id' => $pedido->cliente_id,
                'email' => $cliente->email,
                'erro' => $exception->getMessage(),
            ]);
        }
    }
}
