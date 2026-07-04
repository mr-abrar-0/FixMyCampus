@extends('layouts.dashboard')

@section('title', 'Student Dashboard | Smart Campus')
@section('sidebar')
<li><a href="{{ route('student.dashboard') }}" class="active">Dashboard</a></li>
<li><a href="{{ route('student.complaints.create') }}">Submit Complaint</a></li>
<li><a href="{{ route('student.complaints') }}">My Complaints</a></li>
@endsection

@section('content')
<div class="topbar"><div><h2>Student Dashboard</h2><p>Welcome, {{ session('full_name') }}. Track your complaint records here.</p></div><div class="user-box">Student</div></div>
<div class="dashboard-cards">
    <div class="dashboard-card"><h3>Total Complaints</h3><p>{{ $total }}</p></div>
    <div class="dashboard-card"><h3>Pending</h3><p>{{ $pending }}</p></div>
    <div class="dashboard-card"><h3>In Progress</h3><p>{{ $progress }}</p></div>
    <div class="dashboard-card"><h3>Solved</h3><p>{{ $solved }}</p></div>
</div>
<div class="content-box">
    <h3>Recent Complaints</h3>
    <table class="data-table">
        <thead><tr><th>ID</th><th>Title</th><th>Category</th><th>Location</th><th>Status</th></tr></thead>
        <tbody>
        @forelse($recentComplaints as $complaint)
            @php $badge = $complaint->status === 'Pending' ? 'pending-badge' : ($complaint->status === 'In Progress' ? 'progress-badge' : ($complaint->status === 'Solved' ? 'solved-badge' : 'rejected-badge')); @endphp
            <tr><td>{{ $complaint->id }}</td><td>{{ $complaint->title }}</td><td>{{ $complaint->category }}</td><td>{{ $complaint->location }}</td><td><span class="badge {{ $badge }}">{{ $complaint->status }}</span></td></tr>
        @empty
            <tr><td colspan="5">No complaints found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
