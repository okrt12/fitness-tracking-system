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
  $stmt = $pdo->prepare("
    SELECT schedule_id, workout_id, day_of_week, duration, time, workout_day_name 
    FROM workout_schedules
    WHERE user_id = :user_id
    ORDER BY FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), time
  ");
  $stmt->execute(['user_id' => $user_id]);
  $schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $schedules]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'DB Error: ' . $e->getMessage()]);
}
?>
