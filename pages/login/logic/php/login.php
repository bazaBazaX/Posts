<?php 
    header("Content-Type: application/json");
    session_start();
    require "../../../../config/database.php";

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $data = json_decode(file_get_contents("php://input"), true);

        if(!$data) {
            echo json_encode(["success" => false, "message" => "Invalid JSON input"]);
            exit;
        }
 
        $login = trim($data["login"]);
        $password = trim($data["password"]);
        $ifSaving = $data["ifSaving"] ?? false;

        if(strlen($password) < 8 || strlen($login) < 8 || $password === "" || $login === "") {
            echo json_encode(["success" => false, "message" => 'Password entry rules are broken.']);
            exit;
        }

        $stmt = $conn->prepare("SELECT id, login, password FROM users WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if(!$user) {
            echo json_encode(["success" => false, "message" => "No user with that login is found."]);
            exit;
        }

        if(password_verify($password, $user["password"])) {
            if($ifSaving == true) {
                session_regenerate_id(true);
                $_SESSION["user-id"] = $user["id"];
                setcookie("username", $user["login"], time() + 30*86400, "/");
            } else {
                setcookie("username", $user["login"], 0, "/");
            }
            echo json_encode(["success" => true, "message" => "Logined successful!"]);
            exit;
        } else {
            echo json_encode(["success" => false, "message" => "Wrong password."]);
            exit;
        }
    }
?>