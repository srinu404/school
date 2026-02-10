# School Database Management System (AWS Deployed)

A full-stack administrative portal for managing school records, now modernized and deployed on the cloud using **AWS EC2**. This project provides a centralized platform for CRUD operations on student and faculty data with a secure, scalable backend.

## 🚀 Features
* **Cloud Hosted**: Deployed on AWS EC2 for high availability and remote access.
* **Secure Authentication**: Admin login system for data protection.
* **Student & Faculty Management**: Comprehensive modules for tracking academic profiles and staff assignments.
* **Network-Ready**: Configured to interact via Static IP/Elastic IP for consistent access.

## 🛠 Tech Stack
* **Frontend**: HTML5, CSS3, JavaScript
* **Backend**: PHP 8.x
* **Database**: MySQL / MariaDB
* **Cloud Infrastructure**: AWS EC2 (Ubuntu/Amazon Linux)
* **Web Server**: Apache/Nginx

## 📂 Folder Structure
```text
school_database/
├── config/          # Database connection (EC2 Private IP/RDS Endpoint)
├── assets/          # CSS, JS, and UI images
├── includes/        # Reusable PHP components (Header/Footer)
├── modules/         # Business logic (Students, Teachers, Classes)
└── public/          # Main entry pages and User Dashboard
```

## ☁️ AWS Deployment & Setup
1. Launch EC2 Instance
* **Instance Type: t2.micro (Free Tier eligible).**
* **Security Groups: Ensure you allow HTTP (80), HTTPS (443), and SSH (22).**

2. Server Environment Setup
* **Connect to your instance via SSH and run:**
```
sudo apt update
sudo apt install apache2 php libapache2-mod-php php-mysql mysql-server -y
```

3. Deploy Code
* **Clone the repository directly into the Apache root directory:**
```
Bash
cd /var/www/html
sudo git clone https://github.com/your-username/school-database.git
```

4. Database Configuration
* **Import your .sql schema into the MySQL server.**

Update config/db_config.php with your EC2 Private IP or RDS Endpoint:
```
PHP
<?php
// Example config/db_config.php
$host = "your-ec2-private-ip"; 
$user = "admin";
$pass = "yourpassword";
$dbname = "school_db";
?>
```
5. Access the Application

Visit your Elastic IP or Public DNS in any browser: 54.167.99.220

# Deployed Images(Screenshot's)

* **EC2 Instance**
<img width="1365" height="767" alt="Screenshot 2026-02-10 121028" src="https://github.com/user-attachments/assets/ea275e0a-8537-44f3-9fcd-2f5f5bbc3776" />

* **Project Home Page**
<img width="1365" height="767" alt="Screenshot 2026-02-10 121050" src="https://github.com/user-attachments/assets/1a2d8de1-e0e8-4773-acac-fbe412487af9" />

* **Project Home Page**
