<?php
require 'db.php';
require 'functions.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['token']) && isset($data['title'])) {
    $user_id = verifyToken($conn, $data['token']);
    if ($user_id) {
        $title = $data['title'];
        $description = isset($data['description']) ? $data['description'] : '';

        $stmt = $conn->prepare("INSERT INTO tasks (user_id, title, description) VALUES (:user_id, :title, :description)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Task added successfully"]);
        } else {
            echo json_encode(["message" => "Failed to add task"]);
        }
    } else {
        echo json_encode(["message" => "Invalid token"]);
    }
} else {
    echo json_encode(["message" => "Invalid input"]);
}
