@extends('layouts.dashboard')

@section('title', 'Manage Users | Smart Campus')
@section('sidebar')
<li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('admin.complaints') }}">Manage Complaints</a></li>
<li><a href="{{ route('admin.users') }}" class="active">Manage Users</a></li>
<li><a href="{{ route('admin.staff') }}">Manage Staff</a></li>
@endsection

@section('content')
<div class="topbar"><div><h2>Manage Users</h2><p>View registered students and their account information.</p></div><div class="user-box">Admin</div></div>
<div class="content-box">
    <div class="table-header"><h3>Registered Students</h3><input type="text" id="searchUser" placeholder="Search user..."></div>
    <table class="data-table" id="usersTable">
        <thead><tr><th>ID</th><th>Full Name</th><th>Email</th><th>Department</th><th>Semester</th><th>Total Complaints</th><th>Status</th></tr></thead>
        <tbody>
        @forelse($users as $user)
            <tr><td>{{ $user->id }}</td><td>{{ $user->full_name }}</td><td>{{ $user->email }}</td><td>{{ $user->department }}</td><td>{{ $user->semester }}</td><td>{{ $user->complaints_count }}</td><td><span class="badge solved-badge">Active</span></td></tr>
        @empty
            <tr><td colspan="7">No students found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
