<?php
include('Db.php');

$SQL = "ALTER TABLE user
        ADD COLUMN device_tokens varchar(255) NOT NULL";

$exeSQL = mysqli_query($conn, $SQL);

if ($exeSQL) {
    echo "Table altered successfully.";
} else {
    echo "Error altering table: " . mysqli_error($conn);
}
?>
