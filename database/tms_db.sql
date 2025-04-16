-- Create and use the database
DROP DATABASE IF EXISTS tms_db;
CREATE DATABASE tms_db;
USE tms_db;

-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user'
);

-- Tasks table
CREATE TABLE tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(200) NOT NULL,
    deadline DATE NOT NULL,
    priority ENUM('low', 'medium', 'high') DEFAULT 'medium',
    status ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert admin users
INSERT INTO users (name, email, password, role) VALUES
('System Admin', 'admin@admin.com', '$2y$10$KxWdYJz1IwEx8pKxZYgHCOKnP0uNHxUxPRkW9DbM4QRF0zYREy0Eq', 'admin'),
('Project Manager', 'manager@admin.com', '$2y$10$KxWdYJz1IwEx8pKxZYgHCOKnP0uNHxUxPRkW9DbM4QRF0zYREy0Eq', 'admin');

-- Insert sample users
INSERT INTO users (name, email, password, role) VALUES
('John Doe', 'john@example.com', '$2y$10$51XwX0Ry.QgX/fvVVrwlZOZJZeG7LXx4pKXX.QdWGNnwKYk.3Ay8.', 'user'),
('Jane Smith', 'jane@example.com', '$2y$10$51XwX0Ry.QgX/fvVVrwlZOZJZeG7LXx4pKXX.QdWGNnwKYk.3Ay8.', 'user'),
('Mike Johnson', 'mike@example.com', '$2y$10$51XwX0Ry.QgX/fvVVrwlZOZJZeG7LXx4pKXX.QdWGNnwKYk.3Ay8.', 'user');

-- Insert sample tasks for John Doe
INSERT INTO tasks (user_id, title, deadline, priority, status) VALUES
(3, 'Complete Project Proposal', DATE_ADD(CURRENT_DATE, INTERVAL 5 DAY), 'high', 'pending'),
(3, 'Review Code Changes', DATE_ADD(CURRENT_DATE, INTERVAL 2 DAY), 'medium', 'in_progress'),
(3, 'Update Documentation', DATE_ADD(CURRENT_DATE, INTERVAL 7 DAY), 'low', 'pending');

-- Insert sample tasks for Jane Smith
INSERT INTO tasks (user_id, title, deadline, priority, status) VALUES
(4, 'Design Database Schema', DATE_ADD(CURRENT_DATE, INTERVAL 3 DAY), 'high', 'in_progress'),
(4, 'Implement User Authentication', DATE_ADD(CURRENT_DATE, INTERVAL 6 DAY), 'high', 'pending'),
(4, 'Write Unit Tests', DATE_ADD(CURRENT_DATE, INTERVAL 4 DAY), 'medium', 'pending');

-- Insert sample tasks for Mike Johnson
INSERT INTO tasks (user_id, title, deadline, priority, status) VALUES
(5, 'Fix Bug #123', DATE_ADD(CURRENT_DATE, INTERVAL 1 DAY), 'high', 'in_progress'),
(5, 'Optimize Database Queries', DATE_ADD(CURRENT_DATE, INTERVAL 8 DAY), 'medium', 'pending'),
(5, 'Deploy to Staging', DATE_ADD(CURRENT_DATE, INTERVAL 5 DAY), 'high', 'pending');