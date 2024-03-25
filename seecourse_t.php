<?php
// Assuming you have a database connection established already
// Replace database credentials with your own
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the Course table
$sql = "SELECT course_id, course_name, teacher_id, subject_id FROM Course";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Teacher ID</th>
                <th>Subject ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["course_id"]."</td>";
                echo "<td>".$row["course_name"]."</td>";
                echo "<td>".$row["teacher_id"]."</td>";
                echo "<td>".$row["subject_id"]."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- Button to open class.html -->
    <button onclick="window.location.href = 'course.html';" style="padding: 10px 20px; background-color: #f44336; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;">Cancel</button>


</body>
</html>

<?php
// Close connection
$conn->close();
?>
