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

if (!isset($data['schedule_id'])) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Schedule ID is required']);
  exit;
}

$user_id = $_SESSION['user_id'];
$schedule_id = $data['schedule_id'];

try {
  // Instead of deleting, mark the schedule as "No Workout"
  $stmt = $pdo->prepare("
    UPDATE workout_schedules
    SET workout_day_name = 'No Workout',
        duration = 0
    WHERE user_id = :user_id AND schedule_id = :schedule_id
  ");

  $stmt->execute(['user_id' => $user_id, 'schedule_id' => $schedule_id]);

  echo json_encode(['success' => true, 'message' => 'Schedule marked as No Workout']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'DB Error: ' . $e->getMessage()]);
}
?>
