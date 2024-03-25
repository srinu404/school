<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    margin-top: 20px;
}

table {
    border-collapse: collapse;
    width: 80%;
    margin: 20px auto;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

th, td {
    border: 1px solid #ddd;
    text-align: left;
    padding: 15px;
    color: #333;
}

th {
    background-color: #4CAF50;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

@keyframes changeColor {
    0% {background-color: #ff5733;}
    50% {background-color: #ff8c33;}
    100% {background-color: #ff5733;}
}

th.animated {
    animation: changeColor 5s infinite;
}

button {
    padding: 10px 20px;
    background-color: #f44336;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: block;
    margin: 20px auto;
}

button:hover {
    background-color: #d32f2f;
}

    </style>
</head>
<body>

<h2>User Data</h2>

<table>
    <tr>
        <th class="animated">ID</th>
        <th class="animated">Username</th>
        <th class="animated">Email</th>
        <th class="animated">Registration Date</th>
    </tr>
    <?php
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "school");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve data from users table
    $sql = "SELECT id, username, email, reg_date FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["username"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["reg_date"]."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>0 results</td></tr>";
    }

    // Close connection
    $conn->close();
    ?>
</table>
             <button onclick="window.location.href = 'admin.php';" style="padding: 10px 20px; background-color: #f44336; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;">Cancel</button>
</body>
</html>
