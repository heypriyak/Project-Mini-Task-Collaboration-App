# Mini Task Collaboration App

A web-based application for managing tasks and collaboration between administrators and users.

## Features

- User Authentication (Admin/User login)
- Task Management System
- Leave Application System
- Responsive Design
- Role-based Access Control

## Prerequisites

- PHP 7.4+
- MySQL 5.7+
- Apache Server (XAMPP/WAMP/MAMP)
- Web Browser (Chrome/Firefox/Safari)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/yourusername/mini-task-collaboration.git
```

2. Move the project to your web server directory:

   - For XAMPP: `C:\xampp\htdocs\TMS`
   - For WAMP: `C:\wamp\www\TMS`

3. Import the database:

   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named `tms_db`
   - Import the `database/tms_db.sql` file

4. Configure database connection:
   - Open `includes/connection.php`
   - Update if needed:

```php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "tms_db");
```

## Project Structure

```
TMS/
├── admin/                  # Admin panel files
│   ├── admin_dashboard.php
│   ├── admin_login.php
│   ├── create_task.php
│   ├── edit_task.php
│   ├── manage_task.php
│   ├── view_leave.php
│   └── delete_task.php
├── includes/              # Common files
│   ├── connection.php
│   └── jQuery_latest.js
├── css/                  # Stylesheets
│   └── style.css
├── bootstrap/            # Bootstrap files
├── index.php            # Main entry point
├── register.php         # User registration
├── user_login.php       # User login
├── user_dashboard.php   # User dashboard
├── task.php            # Task management
└── update_status.php   # Task status updates
```

## Default Login Credentials

### Admin Access:

- Email: admin@admin.com
- Password: admin123

### User Access:

- Email: user@example.com
- Password: user123

## Usage

1. Start your Apache and MySQL servers through XAMPP/WAMP
2. Open your browser and navigate to:

   - http://localhost/TMS/

3. Choose login role:
   - Admin Login: Manage tasks and users
   - User Login: View and update assigned tasks
   - User Registration: Register new user account

## Features

### Admin Panel:

- Create and assign tasks
- Manage user tasks
- View leave applications
- Monitor task progress

### User Panel:

- View assigned tasks
- Update task status
- Apply for leave
- View leave status

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

.

## Support

For support, email: sanjupriya004@gmail.com
