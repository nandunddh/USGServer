<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, PUT, PATCH, GET, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Api-Key, X-Requested-With, Content-Type, Accept, Authorization");
include('Db.php');

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
// $Banner = $decodedData['Banner'];
// $Logo = $decodedData['Logo'];
$Token = $decodedData['Token'];

$InsertQuerry = "INSERT INTO conferencedetails(`id`, `name`, `email`, `phoneno`, `month`,  `dates`, `year`, `venu`, `url`, `hoteladdress`, `about`, `aboutshort`, `latitude`, `longitude`, `logo`, `banner`, `token` ) VALUES(null, '$Name', '$Email', '$PhoneNumber', '$Month', '$Dates', '$Year', '$Venu', '$Url', '$Hoteladdress', '$About', '$Aboutshort', '$Latitude', '$Longitude', null, null, '$Token')";

$R = mysqli_query($conn, $InsertQuerry);

if ($R) {
  $Message = "Created Success!";
} else {
  $Message = "Error in Creating";
}

$response[] = array("Message" => $Message, "data" => $InsertQuerry);
// print_r(json_encode($response));
echo json_encode($response);
