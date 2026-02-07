<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BON DE COMMANDE - <?php echo e($order->order_number); ?></title>
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
            N°: <?php echo e($order->order_number); ?><br/>
            Date: <?php echo e($order->created_at->format('d/m/Y H:i')); ?><br/>
        </div>
    </div>

    <hr/>

    <!-- Client Information -->
    <div class="section client-info">
        <strong>CLIENT:</strong><br/>
        <?php echo e($order->user->first_name); ?> <?php echo e($order->user->last_name); ?><br/>
        <?php echo e($order->user->company ?? '-'); ?><br/>
        <?php echo e($order->user->email); ?><br/>
        <?php echo e($order->user->phone ?? '-'); ?><br/>
    </div>

    <!-- Delivery Information -->
    <div class="section client-info">
        <strong>LIVRAISON:</strong><br/>
        <?php echo e($order->delivery_address ?? 'À définir'); ?><br/>
        <?php if($order->requested_delivery_date): ?>
        Date souhaitée: <?php echo e(\Carbon\Carbon::parse($order->requested_delivery_date)->format('d/m/Y')); ?><br/>
        <?php endif; ?>
        Transport: <?php echo e($order->logistics_type ?? 'Standard'); ?><br/>
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
                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(str_pad($item->product_id, 6, '0', STR_PAD_LEFT)); ?></td>
                    <td><?php echo e($item->product->name); ?></td>
                    <td style="text-align: center"><?php echo e($item->quantity); ?></td>
                    <td style="text-align: right"><?php echo e(number_format($item->price, 2)); ?> DA</td>
                    <td style="text-align: right"><?php echo e(number_format($item->quantity * $item->price, 2)); ?> DA</td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="4" style="text-align: right; font-weight: bold">TOTAL HT:</td>
                    <td style="text-align: right; font-weight: bold"><?php echo e(number_format($order->total, 2)); ?> DA</td>
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
      <div>N°: <?php echo e($order->order_number); ?></div>
      <div>Date: <?php echo e($order->created_at->format('d/m/Y H:i')); ?></div>
    </div>
    <hr />
    <div class="section">
      <strong>Client</strong><br/>
      <?php echo e($order->user->name ?? ($order->user->first_name.' '.$order->user->last_name)); ?><br/>
      <?php echo e($order->user->email); ?>

    </div>
    <div class="section">
      <strong>Livraison</strong><br/>
      <?php echo e($order->delivery_address ?? 'À définir'); ?>

      <?php if($order->requested_delivery_date): ?>
      <br/>Date souhaitée: <?php echo e(\Carbon\Carbon::parse($order->requested_delivery_date)->format('d/m/Y')); ?>

      <?php endif; ?>
    </div>
    <div class="section">
      <table>
        <thead>
          <tr>
            <th>Réf</th><th>Article</th><th>QTY</th><th>PU HT</th><th>Total HT</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e(str_pad($item->product_id, 6, '0', STR_PAD_LEFT)); ?></td>
            <td><?php echo e($item->product->name); ?></td>
            <td><?php echo e($item->quantity); ?></td>
            <td><?php echo e(number_format($item->price, 2)); ?> DA</td>
            <td><?php echo e(number_format($item->quantity * $item->price, 2)); ?> DA</td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4" style="text-align:right">TOTAL HT</td>
            <td><?php echo e(number_format($order->total, 2)); ?> DA</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <script>window.onload = function(){ window.print(); }</script>
</body>
</html>
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views/orders/print.blade.php ENDPATH**/ ?>