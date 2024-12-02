<?php
include 'config.php';

$table = $_GET['table'];
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'];
    $creator_title = $_POST['creator_title'] ?? null;
    $creator_image = $_POST['creator_image'] ?? null;
    $description = $_POST['description'] ?? null;

    if ($table === 'latest_uploads') {
        $sql = "UPDATE latest_uploads SET url = ? WHERE id = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, 'si', $url, $id);
    } else {
        $sql = "UPDATE $table SET url = ?, creator_title = ?, creator_image = ?, description = ? WHERE id = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssi', $url, $creator_title, $creator_image, $description, $id);
    }

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../admin.php?table=$table");
    } else {
        echo "Error: " . mysqli_error($link);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
    exit;
}

$sql = "SELECT * FROM $table WHERE id = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
?>

<form method="POST">
    URL: <input type="text" name="url" value="<?= $row['url'] ?>" required><br>
    Creator Title: <input type="text" name="creator_title" value="<?= $row['creator_title'] ?? '' ?>"><br>
    Creator Image URL: <input type="text" name="creator_image" value="<?= $row['creator_image'] ?? '' ?>"><br>
    Description: <textarea name="description"><?= $row['description'] ?? '' ?></textarea><br>
    <button type="submit">Update</button>
</form>