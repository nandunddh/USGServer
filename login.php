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
    $User_Name = null;
  } else {
    $IsAdmin = $arrayu['isAdmin'];
    $Message = "Success";
    $User_Name = $arrayu['name'];
  }
} else {
  $Message = "No account yet";
  $IsAdmin = "false";
  $User_Name = null;
}

$response[] = array("Message" => $Message, "IsAdmin" => $IsAdmin, "User_Name" =>  $User_Name);
// print_r($response);
// echo $User_Name;
echo json_encode($response);
// echo json_encode($SQL);
