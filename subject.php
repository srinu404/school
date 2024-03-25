<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "school"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching values from the form
// This is set to 0 and will be auto-incremented
$subject_name = $_POST['subject_name'];

// SQL query to insert data into Subject table
$sql = "INSERT INTO Subject (subject_name) VALUES ( '$subject_name')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('New record created successfully');
            window.location.href = 'subject.html';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
