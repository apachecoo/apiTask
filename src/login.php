<?php
require 'db.php';
require 'functions.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['username']) && isset($data['password'])) {
    $username = $data['username'];
    $password = $data['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $token = generateToken();
        $updateStmt = $conn->prepare("UPDATE users SET token = :token WHERE id = :id");
        $updateStmt->bindParam(':token', $token);
        $updateStmt->bindParam(':id', $user['id']);
        $updateStmt->execute();

        echo json_encode(["message" => "Login successful", "token" => $token]);
    } else {
        echo json_encode(["message" => "Invalid username or password"]);
    }
} else {
    echo json_encode(["message" => "Invalid input"]);
}
