<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BON DE COMMANDE - <?php echo e($order->order_number); ?></title>
    <style>
        @page { size: A4; margin: 20mm; }
        body { font-family: Arial, sans-serif; color: #000; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; font-size: 12px; }
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
    <div class="header">
        <div class="company-info">
            <strong>SARL GLOBAL ACCESSOIRES</strong><br/>
            Producteur de la marque MYFIX<br/>
            Zone Industrielle - Bordj Bou Arreridid, Alg&eacute;rie<br/>
            T&eacute;l: +213 550 00 00 00<br/>
            Email: commercial@myfix-dz.com<br/>
        </div>
        <div class="order-info">
            <strong class="title">BON DE COMMANDE</strong><br/>
            N&deg;: <?php echo e($order->order_number); ?><br/>
            Date: <?php echo e($order->created_at->format('d/m/Y H:i')); ?><br/>
        </div>
    </div>

    <hr/>

    <div class="section client-info">
        <strong>CLIENT:</strong><br/>
        <?php echo e($order->user->first_name); ?> <?php echo e($order->user->last_name); ?><br/>
        <?php echo e($order->user->company ?? '-'); ?><br/>
        <?php echo e($order->user->email); ?><br/>
        <?php echo e($order->user->phone ?? '-'); ?><br/>
    </div>

    <div class="section client-info">
        <strong>LIVRAISON:</strong><br/>
        <?php echo e($order->delivery_address ?? 'A definir'); ?><br/>
        <?php if($order->requested_delivery_date): ?>
        Date souhait&eacute;e: <?php echo e(\Carbon\Carbon::parse($order->requested_delivery_date)->format('d/m/Y')); ?><br/>
        <?php endif; ?>
        Transport: <?php echo e($order->logistics_type ?? 'Standard'); ?><br/>
    </div>

    <div class="section">
        <table>
            <thead>
                <tr class="table-header">
                    <th style="width: 15%">R&Eacute;F&Eacute;RENCE</th>
                    <th style="width: 45%">D&Eacute;SIGNATION</th>
                    <th style="width: 10%">QUANTIT&Eacute;</th>
                    <th style="width: 15%">P.U. HT</th>
                    <th style="width: 15%">TOTAL HT</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(str_pad($item->product_id, 6, '0', STR_PAD_LEFT)); ?></td>
                    <td><?php echo e($item->product->name ?? 'Produit indisponible'); ?></td>
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
            Document valable pour approvisionnement - Sous r&eacute;serve de disponibilit&eacute;
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Bucket\Desktop\Commandes\placo-app\resources\views\orders\print_pdf.blade.php ENDPATH**/ ?>