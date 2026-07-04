<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private function studentId(): int
    {
        return (int) session('user_id');
    }

    public function dashboard()
    {
        $query = Complaint::where('user_id', $this->studentId());

        return view('student.dashboard', [
            'total' => (clone $query)->count(),
            'pending' => (clone $query)->where('status', 'Pending')->count(),
            'progress' => (clone $query)->where('status', 'In Progress')->count(),
            'solved' => (clone $query)->where('status', 'Solved')->count(),
            'recentComplaints' => (clone $query)->latest()->take(5)->get(),
        ]);
    }

    public function createComplaint()
    {
        return view('student.submit-complaint');
    }

    public function storeComplaint(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'category' => ['required', 'string', 'max:100'],
            'priority' => ['required', 'in:Low,Medium,High'],
            'location' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string'],
        ]);

        Complaint::create([
            'user_id' => $this->studentId(),
            'title' => $request->title,
            'category' => $request->category,
            'priority' => $request->priority,
            'location' => $request->location,
            'description' => $request->description,
            'status' => 'Pending',
        ]);

        return redirect()->route('student.complaints')->with('success', 'Complaint submitted successfully.');
    }

    public function complaints()
    {
        return view('student.my-complaints', [
            'complaints' => Complaint::where('user_id', $this->studentId())->latest()->get(),
        ]);
    }
}
