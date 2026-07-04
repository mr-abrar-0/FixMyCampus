<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    private function staffId(): int
    {
        return (int) session('user_id');
    }

    public function dashboard()
    {
        $query = Complaint::where('assigned_staff_id', $this->staffId());

        return view('staff.dashboard', [
            'total' => (clone $query)->count(),
            'pending' => (clone $query)->where('status', 'Pending')->count(),
            'progress' => (clone $query)->where('status', 'In Progress')->count(),
            'solved' => (clone $query)->where('status', 'Solved')->count(),
            'recentComplaints' => (clone $query)->with('user')->latest()->take(5)->get(),
        ]);
    }

    public function assignedComplaints()
    {
        return view('staff.assigned-complaints', [
            'complaints' => Complaint::with('user')->where('assigned_staff_id', $this->staffId())->latest()->get(),
        ]);
    }

    public function updateProgress(Request $request, Complaint $complaint)
    {
        if ((int) $complaint->assigned_staff_id !== $this->staffId()) {
            return back()->with('error', 'You cannot update this complaint.');
        }

        $request->validate([
            'status' => ['required', 'in:Pending,In Progress,Solved'],
            'remarks' => ['nullable', 'string', 'max:255'],
        ]);

        $complaint->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return back()->with('success', 'Progress updated successfully.');
    }
}
