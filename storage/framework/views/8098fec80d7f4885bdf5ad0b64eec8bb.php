<?php $__env->startSection('title', 'Submit Complaint | Smart Campus'); ?>
<?php $__env->startSection('sidebar'); ?>
<li><a href="<?php echo e(route('student.dashboard')); ?>">Dashboard</a></li>
<li><a href="<?php echo e(route('student.complaints.create')); ?>" class="active">Submit Complaint</a></li>
<li><a href="<?php echo e(route('student.complaints')); ?>">My Complaints</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="topbar"><div><h2>Submit Complaint</h2><p>Report any campus issue by filling the form below.</p></div><div class="user-box">Student</div></div>
<div class="content-box form-box">
    <h3>Complaint Details</h3>
    <form id="complaintForm" method="POST" action="<?php echo e(route('student.complaints.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="input-group"><label for="complaintTitle">Complaint Title</label><input type="text" id="complaintTitle" name="title" value="<?php echo e(old('title')); ?>" placeholder="Example: Wi-Fi not working in Lab 2"><small class="error-message"></small></div>
        <div class="form-row">
            <div class="input-group"><label for="category">Category</label><select id="category" name="category"><option value="">Select Category</option><?php $__currentLoopData = ['Internet','Electricity','Furniture','Classroom','Lab','Washroom','Water','Other']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($cat); ?>" <?php if(old('category') === $cat): echo 'selected'; endif; ?>><?php echo e($cat); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><small class="error-message"></small></div>
            <div class="input-group"><label for="priority">Priority</label><select id="priority" name="priority"><option value="">Select Priority</option><?php $__currentLoopData = ['Low','Medium','High']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($priority); ?>" <?php if(old('priority') === $priority): echo 'selected'; endif; ?>><?php echo e($priority); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><small class="error-message"></small></div>
        </div>
        <div class="input-group"><label for="location">Location</label><input type="text" id="location" name="location" value="<?php echo e(old('location')); ?>" placeholder="Example: Room 105, Lab 2, Library"><small class="error-message"></small></div>
        <div class="input-group"><label for="description">Description</label><textarea id="description" name="description" rows="5" placeholder="Describe the issue in detail"><?php echo e(old('description')); ?></textarea><small class="error-message"></small></div>
        <button type="submit" class="auth-btn">Submit Complaint</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Downloads\SmartCampus_Laravel\resources\views/student/submit-complaint.blade.php ENDPATH**/ ?>