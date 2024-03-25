<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f9f9f9;
        }
        .teacher-info {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
        .teacher-name {
            font-weight: bold;
            color: #333;
        }
        .teacher-email {
            color: #007bff;
        }
        .cancel-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .cancel-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select T_name and T_email from Teacher table
$sql = "SELECT CONCAT(first_name, ' ', last_name) AS name, email FROM Teacher";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $email = $row["email"];
        // Output formatted teacher info with CSS
        echo "<div class='teacher-info'>
                  <span class='teacher-name'>Name: $name</span>, 
                  <span class='teacher-email'>Email: <a href='mailto:$email'>$email</a></span>
              </div>";
    }
} else {
    echo "0 results";
}


// Close connection
$conn->close();
?>

<a href="admin.php" class="cancel-button">Cancel</a>

</body>
</html>
