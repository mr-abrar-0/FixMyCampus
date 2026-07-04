@extends('layouts.dashboard')

@section('title', 'Manage Staff | Smart Campus')
@section('sidebar')
<li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('admin.complaints') }}">Manage Complaints</a></li>
<li><a href="{{ route('admin.users') }}">Manage Users</a></li>
<li><a href="{{ route('admin.staff') }}" class="active">Manage Staff</a></li>
@endsection

@section('content')
<div class="topbar"><div><h2>Manage Staff</h2><p>Add, view, and manage maintenance staff members.</p></div><div class="user-box">Admin</div></div>
<div class="content-box form-box">
    <h3>Add New Staff</h3>
    <form id="staffForm" method="POST" action="{{ route('admin.staff.store') }}">
        @csrf
        <div class="form-row">
            <div class="input-group"><label for="staffName">Full Name</label><input type="text" id="staffName" name="full_name" value="{{ old('full_name') }}" placeholder="Enter staff name"><small class="error-message"></small></div>
            <div class="input-group"><label for="staffEmail">Email Address</label><input type="email" id="staffEmail" name="email" value="{{ old('email') }}" placeholder="Enter staff email"><small class="error-message"></small></div>
        </div>
        <div class="form-row">
            <div class="input-group"><label for="staffDepartment">Department</label><select id="staffDepartment" name="department"><option value="">Select Department</option>@foreach(['IT Department','Maintenance Department','Electrical Department','Cleaning Department','Lab Department'] as $department)<option value="{{ $department }}" @selected(old('department') === $department)>{{ $department }}</option>@endforeach</select><small class="error-message"></small></div>
            <div class="input-group"><label for="staffPassword">Password</label><input type="password" id="staffPassword" name="password" placeholder="Create password"><small class="error-message"></small></div>
        </div>
        <button type="submit" class="auth-btn">Add Staff</button>
    </form>
</div>
<br>
<div class="content-box">
    <div class="table-header"><h3>Staff Members</h3><input type="text" id="searchStaff" placeholder="Search staff..."></div>
    <table class="data-table" id="staffTable">
        <thead><tr><th>ID</th><th>Full Name</th><th>Email</th><th>Department</th><th>Assigned Complaints</th><th>Status</th></tr></thead>
        <tbody>
        @forelse($staffMembers as $staff)
            <tr><td>{{ $staff->id }}</td><td>{{ $staff->full_name }}</td><td>{{ $staff->email }}</td><td>{{ $staff->department }}</td><td>{{ $staff->assigned_complaints_count }}</td><td><span class="badge solved-badge">Active</span></td></tr>
        @empty
            <tr><td colspan="6">No staff members found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
