<?php $__env->startSection('title', 'Smart Campus Complaint and Management System'); ?>

<?php $__env->startSection('content'); ?>
<header class="header">
    <nav class="navbar">
        <div class="logo">Smart Campus</div>
        <ul class="nav-links" id="navLinks">
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#how-it-works">How It Works</a></li>
            <li><a href="#about">About</a></li>
        </ul>
        <div class="nav-buttons">
            <a href="<?php echo e(route('login')); ?>" class="login-btn">Login</a>
            <a href="<?php echo e(route('register')); ?>" class="register-btn">Register</a>
        </div>
        <div class="menu-icon" id="menuIcon">☰</div>
    </nav>
</header>

<section class="hero" id="home">
    <div class="hero-content">
        <h1>Smart Campus Complaint and Management System</h1>
        <p>
            A Laravel-based web application that helps students report campus problems,
            track complaint status, and communicate with admin and maintenance staff in an organized way.
        </p>
        <div class="hero-buttons">
            <a href="<?php echo e(route('register')); ?>" class="primary-btn">Get Started</a>
            <a href="#features" class="secondary-btn">Explore Features</a>
        </div>
    </div>

    <div class="hero-card">
        <h3>Complaint Status</h3>
        <div class="status-box pending"><span>Pending</span><strong>Live</strong></div>
        <div class="status-box progress"><span>In Progress</span><strong>Live</strong></div>
        <div class="status-box solved"><span>Solved</span><strong>Live</strong></div>
    </div>
</section>

<section class="features" id="features">
    <div class="section-title">
        <h2>Project Features</h2>
        <p>Main features included in this smart campus system.</p>
    </div>
    <div class="feature-container">
        <div class="feature-card"><h3>Student Complaint</h3><p>Students can submit complaints with title, category, location, priority, and description.</p></div>
        <div class="feature-card"><h3>Status Tracking</h3><p>Students can track whether their complaint is pending, in progress, solved, or rejected.</p></div>
        <div class="feature-card"><h3>Admin Dashboard</h3><p>Admin can view complaints, assign staff, update status, and manage users.</p></div>
        <div class="feature-card"><h3>Staff Panel</h3><p>Staff members can view assigned complaints and update progress with remarks.</p></div>
    </div>
</section>

<section class="how-it-works" id="how-it-works">
    <div class="section-title"><h2>How It Works</h2><p>The complaint process is simple and easy.</p></div>
    <div class="steps-container">
        <div class="step-card"><span>1</span><h3>Register/Login</h3><p>Student creates an account or logs in.</p></div>
        <div class="step-card"><span>2</span><h3>Submit Complaint</h3><p>Student submits issue details.</p></div>
        <div class="step-card"><span>3</span><h3>Admin Review</h3><p>Admin reviews and assigns staff.</p></div>
        <div class="step-card"><span>4</span><h3>Problem Solved</h3><p>Staff updates the final status.</p></div>
    </div>
</section>

<section class="about" id="about">
    <div class="about-content">
        <h2>About Smart Campus</h2>
        <p>
            Smart Campus Complaint and Management System is a semester web development project built with Laravel, PHP, MySQL, HTML, CSS, and JavaScript.
        </p>
        <p>
            It provides role-based dashboards for students, admins, and staff, and displays real-time data directly from the database.
        </p>
    </div>
</section>

<footer class="footer"><p>Smart Campus Complaint and Management System</p></footer>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Downloads\SmartCampus_Laravel\resources\views/home.blade.php ENDPATH**/ ?>