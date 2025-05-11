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

// Read the raw POST data
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Invalid input']);
  exit;
}

// Extract and sanitize input
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

  echo json_encode(['success' => true, 'message' => 'Progress logged successfully']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}

function checkProgressAchievements($pdo, $user_id) {
  $achievements = [];

  // Check total logs
  $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM user_progress WHERE user_id = ?");
  $stmt->execute([$user_id]);
  $count = $stmt->fetch()['count'];

  if ($count >= 1) {
    $achievements[] = ['code' => 'progress_1', 'description' => 'First Progress Update 📈'];
  }

  // Example: reward if weight decreased
  $stmt = $pdo->prepare("SELECT weight FROM user_progress WHERE user_id = ? ORDER BY id DESC LIMIT 2");
  $stmt->execute([$user_id]);
  $weights = $stmt->fetchAll(PDO::FETCH_COLUMN);

  if (count($weights) === 2 && $weights[0] < $weights[1]) {
    $achievements[] = ['code' => 'weight_loss', 'description' => 'Weight Loss Progress 🎯'];
  }

  foreach ($achievements as $ach) {
    $stmt = $pdo->prepare("INSERT IGNORE INTO user_achievements (user_id, achievement_code, date_awarded)
                           VALUES (?, ?, NOW())");
    $stmt->execute([$user_id, $ach['code']]);
  }

  return $achievements;
}

?>
