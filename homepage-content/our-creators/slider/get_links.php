<?php
header('Content-Type: application/json');
$conn = new mysqli('localhost', 'root', '', 'sliderDB');

if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

$sql = "SELECT * FROM slider_links";
$result = $conn->query($sql);

$links = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $links[] = $row;
    }
}

echo json_encode($links);
$conn->close();
