<?php

include 'Db.php';

// Assuming $decodedData is defined somewhere before this point
$Token = $decodedData['token'];
$Email = $decodedData['email'];

// Check if email exists in the database
$checkEmailQuery = "SELECT * FROM user WHERE email = '$Email'";
$checkEmailResult = $conn->query($checkEmailQuery);

if ($checkEmailResult->num_rows > 0) {
    // Update user data
    $updateSql = "UPDATE user SET `token` = '$Token' WHERE email = '$Email'";

    if ($conn->query($updateSql) === TRUE) {

        $SQL = "SELECT * FROM user";

        $result = $conn->query($SQL);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row['token'];
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
