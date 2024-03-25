<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Marks</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 80%;
        margin: 50px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    label {
        font-weight: bold;
        margin-bottom: 10px;
        display: block;
    }
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        margin-bottom: 20px;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    .no-results {
        color: red;
    }
    .back-button {
        text-align: center;
        margin-top: 20px;
    }
    .back-button button {
        padding: 10px 20px;
        background-color: #ccc;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }
    .back-button button:hover {
        background-color: #999;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Student Marks</h2>
    <form method="post" action="">
        <label for="class_id">Select Class ID:</label>
        <select name="class_id" id="class_id">
            <?php
            // Populate class ID options
            for ($i = 1; $i <= 10; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        <input type="submit" value="Submit">
    </form>

    <div class="student-info">
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

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get selected class ID
            $class_id = $_POST["class_id"];

            // SQL query to retrieve student data and marks
            $sql = "SELECT s.student_id, s.first_name, s.last_name, m.class_id, m.kannada, m.hindi, m.english, m.maths, m.science, m.social, m.total_marks, m.percentage
                    FROM Student s
                    INNER JOIN Marks m ON s.student_id = m.student_id
                    WHERE m.class_id = $class_id";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                echo "<table>";
                echo "<tr><th>Student ID</th><th>Student Name</th><th>Class ID</th><th>Kannada</th><th>Hindi</th><th>English</th><th>Maths</th><th>Science</th><th>Social</th><th>Total Marks</th><th>Percentage</th><th>Action</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["student_id"] . "</td>";
                    echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                    echo "<td>" . $row["class_id"] . "</td>";
                    echo "<td>" . $row["kannada"] . "</td>";
                    echo "<td>" . $row["hindi"] . "</td>";
                    echo "<td>" . $row["english"] . "</td>";
                    echo "<td>" . $row["maths"] . "</td>";
                    echo "<td>" . $row["science"] . "</td>";
                    echo "<td>" . $row["social"] . "</td>";
                    echo "<td>" . $row["total_marks"] . "</td>";
                    echo "<td>" . $row["percentage"] . "</td>";
                    echo "<td><button onclick='performAction(" . $row["student_id"] . ")'>Action</button></td>"; // Button added with an onclick event calling a JavaScript function
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='no-results'>No results found.</p>";
            }
        }
        $conn->close();
        ?>
    </div>

    <div class="back-button">
    <button onclick="window.location.href = 'marks.html';" style="padding: 10px 20px; background-color: #f44336; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;">Cancel</button>
    </div>
</div>

<script>
    function performAction(studentId) {
        // Redirect to 99.php with the student ID as a parameter
        window.location.href = '99.php?student_id=' + studentId;
    }
</script>

</body>
</html>
