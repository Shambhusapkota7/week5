<?php require_once __DIR__ . "/includes/header.php"; ?>

<h3>Students List</h3>

<?php
if (!file_exists("students.txt")) {
    echo "<p>No students found.</p>";
} else {
    $students = file("students.txt");

    foreach ($students as $student) {
        list($name, $email, $skills) = explode("|", trim($student));
        echo "<h4>$name</h4>";
        echo "<p>Email: $email</p>";
        echo "<p>Skills: $skills</p>";
        echo "<hr>";
    }
}
?>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
