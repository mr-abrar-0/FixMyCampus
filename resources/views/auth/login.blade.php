@extends('layouts.app')

@section('title', 'Login | Smart Campus')

@section('content')
<div class="auth-page">
    <div class="auth-container">
        <div class="auth-left">
            <h1>Welcome Back</h1>
            <p>Login to Smart Campus to report campus issues, track complaint status, and manage maintenance work.</p>
            <a href="{{ route('home') }}" class="back-home">Back to Home</a>
        </div>

        <div class="auth-box">
            <h2>Login</h2>
            <p class="auth-subtitle">Enter your account details</p>

            @if(session('success'))<div class="alert success-alert">{{ session('success') }}</div>@endif
            @if(session('error'))<div class="alert error-alert">{{ session('error') }}</div>@endif
            @if($errors->any())<div class="alert error-alert">{{ $errors->first() }}</div>@endif

            <form id="loginForm" method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
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
                        <option value="student" @selected(old('role') === 'student')>Student</option>
                        <option value="admin" @selected(old('role') === 'admin')>Admin</option>
                        <option value="staff" @selected(old('role') === 'staff')>Staff</option>
                    </select>
                    <small class="error-message"></small>
                </div>
                <button type="submit" class="auth-btn">Login</button>
                <p class="auth-link">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
