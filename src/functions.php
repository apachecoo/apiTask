<?php
function generateToken($length = 64) {
    return bin2hex(random_bytes($length / 2));
}

function verifyToken($conn, $token) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE token = :token");
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ? $user['id'] : false;
}
?>
