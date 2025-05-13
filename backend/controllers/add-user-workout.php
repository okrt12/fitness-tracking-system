<?php
session_start();
require_once('../config/db.php');
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'User not logged in']);
  exit;
}

$data = json_decode(file_get_contents("php://input"), true);

$name = trim($data['name'] ?? '');
$category = trim($data['category'] ?? '');
$calories_per_hour = $data['calories_per_hour'] ?? null;
$user_id = $_SESSION['user_id'];

if (!$name || !$category || !is_numeric($calories_per_hour)) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Invalid input']);
  exit;
}

try {
  // Check conflict with global workouts
  $globalCheck = $pdo->prepare("
    SELECT 1 FROM workout
    WHERE name = :name AND category = :category
    LIMIT 1
  ");
  $globalCheck->execute(['name' => $name, 'category' => $category]);
  if ($globalCheck->fetch()) {
    http_response_code(409);
    echo json_encode(['success' => false, 'message' => 'This workout already exists globally']);
    exit;
  }

  // Check conflict with user's own workouts
  $userCheck = $pdo->prepare("
    SELECT 1 FROM user_workout
    WHERE user_id = :user_id AND name = :name AND category = :category
    LIMIT 1
  ");
  $userCheck->execute([
    'user_id' => $user_id,
    'name' => $name,
    'category' => $category
  ]);
  if ($userCheck->fetch()) {
    http_response_code(409);
    echo json_encode(['success' => false, 'message' => 'You have already added this workout']);
    exit;
  }

  // Safe to insert
  $stmt = $pdo->prepare("
    INSERT INTO user_workout (user_id, name, category, calories_per_hour)
    VALUES (:user_id, :name, :category, :calories_per_hour)
  ");
  $stmt->execute([
    'user_id' => $user_id,
    'name' => $name,
    'category' => $category,
    'calories_per_hour' => $calories_per_hour
  ]);

  echo json_encode(['success' => true, 'message' => 'Custom workout added']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'DB error: ' . $e->getMessage()]);
}
