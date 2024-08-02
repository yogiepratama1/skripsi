
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        Buat Permintaan
    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("dashboard.formulirPendaftarans.store")); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(auth()->user()->role == 'user'): ?>
                <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
            <?php else: ?>
            <div class="form-group">
                <label class="required" for="user_id">Select User</label>
                <select class="form-control select2 <?php echo e($errors->has('user_id') ? 'is-invalid' : ''); ?>" name="user_id" id="user_id" required>
                    <option value="">Select a user...</option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>" <?php echo e(old('user_id') == $user->id ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('user_id')): ?>
                    <span class="text-danger"><?php echo e($errors->first('user_id')); ?></span>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <label class="required" for="name">Nama</label>
                <input class="form-control <?php echo e($errors->has('nama') ? 'is-invalid' : ''); ?>" type="text" name="nama" id="nama" value="<?php echo e(old('nama', '')); ?>" required>
                <?php if($errors->has('nama')): ?>
                    <span class="text-danger"><?php echo e($errors->first('nama')); ?></span>
                <?php endif; ?>
            </div>
            <!-- Additional fields -->
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" type="email" name="email" id="email" value="<?php echo e(old('email')); ?>">
                <?php if($errors->has('email')): ?>
                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="telp">Telp</label>
                <input class="form-control <?php echo e($errors->has('telp') ? 'is-invalid' : ''); ?>" type="text" name="telp" id="telp" value="<?php echo e(old('telp')); ?>">
                <?php if($errors->has('telp')): ?>
                    <span class="text-danger"><?php echo e($errors->first('telp')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <input class="form-control <?php echo e($errors->has('agama') ? 'is-invalid' : ''); ?>" type="text" name="agama" id="agama" value="<?php echo e(old('agama')); ?>">
                <?php if($errors->has('agama')): ?>
                    <span class="text-danger"><?php echo e($errors->first('agama')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="ttl">TTL</label>
                <input class="form-control <?php echo e($errors->has('ttl') ? 'is-invalid' : ''); ?>" type="text" name="ttl" id="ttl" value="<?php echo e(old('ttl')); ?>">
                <?php if($errors->has('ttl')): ?>
                    <span class="text-danger"><?php echo e($errors->first('ttl')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="required" for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control select2 <?php echo e($errors->has('jenis_kelamin') ? 'is-invalid' : ''); ?>" name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value="">pilih</option>
                    <?php $__currentLoopData = $jenis_kelamins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_kelamin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($jenis_kelamin['name']); ?>" <?php echo e(old('jenis_kelamin') == $jenis_kelamin['name'] ? 'selected' : ''); ?>><?php echo e($jenis_kelamin['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('jenis_kelamin')): ?>
                    <span class="text-danger"><?php echo e($errors->first('jenis_kelamin')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input class="form-control <?php echo e($errors->has('alamat') ? 'is-invalid' : ''); ?>" type="textarea" name="alamat" id="alamat" value="<?php echo e(old('alamat')); ?>">
                <?php if($errors->has('alamat')): ?>
                    <span class="text-danger"><?php echo e($errors->first('alamat')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="kode_pos">Kode Pos</label>
                <input class="form-control <?php echo e($errors->has('kode_pos') ? 'is-invalid' : ''); ?>" type="text" name="kode_pos" id="kode_pos" value="<?php echo e(old('kode_pos')); ?>">
                <?php if($errors->has('kode_pos')): ?>
                    <span class="text-danger"><?php echo e($errors->first('kode_pos')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="nama_keluarga">Nama Keluarga</label>
                <input class="form-control <?php echo e($errors->has('nama_keluarga') ? 'is-invalid' : ''); ?>" type="text" name="nama_keluarga" id="nama_keluarga" value="<?php echo e(old('nama_keluarga')); ?>">
                <?php if($errors->has('nama_keluarga')): ?>
                    <span class="text-danger"><?php echo e($errors->first('nama_keluarga')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="nomor_kartu_keluarga">Nomor Kartu Keluarga</label>
                <input class="form-control <?php echo e($errors->has('nomor_kartu_keluarga') ? 'is-invalid' : ''); ?>" type="text" name="nomor_kartu_keluarga" id="nomor_kartu_keluarga" value="<?php echo e(old('nomor_kartu_keluarga')); ?>">
                <?php if($errors->has('nomor_kartu_keluarga')): ?>
                    <span class="text-danger"><?php echo e($errors->first('nomor_kartu_keluarga')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="jumlah_anak">Jumlah Anak</label>
                <input class="form-control <?php echo e($errors->has('jumlah_anak') ? 'is-invalid' : ''); ?>" type="text" name="jumlah_anak" id="jumlah_anak" value="<?php echo e(old('jumlah_anak')); ?>">
                <?php if($errors->has('jumlah_anak')): ?>
                    <span class="text-danger"><?php echo e($errors->first('jumlah_anak')); ?></span>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skripsi\resources\views/admin/assets/create.blade.php ENDPATH**/ ?>