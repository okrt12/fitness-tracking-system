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

// Read JSON input from form submission
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Invalid input']);
  exit;
}

// Extract and sanitize input
$user_id = $_SESSION['user_id'];
$name = $data['name'] ?? null;
$category = $data['category'] ?? null;
$calories_per_hour = $data['calories_per_hour'] ?? null;
$workout_day_name = $data['workout_day_name'] ?? null;

try {
  // Insert into workouts table
  $stmt = $pdo->prepare("
    INSERT INTO workouts (user_id, name, workout_day_name, category, calories_per_hour)
    VALUES (:user_id, :name, :category, :workout_day_name, :calories_per_hour)
  ");
  
  $stmt->execute([
    'user_id' => $user_id,
    'name' => $name,
    'workout_day_name' => $workout_day_name,
    'category' => $category,
    'calories_per_hour' => $calories_per_hour
  ]);

  echo json_encode(['success' => true, 'message' => 'Workout added successfully']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>