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
  $stmt = $pdo->prepare("INSERT INTO user_progress (user_id, date, weight, bmi, systolic, diastolic, sugar_level)
                         VALUES (:user_id, :date, :weight, :bmi, :systolic, :diastolic, :sugar_level)");
  $stmt->execute([
    'user_id' => $user_id,
    'date' => $date,
    'weight' => $weight,
    'bmi' => $bmi,
    'systolic' => $systolic,
    'diastolic' => $diastolic,
    'sugar_level' => $sugar_level
  ]);

  echo json_encode(['success' => true, 'message' => 'Progress logged successfully']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
