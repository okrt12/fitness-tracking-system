<?php
session_start();
require_once('../config/db.php');
header('Content-Type: application/json');

// Optional: Check admin or authorized user if needed
if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'User not logged in']);
  exit;
}

$data = json_decode(file_get_contents("php://input"), true);

$type = $data['type'] ?? '';
$content = trim($data['content'] ?? '');

if (!in_array($type, ['quote', 'fact']) || empty($content)) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Invalid input']);
  exit;
}

try {
  $stmt = $pdo->prepare("INSERT INTO motivational_content (type, content) VALUES (:type, :content)");
  $stmt->execute(['type' => $type, 'content' => $content]);

  echo json_encode(['success' => true, 'message' => 'Content added successfully']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
