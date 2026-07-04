<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'total' => Complaint::count(),
            'pending' => Complaint::where('status', 'Pending')->count(),
            'progress' => Complaint::where('status', 'In Progress')->count(),
            'solved' => Complaint::where('status', 'Solved')->count(),
            'students' => User::where('role', 'student')->count(),
            'staff' => User::where('role', 'staff')->count(),
            'rejected' => Complaint::where('status', 'Rejected')->count(),
            'highPriority' => Complaint::where('priority', 'High')->count(),
            'recentComplaints' => Complaint::with('user')->latest()->take(5)->get(),
        ]);
    }

    public function manageComplaints()
    {
        return view('admin.manage-complaints', [
            'complaints' => Complaint::with(['user', 'staff'])->latest()->get(),
            'staffMembers' => User::where('role', 'staff')->orderBy('full_name')->get(),
        ]);
    }

    public function updateComplaint(Request $request, Complaint $complaint)
    {
        $request->validate([
            'assigned_staff_id' => ['nullable', 'exists:users,id'],
            'status' => ['required', 'in:Pending,In Progress,Solved,Rejected'],
        ]);

        $complaint->update([
            'assigned_staff_id' => $request->assigned_staff_id,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Complaint updated successfully.');
    }

    public function manageUsers()
    {
        return view('admin.manage-users', [
            'users' => User::where('role', 'student')->withCount('complaints')->latest()->get(),
        ]);
    }

    public function manageStaff()
    {
        return view('admin.manage-staff', [
            'staffMembers' => User::where('role', 'staff')->withCount('assignedComplaints')->latest()->get(),
        ]);
    }

    public function storeStaff(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'department' => ['required', 'string', 'max:100'],
            'password' => ['required', 'min:6'],
        ]);

        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'department' => $request->department,
            'password' => Hash::make($request->password),
            'role' => 'staff',
        ]);

        return back()->with('success', 'Staff member added successfully.');
    }
}
