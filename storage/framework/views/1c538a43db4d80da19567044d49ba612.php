<?php $__env->startSection('title', 'My Complaints | Smart Campus'); ?>
<?php $__env->startSection('sidebar'); ?>
<li><a href="<?php echo e(route('student.dashboard')); ?>">Dashboard</a></li>
<li><a href="<?php echo e(route('student.complaints.create')); ?>">Submit Complaint</a></li>
<li><a href="<?php echo e(route('student.complaints')); ?>" class="active">My Complaints</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="topbar"><div><h2>My Complaints</h2><p>View and track all complaints submitted by you.</p></div><div class="user-box">Student</div></div>
<div class="content-box">
    <div class="table-header"><h3>Complaint History</h3><input type="text" id="searchComplaint" placeholder="Search complaint..."></div>
    <table class="data-table" id="complaintsTable">
        <thead><tr><th>ID</th><th>Title</th><th>Category</th><th>Location</th><th>Priority</th><th>Status</th><th>Remarks</th><th>Date</th></tr></thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php $badge = $complaint->status === 'Pending' ? 'pending-badge' : ($complaint->status === 'In Progress' ? 'progress-badge' : ($complaint->status === 'Solved' ? 'solved-badge' : 'rejected-badge')); ?>
            <tr><td><?php echo e($complaint->id); ?></td><td><?php echo e($complaint->title); ?></td><td><?php echo e($complaint->category); ?></td><td><?php echo e($complaint->location); ?></td><td><?php echo e($complaint->priority); ?></td><td><span class="badge <?php echo e($badge); ?>"><?php echo e($complaint->status); ?></span></td><td><?php echo e($complaint->remarks ?? 'No remarks'); ?></td><td><?php echo e($complaint->created_at->format('d-m-Y')); ?></td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="8">No complaints found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Downloads\SmartCampus_Laravel\resources\views/student/my-complaints.blade.php ENDPATH**/ ?>