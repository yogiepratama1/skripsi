<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #008000; /* Less bright green color */
            color: white; /* White text */
            text-align: center;
        }
        
        h1 {
            text-align: center;
        }
        
        tr {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Laporan Pelanggan dan Promo</h1>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Promo</th>
                    <th>Tanggal Promo</th>
                    <th>Kepuasan</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $permintaans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permintaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                <tr data-entry-id="<?php echo e($permintaan->id); ?>">
                    <td class="text-center"><?php echo e($permintaan->id ?? ''); ?></td>
                    <td><?php echo e($permintaan->nama ?? ''); ?></td>
                    <td><?php echo e($permintaan->alamat ?? ''); ?></td>
                    <td><?php echo e($permintaan->no_hp ?? ''); ?></td>
                    <td><?php echo e($permintaan->barang ?? ''); ?></td>
                    <td><?php echo e($permintaan->jumlah ?? ''); ?></td>
                    <td><?php echo e(number_format($permintaan->total_harga ?? 0, 0, ',', '.')); ?></td>
                    <?php if($permintaan->perancangan != null): ?>
                                <td><?php echo e($permintaan->perancangan->promo ?? ''); ?></td>
                                <td><?php echo e($permintaan->perancangan->tanggal_promo ? \Carbon\Carbon::parse($permintaan->perancangan->tanggal_promo)->format('Y-m-d') : ''); ?></td>
                                <?php else: ?>
                                <td></td>                                    
                                <td></td>                                    
                                <?php endif; ?>
                    <td><?php echo e($permintaan->kepuasan ?? ''); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\skripsi\resources\views/admin/laporans/pdf.blade.php ENDPATH**/ ?>