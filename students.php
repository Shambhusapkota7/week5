<?php
require_once __DIR__ . "/includes/header.php";



if (!file_exists("students.txt")) {
    echo "<p>No students found.</p>";
} else {
    $students = file("students.txt");

    foreach ($students as $student) {
        list($name, $email, $skills) = explode("|", trim($student));
        $skillsArray = explode(",", $skills);

        echo "<h4>$name</h4>";
        echo "<p>Email: $email</p>";
        echo "<p>Skills:</p><ul>";

        foreach ($skillsArray as $skill) {
            echo "<li>$skill</li>";
        }

        echo "</ul>";
    }
}

require_once __DIR__ . "/includes/footer.php";
?>
