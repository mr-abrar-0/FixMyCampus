<?php $__env->startSection('title', 'Staff Dashboard | Smart Campus'); ?>
<?php $__env->startSection('sidebar'); ?>
<li><a href="<?php echo e(route('staff.dashboard')); ?>" class="active">Dashboard</a></li>
<li><a href="<?php echo e(route('staff.complaints')); ?>">Assigned Complaints</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="topbar"><div><h2>Staff Dashboard</h2><p>Welcome, <?php echo e(session('full_name')); ?>. View your assigned complaints and update progress.</p></div><div class="user-box">Staff</div></div>
<div class="dashboard-cards">
    <div class="dashboard-card"><h3>Total Assigned</h3><p><?php echo e($total); ?></p></div>
    <div class="dashboard-card"><h3>Pending</h3><p><?php echo e($pending); ?></p></div>
    <div class="dashboard-card"><h3>In Progress</h3><p><?php echo e($progress); ?></p></div>
    <div class="dashboard-card"><h3>Solved</h3><p><?php echo e($solved); ?></p></div>
</div>
<div class="content-box">
    <h3>Recent Assigned Complaints</h3>
    <table class="data-table">
        <thead><tr><th>ID</th><th>Student</th><th>Title</th><th>Category</th><th>Location</th><th>Priority</th><th>Status</th></tr></thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $recentComplaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php $badge = $complaint->status === 'Pending' ? 'pending-badge' : ($complaint->status === 'In Progress' ? 'progress-badge' : ($complaint->status === 'Solved' ? 'solved-badge' : 'rejected-badge')); ?>
            <tr><td><?php echo e($complaint->id); ?></td><td><?php echo e($complaint->user->full_name); ?></td><td><?php echo e($complaint->title); ?></td><td><?php echo e($complaint->category); ?></td><td><?php echo e($complaint->location); ?></td><td><?php echo e($complaint->priority); ?></td><td><span class="badge <?php echo e($badge); ?>"><?php echo e($complaint->status); ?></span></td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="7">No assigned complaints found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Downloads\SmartCampus_Laravel\resources\views/staff/dashboard.blade.php ENDPATH**/ ?>