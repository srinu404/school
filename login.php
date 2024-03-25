<?php
session_start();

$conn = new mysqli("localhost", "root", "", "school");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) {
        $_SESSION['loggedin'] = true;
        echo "<script>alert('Login successful!'); window.location.href = 'teacher.php';</script>";
        exit();
    } else {
        echo "<script>alert('Invalid password'); window.location.href = 'index.html'</script>";
    }
} else {
    echo "<script>alert('Username not found'); window.location.href = 'index.html'</script>";
}

$stmt->close();
$conn->close();
?>
