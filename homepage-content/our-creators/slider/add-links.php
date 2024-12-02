<?php
header('Content-Type: application/json');
$conn = new mysqli('localhost', 'root', '', 'sliderDB');

if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

$image = $_POST['image'];
$title = $_POST['title'];

$sql = "INSERT INTO slider_links (image, title) VALUES ('$image', '$title')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => 'Link added']);
} else {
    echo json_encode(['error' => 'Failed to add link']);
}

$conn->close();
