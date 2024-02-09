<?php
header('Access-Control-Allow-Origin: *');
include('Db.php');

$target_path = "uploads/";


$target_path = $target_path . basename($_FILES['file']['name']);

if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
  header('Content-type: application/json');

  $fileName = $_FILES['file']['name'];
  $filePath = $target_path;

  // Perform SQL insertion
  $sql = "INSERT INTO images (id, image_data, image_path) VALUES (null,'$fileName', '$filePath')";

  if ($conn->query($sql) === TRUE) {
    $Response[] = array('Success' => true, 'Message' => 'Upload success');
  } else {
    $Response[] = array('Success' => false, 'Message' => 'Error inserting data into the database');
  }
  echo json_encode($Response);
} else {
  header('Content-type: application/json');
  $Response[] = array('Success' => false, 'Message' => 'There was an error uploading the file, please try again!');
  echo json_encode($Response);
}
