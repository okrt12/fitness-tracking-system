<?php
session_start();
require_once('../config/db.php');

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'User not logged in']);
  exit;
}

$user_id = $_SESSION['user_id'];

try {
  // Sort by latest inserted (most recent first)
  $stmt = $pdo->prepare("
    SELECT * FROM user_progress 
    WHERE user_id = :user_id 
    ORDER BY progress_id DESC
  ");
  $stmt->execute(['user_id' => $user_id]);
  $progressData = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $progressData]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
