<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Class Schedule</title>
<style>
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
</style>
</head>
<body>

<table>
  <tr>
    <th>Class ID</th>
    <th>Course ID</th>
    <th>Teacher ID</th>
    <th>Schedule</th>
  </tr>

  <?php
  // Assuming you're using PHP to interact with your database
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

  // SQL query to retrieve data from Class table
  $sql = "SELECT class_id, course_id, teacher_id, schedule FROM Class";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["class_id"]. "</td><td>" . $row["course_id"]. "</td><td>" . $row["teacher_id"]. "</td><td>" . $row["schedule"]. "</td></tr>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();
  ?>

</table>

<!-- Button to open class.html -->

<button onclick="window.location.href = 'class.html';" style="padding: 10px 20px; background-color: #f44336; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;">Cancel</button>


</body>
</html>
