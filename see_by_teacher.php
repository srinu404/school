<?php

// Database credentials
$host = 'localhost';
$dbname = 'school';
$username = 'root';
$password = '';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL query
    $sql = "SELECT 
                T.teacher_id,
                CONCAT(T.first_name, ' ', T.last_name) AS teacher_name,
                C.class_id,
                C.course_id,
                COUNT(DISTINCT COALESCE(S.subject_id, 0)) AS num_subjects_taught
            FROM 
                Teacher T
            LEFT JOIN 
                Course CR ON T.teacher_id = CR.teacher_id
            LEFT JOIN 
                Class C ON CR.course_id = C.course_id
            LEFT JOIN 
                Subject S ON CR.subject_id = S.subject_id
            GROUP BY 
                T.teacher_id, T.first_name, T.last_name, C.class_id, C.course_id";

    // Prepare and execute the query
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output the results with CSS styling
    echo "<style>
            .result {
                border: 1px solid #ccc;
                padding: 10px;
                margin-bottom: 10px;
            }
            .teacher-id {
                font-weight: bold;
            }
          </style>";

    foreach ($results as $row) {
        echo "<div class='result'>";
        echo "<p class='teacher-id'>Teacher ID: " . $row['teacher_id'] . "</p>";
        echo "<p>Teacher Name: " . $row['teacher_name'] . "</p>";
        echo "<p>Class ID: " . $row['class_id'] . "</p>";
        echo "<p>Course ID: " . $row['course_id'] . "</p>";
        echo "<p>Number of Subjects Taught: " . $row['num_subjects_taught'] . "</p>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<button onclick="window.location.href = 'admin.php';" style="padding: 10px 20px; background-color: #f44336; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;">Cancel</button>