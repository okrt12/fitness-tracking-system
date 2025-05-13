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
$date = $data['date'] ?? date('Y-m-d');
$weight = $data['weight'] ?? null;
$bmi = $data['bmi'] ?? null;
$systolic = $data['systolic'] ?? null;
$diastolic = $data['diastolic'] ?? null;
$sugar_level = $data['sugar_level'] ?? null;

try {
  $stmt = $pdo->prepare("INSERT INTO user_progress (user_id, weight, bmi, systolic, diastolic, sugar_level)
                         VALUES (:user_id, :weight, :bmi, :systolic, :diastolic, :sugar_level)");
  $stmt->execute([
    'user_id' => $user_id,
    'weight' => $weight,
    'bmi' => $bmi,
    'systolic' => $systolic,
    'diastolic' => $diastolic,
    'sugar_level' => $sugar_level
  ]);

  $updateStmt = $pdo->prepare("UPDATE users SET weight = :weight, bmi = :bmi WHERE user_id = :user_id");
  $updateStmt->execute([
    'weight' => $weight,
    'bmi' => $bmi,
    'user_id' => $user_id
  ]);

  checkProgressAchievements($pdo, $user_id);

  echo json_encode([
    'success' => true,
    'message' => 'Progress logged successfully'
  ]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}

function checkProgressAchievements($pdo, $user_id) {
  $achievements = [];

  $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM user_progress WHERE user_id = ?");
  $stmt->execute([$user_id]);
  $count = $stmt->fetch()['count'];

  if ($count >= 1) {
    $achievements[] = 6; // First Weigh-In
  }

  $stmt = $pdo->prepare("SELECT weight FROM user_progress WHERE user_id = ? ORDER BY progress_id ASC");
  $stmt->execute([$user_id]);
  $weights = $stmt->fetchAll(PDO::FETCH_COLUMN);

  if (count($weights) >= 2) {
    $start_weight = $weights[0];
    $current_weight = end($weights);

    if ($start_weight - $current_weight >= 2) {
      $achievements[] = 7; // Weight Loss - 2kg
    }

    if ($current_weight - $start_weight >= 2) {
      $achievements[] = 8; // Weight Gain - 2kg
    }
  }

  $stmt = $pdo->prepare("SELECT goal_weight FROM users WHERE user_id = ?");
  $stmt->execute([$user_id]);
  $goal_weight = $stmt->fetchColumn();

  if (!empty($goal_weight) && isset($current_weight)) {
    if (abs($current_weight - $goal_weight) < 0.5) {
      $achievements[] = 9; // Goal Reached
    }
  }

  foreach ($achievements as $achievement_id) {
    $stmt = $pdo->prepare("INSERT IGNORE INTO user_achievements (user_id, achievement_id, achieved_at)
                           VALUES (?, ?, NOW())");
    $stmt->execute([$user_id, $achievement_id]);
  }
}
?>
