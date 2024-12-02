<?php
//session_start();
include 'partials/config.php';

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

// Fetch all records from all tables using UNION ALL
$query = "
    SELECT 'instagram_creators' AS source_table, id, url, creator_title, creator_image, description FROM instagram_creators
    UNION ALL
    SELECT 'facebook_creators' AS source_table, id, url, creator_title, creator_image, description FROM facebook_creators
    UNION ALL
    SELECT 'youtube_creators' AS source_table, id, url, creator_title, creator_image, description FROM youtube_creators
    UNION ALL
    SELECT 'latest_uploads' AS source_table, id, url, NULL AS creator_title, NULL AS creator_image, NULL AS description FROM latest_uploads
";
$result = mysqli_query($link, $query);

if (!$result) {
    die("Error fetching data: " . mysqli_error($link));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List All Creators</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>All Creators</h4>
            </div>
            <div class="col-md-6" style="text-align: end;">
                <a href="add-creator.php" class="btn btn-primary">Add New Creator</a>
            </div>
        </div>
    </div>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Table</th>
                <th>URL</th>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <?php static $i = 0;
                    $i++; ?>
                    <td><?= $i ?></td>
                    <td><?= ucfirst(str_replace('_', ' ', $row['source_table'])) ?></td>
                    <td><?= $row['url'] ?></td>
                    <td><?= $row['creator_title'] ?? '-' ?></td>
                    <td>
                        <?php if (!empty($row['creator_image'])): ?>
                            <img src="<?= $row['creator_image'] ?>" alt="Image" style="width: 50px; height: 50px;">
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td><?= $row['description'] ?? '-' ?></td>
                    <td>
                        <a href="partials/edit.php?table=<?= $row['source_table'] ?>&id=<?= $row['id'] ?>" class="btn btn-outline-primary">Edit</a>
                        <a href="partials/delete.php?table=<?= $row['source_table'] ?>&id=<?= $row['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>