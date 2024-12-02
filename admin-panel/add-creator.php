<?php
session_start();
include 'partials/config.php';

// Check if the user is logged in (add this if you already have login logic)
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}
?>


<form action="partials/add.php" method="POST">
    <label for="table">Select Table:</label>
    <select name="table" id="table" required>
        <option value="instagram_creators">Instagram Creators</option>
        <option value="facebook_creators">Facebook Creators</option>
        <option value="youtube_creators">YouTube Creators</option>
        <option value="latest_uploads">Latest Uploads</option>
    </select>
    <br><br>

    <label for="url">URL:</label>
    <input type="text" name="url" id="url" required><br><br>

    <label for="creator_title">Creator Title:</label>
    <input type="text" name="creator_title" id="creator_title"><br><br>

    <label for="creator_image">Creator Image URL:</label>
    <input type="text" name="creator_image" id="creator_image"><br><br>

    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea><br><br>

    <button type="submit">Add Data</button>
    <a href="./">Go Back</a>
</form>