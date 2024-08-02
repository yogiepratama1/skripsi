
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        Create Pendataan
    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route('dashboard.permintaans.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(auth()->user()->role != 'user'): ?>                
            <div class="form-group">
                <label for="user_id">Pilih Pelanggan</label>
                <select class="form-control select2 <?php echo e($errors->has('user') ? 'is-invalid' : ''); ?>" name="user_id" id="user_id">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($entry->id); ?>" <?php echo e(old('user_id') == $id ? 'selected' : ''); ?>><?php echo e($entry->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('user')): ?>
                    <span class="text-danger"><?php echo e($errors->first('user')); ?></span>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- Add below -->
            <div class="form-group">
                <label for="nama">Nama</label>
                <input class="form-control <?php echo e($errors->has('nama') ? 'is-invalid' : ''); ?>" type="text" name="nama" id="nama" value="<?php echo e(old('nama')); ?>">
                <?php if($errors->has('nama')): ?>
                    <span class="text-danger"><?php echo e($errors->first('nama')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input class="form-control <?php echo e($errors->has('alamat') ? 'is-invalid' : ''); ?>" type="text" name="alamat" id="alamat" value="<?php echo e(old('alamat')); ?>">
                <?php if($errors->has('alamat')): ?>
                    <span class="text-danger"><?php echo e($errors->first('alamat')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="no_hp">Nomor HP</label>
                <input class="form-control <?php echo e($errors->has('no_hp') ? 'is-invalid' : ''); ?>" type="text" name="no_hp" id="no_hp" value="<?php echo e(old('no_hp')); ?>">
                <?php if($errors->has('no_hp')): ?>
                    <span class="text-danger"><?php echo e($errors->first('no_hp')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="barang">Barang</label>
                <input class="form-control <?php echo e($errors->has('barang') ? 'is-invalid' : ''); ?>" type="text" name="barang" id="barang" value="<?php echo e(old('barang')); ?>">
                <?php if($errors->has('barang')): ?>
                    <span class="text-danger"><?php echo e($errors->first('barang')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input class="form-control <?php echo e($errors->has('jumlah') ? 'is-invalid' : ''); ?>" type="number" name="jumlah" id="jumlah" value="<?php echo e(old('jumlah')); ?>">
                <?php if($errors->has('jumlah')): ?>
                    <span class="text-danger"><?php echo e($errors->first('jumlah')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="total_harga">Total Harga</label>
                <input class="form-control <?php echo e($errors->has('total_harga') ? 'is-invalid' : ''); ?>" type="number" name="total_harga" id="total_harga" value="<?php echo e(old('total_harga')); ?>">
                <?php if($errors->has('total_harga')): ?>
                    <span class="text-danger"><?php echo e($errors->first('total_harga')); ?></span>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skripsi\resources\views/admin/permintaans/create.blade.php ENDPATH**/ ?>