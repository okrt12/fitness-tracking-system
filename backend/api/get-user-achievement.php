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

$user_id = $_SESSION['user_id'];

try {
  $stmt = $pdo->prepare("
    SELECT a.achievement_id, a.title, a.description, a.type, ua.achieved_at
    FROM user_achievements ua
    JOIN achievements a ON ua.achievement_id = a.achievement_id
    WHERE ua.user_id = :user_id
    ORDER BY ua.achieved_at DESC
  ");
  $stmt->execute(['user_id' => $user_id]);
  $achievements = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'achievements' => $achievements]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
