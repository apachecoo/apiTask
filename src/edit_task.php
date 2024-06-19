<?php
require 'db.php';
require 'functions.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['token']) && isset($data['task_id']) && isset($data['title'])) {
    $user_id = verifyToken($conn, $data['token']);
    if ($user_id) {
        $task_id = $data['task_id'];
        $title = $data['title'];
        $description = isset($data['description']) ? $data['description'] : '';

        $stmt = $conn->prepare("UPDATE tasks SET title = :title, description = :description WHERE id = :task_id AND user_id = :user_id");
        $stmt->bindParam(':task_id', $task_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Task updated successfully"]);
        } else {
            echo json_encode(["message" => "Failed to update task"]);
        }
    } else {
        echo json_encode(["message" => "Invalid token"]);
    }
} else {
    echo json_encode(["message" => "Invalid input"]);
}
