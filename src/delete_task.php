<?php
require 'db.php';
require 'functions.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['token']) && isset($data['task_id'])) {
    $user_id = verifyToken($conn, $data['token']);
    if ($user_id) {
        $task_id = $data['task_id'];

        $stmt = $conn->prepare("DELETE FROM tasks WHERE id = :task_id AND user_id = :user_id");
        $stmt->bindParam(':task_id', $task_id);
        $stmt->bindParam(':user_id', $user_id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Task deleted successfully"]);
        } else {
            echo json_encode(["message" => "Failed to delete task"]);
        }
    } else {
        echo json_encode(["message" => "Invalid token"]);
    }
} else {
    echo json_encode(["message" => "Invalid input"]);
}
