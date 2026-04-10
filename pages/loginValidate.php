<?php
include('../backend/database.php');
header('Content-Type: application/json');

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

if (empty($username) || empty($password)) {
    echo json_encode(["status" => "error", "message" => "Empty credentials"]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    if ($password === $user['password']) {
        echo json_encode([
            "status" => "success",
            "message" => "Login successful",
            "user" => [
                "username" => $user['username']
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid password"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "User not found"]);
}

$stmt->close();
$conn->close();
?>