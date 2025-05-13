<?php
session_start();
require_once('../config/db.php');
header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'User not logged in']);
  exit;
}

// Read and decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Validate required fields
if (!isset($data['goal'])) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Missing goal field']);
  exit;
}

$user_id = $_SESSION['user_id'];
$goal = $data['goal'];

try {
  $stmt = $pdo->prepare("
    UPDATE users
    SET goal = :goal
    WHERE user_id = :user_id
  ");

  $stmt->execute([
    'goal' => $goal,
    'user_id' => $user_id
  ]);

  echo json_encode(['success' => true, 'message' => 'Goal updated successfully']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'DB Error: ' . $e->getMessage()]);
}
?>
