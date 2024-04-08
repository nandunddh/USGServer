<?php
include('Db.php');

$Name = $decodedData['Name'];
$Email = $decodedData['Email'];
$PW = md5($decodedData['Password']); //password is hashed
$isAdmin = $decodedData['isAdmin'];
$token = $decodedData['token'];
$mobilenumber = $decodedData['mobilenumber'];
$location = $decodedData['Location'];
$profile = $decodedData['Profile_path'];

$SQL = "SELECT * FROM user WHERE email = '$Email'";
$exeSQL = mysqli_query($conn, $SQL);
$checkEmail =  mysqli_num_rows($exeSQL);

if ($checkEmail != 0) {
  $Message = "Already registered";
} else {

  $InsertQuerry = "INSERT INTO user(`name`, `email`,  `PW`, `isAdmin`, `mobilenumber`, `location`, `profile`, `device_tokens`) VALUES('$Name', '$Email', '$PW', '$isAdmin', '$mobilenumber', '$location', '$profile', '$token')";

  $R = mysqli_query($conn, $InsertQuerry);

  if ($R) {
    $Message = "Sign Up Success!";
  } else {
    $Message = "Kindly Try again after some time.";
  }
}
$response[] = array("Message" => $Message);

echo json_encode($response);
