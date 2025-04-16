-- Create the database
CREATE DATABASE IF NOT EXISTS tms_db;
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

-- Insert default admin user
INSERT INTO users (name, email, password, role) VALUES
('Admin', 'admin@admin.com', '$2y$10$KxWdYJz1IwEx8pKxZYgHCOKnP0uNHxUxPRkW9DbM4QRF0zYREy0Eq', 'admin');

-- Insert sample user
INSERT INTO users (name, email, password, role) VALUES
('Test User', 'user@example.com', '$2y$10$51XwX0Ry.QgX/fvVVrwlZOZJZeG7LXx4pKXX.QdWGNnwKYk.3Ay8.', 'user');

-- Insert sample tasks
INSERT INTO tasks (user_id, title, deadline, priority, status) VALUES
(2, 'Sample Task 1', DATE_ADD(CURRENT_DATE, INTERVAL 7 DAY), 'high', 'pending'),
(2, 'Sample Task 2', DATE_ADD(CURRENT_DATE, INTERVAL 14 DAY), 'medium', 'in_progress');