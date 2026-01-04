<?php 
    session_start();
    require $_SERVER["DOCUMENT_ROOT"]."/config/database.php";

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        header("Content-Type: application/json");

        $data = json_decode(file_get_contents("php://input"), true);

        $login = trim($data["login"]);
        $password = trim($data["password"]);
        $ifSaving = $data["ifSaving"];

        if(strlen($password) < 8 || strlen($login) < 8 || $password === "" || $login === "") {
            echo json_encode(["success" => false, "message" => 'Password entry rules are broken.']);
            exit;
        }

        $stmt = $conn->prepare("SELECT id, password FROM users WHERE login = ?");
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
            }
            echo json_encode(["success" => true, "message" => "Logined successful!"]);
            exit;
        } else {
            echo json_encode(["success" => false, "message" => "Wrong password."]);
            exit;
        }
    }
?>