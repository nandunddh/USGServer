<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, PUT, PATCH, GET, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Api-Key, X-Requested-With, Content-Type, Accept, Authorization");
include 'Db.php';

$sql = "SELECT * FROM conferencedetails";
$result = $conn->query($sql);
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $Message = "Success";
}
else{
    $Message = "No Data Found!";
}
$response[] = array("Message" => $Message, "data" => $data);

echo json_encode($response);

$conn->close();
