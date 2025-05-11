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
if (!$data) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Invalid input']);
  exit;
}

$user_id = $_SESSION['user_id'];
$workout_id = $data['workout_id'] ?? null;
$duration = $data['duration'] ?? null;
$calories_burned = $data['calories_burned'] ?? null;
$workout_day_name = trim($data['workout_day_name'] ?? '');
$date = date('Y-m-d');

if (!$workout_id || !is_numeric($duration) || !is_numeric($calories_burned) || !$workout_day_name) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Missing or invalid form fields']);
  exit;
}

try {
  $stmt = $pdo->prepare("INSERT INTO workout_log (user_id, workout_id, workout_day_name, date, duration, calories_burned)
                         VALUES (:user_id, :workout_id, :workout_day_name, :date, :duration, :calories_burned)");
  $stmt->execute([
    'user_id' => $user_id,
    'workout_id' => $workout_id,
    'workout_day_name' => $workout_day_name,
    'date' => $date,
    'duration' => $duration,
    'calories_burned' => $calories_burned
  ]);

  checkWorkoutAchievements($pdo, $user_id);

  echo json_encode(['success' => true, 'message' => 'Workout logged successfully']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Server error: ' . $e->getMessage()]);
}

// 🏆 Workout Achievement Check Function
function checkWorkoutAchievements($pdo, $user_id) {
  $achievements = [];

  // First Workout
  $stmt = $pdo->prepare("SELECT COUNT(*) FROM workout_log WHERE user_id = ?");
  $stmt->execute([$user_id]);
  $total = $stmt->fetchColumn();
  if ($total >= 1) $achievements[] = 1;
  if ($total >= 10) $achievements[] = 2;

  // Weekly Warrior: logged workout every day for last 7 days
  $stmt = $pdo->prepare("
    SELECT COUNT(DISTINCT date) FROM workout_log
    WHERE user_id = ? AND date >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
  ");
  $stmt->execute([$user_id]);
  $days = $stmt->fetchColumn();
  if ($days >= 7) $achievements[] = 3;

  foreach ($achievements as $achievement_id) {
    $stmt = $pdo->prepare("
      INSERT INTO user_achievements (user_id, achievement_id, achieved_at)
      VALUES (?, ?, NOW())
      ON DUPLICATE KEY UPDATE achieved_at = NOW()
    ");
    $stmt->execute([$user_id, $achievement_id]);
  }
}
?>
