<?php
include('Db.php');

// Sanitize and validate input
$Email = isset($decodedData['Email']) ? mysqli_real_escape_string($conn, $decodedData['Email']) : '';
$Name = isset($decodedData['Name']) ? mysqli_real_escape_string($conn, $decodedData['Name']) : '';
$MobileNumber = isset($decodedData['Mobilenumber']) ? mysqli_real_escape_string($conn, $decodedData['Mobilenumber']) : '';
$Location = isset($decodedData['Location']) ? mysqli_real_escape_string($conn, $decodedData['Location']) : '';
$Image = isset($decodedData['Image']) ? mysqli_real_escape_string($conn, $decodedData['Image']) : '';

if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $Message = "Invalid email format";
    $response[] = array("Message" => $Message);
    echo json_encode($response);
    exit;
}

$data = array();

// Check if email exists in the database
$checkEmailQuery = "SELECT * FROM user WHERE email = '$Email'";
$checkEmailResult = $conn->query($checkEmailQuery);

if ($checkEmailResult->num_rows > 0) {
    // Update user data
    $updateSql = "UPDATE user SET `mobilenumber` = '$MobileNumber', `location` = '$Location', `name` = '$Name', `profile` = '$Image' WHERE email = '$Email'";

    if ($conn->query($updateSql) === TRUE) {

        $SQL = "SELECT * FROM user WHERE email = '$Email'";

        $result = $conn->query($SQL);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $Message = "Success";
        } else {
            $Message = "No Data Found!";
        }

        $Message = "Success";
    } else {
        $Message = "Update Failed!";
    }
} else {
    $Message = "User not found";
}

$response[] = array("Message" => $Message, "Data" => $data);
echo json_encode($response);
