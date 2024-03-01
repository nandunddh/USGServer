<?php
include('Db.php');


if (isset($decodedData) && is_array($decodedData) && isset($decodedData['Email'])) {

  $Email = $decodedData['Email'];

  $expirationMinutes = 30;
  $expirationTimestamp = time() + ($expirationMinutes * 60);
  // $PW = md5($decodedData['Password']); //password is hashed

  function generateVerificationCode()
  {
    return sprintf('%06d', mt_rand(0, 999999));
  }

  $verificationCode = generateVerificationCode();

  $SQL = "SELECT * FROM user WHERE email = '$Email'";

  $exeSQL = mysqli_query($conn, $SQL);

  $checkEmail =  mysqli_num_rows($exeSQL);
  //$Message = "Success";

  if ($checkEmail != 0) {

    $InsertQuerry = "INSERT INTO password_reset (email, verification_code, expiration_timestamp) VALUES ('$Email', '$verificationCode', $expirationTimestamp)";

    $R = mysqli_query($conn, $InsertQuerry);

    error_log("Inserting data. SQL: $InsertQuerry");
    if ($R) {
      $Message_Password = "OTP sent successfully";
      $Message = "Success";
      $OTP = $verificationCode;
    } else {
      $Message_Password = "failed to Sent OTP, Please try again.";
      $Message = "Failed";
    }
  } else {
    $Message = "No account yet";
    $Message_Password = "No account yet";
    $OTP = "none";
  }
  $response[] = array("Message" => $Message, "Password" => $Message_Password, "OTP" => $OTP);
  echo json_encode($response);
} else if (isset($decodedData) && is_array($decodedData) && isset($decodedData['OTP'])) {

  $OTP = $decodedData['OTP'];

  $SQL = "SELECT * FROM password_reset WHERE verification_code = '$OTP' AND expiration_timestamp > " . time();

  $exeSQL = mysqli_query($conn, $SQL);

  $checkOTP =  mysqli_num_rows($exeSQL);

  if ($checkOTP != 0) {

    $arrayu = mysqli_fetch_array($exeSQL);
    if ($arrayu['verification_code'] == $OTP) {

      $Message = "Success";
      $Otp = "OTP Verified!";
    }
  } else {
    $Message = "Failed";
    $Password = "OTP verification Failed";
  }
  $response[] = array("Message" => $Message, "Password" => $Otp);
  echo json_encode($response);
} else if (isset($decodedData) && is_array($decodedData) && isset($decodedData['New_Password']) && isset($decodedData['email'])) {

  $New_Password = md5($decodedData['New_Password']);
  $Email = $decodedData['email'];

  $updateSql = "UPDATE user SET PW = '$New_Password' WHERE email = '$Email'";
  if ($conn->query($updateSql) === TRUE) {
    $deleteSql = "DELETE FROM password_reset WHERE email = '$Email'";
    $conn->query($deleteSql);
    $Message = "Password Reseted successfully";
    $Message_status = "Success";
  } else {
    $Message_status = "Failed";
    $Message = "Failed Reseting password";
  }
  $response[] = array("Message_status" => $Message_status);
  echo json_encode($response);
} else {
  error_log("Invalid or missing 'Email' in decoded data.");
  $response[] = array("Message" => "Failed");
}