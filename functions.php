<?php

function formatName($name) {
    return ucwords(strtolower(trim($name)));
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function cleanSkills($string) {
    $skills = explode(",", $string);
    return array_map("trim", $skills);
}

function saveStudent($name, $email, $skillsArray) {
    $line = $name . "|" . $email . "|" . implode(",", $skillsArray) . PHP_EOL;
    file_put_contents("students.txt", $line, FILE_APPEND);
}

function uploadPortfolioFile($file) {
    $allowedTypes = ["application/pdf", "image/jpeg", "image/png"];
    $maxSize = 2 * 1024 * 1024;

    if (!in_array($file["type"], $allowedTypes)) {
        throw new Exception("Only PDF, JPG, PNG files allowed.");
    }

    if ($file["size"] > $maxSize) {
        throw new Exception("File size must be under 2MB.");
    }

    if (!is_dir("uploads")) {
        mkdir("uploads");
    }

    $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
    $newName = uniqid("portfolio_") . "." . $extension;

    move_uploaded_file($file["tmp_name"], "uploads/" . $newName);
    return $newName;
}
