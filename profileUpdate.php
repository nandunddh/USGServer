<?php
header('Content-Type: application/json');

if ($_FILES['new_image']) {
  $file = $_FILES['new_image'];

  // Specify the target folder on your local system
  $targetFolder = 'uploads/user_profile/';

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


if ($_POST['old_image']) {
  $oldImagePath = $_POST['old_image'];
  $targetFolder = 'uploads/user_profile/';
  $targetPath = $targetFolder . $oldImagePath;

  if (!empty($targetPath)) {
    if (file_exists($targetPath)) {
      unlink($targetPath); // Delete the old image
    } 
  } else {
  }
}