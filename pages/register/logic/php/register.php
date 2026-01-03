<?php
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "/config/database.php";

    if($_SERVER["REQUEST_METHOD"] !== "POST") {
        http_response_code(405);
        exit;
    }

    header("Content-Type: application/json");

    //reading json

    $data = json_decode(file_get_contents("php://input"), true);

    $login = trim($data["login"] ?? "");
    $email = trim($data["email"] ?? "");
    $password = trim($data["password"] ?? "");

    //making fail function

    function fail($message) {
        echo json_encode([
            "success" => false,
            "message" => $message
        ]);
        exit;
    }

    //checking if its ok

    if($login === "" || $password === "" || $email === "") {
        fail('All fields are required');
    }

    if(strlen($login) < 8 || strlen($password) < 8) {
        fail("Password and login must be more than 8 symbols");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        fail("Invalid email address");
    }

    //checking user in db

    $stmt = $conn->prepare("SELECT id FROM users WHERE login = ? OR email = ?");
    $stmt->bind_param("ss", $login, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $stmt->close();
        fail("Login or email already exists");
    }
    $stmt->close();

    //inserting in db

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn -> prepare("INSERT INTO users (login, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $login, $email, $hashedPassword);
    if($stmt->execute()) {
        session_regenerate_id(true);
        $_SESSION["user-id"] = $stmt->insert_id;
        
        echo json_encode([
            "success" => true,
            "message" => "Registerred"
        ]);
        exit;
    } else {
        fail("Registration failed");
    }
    $stmt->close();
    $conn->close();
?>