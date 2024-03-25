<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];
$address = $_POST['address'];
$parent_contact_info = $_POST['parent_contact_info'];
$parent_email = $_POST['parent_email'];
$class_id = $_POST['class_id']; // Retrieve class_id from the form

$sql = "INSERT INTO Student (first_name, last_name, date_of_birth, address, parent_contact_info, parent_email, class_id)
        VALUES ('$first_name', '$last_name', '$date_of_birth', '$address', '$parent_contact_info', '$parent_email', '$class_id')";

if ($conn->query($sql) === TRUE) {
    // JavaScript alert popup
    echo "<script>alert('New record created successfully');</script>";
    // Redirect to student.html
    echo "<script>window.location.href = 'student.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
