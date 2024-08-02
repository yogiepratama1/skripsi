
<?php $__env->startSection('content'); ?>
<div class="login-box">
    <div class="login-logo">
        <div class="login-logo">
            <!-- add logo -->
            <img src="<?php echo e(asset('logo-perusahaan.png')); ?>" alt="Logo" class="img-fluid" width="250">
            <br>
            Sistem Informasi Pendaftaran Peserta Pensiun
        </div>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                Login
            </p>

            <?php if(session()->has('message')): ?>
                <p class="alert alert-info">
                    <?php echo e(session()->get('message')); ?>

                </p>
            <?php endif; ?>

            <form action="<?php echo e(route('login')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" required autocomplete="email" autofocus placeholder="Email" name="email" value="<?php echo e(old('email', null)); ?>">

                    <?php if($errors->has('email')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('email')); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required placeholder="Password">

                    <?php if($errors->has('password')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('password')); ?>

                        </div>
                    <?php endif; ?>
                </div>


                <div class="row">
                    <div class="col-4">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            Login
                        </button>
                    </div>
                    <div class="col-5">
                            <a class="btn btn-warning btn-block btn-flat" href="<?php echo e(url('register')); ?>">
                            Register
                            </a>
                    </div>
                </div>


            </form>

            <p class="mb-1">

            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skripsi\resources\views/auth/login.blade.php ENDPATH**/ ?>