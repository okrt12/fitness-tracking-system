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

if (!isset($data['day_of_week'])) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Day of week required']);
  exit;
}

$user_id = $_SESSION['user_id'];
$day_of_week = $data['day_of_week'];

try {
  $stmt = $pdo->prepare("DELETE FROM workout_schedule WHERE user_id = :user_id AND day_of_week = :day_of_week");
  $stmt->execute(['user_id' => $user_id, 'day_of_week' => $day_of_week]);

  echo json_encode(['success' => true, 'message' => 'Schedule deleted']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'DB Error: ' . $e->getMessage()]);
}
?>
