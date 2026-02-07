<html>
<head>
    <meta charset="utf-8" />
    <title>Bon de Commande - <?php echo e($order->order_number); ?></title>
    <style>
        @media print {
            @page { size: A4; margin: 20mm; }
            body { font-family: Arial, sans-serif; color: #000; }
            table { width: 100%; border-collapse: collapse; }
            th, td { border: 1px solid #000; padding: 6px; font-size: 12px; }
            .no-print { display: none !important; }
        }
        body { font-family: Arial, sans-serif; }
        .header { text-align: left; margin-bottom: 10px; }
        .title { font-size: 18px; font-weight: bold; }
        .section { margin-top: 14px; }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
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