<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .teacher-info {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .teacher-info h3 {
            margin-top: 0;
            color: #555;
        }
        .teacher-info p {
            margin: 5px 0;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Teacher Information</h2>
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

        // SQL query to retrieve data from Teacher table
        $sql = "SELECT teacher_id, first_name, last_name AS name, email, phone_number, department FROM Teacher";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="teacher-info">';
                echo '<h3>Teacher ID: ' . $row["teacher_id"]. '</h3>';
                echo '<p>Name: ' . $row["name"]. '</p>';
                echo '<p>Email: ' . $row["email"]. '</p>';
                echo '<p>Phone Number: ' . $row["phone_number"]. '</p>';
                echo '<p>Department: ' . $row["department"]. '</p>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
