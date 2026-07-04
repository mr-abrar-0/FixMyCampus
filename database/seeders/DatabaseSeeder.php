<?php

namespace Database\Seeders;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'full_name' => 'Admin User',
            'email' => 'admin@smartcampus.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'department' => 'Administration',
        ]);

        $staff1 = User::create([
            'full_name' => 'Usman Ali',
            'email' => 'staff@smartcampus.com',
            'password' => Hash::make('staff123'),
            'role' => 'staff',
            'department' => 'IT Department',
        ]);

        $staff2 = User::create([
            'full_name' => 'Bilal Khan',
            'email' => 'maintenance@smartcampus.com',
            'password' => Hash::make('staff123'),
            'role' => 'staff',
            'department' => 'Maintenance Department',
        ]);

        $student = User::create([
            'full_name' => 'Student User',
            'email' => 'student@smartcampus.com',
            'password' => Hash::make('student123'),
            'role' => 'student',
            'department' => 'Computer Science',
            'semester' => '4th',
        ]);

        Complaint::create([
            'user_id' => $student->id,
            'title' => 'Wi-Fi not working in Lab 2',
            'category' => 'Internet',
            'location' => 'Lab 2',
            'priority' => 'High',
            'description' => 'Internet connection is not working properly in Lab 2.',
            'status' => 'In Progress',
            'assigned_staff_id' => $staff1->id,
            'remarks' => 'Router checking is in progress.',
        ]);

        Complaint::create([
            'user_id' => $student->id,
            'title' => 'Broken chair in Room 105',
            'category' => 'Furniture',
            'location' => 'Room 105',
            'priority' => 'Medium',
            'description' => 'One chair is broken and needs replacement.',
            'status' => 'Pending',
            'assigned_staff_id' => $staff2->id,
        ]);
    }
}
