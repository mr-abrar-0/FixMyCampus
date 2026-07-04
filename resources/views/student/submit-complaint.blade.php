@extends('layouts.dashboard')

@section('title', 'Submit Complaint | Smart Campus')
@section('sidebar')
<li><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('student.complaints.create') }}" class="active">Submit Complaint</a></li>
<li><a href="{{ route('student.complaints') }}">My Complaints</a></li>
@endsection

@section('content')
<div class="topbar"><div><h2>Submit Complaint</h2><p>Report any campus issue by filling the form below.</p></div><div class="user-box">Student</div></div>
<div class="content-box form-box">
    <h3>Complaint Details</h3>
    <form id="complaintForm" method="POST" action="{{ route('student.complaints.store') }}">
        @csrf
        <div class="input-group"><label for="complaintTitle">Complaint Title</label><input type="text" id="complaintTitle" name="title" value="{{ old('title') }}" placeholder="Example: Wi-Fi not working in Lab 2"><small class="error-message"></small></div>
        <div class="form-row">
            <div class="input-group"><label for="category">Category</label><select id="category" name="category"><option value="">Select Category</option>@foreach(['Internet','Electricity','Furniture','Classroom','Lab','Washroom','Water','Other'] as $cat)<option value="{{ $cat }}" @selected(old('category') === $cat)>{{ $cat }}</option>@endforeach</select><small class="error-message"></small></div>
            <div class="input-group"><label for="priority">Priority</label><select id="priority" name="priority"><option value="">Select Priority</option>@foreach(['Low','Medium','High'] as $priority)<option value="{{ $priority }}" @selected(old('priority') === $priority)>{{ $priority }}</option>@endforeach</select><small class="error-message"></small></div>
        </div>
        <div class="input-group"><label for="location">Location</label><input type="text" id="location" name="location" value="{{ old('location') }}" placeholder="Example: Room 105, Lab 2, Library"><small class="error-message"></small></div>
        <div class="input-group"><label for="description">Description</label><textarea id="description" name="description" rows="5" placeholder="Describe the issue in detail">{{ old('description') }}</textarea><small class="error-message"></small></div>
        <button type="submit" class="auth-btn">Submit Complaint</button>
    </form>
</div>
@endsection
