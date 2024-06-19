<?php
require 'db.php';
require 'functions.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['token'])) {
    $user_id = verifyToken($conn, $data['token']);
    if ($user_id) {
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($tasks);
    } else {
        echo json_encode(["message" => "Invalid token"]);
    }
} else {
    echo json_encode(["message" => "Invalid input"]);
}
?>
