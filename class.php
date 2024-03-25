<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "school"; // Replace 'your_database_name' with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$class_id = $_POST['class_id'];
$course_id = $_POST['course_id'];
$teacher_id = $_POST['teacher_id'];
$schedule = $_POST['schedule'];

// SQL query to insert data into 'Class' table
$sql = "INSERT INTO Class (class_id, course_id, teacher_id, schedule)
        VALUES ('$class_id', '$course_id', '$teacher_id', '$schedule')";

if ($conn->query($sql) === TRUE) {
    // Success message
    echo "<script>alert('New record created successfully');</script>";
    // Redirect to class.html after 2 seconds
    echo "<script>setTimeout(function(){ window.location.href = 'class.html'; }, 2000);</script>";
} else {
    // Error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
