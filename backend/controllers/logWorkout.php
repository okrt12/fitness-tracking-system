<?php
session_start();
require_once('../config/db.php');
require_once('check_workout_achievements.php');

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

  $achievements = checkWorkoutAchievements($pdo, $user_id);

  echo json_encode(['success' => true, 'message' => 'Workout logged successfully', 'achievements' => $achievements]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Server error while logging workout']);
}


function checkWorkoutAchievements($pdo, $user_id) {
  $achievements = [];

  $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM workout_log WHERE user_id = ?");
  $stmt->execute([$user_id]);
  $count = $stmt->fetch()['count'];

  if ($count >= 1) {
    $achievements[] = ['code' => 'workout_1', 'description' => 'First Workout Logged 🏋️‍♂️'];
  }
  if ($count >= 10) {
    $achievements[] = ['code' => 'workout_10', 'description' => '10 Workouts Logged 💪'];
  }

  foreach ($achievements as $ach) {
    $stmt = $pdo->prepare("INSERT IGNORE INTO user_achievements (user_id, achievement_code, date_awarded)
                           VALUES (?, ?, NOW())");
    $stmt->execute([$user_id, $ach['code']]);
  }

  return $achievements;
}

// ------------------------------
// Similarly structure meal_log.php and user_progress.php
// Including checkMealAchievements($pdo, $user_id)
// and checkProgressAchievements($pdo, $user_id) respectively
