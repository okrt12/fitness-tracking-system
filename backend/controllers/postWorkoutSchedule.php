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

if (!$data || !isset($data['day_of_week'], $data['workout_id'], $data['time'])) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Missing required fields']);
  exit;
}

$user_id = $_SESSION['user_id'];
$day_of_week = $data['day_of_week'];
$workout_id = $data['workout_id'];
$time = $data['time'];
$duration = $data['duration'] ?? 30;

try {
  $stmt = $pdo->prepare("
    INSERT INTO workout_schedules (user_id, day_of_week, workout_id, time, duration)
    VALUES (:user_id, :day_of_week, :workout_id, :time, :duration)
    ON DUPLICATE KEY UPDATE
      workout_id = VALUES(workout_id),
      time = VALUES(time),
      duration = VALUES(duration)
  ");

  $stmt->execute([
    'user_id' => $user_id,
    'day_of_week' => $day_of_week,
    'workout_id' => $workout_id,
    'time' => $time,
    'duration' => $duration
  ]);

  echo json_encode(['success' => true, 'message' => 'Workout schedule saved']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'DB Error: ' . $e->getMessage()]);
}
?>
