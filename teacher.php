<!DOCTYPE html>
<html>
<head>
<title>Staff</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
        html, body, h1, h2, h3, h4, h5 {font-family: "Raleway", sans-serif;}
        body {margin:0;}
        header {background-color: #ffffff;color: #000000;padding: 10px;text-align: center;}
        h1 {margin: 0;}
        main {padding: 20px;}
        p {line-height: 1.6;}
        footer {background-color: #ececec;color: #000000;padding: 10px;text-align: center;position: fixed;bottom: 0;width: 100%;}
    </style>
</head>
<body class="w3-light-grey">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="3.avif" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Teacher's</strong></span><br>
      <a href="https://mail.google.com/mail/u/0" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="seeteacher.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="atten.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar fa-fw"></i>  attendance</a>
    <a href="subject.html" class="w3-bar-item w3-button w3-padding "><i class="fa fa-book fa-fw"></i>  Subjest</a>
    <a href="course.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Course</a>
    <a href="class.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Class</a>
    <a href="marks.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullhorn fa-fw"></i>  Marks</a>
    <a href="teacher.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-address-book fa-fw"></i>  Teacher's</a>
    <a href="student.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-address-book-o fa-fw"></i>  Students</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-pink w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php
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

// SQL query to count the total number of subject_id
$sql = "SELECT COUNT(subject_id) AS total_subjects FROM Subject";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    echo " " . $row["total_subjects"];
} else {
    echo "0 results";
}

$conn->close();
?>
</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Subjects</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-gray w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php
// Database connection parameters
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

// SQL query to count the number of teacher_id entries in the Teacher table
$sql = "SELECT COUNT(teacher_id) AS total_teachers FROM Teacher";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo " " . $row["total_teachers"];
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Teacher's</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "school"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve count of usernames
$sql = "SELECT COUNT(username) AS user_count FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the count
    $row = $result->fetch_assoc();
    echo " " . $row["user_count"];
} else {
    echo "0 results";
}

$conn->close();
?>
</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>User's</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-green w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

// Establish connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to count total number of student IDs
$sql = "SELECT COUNT(student_id) AS total_students FROM Student";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the query
    $row = $result->fetch_assoc();
    echo " " . $row["total_students"];
} else {
    echo "No students found.";
}

// Close the database connection
$conn->close();
?>
</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Students</h4>
      </div>
    </div>
  </div>

  <div class="w3-panel">
  <header>
        <h1>School Ethics & Rules</h1>
    </header>

    <main>
        <h2>Ethics</h2>
        <p>
            Our school believes in fostering an environment of respect, integrity, and responsibility among students, teachers, and staff.
            We expect all members of our school community to adhere to the following ethics:
        </p>
        <ul>
            <li>Respect for oneself and others</li>
            <li>Integrity in all actions and behaviors</li>
            <li>Responsibility for one's actions and their consequences</li>
            <li>Compassion and empathy towards fellow students and staff</li>
        </ul>

        <h2>Rules</h2>
        <p>
            To maintain a safe and conducive learning environment, the following rules are to be followed by all students:
        </p>
        <ol>
            <li>Attend all classes regularly and punctually</li>
            <li>Respect teachers, staff, and fellow students</li>
            <li>Follow school policies and procedures</li>
            <li>Avoid disruptive behavior in classrooms and common areas</li>
            <li>Keep the school premises clean and tidy</li>
            <li>Adhere to the dress code policy</li>
            <li>Avoid any form of bullying, harassment, or discrimination</li>
        </ol>
    </main>

    <footer>
        <p>&copy; 2024 Your School. All rights reserved.</p>
    </footer>
    </div>
  </div>



  
</div>



</body>
</html>
