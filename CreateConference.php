<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, PUT, PATCH, GET, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Api-Key, X-Requested-With, Content-Type, Accept, Authorization");
include('Db.php');


// Retrieve and decode JSON data from the request
$jsonData = file_get_contents("php://input");
$decodedData = json_decode($jsonData, true);

// Check if decoding was successful
if (!$decodedData) {
  header('Content-type: application/json');
  $response = ['success' => false, 'message' => 'Invalid JSON data'];
  echo json_encode($response);
  exit;
}

$Name = $decodedData['Name'];
$Email = $decodedData['Email'];
$PhoneNumber = $decodedData['PhoneNumber'];
$Month = $decodedData['Month'];
$Dates = $decodedData['Dates'];
$Year = $decodedData['Year'];
$Venu = $decodedData['Venu'];
$Url = $decodedData['Url'];
$Hoteladdress = $decodedData['Hoteladdress'];
$About = $decodedData['About'];
$Aboutshort = $decodedData['Aboutshort'];
$Latitude = $decodedData['Latitude'];
$Longitude = $decodedData['Longitude'];
$Logo = $decodedData['Logo'];
$Token = "Token";

// Use prepared statements to prevent SQL injection
$InsertQuerry = "INSERT INTO conferencedetails (`id`, `name`, `email`, `phoneno`, `month`, `dates`, `year`, `venu`, `url`, `hoteladdress`, `about`, `aboutshort`, `latitude`, `longitude`, `logo`, `banner`, `token` ) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, null, ?)";

$stmt = mysqli_prepare($conn, $InsertQuerry);

mysqli_stmt_bind_param(
  $stmt,
  "sssssssssssssss",
  $Name,
  $Email,
  $PhoneNumber,
  $Month,
  $Dates,
  $Year,
  $Venu,
  $Url,
  $Hoteladdress,
  $About,
  $Aboutshort,
  $Latitude,
  $Longitude,
  $Logo,
  $Token
);

// Execute the statement
$success = mysqli_stmt_execute($stmt);


if ($success) {
  $Message = "Created Success!";
} else {
  $Message = "Error in Creating";
}


$response[] = array("Message" => $Message, "data" => $InsertQuerry);
// print_r(json_encode($response));
echo json_encode($response);
// } else {
//   header('Content-type: application/json');
//   $response = ['success' => false, 'message' => 'There was an error uploading the file, please try again!'];
//   echo json_encode($response);
// }
