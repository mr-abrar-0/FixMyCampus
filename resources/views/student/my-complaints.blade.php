@extends('layouts.dashboard')

@section('title', 'My Complaints | Smart Campus')
@section('sidebar')
<li><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('student.complaints.create') }}">Submit Complaint</a></li>
<li><a href="{{ route('student.complaints') }}" class="active">My Complaints</a></li>
@endsection

@section('content')
<div class="topbar"><div><h2>My Complaints</h2><p>View and track all complaints submitted by you.</p></div><div class="user-box">Student</div></div>
<div class="content-box">
    <div class="table-header"><h3>Complaint History</h3><input type="text" id="searchComplaint" placeholder="Search complaint..."></div>
    <table class="data-table" id="complaintsTable">
        <thead><tr><th>ID</th><th>Title</th><th>Category</th><th>Location</th><th>Priority</th><th>Status</th><th>Remarks</th><th>Date</th></tr></thead>
        <tbody>
        @forelse($complaints as $complaint)
            @php $badge = $complaint->status === 'Pending' ? 'pending-badge' : ($complaint->status === 'In Progress' ? 'progress-badge' : ($complaint->status === 'Solved' ? 'solved-badge' : 'rejected-badge')); @endphp
            <tr><td>{{ $complaint->id }}</td><td>{{ $complaint->title }}</td><td>{{ $complaint->category }}</td><td>{{ $complaint->location }}</td><td>{{ $complaint->priority }}</td><td><span class="badge {{ $badge }}">{{ $complaint->status }}</span></td><td>{{ $complaint->remarks ?? 'No remarks' }}</td><td>{{ $complaint->created_at->format('d-m-Y') }}</td></tr>
        @empty
            <tr><td colspan="8">No complaints found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
