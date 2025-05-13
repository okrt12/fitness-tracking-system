<?php
session_start();
require_once('../config/db.php'); // make sure the path is correct

if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'User not logged in']);
  exit;
}

$user_id = $_SESSION['user_id'];

try {
  $stmt = $pdo->prepare("SELECT name, age, gender, height, weight, bmi, goal_weight, goal, disease FROM users WHERE user_id = :user_id");
  $stmt->execute(['user_id' => $user_id]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  echo json_encode($user);
} catch (PDOException $e) {
  echo json_encode(['success' => false, 'message' => 'Query failed: ' . $e->getMessage()]);
}
?>
