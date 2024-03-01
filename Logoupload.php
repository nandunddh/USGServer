<?php
header('Content-Type: application/json');

// Check if a file was uploaded
if ($_FILES['image']) {
    $file = $_FILES['image'];
    
    // Specify the target folder on your local system
    $targetFolder = 'uploads/logos/';
    
    // Create a unique filename (you may want to implement a more robust method)
    $fileName = $file['name'];

    // Full path to save the file
    $targetPath = $targetFolder . $fileName;

    // Move the uploaded file to the specified folder
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        echo json_encode(['success' => true, 'message' => 'File uploaded successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error uploading file']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No file uploaded']);
}
?>
