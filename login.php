<?php
include('Db.php');

$Email = $decodedData['Email'];
$PW = md5($decodedData['Password']); //password is hashed

$SQL = "SELECT * FROM user WHERE email = '$Email'";


$exeSQL = mysqli_query($conn, $SQL);
$checkEmail =  mysqli_num_rows($exeSQL);
//$Message = "Success";

if ($checkEmail != 0) {
  // $response = "";
  // $response = array();

  $arrayu = mysqli_fetch_array($exeSQL);
  if ($arrayu['PW'] != $PW) {
    $Message = "Password WRONG";
    $IsAdmin = "test";
  } else {
    $IsAdmin = $arrayu['isAdmin'];
    $Message = "Success";
  }
} else {
  $Message = "No account yet";
  $IsAdmin = "false";
}

$response[] = array("Message" => $Message, "IsAdmin" => $IsAdmin);
// print_r($response);
echo json_encode($response);
// echo json_encode($SQL);
