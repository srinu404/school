<?php
// Connect to the database
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
$stmt = $conn->prepare("INSERT INTO Course (course_id, course_name, teacher_id, subject_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("issi", $course_id, $course_name, $teacher_id, $subject_id);

// Set parameters and execute
$course_id = $_POST['course_id'];
$course_name = $_POST['course_name'];
$teacher_id = $_POST['teacher_id'];
$subject_id = $_POST['subject_id'];

if ($stmt->execute()) {
    echo "<script>alert('New record created successfully');</script>";
    echo "<script>window.location = 'course.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
