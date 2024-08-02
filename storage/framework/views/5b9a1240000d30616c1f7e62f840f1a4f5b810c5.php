
<?php $__env->startSection('content'); ?>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo e(route('dashboard.laporans.create')); ?>">
                Export Laporan
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        Laporan List
    </div>
    <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-Asset">
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
            </div>


        </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    $(document).ready(function() {
        $('.datatable-Asset').DataTable({
            // Add other datatable options or customization here
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skripsi\resources\views/admin/laporans/index.blade.php ENDPATH**/ ?>