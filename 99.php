<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

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

// Function to fetch student marks
function fetchStudentMarks($conn, $studentId) {
    $sql = "SELECT * FROM Marks WHERE student_id = $studentId";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

// Query to fetch student information
$sql = "SELECT s.student_id, s.first_name, s.last_name, s.parent_email
        FROM Student s";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Parent Email</th>
            </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['student_id']."</td>
                <td>".$row['first_name']." ".$row['last_name']."</td>
                <td><a href='javascript:sendEmail(".$row['student_id'].", \"".$row['parent_email']."\")'>".$row['parent_email']."</a></td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

<script>
    function sendEmail(studentId, parentEmail) {
        var mailtoLink = "mailto:" + parentEmail + "?subject=Student Marks&body=Details%20of%20student%20ID%3A%20" + studentId + "%0D%0A%0D%0A";
        
        // Fetch student marks via AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var marksData = JSON.parse(xhr.responseText);
                var marksDetails = "Class ID: " + marksData.class_id + "%0D%0A" +
                                   "Kannada: " + marksData.kannada + "%0D%0A" +
                                   "Hindi: " + marksData.hindi + "%0D%0A" +
                                   "English: " + marksData.english + "%0D%0A" +
                                   "Maths: " + marksData.maths + "%0D%0A" +
                                   "Science: " + marksData.science + "%0D%0A" +
                                   "Social: " + marksData.social + "%0D%0A" +
                                   "Total Marks: " + marksData.total_marks + "%0D%0A" +
                                   "Percentage: " + marksData.percentage + "%0D%0A";
                mailtoLink += marksDetails;
                window.location.href = mailtoLink;
            }
        };
        xhr.open("GET", "fetch_student_marks.php?student_id=" + studentId, true);
        xhr.send();
    }
</script>

</body>
</html>
