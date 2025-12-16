<?php
require_once __DIR__ . "/includes/header.php";
require_once __DIR__ . "/functions.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $fileName = uploadPortfolioFile($_FILES["portfolio"]);
        $success = "File uploaded successfully: $fileName";
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<h3>Upload Portfolio File</h3>

<?php if ($error): ?>
<p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<?php if ($success): ?>
<p style="color:green;"><?= $success ?></p>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="portfolio" required><br><br>
    <button type="submit">Upload</button>
</form>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
