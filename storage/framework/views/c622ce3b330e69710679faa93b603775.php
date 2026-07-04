<?php $__env->startSection('title', 'Login | Smart Campus'); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-page">
    <div class="auth-container">
        <div class="auth-left">
            <h1>Welcome Back</h1>
            <p>Login to Smart Campus to report campus issues, track complaint status, and manage maintenance work.</p>
            <a href="<?php echo e(route('home')); ?>" class="back-home">Back to Home</a>
        </div>

        <div class="auth-box">
            <h2>Login</h2>
            <p class="auth-subtitle">Enter your account details</p>

            <?php if(session('success')): ?><div class="alert success-alert"><?php echo e(session('success')); ?></div><?php endif; ?>
            <?php if(session('error')): ?><div class="alert error-alert"><?php echo e(session('error')); ?></div><?php endif; ?>
            <?php if($errors->any()): ?><div class="alert error-alert"><?php echo e($errors->first()); ?></div><?php endif; ?>

            <form id="loginForm" method="POST" action="<?php echo e(route('login.submit')); ?>">
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter your email">
                    <small class="error-message"></small>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                    <small class="error-message"></small>
                </div>
                <div class="input-group">
                    <label for="role">Login As</label>
                    <select id="role" name="role">
                        <option value="">Select Role</option>
                        <option value="student" <?php if(old('role') === 'student'): echo 'selected'; endif; ?>>Student</option>
                        <option value="admin" <?php if(old('role') === 'admin'): echo 'selected'; endif; ?>>Admin</option>
                        <option value="staff" <?php if(old('role') === 'staff'): echo 'selected'; endif; ?>>Staff</option>
                    </select>
                    <small class="error-message"></small>
                </div>
                <button type="submit" class="auth-btn">Login</button>
                <p class="auth-link">Don't have an account? <a href="<?php echo e(route('register')); ?>">Register here</a></p>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Downloads\SmartCampus_Laravel\resources\views/auth/login.blade.php ENDPATH**/ ?>