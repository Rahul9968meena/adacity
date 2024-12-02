<?php
header('Content-Type: application/json');
$conn = new mysqli('localhost', 'root', '', 'sliderDB');

if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

$id = $_POST['id'];

$sql = "DELETE FROM slider_links WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => 'Link deleted']);
} else {
    echo json_encode(['error' => 'Failed to delete link']);
}

$conn->close();
