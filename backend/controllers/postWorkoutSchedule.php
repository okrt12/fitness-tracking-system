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
$date = $data['schedule_date'] ?? null;
$workout_id = $data['workout_id'] ?? null;
$time = $data['schedule_time'] ?? null;
$duration = $data['schedule_duration'] ?? 30;
$weekly_repeat = isset($data['weekly_repeat']) ? 1 : 0;

try {
  // Insert into workout_schedule table
  $stmt = $pdo->prepare("
    INSERT INTO workout_schedule 
    (user_id, workout_id, date, time, duration, weekly_repeat)
    VALUES (:user_id, :workout_id, :date, :time, :duration, :weekly_repeat)
  ");
  
  $stmt->execute([
    'user_id' => $user_id,
    'workout_id' => $workout_id,
    'date' => $date,
    'time' => $time,
    'duration' => $duration,
    'weekly_repeat' => $weekly_repeat
  ]);

  // If weekly repeat is enabled, create additional records (optional)
  if ($weekly_repeat) {
    for ($i = 1; $i <= 4; $i++) { // Creates 4 future occurrences
      $next_date = date('Y-m-d', strtotime("+$i week", strtotime($date)));
      $stmt->execute([
        'user_id' => $user_id,
        'workout_id' => $workout_id,
        'date' => $next_date,
        'time' => $time,
        'duration' => $duration,
        'weekly_repeat' => $weekly_repeat
      ]);
    }
  }

  echo json_encode(['success' => true, 'message' => 'Workout scheduled successfully']);

} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>