<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $message = $_POST['message'];

    // Check if a file was uploaded
    if ($_FILES['image']['error'] === 0) {
        // Get image data
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        $imageData = $conn->real_escape_string($imageData);
        $imageMimeType = $_FILES['image']['type'];

        $insertSql = "INSERT INTO notification (`name`, `message`, `image`, image_mime, `time`, `date`) 
                      VALUES ('$name', '$message', '$imageData', '$imageMimeType', NOW(), NOW())";

        if ($conn->query($insertSql) === TRUE) {
            echo "Data uploaded successfully.";
        } else {
            echo "Error uploading data: " . $conn->error;
        }
    } else {
        echo "Error uploading image.";
    }
}

// Close the database connection
$conn->close();
