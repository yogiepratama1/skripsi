
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        Buat Promo
    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("dashboard.perancangans.store")); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input hidden name="permintaan_id" value="<?php echo e($permintaan->id); ?>">
            <!-- Add below -->
            <div class="form-group">
                <label for="promo">Promo</label>
                <input class="form-control <?php echo e($errors->has('promo') ? 'is-invalid' : ''); ?>" type="text" name="promo" id="promo" value="<?php echo e(old('promo')); ?>">
                <?php if($errors->has('promo')): ?>
                    <span class="text-danger"><?php echo e($errors->first('promo')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="tanggal_promo">Tanggal Promo</label>
                <input class="form-control date <?php echo e($errors->has('tanggal_promo') ? 'is-invalid' : ''); ?>" type="text" name="tanggal_promo" id="tanggal_promo" value="<?php echo e(old('tanggal_promo')); ?>">
                <?php if($errors->has('tanggal_promo')): ?>
                    <span class="text-danger"><?php echo e($errors->first('tanggal_promo')); ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skripsi\resources\views/admin/perancangans/create.blade.php ENDPATH**/ ?>