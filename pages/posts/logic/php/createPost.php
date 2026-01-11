<?php 

require "../../../../config/database.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Content-Type: application/json");

    $data = json_decode(file_get_contents("php://input"), true);

    if(!$data) {
        echo json_encode(["success" => false, "message" => "Invalid JSON input"]);
        exit;
    }

    $postName = trim($data["postNameValue"] ?? "");
    $postMessage = trim($data["postMessageValue"] ?? "");

    if(strlen($postName) < 8) { 
        echo json_encode(["success" => false, "message" => "Post name must be longer than 8 symbols"]);
        exit;
    }

    if(strlen($postMessage) < 20) {
        echo json_encode(["success" => false, "message" => "Post message must be longer than 20 symbols"]);
        exit;
    }

    if(!isset($_COOKIE["username"])) {
        echo json_encode(["success" => false, "message" => "You need to be logged in."]);
        exit;
    }

    $username = $_COOKIE["username"];
    $currentDate = date("d-m-Y");
    $currentTime = date("H:i");

    $stmt = $conn->prepare("INSERT INTO posts (username, name, message, date, time) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo json_encode(["success" => false, "message" => "Database prepare failed: " . $conn->error]);
        exit;
    }
    $stmt->bind_param("sssss", $username, $postName, $postMessage, $currentDate, $currentTime);
    if($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Created post successfully!"]);
        exit;
    } else {
        echo json_encode(["success" => false, "message" => "Post creation failed: " . $stmt->error]);
        exit;
    }
    $stmt->close();
    $conn->close();
}

?>