<?php
include 'config.php';

$table = $_GET['table'];
$id = $_GET['id'];

$sql = "DELETE FROM $table WHERE id = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../");
} else {
    echo "Error: " . mysqli_error($link);
}

mysqli_stmt_close($stmt);
mysqli_close($link);
