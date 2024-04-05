<?php
// Include database connection
include 'Db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Get the submitted values
  $id = $_POST["id"]; // Assuming you have an ID field in your form

  // Prepare and bind the SELECT statement
  $stmt = $conn->prepare("SELECT * FROM conferencedetails WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Initialize an array to store the changed values
    $changedValues = [];

    // Loop through all the submitted fields
    foreach ($_POST as $key => $value) {
      // Skip the ID field
      if ($key == "id") {
        continue;
      }

      // Compare the new value with the previous value
      if ($value != $row[$key]) {
        // If different, add it to the array of changed values
        $changedValues[$key] = $value;
      }
    }

    // Check if any changes were detected
    if (!empty($changedValues)) {
      // Prepare the UPDATE statement
      $updateSql = "UPDATE conferencedetails SET ";
      foreach ($changedValues as $key => $value) {
        $updateSql .= "$key = ?, ";
      }
      // Remove the trailing comma and space
      $updateSql = rtrim($updateSql, ", ");
      $updateSql .= " WHERE id = ?";

      // Prepare and bind the UPDATE statement
      $stmt = $conn->prepare($updateSql);
      $types = str_repeat("s", count($changedValues)) . "i"; // Assuming all values are strings and ID is an integer
      $values = array_values($changedValues);
      $values[] = $id; // Append ID to the end of values array
      $stmt->bind_param($types, ...$values);
      $stmt->execute();

      if ($stmt->affected_rows > 0) {
        echo "Record updated successfully";
      } else {
        echo "No changes detected";
      }
    } else {
      echo "No changes detected";
    }
  } else {
    echo "No record found for the provided ID:", $_POST["id"];
  }
  $stmt->close(); // Close the statement
} else {
  echo "Invalid request method";
}

$conn->close(); // Close the database connection
?>