<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard | Smart Campus'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div class="dashboard-layout">
        <aside class="sidebar">
            <div class="sidebar-logo">Smart Campus</div>
            <ul class="sidebar-menu">
                <?php echo $__env->yieldContent('sidebar'); ?>
                <li><a href="<?php echo e(route('logout')); ?>" class="logout-link">Logout</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <?php if(session('success')): ?>
                <div class="alert success-alert"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert error-alert"><?php echo e(session('error')); ?></div>
            <?php endif; ?>
            <?php if($errors->any()): ?>
                <div class="alert error-alert"><?php echo e($errors->first()); ?></div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\princ\Downloads\SmartCampus_Laravel\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>