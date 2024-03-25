<?php
// Database connection
$servername = "localhost"; // Assuming MySQL server is installed on localhost
$username = "root"; // Default username
$password = ""; // Default password (empty)
$database = "school"; // Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$class_id = $_POST['class_id'];
$student_id = $_POST['student_id'];
$daily_date = $_POST['daily_date'];
$status = $_POST['status'];

// SQL query to insert data into the table
$sql = "INSERT INTO Attendance ( class_id, student_id, daily_date, status)
        VALUES ( '$class_id', '$student_id', '$daily_date', '$status')";

if ($conn->query($sql) === TRUE) {
    // Close connection
    $conn->close();
    // Display pop-up message
    echo "<script>alert('New record created successfully');</script>";
    // Redirect to atten.html after 2 seconds
    echo "<script>setTimeout(function(){ window.location.href = 'atten.html'; }, 2000);</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
