<?php
// Establish connection to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Gather form data
$student_id = $_POST['student_id'];
$class_id = $_POST['class_id'];
$kannada = $_POST['kannada'];
$hindi = $_POST['hindi'];
$english = $_POST['english'];
$maths = $_POST['maths'];
$science = $_POST['science'];
$social = $_POST['social'];

// Insert data into Marks table
$sql = "INSERT INTO Marks (student_id, class_id, kannada, hindi, english, maths, science, social)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiiiiii", $student_id, $class_id, $kannada, $hindi, $english, $maths, $science, $social);

if ($stmt->execute()) {
    $marks_id = $stmt->insert_id; // Get the ID of the last inserted record

    // Calculate total marks
    $total = $kannada + $hindi + $english + $maths + $science + $social;
    // Calculate percentage
    $percentage = ($total / 600) * 100;

    // Update total marks and percentage in the Marks table
    $update_sql = "UPDATE Marks
                   SET total_marks = ?,
                       percentage = ?
                   WHERE marks_id = ?";

    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("idi", $total, $percentage, $marks_id);

    if ($update_stmt->execute()) {
        // Redirect to marks.html with pop-up message
        echo "<script>alert('New record created successfully');</script>";
        echo "<script>window.location.href = 'marks.html';</script>";
        exit; // Terminate script to prevent further execution
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
