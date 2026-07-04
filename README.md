# Smart Campus Complaint and Management System

## Project Overview

Smart Campus Complaint and Management System is a web-based application developed to manage campus complaints in an organized and efficient way. The system allows students to submit complaints related to campus issues such as internet problems, classroom issues, electricity faults, furniture problems, lab issues, and other maintenance-related problems.

The system provides separate panels for Student, Admin, and Staff. Students can submit complaints and track their status. Admin can manage complaints, assign staff, update complaint status, and manage users. Staff can view assigned complaints, update progress, and add remarks.

## Technologies Used

- HTML
- CSS
- JavaScript
- PHP
- Laravel
- MySQL
- XAMPP
- Composer

## Main Features

### Student Panel

- Student registration
- Student login
- Submit complaint
- View complaint status
- Track complaint progress

### Admin Panel

- Admin login
- View dashboard statistics
- View all complaints
- Assign complaints to staff
- Update complaint status
- Manage users
- Manage staff members

### Staff Panel

- Staff login
- View assigned complaints
- Update complaint status
- Add remarks on complaints

## User Roles

The system has three main roles:

1. Student
2. Admin
3. Staff

Each role has its own dashboard and permissions.

## Project Modules

- Authentication Module
- Student Complaint Module
- Admin Management Module
- Staff Assignment Module
- Complaint Status Tracking Module
- Database Management Module

## Database

The project uses MySQL database.

Database name:

```sql
smart_campus_db
```

Main tables:

- users
- complaints

## How to Run the Project

### Step 1: Start XAMPP

Start:

- Apache
- MySQL

### Step 2: Create Database

Open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Create a database:

```text
smart_campus_db
```

### Step 3: Import SQL File

Import the SQL file from the project database folder.

### Step 4: Install Dependencies

Open project folder in VS Code terminal and run:

```bash
composer install
```

### Step 5: Create Environment File

```bash
copy .env.example .env
```

### Step 6: Generate Application Key

```bash
php artisan key:generate
```

### Step 7: Configure Database

Open `.env` file and set:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smart_campus_db
DB_USERNAME=root
DB_PASSWORD=
```

### Step 8: Clear Cache

```bash
php artisan optimize:clear
```

### Step 9: Run Project

```bash
php artisan serve
```

Open in browser:

```text
http://127.0.0.1:8000
```

## Demo Accounts

### Admin

```text
Email: admin@smartcampus.com
Password: admin123
Role: Admin
```

### Staff

```text
Email: staff@smartcampus.com
Password: staff123
Role: Staff
```

### Student

A student can register from the registration page and then login using the selected student role.

## Project Workflow

1. Student registers and logs in.
2. Student submits a campus complaint.
3. Complaint is saved in the database.
4. Admin views the complaint.
5. Admin assigns the complaint to staff.
6. Staff views assigned complaint.
7. Staff updates status and adds remarks.
8. Student tracks the updated complaint status.

## Quality Attributes

### Reliability

The system stores complaint data properly in the database and allows users to track complaint status.

### Usability

The interface is simple and easy to use for students, admin, and staff.

### Maintainability

The project is developed using Laravel structure, which makes the code organized and easy to maintain.

### Efficiency

The system allows quick complaint submission, status update, and data retrieval.

### Security

The system uses role-based login so that each user can access only their own panel.

## Future Enhancements

- Email notifications
- Complaint priority alerts
- Complaint reports with charts
- Search and advanced filters
- User profile management
- Feedback system after complaint resolution

## Author

Abrar Hussain

Computer Science Student  
COMSATS University Islamabad, Abbottabad Campus
