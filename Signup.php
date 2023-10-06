<?php
include('db.php');

$Name = $decodedData['Name'];
$Email = $decodedData['Email'];
$PW = md5($decodedData['Password']); //password is hashed
$isAdmin = $decodedData['isAdmin'];

$SQL = "SELECT * FROM user WHERE email = '$Email'";
$exeSQL = mysqli_query($conn, $SQL);
$checkEmail =  mysqli_num_rows($exeSQL);

if ($checkEmail != 0) {
  $Message = "Already registered";
} else {

  $InsertQuerry = "INSERT INTO user(`name`, `email`,  `PW`, `isAdmin`) VALUES('$Name', '$Email', '$PW', '$isAdmin')";

  $R = mysqli_query($conn, $InsertQuerry);

  if ($R) {
    $Message = "Complete--!";
  } else {
    $Message = "Error";
  }
}
$response[] = array("Message" => $Message);

echo json_encode($response);
