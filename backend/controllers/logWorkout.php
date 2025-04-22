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
$workout_id = $data['workout_id'] ?? null;
$duration = $data['duration'] ?? null;
$date = $data['date'] ?? date('Y-m-d');
$calories_burned = $data['calories_burned'] ?? null;

try {
  // Insert into workout_log table
  $stmt = $pdo->prepare("
    INSERT INTO workout_log (user_id, workout_id, date, duration, calories_burned)
    VALUES (:user_id, :workout_id, :date, :duration, :calories_burned)
  ");
  
  $stmt->execute([
    'user_id' => $user_id,
    'workout_id' => $workout_id,
    'date' => $date,
    'duration' => $duration,
    'calories_burned' => $calories_burned
  ]);

  echo json_encode(['success' => true, 'message' => 'Workout logged successfully']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>