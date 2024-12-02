<?php
include 'config.php';

// Retrieve form data
$table = $_POST['table'];
$url = $_POST['url'];
$creator_title = $_POST['creator_title'] ?? null;
$creator_image = $_POST['creator_image'] ?? null;
$description = $_POST['description'] ?? null;

// Prepare SQL query
if ($table === 'latest_uploads') {
    $sql = "INSERT INTO latest_uploads (url) VALUES (?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, 's', $url);
} else {
    $sql = "INSERT INTO $table (url, creator_title, creator_image, description) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, 'ssss', $url, $creator_title, $creator_image, $description);
}

// Execute query
if (mysqli_stmt_execute($stmt)) {
    echo "<script> 
        alert('Data added successfully. Add more in next screen or go back to list all creators?');
        window.location.href = '../add-creator.php';
    </script>";
    exit; // Stop further execution after redirect
} else {
    echo "Error: " . mysqli_error($link);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($link);
