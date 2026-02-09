<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BON DE COMMANDE - {{ $order->order_number }}</title>
    <style>
        @page { size: A4; margin: 20mm; }
        body { font-family: Arial, sans-serif; color: #000; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; font-size: 11px; }
        .header-table { width: 100%; border: none; margin-bottom: 20px; }
        .header-table td { border: none; padding: 0; vertical-align: top; }
        .title { font-size: 24px; font-weight: bold; text-transform: uppercase; }
        .company-info { font-size: 12px; color: #333; line-height: 1.4; }
        .client-table { width: 100%; border: none; margin-bottom: 30px; border-bottom: 2px solid #000; padding-bottom: 20px; }
        .client-table td { border: none; vertical-align: top; width: 50%; padding-right: 20px; }
        .box-title { font-weight: bold; border-bottom: 1px solid #ccc; margin-bottom: 5px; padding-bottom: 2px; text-transform: uppercase; font-size: 11px; color: #555; display: block; width: 100%; }
        .table-header { background-color: #f0f0f0; font-weight: bold; }
        .total-row { font-weight: bold; background-color: #f0f0f0; }
        .footer-note { margin-top: 30px; text-align: center; font-size: 10px; color: #666; border-top: 1px solid #ccc; padding-top: 10px; }
    </style>
</head>
<body>
    <table class="header-table">
        <tr>
            <td style="width: 50%">
                <div class="company-info">
                    <strong>SARL GLOBAL ACCESSOIRES</strong><br/>
                    Producteur de la marque MYFIX<br/>
                    Zone Industrielle - Bordj Bou Arreridid, Alg&eacute;rie<br/>
                    T&eacute;l: +213 550 00 00 00<br/>
                    Email: commercial@myfix-dz.com
                </div>
            </td>
            <td style="width: 50%; text-align: right;">
                <div class="title">Bon de Commande</div>
                <div style="font-size: 16px; font-weight: bold; margin-top: 5px;">N° {{ $order->order_number }}</div>
                <div style="margin-top: 5px;">Date: {{ $order->created_at->format('d/m/Y H:i') }}</div>
            </td>
        </tr>
    </table>

    <hr style="border: 0; border-top: 2px solid #000; margin: 0 0 20px 0;">

    <table class="client-table">
        <tr>
            <td>
                <div class="box-title">Client</div>
                <strong>{{ $order->user->first_name }} {{ $order->user->last_name }}</strong><br/>
                @if($order->user->company) {{ $order->user->company }}<br/> @endif
                {{ $order->user->email }}<br/>
                {{ $order->user->phone ?? '-' }}
            </td>
            <td>
                <div class="box-title">Livraison</div>
                {{ $order->delivery_address ?? 'A definir' }}<br/>
                @if($order->requested_delivery_date)
                Date souhait&eacute;e: {{ \Carbon\Carbon::parse($order->requested_delivery_date)->format('d/m/Y') }}<br/>
                @endif

            </td>
        </tr>
    </table>

    <div>
        <table>
            <thead>
                <tr class="table-header">
                    <th style="width: 15%; text-align: left;">REF</th>
                    <th style="width: 45%; text-align: left;">D&Eacute;SIGNATION</th>
                    <th style="width: 10%; text-align: center;">QT&Eacute;</th>
                    <th style="width: 15%; text-align: right;">P.U. HT</th>
                    <th style="width: 15%; text-align: right;">TOTAL HT</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ str_pad($item->product_id, 6, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $item->product->name ?? 'Produit indisponible' }}</td>
                    <td style="text-align: center">{{ $item->quantity }}</td>
                    <td style="text-align: right">{{ number_format($item->price, 2) }}</td>
                    <td style="text-align: right">{{ number_format($item->quantity * $item->price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="4" style="text-align: right; font-weight: bold; text-transform: uppercase;">Total HT</td>
                    <td style="text-align: right; font-weight: bold; font-size: 14px;">{{ number_format($order->total, 2) }} DA</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="footer-note">
        Document valable pour approvisionnement - Sous r&eacute;serve de disponibilit&eacute;<br>
        Merci de votre confiance.
    </div>
</body>
</html>
