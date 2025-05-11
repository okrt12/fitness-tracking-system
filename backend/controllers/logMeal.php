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
$meal_id = $data['meal_id'] ?? null;
$quantity = $data['quantity'] ?? null;
$calories = $data['calories'] ?? null;
$date = $data['date'] ?? date('Y-m-d'); // fallback to today if not provided

try {
  // Insert meal log
  $stmt = $pdo->prepare("
    INSERT INTO meal_log (user_id, meal_id, date, quantity, calories)
    VALUES (:user_id, :meal_id, :date, :quantity, :calories)
  ");
  $stmt->execute([
    'user_id' => $user_id,
    'meal_id' => $meal_id,
    'date' => $date,
    'quantity' => $quantity,
    'calories' => $calories
  ]);

  checkMealAchievements($pdo, $user_id);

  echo json_encode(['success' => true, 'message' => 'Meal logged successfully']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}

// 🏆 Meal Achievement Logic
function checkMealAchievements($pdo, $user_id) {
  $achievements = [];

  // 10 - First Meal Log
  $stmt = $pdo->prepare("SELECT COUNT(*) FROM meal_log WHERE user_id = ?");
  $stmt->execute([$user_id]);
  $totalMeals = $stmt->fetchColumn();
  if ($totalMeals >= 1) $achievements[] = 10;

  // 11 - 7-Day Nutrition Streak (meals logged every day in past 7 days)
  $stmt = $pdo->prepare("
    SELECT COUNT(DISTINCT date) FROM meal_log
    WHERE user_id = ? AND date >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
  ");
  $stmt->execute([$user_id]);
  $days = $stmt->fetchColumn();
  if ($days >= 7) $achievements[] = 11;

  // 12 - Calorie Master (5 days in last 7 where total calories <= 2000)
  $stmt = $pdo->prepare("
    SELECT COUNT(*) FROM (
      SELECT date, SUM(calories) as daily_calories
      FROM meal_log
      WHERE user_id = ? AND date >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
      GROUP BY date
      HAVING daily_calories <= 2000
    ) AS daily_within_goal
  ");
  $stmt->execute([$user_id]);
  $good_days = $stmt->fetchColumn();
  if ($good_days >= 5) $achievements[] = 12;

  // Save achievements (avoid duplicates)
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
