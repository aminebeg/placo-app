<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BON DE COMMANDE - {{ $order->order_number }}</title>
    <style>
        @media print {
            @page { size: A4; margin: 20mm; }
            body { font-family: Arial, sans-serif; color: #000; }
            table { width: 100%; border-collapse: collapse; }
            th, td { border: 1px solid #000; padding: 6px; font-size: 12px; }
            .no-print { display: none !important; }
            .page-break { page-break-before: always; }
        }
        body { font-family: Arial, sans-serif; }
        .header { text-align: left; margin-bottom: 10px; }
        .title { font-size: 18px; font-weight: bold; }
        .section { margin-top: 14px; }
        .company-info { font-size: 12px; color: #333; }
        .order-info { text-align: right; font-size: 14px; }
        .client-info { font-size: 12px; }
        .table-header { background-color: #f0f0f0; font-weight: bold; }
        .total-row { font-weight: bold; background-color: #f0f0f0; }
        .footer { margin-top: 20px; padding-top: 10px; border-top: 2px solid #000; font-size: 10px; }
    </style>
</head>
<body>
    <!-- Company Header -->
    <div class="header">
        <div class="company-info">
            <strong>SARL GLOBAL ACCESSOIRES</strong><br/>
            Producteur de la marque MYFIX<br/>
            Zone Industrielle - Bordj Bou Arreridid, Algérie<br/>
            Tél: +213 550 00 00 00<br/>
            Email: commercial@myfix-dz.com<br/>
        </div>
        <div class="order-info">
            <strong class="title">BON DE COMMANDE</strong><br/>
            N°: {{ $order->order_number }}<br/>
            Date: {{ $order->created_at->format('d/m/Y H:i') }}<br/>
        </div>
    </div>

    <hr/>

    <!-- Client Information -->
    <div class="section client-info">
        <strong>CLIENT:</strong><br/>
        {{ $order->user->first_name }} {{ $order->user->last_name }}<br/>
        {{ $order->user->company ?? '-' }}<br/>
        {{ $order->user->email }}<br/>
        {{ $order->user->phone ?? '-' }}<br/>
    </div>

    <!-- Delivery Information -->
    <div class="section client-info">
        <strong>LIVRAISON:</strong><br/>
        {{ $order->delivery_address ?? 'À définir' }}<br/>
        @if($order->requested_delivery_date)
        Date souhaitée: {{ \Carbon\Carbon::parse($order->requested_delivery_date)->format('d/m/Y') }}<br/>
        @endif
        Transport: {{ $order->logistics_type ?? 'Standard' }}<br/>
    </div>

    <!-- Order Items Table -->
    <div class="section">
        <table>
            <thead>
                <tr class="table-header">
                    <th style="width: 15%">RÉFÉRENCE</th>
                    <th style="width: 45%">DÉSIGNATION</th>
                    <th style="width: 10%">QUANTITÉ</th>
                    <th style="width: 15%">P.U. HT</th>
                    <th style="width: 15%">TOTAL HT</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ str_pad($item->product_id, 6, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td style="text-align: center">{{ $item->quantity }}</td>
                    <td style="text-align: right">{{ number_format($item->price, 2) }} DA</td>
                    <td style="text-align: right">{{ number_format($item->quantity * $item->price, 2) }} DA</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="4" style="text-align: right; font-weight: bold">TOTAL HT:</td>
                    <td style="text-align: right; font-weight: bold">{{ number_format($order->total, 2) }} DA</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Footer with Signatures -->
    <div class="footer">
        <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
            <div style="text-align: center; width: 30%">
                <strong>Signature Client</strong><br/>
                <div style="border-bottom: 1px solid #000; height: 40px; margin-top: 10px"></div>
            </div>
            <div style="text-align: center; width: 30%">
                <strong>Timbre & Cachet</strong><br/>
                <div style="border-bottom: 1px solid #000; height: 40px; margin-top: 10px"></div>
            </div>
            <div style="text-align: center; width: 30%">
                <strong>Signature MYFIX</strong><br/>
                <div style="border-bottom: 1px solid #000; height: 40px; margin-top: 10px"></div>
            </div>
        </div>
        <div style="text-align: center; font-size: 10px; color: #666">
            Document valable pour approvisionnement - Sous réserve de disponibilité
        </div>
    </div>

    <!-- Auto-print functionality -->
    <script>
        window.onload = function() {
            // Auto-print after 1 second to ensure all content is loaded
            setTimeout(function() {
                window.print();
            }, 1000);
        };
    </script>
</body>
</html>
  <div class="print-area">
    <div class="header">
      <div class="title">GLOBAL ACCESSOIRES - BON DE COMMANDE</div>
      <div>N°: {{ $order->order_number }}</div>
      <div>Date: {{ $order->created_at->format('d/m/Y H:i') }}</div>
    </div>
    <hr />
    <div class="section">
      <strong>Client</strong><br/>
      {{ $order->user->name ?? ($order->user->first_name.' '.$order->user->last_name) }}<br/>
      {{ $order->user->email }}
    </div>
    <div class="section">
      <strong>Livraison</strong><br/>
      {{ $order->delivery_address ?? 'À définir' }}
      @if($order->requested_delivery_date)
      <br/>Date souhaitée: {{ \Carbon\Carbon::parse($order->requested_delivery_date)->format('d/m/Y') }}
      @endif
    </div>
    <div class="section">
      <table>
        <thead>
          <tr>
            <th>Réf</th><th>Article</th><th>QTY</th><th>PU HT</th><th>Total HT</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order->items as $item)
          <tr>
            <td>{{ str_pad($item->product_id, 6, '0', STR_PAD_LEFT) }}</td>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ number_format($item->price, 2) }} DA</td>
            <td>{{ number_format($item->quantity * $item->price, 2) }} DA</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4" style="text-align:right">TOTAL HT</td>
            <td>{{ number_format($order->total, 2) }} DA</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <script>window.onload = function(){ window.print(); }</script>
</body>
</html>
