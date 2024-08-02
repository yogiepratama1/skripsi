
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        Promo 
    </div>
            <?php if($count < 1): ?>
                <div class="card-body">
                    <div class="alert alert-info">
                        Belum Ada Promo
                    </div>
                    <?php if(auth()->user()->role == 'sales'): ?>
                        <a class="btn btn-success" href="<?php echo e(route('dashboard.perancangans.create', $permintaan->id)); ?>">
                            Tambah Promo
                        </a>                        
                    <?php endif; ?>
                </div>
            <?php else: ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-Asset">
                        <thead class="text-center">
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Promo</th>
                                <th>Tanggal Promo</th>
                                <?php if(auth()->user()->role != 'user'): ?>                                    
                                <th>Action</th>
                                <?php endif; ?>

                            </tr>
                        </thead>
                        <tbody>
                            <tr data-entry-id="<?php echo e($perancangan->id); ?>">
                                <!-- <td><?php echo e($perancangan->id ?? ''); ?></td> -->
                                <td><?php echo e($perancangan->promo ?? ''); ?></td>
                                <td><?php echo e($perancangan->tanggal_promo ? \Carbon\Carbon::parse($perancangan->tanggal_promo)->format('Y-m-d') : ''); ?></td>
                                <?php if(auth()->user()->role != 'user'): ?>                                    
                                <td>
                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('dashboard.perancangans.edit', $perancangan->id)); ?>">
                                        Edit
                                    </a>
                                        <form action="<?php echo e(route('dashboard.perancangans.destroy', $perancangan->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>
                                </td>
                                <?php endif; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
             <?php endif; ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skripsi\resources\views/admin/perancangans/index.blade.php ENDPATH**/ ?>