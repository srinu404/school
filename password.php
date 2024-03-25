<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select,
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p.message {
            margin-top: 10px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
    </style>
    <script>
        function showMessageAndRedirect() {
            alert("Password updated successfully.");
            window.location.href = "1.html";
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Edit User Password</h2>
        <form method="post" action="">
            <label for="username">Select User:</label>
            <select name="username" id="username">
                <?php
                // Establish database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "school";

                $conn = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch usernames from the database
                $sql = "SELECT username FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                    }
                }
                ?>
            </select>
            <br><br>
            <label for="password">New Password:</label>
            <input type="password" name="password" id="password" required>
            <br><br>
            <input type="submit" name="submit" value="Update Password" onclick="showMessageAndRedirect()">
        </form>

        <?php
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Update password in the database
            $sql = "UPDATE users SET password = '$hashed_password' WHERE username = '$username'";

            if ($conn->query($sql) === TRUE) {
                // Password updated successfully
            } else {
                echo "<p class='message'>Error updating password: " . $conn->error . "</p>";
            }

            // Close database connection
            $conn->close();
        }
        ?>
        <button onclick="window.location.href = 'admin.php';" style="padding: 10px 20px; background-color: #gray; color: #black; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;">Cancel</button>
    </div>
    
</body>
</html>
