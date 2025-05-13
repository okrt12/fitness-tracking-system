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
  // Get global workouts
  $global = $pdo->query("
    SELECT workout_id, name, category, calories_per_hour, 'global' AS source
    FROM workout
  ")->fetchAll(PDO::FETCH_ASSOC);

  // Get user workouts
  $stmt = $pdo->prepare("
    SELECT workout_id, name, category, calories_per_hour, 'custom' AS source
    FROM user_workout
    WHERE user_id = :user_id
  ");
  $stmt->execute(['user_id' => $user_id]);
  $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $allWorkouts = array_merge($global, $user);

  echo json_encode(['success' => true, 'data' => $allWorkouts]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'DB error: ' . $e->getMessage()]);
}
