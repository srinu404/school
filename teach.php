<?php
// Database configuration
$servername = "localhost"; // Assuming your database is on the same server
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "school"; // Replace 'your_database_name' with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO Teacher (first_name, last_name, email, phone_number, department) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $first_name, $last_name, $email, $phone_number, $department);

// Set parameters and execute

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$department = $_POST['department'];

if ($stmt->execute()) {
    echo "<script>alert('New record created successfully');</script>";
    echo "<script>window.location = 'teacher.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
