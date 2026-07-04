<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('role:student')->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/submit-complaint', [StudentController::class, 'createComplaint'])->name('complaints.create');
    Route::post('/submit-complaint', [StudentController::class, 'storeComplaint'])->name('complaints.store');
    Route::get('/my-complaints', [StudentController::class, 'complaints'])->name('complaints');
});

Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/manage-complaints', [AdminController::class, 'manageComplaints'])->name('complaints');
    Route::post('/manage-complaints/{complaint}', [AdminController::class, 'updateComplaint'])->name('complaints.update');
    Route::get('/manage-users', [AdminController::class, 'manageUsers'])->name('users');
    Route::get('/manage-staff', [AdminController::class, 'manageStaff'])->name('staff');
    Route::post('/manage-staff', [AdminController::class, 'storeStaff'])->name('staff.store');
});

Route::middleware('role:staff')->prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');
    Route::get('/assigned-complaints', [StaffController::class, 'assignedComplaints'])->name('complaints');
    Route::post('/assigned-complaints/{complaint}', [StaffController::class, 'updateProgress'])->name('complaints.update');
});
