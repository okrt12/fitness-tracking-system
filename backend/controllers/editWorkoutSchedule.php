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

// Read and decode JSON input
$data = json_decode(file_get_contents("php://input"), true);


if (
  !isset($data['schedule_id']) ||
  !isset($data['workout_id']) ||
  !isset($data['day_of_week']) ||
  !isset($data['time']) ||
  !isset($data['duration'])
) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Missing required fields']);
  exit;
}

$user_id = $_SESSION['user_id'];
$schedule_id = $data['schedule_id'];
$workout_id = $data['workout_id'];
$day_of_week = $data['day_of_week'];
$time = $data['time'];
$duration = $data['duration'];
$workout_day_name = $data['workout_day_name'];

try {
  $stmt = $pdo->prepare("
    UPDATE workout_schedules
    SET day_of_week = :day_of_week,
        time = :time,
        duration = :duration,
        workout_day_name = :workout_day_name
    WHERE schedule_id = :schedule_id AND user_id = :user_id");

  $stmt->execute([
    'workout_day_name' => $workout_day_name,
    'day_of_week' => $day_of_week,
    'time' => $time,
    'duration' => $duration,
    'schedule_id' => $schedule_id,
    'user_id' => $user_id
  ]);

  echo json_encode(['success' => true, 'message' => 'Schedule updated']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'DB Error: ' . $e->getMessage()]);
}
?>
