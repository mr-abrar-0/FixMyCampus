@extends('layouts.dashboard')

@section('title', 'Assigned Complaints | Smart Campus')
@section('sidebar')
<li><a href="{{ route('staff.dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('staff.complaints') }}" class="active">Assigned Complaints</a></li>
@endsection

@section('content')
<div class="topbar"><div><h2>Assigned Complaints</h2><p>View assigned complaints and update work progress.</p></div><div class="user-box">Staff</div></div>
<div class="content-box">
    <div class="table-header"><h3>My Assigned Complaints</h3><input type="text" id="searchAssignedComplaint" placeholder="Search assigned complaint..."></div>
    <table class="data-table" id="assignedComplaintsTable">
        <thead><tr><th>ID</th><th>Student</th><th>Title</th><th>Category</th><th>Location</th><th>Priority</th><th>Status</th><th>Update</th></tr></thead>
        <tbody>
        @forelse($complaints as $complaint)
            @php $badge = $complaint->status === 'Pending' ? 'pending-badge' : ($complaint->status === 'In Progress' ? 'progress-badge' : ($complaint->status === 'Solved' ? 'solved-badge' : 'rejected-badge')); @endphp
            <tr>
                <td>{{ $complaint->id }}</td><td>{{ $complaint->user->full_name }}</td><td>{{ $complaint->title }}</td><td>{{ $complaint->category }}</td><td>{{ $complaint->location }}</td><td>{{ $complaint->priority }}</td><td><span class="badge {{ $badge }}">{{ $complaint->status }}</span></td>
                <td>
                    <form method="POST" action="{{ route('staff.complaints.update', $complaint) }}" class="inline-form">
                        @csrf
                        <select name="status" class="table-select">
                            @foreach(['Pending','In Progress','Solved'] as $status)
                                <option value="{{ $status }}" @selected($complaint->status === $status)>{{ $status }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="table-input" name="remarks" value="{{ $complaint->remarks }}" placeholder="Add remarks">
                        <button type="submit" class="action-btn">Save</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="8">No assigned complaints found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
