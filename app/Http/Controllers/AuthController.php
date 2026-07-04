<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required', 'in:student,admin,staff'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid email or password.')->withInput();
        }

        if ($user->role !== $request->role) {
            return back()->with('error', 'Selected role does not match this account.')->withInput();
        }

        session([
            'user_id' => $user->id,
            'full_name' => $user->full_name,
            'role' => $user->role,
        ]);

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'staff' => redirect()->route('staff.dashboard'),
            default => redirect()->route('student.dashboard'),
        };
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'department' => ['required', 'string', 'max:100'],
            'semester' => ['required', 'string', 'max:20'],
        ]);

        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student',
            'department' => $request->department,
            'semester' => $request->semester,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login now.');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
