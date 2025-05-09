<?php
session_start();
require_once('../config/db.php');
header('Content-Type: application/json');

// 1. Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'User not logged in']);
  exit;
}

// 2. Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Invalid input']);
  exit;
}

// 3. Extract and validate form data
$user_id = $_SESSION['user_id'];
$workout_id = $data['workout_id'] ?? null;
$duration = $data['duration'] ?? null;
$calories_burned = $data['calories_burned'] ?? null;
$workout_day_name = trim($data['workout_day_name'] ?? '');
$date = date('Y-m-d');

if (
  !$workout_id ||
  !is_numeric($duration) ||
  !is_numeric($calories_burned) ||
  !$workout_day_name
) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Missing or invalid form fields']);
  exit;
}

try {
  // 4. Insert workout log into database
  $stmt = $pdo->prepare("
    INSERT INTO workout_log (user_id, workout_id, workout_day_name, date, duration, calories_burned)
    VALUES (:user_id, :workout_id, :workout_day_name, :date, :duration, :calories_burned)
  ");
  $stmt->execute([
    'user_id' => $user_id,
    'workout_id' => $workout_id,
    'workout_day_name' => $workout_day_name,
    'date' => $date,
    'duration' => $duration,
    'calories_burned' => $calories_burned
  ]);

  echo json_encode(['success' => true, 'message' => 'Workout logged successfully']);
} catch (PDOException $e) {
  http_response_code(500);
  error_log("DB error: " . $e->getMessage());
  echo json_encode(['success' => false, 'message' => 'Server error while logging workout']);
}
