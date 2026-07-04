<?php $__env->startSection('title', 'Manage Complaints | Smart Campus'); ?>
<?php $__env->startSection('sidebar'); ?>
<li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
<li><a href="<?php echo e(route('admin.complaints')); ?>" class="active">Manage Complaints</a></li>
<li><a href="<?php echo e(route('admin.users')); ?>">Manage Users</a></li>
<li><a href="<?php echo e(route('admin.staff')); ?>">Manage Staff</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="topbar"><div><h2>Manage Complaints</h2><p>View, filter, assign, and update complaint records.</p></div><div class="user-box">Admin</div></div>
<div class="content-box">
    <div class="table-header"><h3>All Complaints</h3><input type="text" id="searchComplaint" placeholder="Search complaint..."></div>
    <div class="filter-row">
        <div class="input-group"><label for="statusFilter">Filter by Status</label><select id="statusFilter"><option value="">All Status</option><option value="pending">Pending</option><option value="in progress">In Progress</option><option value="solved">Solved</option><option value="rejected">Rejected</option></select></div>
        <div class="input-group"><label for="categoryFilter">Filter by Category</label><select id="categoryFilter"><option value="">All Categories</option><option value="internet">Internet</option><option value="furniture">Furniture</option><option value="classroom">Classroom</option><option value="electricity">Electricity</option><option value="water">Water</option><option value="lab">Lab</option></select></div>
    </div>
    <table class="data-table" id="complaintsTable">
        <thead><tr><th>ID</th><th>Student</th><th>Title</th><th>Category</th><th>Location</th><th>Priority</th><th>Status</th><th>Staff</th><th>Action</th></tr></thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php $badge = $complaint->status === 'Pending' ? 'pending-badge' : ($complaint->status === 'In Progress' ? 'progress-badge' : ($complaint->status === 'Solved' ? 'solved-badge' : 'rejected-badge')); ?>
            <tr>
                <td><?php echo e($complaint->id); ?></td><td><?php echo e($complaint->user->full_name); ?></td><td><?php echo e($complaint->title); ?></td><td><?php echo e($complaint->category); ?></td><td><?php echo e($complaint->location); ?></td><td><?php echo e($complaint->priority); ?></td><td><span class="badge <?php echo e($badge); ?>"><?php echo e($complaint->status); ?></span></td>
                <td colspan="2">
                    <form method="POST" action="<?php echo e(route('admin.complaints.update', $complaint)); ?>" class="inline-form">
                        <?php echo csrf_field(); ?>
                        <select name="assigned_staff_id" class="table-select">
                            <option value="">Select Staff</option>
                            <?php $__currentLoopData = $staffMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($staff->id); ?>" <?php if($complaint->assigned_staff_id == $staff->id): echo 'selected'; endif; ?>><?php echo e($staff->full_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <select name="status" class="table-select">
                            <?php $__currentLoopData = ['Pending','In Progress','Solved','Rejected']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($status); ?>" <?php if($complaint->status === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <button type="submit" class="action-btn">Save</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="9">No complaints found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Downloads\SmartCampus_Laravel\resources\views/admin/manage-complaints.blade.php ENDPATH**/ ?>