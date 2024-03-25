<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 20px;
        }
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
        form {
            margin-bottom: 20px;
        }
        button {
            margin-right: 10px;
        }
        .back-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
        }
        .attendance-percentage {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">

    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="class_id">Select Class ID:</label>
        <select name="class_id" id="class_id">
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<option value=\"$i\">$i</option>";
            }
            ?>
        </select>
        <input type="radio" name="percentage_filter" value="below_75"> Below 75%
        <input type="radio" name="percentage_filter" value="above_75"> Above 75%
        <input type="radio" name="percentage_filter" value="all" checked> All
        <button type="submit">Filter</button>
    </form>

    <?php
// Database connection
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

// Filter class_id
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : '';
// Filter attendance percentage
$percentage_filter = isset($_GET['percentage_filter']) ? $_GET['percentage_filter'] : '';

// SQL query to retrieve data
$sql = "SELECT Attendance.class_id, Attendance.student_id, Attendance.daily_date, Attendance.status, 
        Student.first_name, Student.last_name, 
        SUM(CASE WHEN Attendance.status='Present' THEN 1 ELSE 0 END) AS present_days 
        FROM Attendance 
        INNER JOIN Student ON Attendance.student_id = Student.student_id 
        WHERE Attendance.class_id >= 1 AND Attendance.class_id <= 10";

if (!empty($class_id)) {
    $sql .= " AND Attendance.class_id = '$class_id'";
}

$sql .= " GROUP BY Attendance.student_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Class ID</th><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Daily Date</th><th>Status</th><th>Attendance Percentage</th></tr>";
    while ($row = $result->fetch_assoc()) {
        // Calculate attendance percentage
        $total_days = 30; // Assuming 30 days in total
        $present_days = $row["present_days"];
        $attendance_percentage = ($present_days / $total_days) * 100;

        // Apply filter based on attendance percentage
        if (($percentage_filter == 'below_75' && $attendance_percentage < 75) || ($percentage_filter == 'above_75' && $attendance_percentage >= 75) || $percentage_filter == 'all') {
            echo "<tr><td>" . $row["class_id"] . "</td><td>" . $row["student_id"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["daily_date"] . "</td><td>" . $row["status"] . "</td><td class='attendance-percentage'>" . $attendance_percentage . "%</td></tr>";
        }
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>


</div>

<!-- Back button -->
<button onclick="window.location.href = 'atten.html';" style="padding: 10px 20px; background-color: #f44336; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;">Cancel</button>

</body>
</html>

