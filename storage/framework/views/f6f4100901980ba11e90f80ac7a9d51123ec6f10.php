

<?php $__env->startSection('content'); ?>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo e(route('dashboard.permintaans.create')); ?>">
                Add Pendataan
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            List Pendataan 
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Permintaan">
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
                            <th class="no-export">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $permintaans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permintaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($permintaan->id); ?>">
                                <td class="text-center"><?php echo e($permintaan->id ?? ''); ?></td>
                                <td><?php echo e($permintaan->nama ?? ''); ?></td>
                                <td><?php echo e($permintaan->alamat ?? ''); ?></td>
                                <td><?php echo e($permintaan->no_hp ?? ''); ?></td>
                                <td><?php echo e($permintaan->barang ?? ''); ?></td>
                                <td><?php echo e($permintaan->jumlah ?? ''); ?></td>
                                <td><?php echo e(number_format($permintaan->total_harga ?? 0, 0, ',', '.')); ?></td>
                                <td>
                                    <a class="btn btn-xs btn-success" href="<?php echo e(route('dashboard.permintaans.perancangan', $permintaan->id)); ?>">
                                        Promo
                                    </a>
                                </td>
                                <td>
                                    <?php if(auth()->user()->role == 'user' && $permintaan->kepuasan == null): ?>                                        
                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('dashboard.permintaans.kepuasan', $permintaan->id)); ?>">
                                        Nilai Kepuasan
                                    </a>
                                    <?php endif; ?>
                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('dashboard.permintaans.edit', $permintaan->id)); ?>">
                                        Edit
                                    </a>
                                    <form action="<?php echo e(route('dashboard.permintaans.destroy', $permintaan->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                </td>
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
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            });

            let table = $('.datatable-Permintaan:not(.ajaxTable)').DataTable({ buttons: dtButtons });

            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skripsi\resources\views/admin/permintaans/index.blade.php ENDPATH**/ ?>