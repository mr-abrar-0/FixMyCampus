@extends('layouts.dashboard')

@section('title', 'Manage Complaints | Smart Campus')
@section('sidebar')
<li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('admin.complaints') }}" class="active">Manage Complaints</a></li>
<li><a href="{{ route('admin.users') }}">Manage Users</a></li>
<li><a href="{{ route('admin.staff') }}">Manage Staff</a></li>
@endsection

@section('content')
<div class="topbar"><div><h2>Manage Complaints</h2><p>View, filter, assign, and update complaint records.</p></div><div class="user-box">Admin</div></div>
<div class="content-box">
    <div class="table-header"><h3>All Complaints</h3><input type="text" id="searchComplaint" placeholder="Search complaint..."></div>
    <div class="filter-row">
        <div class="input-group"><label for="statusFilter">Filter by Status</label><select id="statusFilter"><option value="">All Status</option><option value="pending">Pending</option><option value="in progress">In Progress</option><option value="solved">Solved</option><option value="rejected">Rejected</option></select></div>
        <div class="input-group"><label for="categoryFilter">Filter by Category</label><select id="categoryFilter"><option value="">All Categories</option><option value="internet">Internet</option><option value="furniture">Furniture</option><option value="classroom">Classroom</option><option value="electricity">Electricity</option><option value="water">Water</option><option value="lab">Lab</option></select></div>
    </div>
    <table class="data-table" id="complaintsTable">
        <thead><tr><th>ID</th><th>Student</th><th>Title</th><th>Category</th><th>Location</th><th>Priority</th><th>Status</th><th>Staff</th><th>Action</th></tr></thead>
        <tbody>
        @forelse($complaints as $complaint)
            @php $badge = $complaint->status === 'Pending' ? 'pending-badge' : ($complaint->status === 'In Progress' ? 'progress-badge' : ($complaint->status === 'Solved' ? 'solved-badge' : 'rejected-badge')); @endphp
            <tr>
                <td>{{ $complaint->id }}</td><td>{{ $complaint->user->full_name }}</td><td>{{ $complaint->title }}</td><td>{{ $complaint->category }}</td><td>{{ $complaint->location }}</td><td>{{ $complaint->priority }}</td><td><span class="badge {{ $badge }}">{{ $complaint->status }}</span></td>
                <td colspan="2">
                    <form method="POST" action="{{ route('admin.complaints.update', $complaint) }}" class="inline-form">
                        @csrf
                        <select name="assigned_staff_id" class="table-select">
                            <option value="">Select Staff</option>
                            @foreach($staffMembers as $staff)
                                <option value="{{ $staff->id }}" @selected($complaint->assigned_staff_id == $staff->id)>{{ $staff->full_name }}</option>
                            @endforeach
                        </select>
                        <select name="status" class="table-select">
                            @foreach(['Pending','In Progress','Solved','Rejected'] as $status)
                                <option value="{{ $status }}" @selected($complaint->status === $status)>{{ $status }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="action-btn">Save</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="9">No complaints found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
