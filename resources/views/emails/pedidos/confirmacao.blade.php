<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Confirmação do pedido #{{ $pedido->id }}</title>
</head>
<body style="margin: 0; padding: 0; background-color: oklch(0.965 0.015 65.0); font-family: 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, Roboto, 'Helvetica Neue', Arial, sans-serif; color: oklch(0.190 0.055 45.0); -webkit-font-smoothing: antialiased;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background-color: oklch(0.965 0.015 65.0); padding: 40px 16px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%; max-width: 600px; background-color: #ffffff; border-radius: 16px; overflow: hidden; border: 1px solid oklch(0.840 0.060 65.0); box-shadow: 0 4px 24px oklch(0.530 0.120 50.0 / 0.08);">
                    {{-- Header --}}
                    <tr>
                        <td style="background: linear-gradient(135deg, oklch(0.340 0.095 46.0) 0%, oklch(0.260 0.075 45.0) 100%); padding: 36px 40px 32px;">
                            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td>
                                        <p style="margin: 0 0 6px; font-size: 12px; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: oklch(0.840 0.060 65.0);">Confirmação</p>
                                        <h1 style="margin: 0; font-size: 26px; font-weight: 700; line-height: 1.25; color: oklch(0.965 0.015 65.0);">Pedido confirmado</h1>
                                    </td>
                                    <td align="right" valign="top">
                                        <span style="display: inline-block; padding: 8px 14px; background-color: oklch(0.530 0.120 50.0); border-radius: 999px; font-size: 13px; font-weight: 600; color: oklch(0.965 0.015 65.0); white-space: nowrap;">#{{ $pedido->id }}</span>
                                    </td>
                                </tr>
                            </table>
                            <p style="margin: 16px 0 0; font-size: 15px; line-height: 1.5; color: oklch(0.920 0.035 65.0);">Olá, <strong style="color: oklch(0.965 0.015 65.0);">{{ $cliente->nome }}</strong>. Recebemos seu pedido com sucesso.</p>
                        </td>
                    </tr>

                    {{-- Meta --}}
                    <tr>
                        <td style="padding: 28px 40px 0;">
                            <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background-color: oklch(0.965 0.015 65.0); border-radius: 12px; border: 1px solid oklch(0.920 0.035 65.0);">
                                <tr>
                                    <td width="50%" style="padding: 16px 20px; border-right: 1px solid oklch(0.920 0.035 65.0);">
                                        <p style="margin: 0 0 4px; font-size: 11px; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: oklch(0.640 0.110 55.0);">Número do pedido</p>
                                        <p style="margin: 0; font-size: 16px; font-weight: 600; color: oklch(0.260 0.075 45.0);">#{{ $pedido->id }}</p>
                                    </td>
                                    <td width="50%" style="padding: 16px 20px;">
                                        <p style="margin: 0 0 4px; font-size: 11px; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: oklch(0.640 0.110 55.0);">Data do pedido</p>
                                        <p style="margin: 0; font-size: 16px; font-weight: 600; color: oklch(0.260 0.075 45.0);">{{ $pedido->created_at?->format('d/m/Y H:i') }}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Itens --}}
                    <tr>
                        <td style="padding: 28px 40px;">
                            <p style="margin: 0 0 14px; font-size: 13px; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase; color: oklch(0.430 0.110 48.0);">Itens do pedido</p>

                            <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse: collapse; border-radius: 12px; overflow: hidden; border: 1px solid oklch(0.920 0.035 65.0);">
                                <thead>
                                    <tr>
                                        <th align="left" style="padding: 12px 16px; background-color: oklch(0.920 0.035 65.0); font-size: 11px; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase; color: oklch(0.340 0.095 46.0); border-bottom: 1px solid oklch(0.840 0.060 65.0);">Produto</th>
                                        <th align="center" style="padding: 12px 12px; background-color: oklch(0.920 0.035 65.0); font-size: 11px; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase; color: oklch(0.340 0.095 46.0); border-bottom: 1px solid oklch(0.840 0.060 65.0);">Qtd</th>
                                        <th align="right" style="padding: 12px 16px; background-color: oklch(0.920 0.035 65.0); font-size: 11px; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase; color: oklch(0.340 0.095 46.0); border-bottom: 1px solid oklch(0.840 0.060 65.0);">Unitário</th>
                                        <th align="right" style="padding: 12px 16px; background-color: oklch(0.920 0.035 65.0); font-size: 11px; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase; color: oklch(0.340 0.095 46.0); border-bottom: 1px solid oklch(0.840 0.060 65.0);">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($itens as $item)
                                        <tr>
                                            <td style="padding: 14px 16px; font-size: 14px; color: oklch(0.260 0.075 45.0); border-bottom: 1px solid oklch(0.920 0.035 65.0); background-color: #ffffff;">{{ $item->produto?->nome ?? 'Produto removido' }}</td>
                                            <td align="center" style="padding: 14px 12px; font-size: 14px; color: oklch(0.430 0.110 48.0); border-bottom: 1px solid oklch(0.920 0.035 65.0); background-color: #ffffff;">{{ $item->quantidade }}</td>
                                            <td align="right" style="padding: 14px 16px; font-size: 14px; color: oklch(0.430 0.110 48.0); border-bottom: 1px solid oklch(0.920 0.035 65.0); background-color: #ffffff;">R$ {{ number_format((float) $item->preco_unitario, 2, ',', '.') }}</td>
                                            <td align="right" style="padding: 14px 16px; font-size: 14px; font-weight: 600; color: oklch(0.260 0.075 45.0); border-bottom: 1px solid oklch(0.920 0.035 65.0); background-color: #ffffff;">R$ {{ number_format((float) $item->quantidade * (float) $item->preco_unitario, 2, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="margin-top: 20px;">
                                <tr>
                                    <td align="right">
                                        <table cellpadding="0" cellspacing="0" role="presentation" style="background-color: oklch(0.965 0.015 65.0); border-radius: 12px; border: 1px solid oklch(0.840 0.060 65.0); border-left: 4px solid oklch(0.530 0.120 50.0);">
                                            <tr>
                                                <td style="padding: 16px 24px;">
                                                    <p style="margin: 0 0 2px; font-size: 11px; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: oklch(0.640 0.110 55.0);">Valor total</p>
                                                    <p style="margin: 0; font-size: 24px; font-weight: 700; color: oklch(0.340 0.095 46.0);">R$ {{ number_format((float) $pedido->valor_total, 2, ',', '.') }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin: 28px 0 0; font-size: 14px; line-height: 1.6; color: oklch(0.430 0.110 48.0);">Agradecemos pela preferência. Em breve informaremos o andamento do seu pedido.</p>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="padding: 20px 40px 28px; background-color: oklch(0.965 0.015 65.0); border-top: 1px solid oklch(0.920 0.035 65.0);">
                            <p style="margin: 0; font-size: 12px; line-height: 1.5; color: oklch(0.640 0.110 55.0); text-align: center;">Este é um e-mail automático. Por favor, não responda.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
