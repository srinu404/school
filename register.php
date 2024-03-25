<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if username, email, and password are not empty
if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
    echo "<script>alert('Please fill in all fields.'); window.location.href = 'teacher_register.html';</script>";
    exit();
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], $options = PASSWORD_DEFAULT);

// Check if username or email already exists
$sql_check_duplicate = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt_check_duplicate = $conn->prepare($sql_check_duplicate);
$stmt_check_duplicate->bind_param("ss", $username, $email);
$stmt_check_duplicate->execute();
$result_check_duplicate = $stmt_check_duplicate->get_result();

if($result_check_duplicate->num_rows > 0) {
    echo "<script>alert('Username or email already exists.'); window.location.href = 'teacher_register.html';</script>";
    exit();
}

$stmt_check_duplicate->close();

$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    echo "<script>alert('Registered successfully!'); window.location.href = 'teacher_register.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
