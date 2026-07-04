@extends('layouts.dashboard')

@section('title', 'Admin Dashboard | Smart Campus')
@section('sidebar')
<li><a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a></li>
<li><a href="{{ route('admin.complaints') }}">Manage Complaints</a></li>
<li><a href="{{ route('admin.users') }}">Manage Users</a></li>
<li><a href="{{ route('admin.staff') }}">Manage Staff</a></li>
@endsection

@section('content')
<div class="topbar"><div><h2>Admin Dashboard</h2><p>Manage campus complaints, users, and staff from one place.</p></div><div class="user-box">Admin</div></div>
<div class="dashboard-cards">
    <div class="dashboard-card"><h3>Total Complaints</h3><p>{{ $total }}</p></div>
    <div class="dashboard-card"><h3>Pending</h3><p>{{ $pending }}</p></div>
    <div class="dashboard-card"><h3>In Progress</h3><p>{{ $progress }}</p></div>
    <div class="dashboard-card"><h3>Solved</h3><p>{{ $solved }}</p></div>
</div>
<div class="dashboard-cards">
    <div class="dashboard-card"><h3>Total Students</h3><p>{{ $students }}</p></div>
    <div class="dashboard-card"><h3>Total Staff</h3><p>{{ $staff }}</p></div>
    <div class="dashboard-card"><h3>Rejected</h3><p>{{ $rejected }}</p></div>
    <div class="dashboard-card"><h3>High Priority</h3><p>{{ $highPriority }}</p></div>
</div>
<div class="content-box">
    <h3>Recent Complaints</h3>
    <table class="data-table">
        <thead><tr><th>ID</th><th>Student</th><th>Title</th><th>Category</th><th>Location</th><th>Status</th></tr></thead>
        <tbody>
        @forelse($recentComplaints as $complaint)
            @php $badge = $complaint->status === 'Pending' ? 'pending-badge' : ($complaint->status === 'In Progress' ? 'progress-badge' : ($complaint->status === 'Solved' ? 'solved-badge' : 'rejected-badge')); @endphp
            <tr><td>{{ $complaint->id }}</td><td>{{ $complaint->user->full_name }}</td><td>{{ $complaint->title }}</td><td>{{ $complaint->category }}</td><td>{{ $complaint->location }}</td><td><span class="badge {{ $badge }}">{{ $complaint->status }}</span></td></tr>
        @empty
            <tr><td colspan="6">No complaints found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
