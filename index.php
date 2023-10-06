<?php
// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Headers: *");
// header('Access-Control-Allow-Origin: http://localhost:8000'); 
# 👇️ your domain below, e.g. http://localhost:3000
header("Access-Control-Allow-Origin: http://127.0.0.1:8000");
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
        $sql = "SELECT * FROM user";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
        break;
}

?>