<?php

namespace App\Mail;

use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PedidoConfirmadoMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Pedido $pedido)
    {
        $this->pedido->loadMissing(['cliente', 'itens.produto']);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmacao do pedido #' . $this->pedido->id,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.pedidos.confirmacao',
            with: [
                'pedido' => $this->pedido,
                'cliente' => $this->pedido->cliente,
                'itens' => $this->pedido->itens,
            ],
        );
    }
}
