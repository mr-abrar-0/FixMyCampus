<?php $__env->startSection('title', 'Register | Smart Campus'); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-page">
    <div class="auth-container">
        <div class="auth-left">
            <h1>Create Account</h1>
            <p>Register as a student and start reporting campus issues quickly.</p>
            <a href="<?php echo e(route('home')); ?>" class="back-home">Back to Home</a>
        </div>

        <div class="auth-box">
            <h2>Register</h2>
            <p class="auth-subtitle">Create your student account</p>
            <?php if($errors->any()): ?><div class="alert error-alert"><?php echo e($errors->first()); ?></div><?php endif; ?>
            <form id="registerForm" method="POST" action="<?php echo e(route('register.submit')); ?>">
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="full_name" value="<?php echo e(old('full_name')); ?>" placeholder="Enter your full name">
                    <small class="error-message"></small>
                </div>
                <div class="input-group">
                    <label for="regEmail">Email Address</label>
                    <input type="email" id="regEmail" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter your email">
                    <small class="error-message"></small>
                </div>
                <div class="input-group">
                    <label for="regPassword">Password</label>
                    <input type="password" id="regPassword" name="password" placeholder="Create password">
                    <small class="error-message"></small>
                </div>
                <div class="input-group">
                    <label for="department">Department</label>
                    <input type="text" id="department" name="department" value="<?php echo e(old('department')); ?>" placeholder="Example: Computer Science">
                    <small class="error-message"></small>
                </div>
                <div class="input-group">
                    <label for="semester">Semester</label>
                    <select id="semester" name="semester">
                        <option value="">Select Semester</option>
                        <?php for($i = 1; $i <= 8; $i++): ?>
                            <option value="<?php echo e($i); ?><?php echo e($i == 1 ? 'st' : ($i == 2 ? 'nd' : ($i == 3 ? 'rd' : 'th'))); ?>" <?php if(old('semester') == $i): echo 'selected'; endif; ?>><?php echo e($i); ?><?php echo e($i == 1 ? 'st' : ($i == 2 ? 'nd' : ($i == 3 ? 'rd' : 'th'))); ?> Semester</option>
                        <?php endfor; ?>
                    </select>
                    <small class="error-message"></small>
                </div>
                <button type="submit" class="auth-btn">Register</button>
                <p class="auth-link">Already have an account? <a href="<?php echo e(route('login')); ?>">Login here</a></p>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Downloads\SmartCampus_Laravel\resources\views/auth/register.blade.php ENDPATH**/ ?>