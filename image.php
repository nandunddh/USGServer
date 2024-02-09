<?php
include('db.php');

// Check if a file was uploaded
if (isset($_FILES['image'])) {
    $uploadDirectory = 'uploads/';

    // Get the file details
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    // Move the uploaded file to the desired directory
    $destination = $uploadDirectory . $fileName;
    move_uploaded_file($fileTmpName, $destination);

    // Check if the file was uploaded successfully
    if ($fileError === UPLOAD_ERR_OK) {
        echo json_encode(['status' => 'success', 'message' => 'Image uploaded successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to upload image']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No file uploaded']);
}

?>

