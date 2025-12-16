<?php
require_once __DIR__ . "/includes/header.php";
require_once __DIR__ . "/functions.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $name   = formatName($_POST["name"] ?? "");
        $email  = $_POST["email"] ?? "";
        $skills = cleanSkills($_POST["skills"] ?? "");

        if (empty($name) || empty($email) || empty($_POST["skills"])) {
            throw new Exception("All fields are required.");
        }

        if (!validateEmail($email)) {
            throw new Exception("Invalid email format.");
        }

        saveStudent($name, $email, $skills);
        $success = "Student information saved successfully.";

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<h3>Add Student</h3>

<?php if ($error): ?>
<p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<?php if ($success): ?>
<p style="color:green;"><?= $success ?></p>
<?php endif; ?>

<form method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    Skills (comma separated):<br>
    <input type="text" name="skills"><br><br>
    <button type="submit">Save</button>
</form>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
