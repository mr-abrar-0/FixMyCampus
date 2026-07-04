<?php $__env->startSection('title', 'Admin Dashboard | Smart Campus'); ?>
<?php $__env->startSection('sidebar'); ?>
<li><a href="<?php echo e(route('admin.dashboard')); ?>" class="active">Dashboard</a></li>
<li><a href="<?php echo e(route('admin.complaints')); ?>">Manage Complaints</a></li>
<li><a href="<?php echo e(route('admin.users')); ?>">Manage Users</a></li>
<li><a href="<?php echo e(route('admin.staff')); ?>">Manage Staff</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="topbar"><div><h2>Admin Dashboard</h2><p>Manage campus complaints, users, and staff from one place.</p></div><div class="user-box">Admin</div></div>
<div class="dashboard-cards">
    <div class="dashboard-card"><h3>Total Complaints</h3><p><?php echo e($total); ?></p></div>
    <div class="dashboard-card"><h3>Pending</h3><p><?php echo e($pending); ?></p></div>
    <div class="dashboard-card"><h3>In Progress</h3><p><?php echo e($progress); ?></p></div>
    <div class="dashboard-card"><h3>Solved</h3><p><?php echo e($solved); ?></p></div>
</div>
<div class="dashboard-cards">
    <div class="dashboard-card"><h3>Total Students</h3><p><?php echo e($students); ?></p></div>
    <div class="dashboard-card"><h3>Total Staff</h3><p><?php echo e($staff); ?></p></div>
    <div class="dashboard-card"><h3>Rejected</h3><p><?php echo e($rejected); ?></p></div>
    <div class="dashboard-card"><h3>High Priority</h3><p><?php echo e($highPriority); ?></p></div>
</div>
<div class="content-box">
    <h3>Recent Complaints</h3>
    <table class="data-table">
        <thead><tr><th>ID</th><th>Student</th><th>Title</th><th>Category</th><th>Location</th><th>Status</th></tr></thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $recentComplaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php $badge = $complaint->status === 'Pending' ? 'pending-badge' : ($complaint->status === 'In Progress' ? 'progress-badge' : ($complaint->status === 'Solved' ? 'solved-badge' : 'rejected-badge')); ?>
            <tr><td><?php echo e($complaint->id); ?></td><td><?php echo e($complaint->user->full_name); ?></td><td><?php echo e($complaint->title); ?></td><td><?php echo e($complaint->category); ?></td><td><?php echo e($complaint->location); ?></td><td><span class="badge <?php echo e($badge); ?>"><?php echo e($complaint->status); ?></span></td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6">No complaints found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Downloads\SmartCampus_Laravel\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>