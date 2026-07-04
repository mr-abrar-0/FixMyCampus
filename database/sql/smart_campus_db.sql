CREATE DATABASE IF NOT EXISTS smart_campus_db;
USE smart_campus_db;

DROP TABLE IF EXISTS complaints;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('student','admin','staff') NOT NULL DEFAULT 'student',
  department VARCHAR(100) NULL,
  semester VARCHAR(20) NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE complaints (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED NOT NULL,
  title VARCHAR(150) NOT NULL,
  category VARCHAR(100) NOT NULL,
  location VARCHAR(150) NOT NULL,
  priority ENUM('Low','Medium','High') NOT NULL DEFAULT 'Medium',
  description TEXT NOT NULL,
  status ENUM('Pending','In Progress','Solved','Rejected') NOT NULL DEFAULT 'Pending',
  assigned_staff_id BIGINT UNSIGNED NULL,
  remarks VARCHAR(255) NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT complaints_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  CONSTRAINT complaints_assigned_staff_id_foreign FOREIGN KEY (assigned_staff_id) REFERENCES users(id) ON DELETE SET NULL
);

INSERT INTO users (id, full_name, email, password, role, department, semester) VALUES
(1, 'Admin User', 'admin@smartcampus.com', '$2y$12$0QvqxJBNj75Bwmd7v7and.OnSdYr8ZRhDHlENpLW2VlAM1uFJb64e', 'admin', 'Administration', NULL),
(2, 'Usman Ali', 'staff@smartcampus.com', '$2y$12$GI02o2BzN77MgM2LFFd41.srEl7CeByNCC4ZZ8dPTNxSgz/dks3De', 'staff', 'IT Department', NULL),
(3, 'Student User', 'student@smartcampus.com', '$2y$12$JgQLag9aRFrNOXjzN.djiOMrXT.ezrvE.iD7Ie3uL53e34dzmW2vK', 'student', 'Computer Science', '4th');

INSERT INTO complaints (user_id, title, category, location, priority, description, status, assigned_staff_id, remarks) VALUES
(3, 'Wi-Fi not working in Lab 2', 'Internet', 'Lab 2', 'High', 'Internet connection is not working properly in Lab 2.', 'In Progress', 2, 'Router checking is in progress.'),
(3, 'Broken chair in Room 105', 'Furniture', 'Room 105', 'Medium', 'One chair is broken and needs replacement.', 'Pending', NULL, NULL);
