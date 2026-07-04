<?php $__env->startSection('title', 'Assigned Complaints | Smart Campus'); ?>
<?php $__env->startSection('sidebar'); ?>
<li><a href="<?php echo e(route('staff.dashboard')); ?>">Dashboard</a></li>
<li><a href="<?php echo e(route('staff.complaints')); ?>" class="active">Assigned Complaints</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="topbar"><div><h2>Assigned Complaints</h2><p>View assigned complaints and update work progress.</p></div><div class="user-box">Staff</div></div>
<div class="content-box">
    <div class="table-header"><h3>My Assigned Complaints</h3><input type="text" id="searchAssignedComplaint" placeholder="Search assigned complaint..."></div>
    <table class="data-table" id="assignedComplaintsTable">
        <thead><tr><th>ID</th><th>Student</th><th>Title</th><th>Category</th><th>Location</th><th>Priority</th><th>Status</th><th>Update</th></tr></thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php $badge = $complaint->status === 'Pending' ? 'pending-badge' : ($complaint->status === 'In Progress' ? 'progress-badge' : ($complaint->status === 'Solved' ? 'solved-badge' : 'rejected-badge')); ?>
            <tr>
                <td><?php echo e($complaint->id); ?></td><td><?php echo e($complaint->user->full_name); ?></td><td><?php echo e($complaint->title); ?></td><td><?php echo e($complaint->category); ?></td><td><?php echo e($complaint->location); ?></td><td><?php echo e($complaint->priority); ?></td><td><span class="badge <?php echo e($badge); ?>"><?php echo e($complaint->status); ?></span></td>
                <td>
                    <form method="POST" action="<?php echo e(route('staff.complaints.update', $complaint)); ?>" class="inline-form">
                        <?php echo csrf_field(); ?>
                        <select name="status" class="table-select">
                            <?php $__currentLoopData = ['Pending','In Progress','Solved']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($status); ?>" <?php if($complaint->status === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <input type="text" class="table-input" name="remarks" value="<?php echo e($complaint->remarks); ?>" placeholder="Add remarks">
                        <button type="submit" class="action-btn">Save</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="8">No assigned complaints found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Downloads\SmartCampus_Laravel\resources\views/staff/assigned-complaints.blade.php ENDPATH**/ ?>