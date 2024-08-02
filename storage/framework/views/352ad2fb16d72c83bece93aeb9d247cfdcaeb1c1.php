
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
    <?php if(auth()->user()->role == 'user'): ?>
        Permintaan Anda
    <?php else: ?> 
        List Permintaan
        <?php if(auth()->user()->role == 'admin'): ?>
        <a class="btn btn-success" href="<?php echo e(route('dashboard.formulirPendaftarans.create')); ?>">
                        Tambah Permintaan
                    </a>
        <?php endif; ?>
    <?php endif; ?>
    </div>
    <?php if(auth()->user()->role == 'user'): ?>
            <?php if($count < 1): ?>
                <div class="card-body">
                    <div class="alert alert-info">
                        Anda belum membuat permintaan
                    </div>
                    <a class="btn btn-success" href="<?php echo e(route('dashboard.formulirPendaftarans.create')); ?>">
                        Tambah Permintaan
                    </a>
                </div>
            <?php else: ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-Asset">
                        <thead>
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telp</th>
                                <th>Agama</th>
                                <th>TTL</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Kode Pos</th>
                                <th>Nama Keluarga</th>
                                <th>Nomor Kartu Keluarga</th>
                                <th>Jumlah Anak</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-entry-id="<?php echo e($formulirPendaftarans->id); ?>">
                                <!-- <td><?php echo e($formulirPendaftarans->id ?? ''); ?></td> -->
                                <td><?php echo e($formulirPendaftarans->nama ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftarans->email ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftarans->telp ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftarans->agama ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftarans->ttl ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftarans->jenis_kelamin ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftarans->alamat ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftarans->kode_pos ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftarans->nama_keluarga ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftarans->nomor_kartu_keluarga ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftarans->jumlah_anak ?? ''); ?></td>
                                <td>
                                    <?php if($formulirPendaftarans->status == 1): ?>
                                        <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                    <?php elseif($formulirPendaftarans->status == 2): ?>
                                        <span class="badge badge-info">Diproses</span>
                                    <?php else: ?>
                                        <span class="badge badge-success">Disetujui</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($formulirPendaftarans->status == 3): ?>
                                    <a class="btn btn-success btn-sm" href="<?php echo e(route('dashboard.formulirPendaftarans.cetakKartu', $formulirPendaftarans->id)); ?>">
                                            Lihat Kartu
                                        </a>
                                    <?php elseif($formulirPendaftarans->status == 1): ?>
                                        <a class="btn btn-info btn-sm" href="<?php echo e(route('dashboard.formulirPendaftarans.edit', $formulirPendaftarans->id)); ?>">
                                            Edit
                                        </a>
                                        <form action="<?php echo e(route('dashboard.formulirPendaftarans.destroy', $formulirPendaftarans->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-Asset">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telp</th>
                                <th>Agama</th>
                                <th>TTL</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Kode Pos</th>
                                <th>Nama Keluarga</th>
                                <th>Nomor Kartu Keluarga</th>
                                <th>Jumlah Anak</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $formulirPendaftarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formulirPendaftaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                            <tr data-entry-id="<?php echo e($formulirPendaftaran->id); ?>">
                                <td><?php echo e($formulirPendaftaran->id ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftaran->nama ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftaran->email ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftaran->telp ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftaran->agama ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftaran->ttl ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftaran->jenis_kelamin ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftaran->alamat ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftaran->kode_pos ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftaran->nama_keluarga ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftaran->nomor_kartu_keluarga ?? ''); ?></td>
                                <td><?php echo e($formulirPendaftaran->jumlah_anak ?? ''); ?></td>
                                <td>
                                    <?php if($formulirPendaftaran->status == 1): ?>
                                        <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                    <?php elseif($formulirPendaftaran->status == 2): ?>
                                        <span class="badge badge-info">Diproses</span>
                                    <?php else: ?>
                                        <span class="badge badge-success">Disetujui</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($formulirPendaftaran->status == 3): ?>
                                        <a class="btn btn-success btn-sm" href="<?php echo e(route('dashboard.formulirPendaftarans.cetakKartu', $formulirPendaftaran->id)); ?>">
                                            Lihat Kartu
                                        </a>
                                    <?php elseif($formulirPendaftaran->status == 1): ?>
                                        <?php if(auth()->user()->role != 'user'): ?>
                                        <a class="btn btn-success btn-sm" href="<?php echo e(route('dashboard.formulirPendaftarans.proses', $formulirPendaftaran->id)); ?>">
                                            Proses
                                        </a>
                                        <?php endif; ?>
                                        <a class="btn btn-info btn-sm" href="<?php echo e(route('dashboard.formulirPendaftarans.edit', $formulirPendaftaran->id)); ?>">
                                            Edit
                                        </a>
                                        <form action="<?php echo e(route('dashboard.formulirPendaftarans.destroy', $formulirPendaftaran->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                        </form>
                                    <?php else: ?>
                                    <?php if(auth()->user()->role != 'user'): ?>
                                        <a class="btn btn-info btn-sm" href="<?php echo e(route('dashboard.formulirPendaftarans.setujui', $formulirPendaftaran->id)); ?>">
                                            Setujui
                                        </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skripsi\resources\views/admin/assets/index.blade.php ENDPATH**/ ?>