<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .filter-form {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .filter-form label {
            font-weight: bold;
        }
        .filter-form select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100px;
            margin-right: 10px;
            font-size: 16px;
        }
        .filter-form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }
        .filter-form button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="filter-form">
        <form method="get">
            <label for="class_id">Select Class ID:</label>
            <select name="class_id" id="class_id">
                <?php
                // Generate options for class IDs
                for ($i = 1; $i <= 10; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
            <button type="submit">Filter</button>
        </form>
    </div>
    
    <?php
    // Database connection details
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

    // Check if class_id is set in the URL and sanitize the input
    if(isset($_GET['class_id'])){
        $class_id = intval($_GET['class_id']);

        // SQL query to retrieve details from the Student table for the selected class_id
        $sql = "SELECT * FROM Student WHERE class_id = $class_id";

        // Execute the query
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Class ID</th><th>Student ID</th><th>Name</th><th>Date of Birth</th><th>Address</th><th>Parent Contact Info</th><th>Parent Email</th></tr>";
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["class_id"] . "</td>";
                echo "<td>" . $row["student_id"] . "</td>";
                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                echo "<td>" . $row["date_of_birth"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["parent_contact_info"] . "</td>";
                echo "<td>" . $row["parent_email"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }

    // Close connection
    $conn->close();
    ?>
    <button onclick="window.location.href = 'admin.php';" style="padding: 10px 20px; background-color: #f44336; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;">Cancel</button>
</body>
</html>
