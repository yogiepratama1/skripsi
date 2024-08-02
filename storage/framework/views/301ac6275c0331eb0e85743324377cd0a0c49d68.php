
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        Nilai Kepuasan
    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route('dashboard.permintaans.kepuasan.update', [$permintaan->id])); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="kepuasan">Kepuasan</label>
                <input max="100" class="form-control <?php echo e($errors->has('kepuasan') ? 'is-invalid' : ''); ?>" type="number" name="kepuasan" id="kepuasan" value="<?php echo e(old('kepuasan')); ?>">
                <?php if($errors->has('kepuasan')): ?>
                    <span class="text-danger"><?php echo e($errors->first('kepuasan')); ?></span>
                <?php endif; ?>
            </div>

            <!-- Add below -->
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skripsi\resources\views/admin/permintaans/kepuasan.blade.php ENDPATH**/ ?>