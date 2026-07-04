@extends('layouts.app')

@section('title', 'Register | Smart Campus')

@section('content')
<div class="auth-page">
    <div class="auth-container">
        <div class="auth-left">
            <h1>Create Account</h1>
            <p>Register as a student and start reporting campus issues quickly.</p>
            <a href="{{ route('home') }}" class="back-home">Back to Home</a>
        </div>

        <div class="auth-box">
            <h2>Register</h2>
            <p class="auth-subtitle">Create your student account</p>
            @if($errors->any())<div class="alert error-alert">{{ $errors->first() }}</div>@endif
            <form id="registerForm" method="POST" action="{{ route('register.submit') }}">
                @csrf
                <div class="input-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="full_name" value="{{ old('full_name') }}" placeholder="Enter your full name">
                    <small class="error-message"></small>
                </div>
                <div class="input-group">
                    <label for="regEmail">Email Address</label>
                    <input type="email" id="regEmail" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                    <small class="error-message"></small>
                </div>
                <div class="input-group">
                    <label for="regPassword">Password</label>
                    <input type="password" id="regPassword" name="password" placeholder="Create password">
                    <small class="error-message"></small>
                </div>
                <div class="input-group">
                    <label for="department">Department</label>
                    <input type="text" id="department" name="department" value="{{ old('department') }}" placeholder="Example: Computer Science">
                    <small class="error-message"></small>
                </div>
                <div class="input-group">
                    <label for="semester">Semester</label>
                    <select id="semester" name="semester">
                        <option value="">Select Semester</option>
                        @for($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}{{ $i == 1 ? 'st' : ($i == 2 ? 'nd' : ($i == 3 ? 'rd' : 'th')) }}" @selected(old('semester') == $i)>{{ $i }}{{ $i == 1 ? 'st' : ($i == 2 ? 'nd' : ($i == 3 ? 'rd' : 'th')) }} Semester</option>
                        @endfor
                    </select>
                    <small class="error-message"></small>
                </div>
                <button type="submit" class="auth-btn">Register</button>
                <p class="auth-link">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
