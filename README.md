School Database Management System
A full-stack web application designed to streamline the management of student records, faculty data, and academic scheduling. This system provides a centralized platform for administrators to perform CRUD (Create, Read, Update, Delete) operations within a secure environment.

🚀 Features
Secure Authentication: Login system for authorized personnel.

Student Management: Register, update, and track student profiles and academic progress.

Faculty Directory: Manage teacher information and department assignments.

Class Scheduling: Organize and view course schedules and classroom allocations.

Responsive Dashboard: A clean UI built with HTML and CSS for easy navigation.

🛠 Tech Stack
Frontend: HTML5, CSS3, JavaScript

Backend: PHP (Server-side logic)

Database: MySQL

Environment: XAMPP Server

📂 Folder Structure
Plaintext
school_database/
├── config/          # Database connection (IP-based configuration)
├── assets/          # CSS, JS, and UI images
├── includes/        # Reusable components (Header/Footer)
├── modules/         # Business logic for Students, Teachers, and Classes
└── public/          # Main entry pages and User Dashboard
⚙️ Installation & Setup
Clone the Repository: Place the project folder into your htdocs directory.

Database Setup: Import the project's .sql file via phpMyAdmin.

Configuration: Update config/db_config.php with your server's IP address and MySQL credentials.

Launch: Access the project through your browser using the server IP (e.g., http://192.168.x.x/school_database).
