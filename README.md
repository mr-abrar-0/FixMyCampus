# Smart Campus Complaint and Management System

This is a Laravel + PHP + MySQL semester project for managing campus complaints.

## Technology Used

- Laravel Framework
- PHP
- MySQL
- HTML
- CSS
- JavaScript

## Main Features

- Student registration and login
- Role-based login for Student, Admin, and Staff
- Student can submit complaints
- Student can view real complaint status from database
- Admin can view all complaints
- Admin can assign complaints to staff
- Admin can update complaint status
- Admin can add staff members
- Staff can view assigned complaints
- Staff can update complaint progress and remarks
- Image upload option removed
- Professional blue/navy UI with faded hover effect

## Demo Accounts

### Admin
Email: admin@smartcampus.com  
Password: admin123  
Role: Admin

### Student
Email: student@smartcampus.com  
Password: student123  
Role: Student

### Staff
Email: staff@smartcampus.com  
Password: staff123  
Role: Staff

## How to Run

### Step 1: Put Project in XAMPP

Extract this project and place the folder here:

```text
C:\xampp\htdocs\SmartCampus_Laravel
```

### Step 2: Open Terminal in Project Folder

```bash
cd C:\xampp\htdocs\SmartCampus_Laravel
```

### Step 3: Install Laravel Dependencies

Composer is required for Laravel.

```bash
composer install
```

### Step 4: Create Environment File

```bash
copy .env.example .env
```

For Git Bash/Linux/Mac:

```bash
cp .env.example .env
```

### Step 5: Generate App Key

```bash
php artisan key:generate
```

### Step 6: Create Database

Open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Create database:

```text
smart_campus_db
```

### Step 7: Run Migrations and Seeder

```bash
php artisan migrate --seed
```

Alternative: You can import this SQL file manually:

```text
database/sql/smart_campus_db.sql
```

### Step 8: Start Laravel Server

```bash
php artisan serve
```

Open in browser:

```text
http://127.0.0.1:8000
```

## Notes

- Do not open Blade files directly in browser.
- Always run this project through Laravel server using `php artisan serve`.
- Make sure Apache/MySQL are running in XAMPP.
- If `composer` is not recognized, install Composer first.
