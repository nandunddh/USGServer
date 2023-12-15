<?php
// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Headers: *");
// header('Access-Control-Allow-Origin: http://localhost:8000'); 
# 👇️ your domain below, e.g. http://localhost:3000
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, PUT, PATCH, GET, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Api-Key, X-Requested-With, Content-Type, Accept, Authorization");


include("DataBase.php");

$conn = new DbConnect();
$db = $conn->connect();
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'POST':
        $user = json_decode(file_get_contents('php://input'));
        $sql = "INSERT INTO user(id, name, email, mobile, created_at) values(null, :name, :email, :mobile, :created_at)";
        $stmt = $db->prepare($sql);
        $date = date('Y-m-d');
        $stmt->bindParam(':name', $user->name);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':mobile', $user->mobile);
        $stmt->bindParam(':created_at', $date);
        if ($stmt->execute()) {
            $data = ['status' => 1, 'message' => "Record successfully created"];
        } else {
            $data = ['status' => 0, 'message' => "Failed to create record."];
        }
        echo json_encode($data);
        break;
    case 'GET':
        $sql = "SELECT * FROM notification";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($notifications as &$notification) {
            $imagePath = $notification['image'];

            if (file_exists($imagePath)) {
                $imageData = file_get_contents($imagePath);
                $imageBase64 = base64_encode($imageData);

                // Replace the "image" field with the base64-encoded image data
                $notification['image'] = $imageBase64;
            } else {
                // Handle the case where the image file is not found
                $notification['image'] = ''; // Or set to a default image
            }
        }

        // Output the JSON response
        echo json_encode($notifications);
        break;
        // case 'GET':
        //     $sql = "SELECT * FROM notification";
        //     $stmt = $db->prepare($sql);
        //     $stmt->execute();
        //     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     // header("Content-type: image/jpeg");
        //     echo json_encode($users);
        //     break;
}

// $imageId = $_GET['id']; // Replace with the ID of the image you want to retrieve
// $sql = "SELECT image_data FROM images WHERE id = $imageId";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();

//     // Set the appropriate content type header for the image
//     header("Content-type: image/jpeg"); // Change to the appropriate image format if needed

//     // Output the BLOB data as the image
//     echo $row['image_data'];
// } else {
//     echo "Image not found";
// }
